<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehiculoController;

Route::apiResource('vehiculos', VehiculoController::class);
