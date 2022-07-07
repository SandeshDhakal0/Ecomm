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

Route::get('/about-us', function () {
    return view('aboutus');
});


//http://127.0.0.1:8000/about-us
Route::get('/about-us', function(){
    
     ddd("test about us");
    // echo "Test about us";
});

//plain route
Route::get("/contact", function(){
    echo "Contact Page";
});

Route::get('/product/detail/{id}', function($id){
    echo $id;
})->name('product-detail');

//named route
    //name cannot be null
    //name should be unique
    //route name can only be alphanumerical with either _ or - as special characters

    

// Route::get(url,action);            =>Fetch data
// Route::post(url,action);           =>To store or create a data
// Route::put(url,action);               =>To update a data in db
// Route::patch(url,action);          =>To update a data
// Route::delete(url,action);         => To delete any data in db
// Route::match([],url,action);          => To call the url on defined methods
// Route::any(url,action);            => To call the action on any method
// Route::resources(controller);

// Route::match(['patch', 'put'],'/admin');
// Route::patch('/admin');
// Route::put('/admin');
// Route::any();
// Route::domain();


// Grouped Routes

Route::group(['prefix' => '/admin'], function(){
    Route::get('/', function(){
        echo "Admin Dashboard";
});

Route::group(['prefix' => '/product'], function(){
    Route::get('/', function(){
        echo "list all products";
    });
    });
});

Route::group(['prefix' => '/seller'], function(){
    Route::get('/', function(){
        echo "Seller Dashboard";
    });

    Route::group(['prefix' => '/product'], function(){
        Route::get('/', function(){
            echo "list all prodcut";
        });
    });
});

