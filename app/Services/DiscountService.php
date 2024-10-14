<?php
namespace App\Services;

use App\Models\Discount;
use App\Models\Pet;
use App\Models\Product;
use Illuminate\Http\Request;
class DiscountService
{
    //constructor
    public function __construct()
    {
    }

    public function applyDiscountPets()
    {
        $discounts = Discount::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->where('status', true)
            ->where('pets', true)
            ->get();

        if ($discounts->count() > 0) {
            $pets = Pet::all();
            foreach ($pets as $pet) {
                //agregar un nuevo campo llamado price_discounted
                $pet->price_discounted = ($pet->price * ($discounts[0]->discount/100));
                $pet->new_price = $pet->price - ($pet->price * ($discounts[0]->discount/100));
                //Periodo de descuento
                $pet->discount_period = "Del " . $discounts[0]->start_time . ' al ' . $discounts[0]->end_time;
            }
        } else {
            $pets = Pet::all();
        }

        return $pets;
    }

    public function applyDiscountProducts(Request $request)
    {
        $discounts = Discount::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->where('status', true)
            ->where('products', true)
            ->get();

        
        if($request){
            $products = Product::whereAny(['name','description','price'],'LIKE','%'.$request->get('search').'%')->paginate(8);
        }else{
            $products = Product::paginate(8);
        }

        if ($discounts->count() > 0) {
            foreach ($products as $product) {
                //agregar un nuevo campo llamado price_discounted
                $product->price_discounted = ($product->price * ($discounts[0]->discount/100));
                $product->new_price = $product->price - ($product->price * ($discounts[0]->discount/100));
            }
        }

        return $products;
    }

    public function applyDiscountProductsByCategory(Request $request, string $id)
    {
        $discounts = Discount::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->where('status', true)
            ->where('products', true)
            ->get();

        
        if($request){
            $products = Product::whereAny(['name','description','price'],'LIKE','%'.$request->get('search').'%')->where('category_id', $id)
            ->paginate(6);
        }else{
            $products = Product::where('category_id', $id)->paginate(6);
        }

        if ($discounts->count() > 0) {
            foreach ($products as $product) {
                //agregar un nuevo campo llamado price_discounted
                $product->price_discounted = ($product->price * ($discounts[0]->discount/100));
                $product->new_price = $product->price - ($product->price * ($discounts[0]->discount/100));
            }
        }

        return $products;
    }

    public function applyDiscountPet($pet)
    {
        $discounts = Discount::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->where('status', true)
            ->where('pets', true)
            ->get();

        if ($discounts->count() > 0) {
            $pet->price_discounted = ($pet->price * ($discounts[0]->discount/100));
            $pet->new_price = $pet->price - ($pet->price * ($discounts[0]->discount/100));
            $pet->discount_period = "Del " . $discounts[0]->start_time . ' al ' . $discounts[0]->end_time;
        }

        return $pet;
    }

    public function applyDiscountProduct($product)
    {
        $discounts = Discount::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->where('status', true)
            ->where('products', true)
            ->get();

        if ($discounts->count() > 0) {
            $product->price_discounted = ($product->price * ($discounts[0]->discount/100));
            $product->new_price = $product->price - ($product->price * ($discounts[0]->discount/100));
        }

        return $product;
    }


}
