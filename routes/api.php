<?php
use App\Models\User;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// function split

Route::get('/hello', function (Request $request) {
    return 'Hello World';
});

Route::post('/register', function(Request $request) {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $isSaved = $user->save();
    $res = [
        'success' => $isSaved ,
        'message' => $isSaved ? 'User registered successfully' : 'User registration failed',
    ];
    return response()->json($res, 201);
});

Route::get('/users', function(Request $request) {
    return User::all();
});

Route::resource('products', ProductController::class);
Route::get('products/search/{name}', [ProductController::class, 'search']);


// Route::get('/products', [ProductController::class, 'index']);
// Route::post('/products', [ProductController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
