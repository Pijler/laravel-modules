<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->json(['message' => 'API is working']));
