<?php

use App\Models\PetType;
use App\Models\Blog;
use App\Models\Pet;
use App\Services\DiscountService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\InventaryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentTypeController;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Event;
use App\Models\Inventary;
use App\Models\payment_type;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $petTypeInfo= PetType::select('name','img_url')->get();
    $blogs = Blog::orderBy('created_at', 'DESC')->get()->take(4);
    //$pets = Pet::all()->take(4);
    $discountServices = new DiscountService();
    $pets = $discountServices->applyDiscountPets()->take(4);
    //si llegase a tener productos
    //$products = $discountServices->applyDiscountProducts()->take(4);
    $categories = Category::all()->take(4);

    // Find future events or current ones that will end in the next 8 days
    $event = Event::all()->where('start_date','>=', today() or 'end_date','<=',today()->modify('+8 Days'));
    return view('welcome',compact('petTypeInfo', 'blogs', 'pets', 'categories','event'));
})->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::post('/contact/send', [MailController::class, 'sendEmail'])->name('contact.send');



Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//verificar que el usuario este autenticado
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/product/{id}', [HomeController::class, 'showProduct'])->name('home.showProduct');
    Route::get('/home/pet/{id}', [HomeController::class, 'showPet'])->name('home.showPet');

});


Route::middleware('auth')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('pets/create', [PetController::class, 'create'])->name('pets.create');
    Route::post('pets', [PetController::class, 'store'])->name('pets.store');
    Route::get('pets/{id}', [PetController::class, 'show'])->name('pets.show');
    Route::get('pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('pets/{id}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('pet_types', [PetTypeController::class, 'index'])->name('pet_type.index');
    Route::get('pet_types/create', [PetTypeController::class, 'create'])->name('pet_type.create');
    Route::post('pet_types', [PetTypeController::class, 'store'])->name('pet_type.store');
    Route::get('pet_types/{id}', [PetTypeController::class, 'show'])->name('pet_type.show');
    Route::get('pet_types/{id}/edit', [PetTypeController::class, 'edit'])->name('pet_type.edit');
    Route::put('pet_types/{id}', [PetTypeController::class, 'update'])->name('pet_type.update');
    Route::delete('pet_types/{id}', [PetTypeController::class, 'destroy'])->name('pet_type.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('payment_type', [PaymentTypeController::class, 'index'])->name('payment_type.index');
    Route::get('payment_type/create', [PaymentTypeController::class, 'create'])->name('payment_type.create');
    Route::post('payment_type', [PaymentTypeController::class, 'store'])->name('payment_type.store');
    Route::get('payment_type/{id}/edit', [PaymentTypeController::class, 'edit'])->name('payment_type.edit');
    Route::put('payment_type/{id}', [PaymentTypeController::class, 'update'])->name('payment_type.update');
    Route::delete('payment_type/{id}', [PaymentTypeController::class, 'destroy'])->name('payment_type.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('providers', [ProviderController::class, 'index'])->name('providers.index');
    Route::get('providers/create', [ProviderController::class, 'create'])->name('providers.create');
    Route::post('providers', [ProviderController::class, 'store'])->name('providers.store');
    Route::get('providers/{id}', [ProviderController::class, 'show'])->name('providers.show');
    Route::get('providers/{id}/edit', [ProviderController::class, 'edit'])->name('providers.edit');
    Route::put('providers/{id}', [ProviderController::class, 'update'])->name('providers.update');
    Route::delete('providers/{id}', [ProviderController::class, 'destroy'])->name('providers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blog', [BlogController::class, 'posts'])->name('blogs.post');
    Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('bills', [BillController::class, 'index'])->name('bills.index');
    Route::get('bills/report', [BillController::class, 'report'])->name('bills.report');
});


//Usuario Admin
Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

//Usuario Gues
Route::middleware('auth')->group(function () {
    Route::get('Cliente', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
    Route::get('Ciente/{id}', [App\Http\Controllers\HomeController::class, 'showCart'] )->name('home.showCart');
    Route::post('Factura', [App\Http\Controllers\HomeController::class, 'store'] )->name('home.store');
    Route::get('Municipios/{id}',  [App\Http\Controllers\HomeController::class, 'getMunicipalities'])->name('home.getMunicipalities');
});



// Inventory
Route::middleware('auth')->group(function(){
    Route::get('factura', [InventaryController::class, 'index'])->name('inventary.index');
    Route::get('factura/create', [InventaryController::class, 'create'])->name('inventary.create');
    Route::post('factura', [InventaryController::class, 'store'])->name('inventary.store');
    Route::get('factura/{id}', [InventaryController::class, 'show'])->name('inventary.show');
    Route::get('factura/{id}/edit', [InventaryController::class, 'edit'])->name('inventary.edit');
    Route::put('factura/{id}', [InventaryController::class, 'update'])->name('inventary.update');
    Route::delete('factura/{id}', [InventaryController::class, 'destroy'])->name('inventary.destroy');

});

//Discount
Route::middleware('auth')->group(function(){
    Route::get('discounts', [DiscountController::class, 'index'])->name('discounts.index');
    Route::get('discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
    Route::post('discounts', [DiscountController::class, 'store'])->name('discounts.store');
    Route::get('discounts/{id}', [DiscountController::class, 'show'])->name('discounts.show');
    Route::get('discounts/{id}/edit', [DiscountController::class, 'edit'])->name('discounts.edit');
    Route::put('discounts/{id}', [DiscountController::class, 'update'])->name('discounts.update');
    Route::delete('discounts/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy');

});

//Event
Route::middleware('auth')->group(function(){
    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

});
