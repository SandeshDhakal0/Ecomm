<?php
// can use session and cookies unlike api.php
// work is done based on session
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('landing');


//http://127.0.0.1:8000/about-us
Route::get('/about-us', function(){
    //load view
     return view('aboutus');
    // echo "Test about us";
})->name('about-us');

//plain route
Route::get("/contact", function(){
    return view('contact-us');
})->name("contact");

Route::get('/product/detail/{id}', function($id){
    echo $id;
})->name('product-detail');

//Route::get('/product/detail/{id}/review/{reviewId}', function($id, $reviewId){
//    echo $id;
//})->name('product-review');

//named route
    //name cannot be null
    //name should be unique
    //route name can only be alphanumerical with either _ or - as special characters

                                    // Grouped Routes
    Route::group(['prefix' => '/admin', 'namespace' => '\App\Http\Controllers'], function() {

        //Simple controller
        Route::get('/category', 'CategoryController@getCategories')->name('category.index');
        Route::get('/category/{id}', 'CategoryController@showDetail')->name('category.show');
        //Single Invokable Controller
        Route::get('/', 'AdminController')->name('admin');

        //Resource Controller
        /***
         *   Category CRUD
         * URL                      Action                      Method    Name                Description
         * a./category =>           ProductController@index    get       category.index      Get all categories
         * b. /category/create      CategoryController@create   get       category.create     Open add form
         * c./category/             CategoryController@store    post      category.store      Submit category data
         * d./category/{id}         CategoryController@show     get       category.show       Detail of a category
         * e./category{id}/edit    CategoryController@edit      get       category.edit       Open a form to edit
         * f./category/{id}         CategoryController@update   put/patch category.upaate     Update the category
         * g. /category/{id}        CategoryController@destroy  delete    category.destroy    Delete the category
         *
         */

        Route::resource('product', 'ProductController');


        Route::group(['prefix' => '/seller'], function () {
            Route::get('/', function () {
                echo "Seller Dashboard";
            });

            Route::group(['prefix' => '/product'], function () {
                Route::get('/', function () {
                    echo "list all prodcut";
                });
            });
        });
    });





