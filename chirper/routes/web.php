<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

/* Web Routes get the views from the resources/views directory. These files render
 the HTML that is sent to the browser. They can also contain Blade syntax, which
 is a simple templating language that allows you to write PHP code in your views

Route::get('/', function () {
    return view('home');
});
*/


// Uses controllers to return functions (look above)
Route::get('/', [ChirpController::class, 'index']);