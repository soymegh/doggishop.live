<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Product;
use App\Services\DiscountService;


class GuestController extends Controller
{
    public function showPets(Request $request)
    {
        try {
            if ($request->has('search')) {
                $pets = Pet::whereAny(['name', 'gender', 'breed'], 'LIKE', '%' . $request->get('search') . '%')->paginate(8);
                return view('guest.pets', compact('pets'));
            } else {
                $pets = Pet::paginate(perPage: 8);
                return view('guest.pets', compact('pets'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showProducts(Request $request)
    {
        $discountServices = new DiscountService();

        try {
            $products = $discountServices->applyDiscountProducts($request);
            return view('guest.products', compact('products'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    public function showByCategory(Request $request,string $id)
    {
        $discountServices = new DiscountService();

        try {
            
            $products = $discountServices->applyDiscountProductsByCategory($request, $id);
            return view('guest.products', compact('products'));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function showCategories(Request $request)
    {
        try {
            if ($request->has('search')) {
                $category = Category::whereAny(['name', 'description'], 'LIKE', '%' . $request->get('search') . '%')->paginate(8);
                return view('guest.categories', compact('category'));
            } else {
                $category = Category::paginate(8);
                return view('guest.categories', compact('category'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
