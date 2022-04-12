<?php
use App\Models\User;
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
Route::get('/hello', function (Request $request) {
    return 'Hello World';
});

Route::post('/register', function(Request $request) {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save();
    return response()->json($user, 201);
});

Route::get('/users', function(Request $request) {
    return User::all();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
