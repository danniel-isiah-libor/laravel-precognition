<?php

use App\Http\Requests\TestRequest;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/test', function (TestRequest $request) {
    $request->validated();

    return response()->json([
        'message' => 'Validation passed',
    ]);
})->middleware([HandlePrecognitiveRequests::class]);
