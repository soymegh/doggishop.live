<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;
use App\Models\PetType;
use App\Models\Provider;
use App\Models\Blog;
use App\Models\Inventary;
use App\Models\Discount;
use App\Models\payment_type;
use App\Models\User;
use App\Services\DiscountService;


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
                $userCount = User::count();
                $historyCount = Inventary::count();
                return view('home', compact('petCount', 'categoryCount', 'productCount', 'petTypeCount', 'providerCount', 'blogCount', 'userCount', 'historyCount'));
                break;
            case 'user':
                $petCount = Pet::count();
                $categoryCount = Category::count();
                $productCount = Product::count();
                $petTypeCount = PetType::count();
                $providerCount = Provider::count();
                $blogCount = Blog::count();
                $userCount = User::count();
                $historyCount = Inventary::count();
                return view('home', compact('petCount', 'categoryCount', 'productCount', 'petTypeCount', 'providerCount', 'blogCount', 'userCount', 'historyCount'));
                break;

            case 'guest':



                $posts = Blog::orderBy('created_at', 'desc')->get();
                //$mascotas = Pet::orderBy('created_at', 'desc')->paginate(6);
                $discounts = new DiscountService();
                $mascotas = $discounts->applyDiscountPets();
                $productos = Product::orderBy('created_at', 'desc')->paginate(6);

                return view('guest.index', compact('posts', 'mascotas', 'productos'));

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

}
