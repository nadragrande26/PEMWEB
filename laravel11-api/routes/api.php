<?php 

use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ServiceController;

Route::apiResource('testimonials', TestimonialController::class);
Route::apiResource('services', ServiceController::class);
