<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;
use App\Models\PetType;
use App\Models\Provider;
use App\Models\Blog;

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
                return view('home', compact('petCount', 'categoryCount', 'productCount', 'petTypeCount', 'providerCount', 'blogCount'));
                break;
            case 'user':
                $petCount = Pet::count();
                $categoryCount = Category::count();
                $productCount = Product::count();
                $petTypeCount = PetType::count();
                $providerCount = Provider::count();
                $blogCount = Blog::count();
                return view('home', compact('petCount', 'categoryCount', 'productCount', 'petTypeCount', 'providerCount', 'blogCount'));
                break;
                break;
            case 'guest':
                $posts = Blog::orderBy('created_at', 'desc')->take(3)->get();
                $mascotas = Pet::orderBy('created_at', 'desc')->take(3)->get();
                $productos = Product::orderBy('created_at', 'desc')->take(3)->get();
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
        return view('guest.showProduct', compact('product'));
    }
}