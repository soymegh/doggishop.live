<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_Detail;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;
use App\Models\PetType;
use App\Models\Provider;
use App\Models\Blog;
use App\Models\Departments;
use App\Models\Inventary;
use App\Models\Discount;
use App\Models\Municipalities;
use App\Models\payment_type;
use App\Models\Shipping;
use App\Models\User;
use App\Services\DiscountService;
use Psy\CodeCleaner\ReturnTypePass;
use Symfony\Component\HttpKernel\DataCollector\RequestDataCollector;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        switch (auth()->user()->role) {
            case 'admin':
                $petCount = Pet::count();
                $categoryCount = Category::count();
                $productCount = Product::count();
                $petTypeCount = PetType::count();
                $providerCount = Provider::count();
                $blogCount = Blog::count();
                $paymentType = payment_type::count();
                $userCount = User::count();
                $historyCount = Inventary::count();
                $billCount = Bill::count();
                $discountsCount = Discount::count();
                return view('home', compact('discountsCount','paymentType','petCount', 'categoryCount', 'productCount', 'petTypeCount', 'providerCount', 'blogCount', 'userCount', 'historyCount','billCount'));
                break;
            case 'user':
                $petCount = Pet::count();
                $categoryCount = Category::count();
                $productCount = Product::count();
                $petTypeCount = PetType::count();
                $providerCount = Provider::count();
                $paymentType = payment_type::count();
                $blogCount = Blog::count();
                $userCount = User::count();
                $historyCount = Inventary::count();
                $billCount = Bill::count();
                $discountsCount = Discount::count();
                return view('home', compact('discountsCount','billCount','paymentType','petCount', 'categoryCount', 'productCount', 'petTypeCount', 'providerCount', 'blogCount', 'userCount', 'historyCount'));
                break;

            case 'guest':
                
                $posts = Blog::orderBy('created_at', 'desc')->get();
                //$mascotas = Pet::orderBy('created_at', 'desc')->paginate(6);
                $discounts = new DiscountService();
                
                $mascotas = $discounts->applyDiscountPets();
                $products_discounts = $discounts->discountProductsDirect();


                //Retrieve stocks
                $records = Inventary::all();
                foreach ($products_discounts as $product) {
                    

                    $total = 0;
                    foreach ($records as $record) {
                        if($record->product_id == $product->id){
                            if ($record->description == 'Entrada') {
                                $total += $record->quantity;
                            } else {
                                $total -= $record->quantity;
                            }
                        }
                        
                    }

                    $product->stock = $total;
                }
                
                return view('guest.index', compact('posts', 'mascotas', 'products_discounts'));

                break;
            default:
                return redirect()->route('welcome');
                break;
        }
    }

    public function showProduct($id)
    {
        $product = Product::find($id);
        $discounts = new DiscountService();
        $product = $discounts->applyDiscountProduct($product);
        return $product;
        return view('guest.showProduct', compact('product'));
    }

    public function showPet($id)
    {
        $mascota = Pet::find($id);
        $discounts = new DiscountService();
        $mascota = $discounts->applyDiscountPet($mascota);
        return view('guest.showPet', compact('mascota'));
    }


    public function showCart($id, Request $request)
    {
        $date_now = date('Y-m-d 00:00:00');
        $cart = session()->get('cart');

        # Descuentos  logica
        $discounts = Discount::where('products', 1)
        ->where('end_time','>',$date_now)
        ->where('start_time','<',$date_now)
        ->first();

        $payment_types = payment_type::all();

        $subtotal = 0;
        $totalPaid = 0;
        $iva = 0.15;


        if($cart !== null) {

            $user_id = reset($cart)['user_id'];

            $products = Inventary::where('user_id', $user_id)->get();

            if ($discounts) {
                foreach ($cart as $key => $item) {
                    $pro_with_discount = $item['product']['price'] - ($item['product']['price'] * ($discounts->discount / 100));
                    $subtotal += $pro_with_discount     * $item['quantity'];
                }

            } else {

                foreach ($cart as $key => $item) {
                    $subtotal += $item['product']['price'] * $item['quantity'];
                }


            }


            $totalPaid = $subtotal + ($subtotal * ($iva));

            $totalPaid = round($totalPaid,2);
            $subtotal = round($subtotal,2);






            return view('guest.car', compact('products', 'payment_types', 'totalPaid', 'subtotal', 'discounts', 'iva'));

        } else {
            return view('guest.car', compact('payment_types', 'totalPaid', 'subtotal','discounts', 'iva'));
        }


    }

    public function store(Request $request) {

        $cart = session()->get('cart');

        $user_id = reset($cart)['user_id'];

        if ($request->option == "show"){

            $bill = $this->saveBill($cart, $request);
            $this->saveBillDetails($bill, $cart);
            $this->saveShipping($bill, $request, $user_id);

        } elseif ($request->option == "hide") {
            $bill = $this->saveBill($cart, $request);
            $this->saveBillDetails($bill, $cart);
        }



        foreach ($cart as $id => $product) {

            $this->saveInputsOutputs($product, $id);
        }


        session()->forget('cart');

        // Redirigir a otra página o mostrar mensaje de éxito
        return redirect()->back()->with('success', 'Datos guardados exitosamente');


    }


    function saveBill($cart, $request) {

        $bill = new Bill();
        $user_id = reset($cart)['user_id'];

        $bill->name = $request->input('username');
        $bill->phone = $request->input('phone');
        $bill->warrant = $request->input('warrant');
        $bill->payment_type_id = $request->payment_type;
        $bill->subtotal = $request->input('subtotal');
        $bill->total = $request->input('total');
        $bill->user_id = $user_id;
        $bill->bill_date = date_create('now')->format('Y-m-d H:i:s');
        $bill->save();

        return $bill;

    }


    function saveBillDetails(Bill $bill, $cart) {

        foreach ($cart as $id => $product) {

            $billDetail = new Bill_Detail();
            $billDetail->bill_id = $bill->id;
            $billDetail->product_id = $id;
            $billDetail->amount = $product['quantity'];
            $billDetail->price = $product['product']['price'];
            $billDetail->subtotal = $product['product']['price'] * $product['quantity'];

            $billDetail->save();
        }

    }



    function saveShipping(Bill $bill, Request $request, $user_id) {

        $shipping = new Shipping();



        $shipping->date_shipping = date_create('now')->format('Y-m-d H:i:s');
        $shipping->address = $request->address;
        $shipping->departments_id = $request->departments;
        $shipping->municipalities_id = $request->municipalities;
        $shipping->user_id = $user_id;
        $shipping->bill_id = $bill->id;

        $shipping->save();

    }



    function saveInputsOutputs($product , $id) {

        $inventary = new Inventary();
        $inventary->date = date('Y-m-d');
        $inventary->product_id = $id;
        $inventary->quantity = $product['quantity'];
        $inventary->price = $product['product']['price'];
        $inventary->description = $product['product']['description'];
        $inventary->user_id = $product['user_id'];
        $inventary->save();
    }




}
