<?php

use App\Http\Controllers\Api\V1\MainController;
use App\Services\ApiResponse;
use Illuminate\Support\Facades\Route;

Route::get('/status', [MainController::class, 'status']);

Route::get('/categories', [MainController::class, 'listCategories']);
Route::get('/users', [MainController::class, 'listUsers']);
Route::get('/projects', [MainController::class, 'listProjects']);
Route::get('/services', [MainController::class, 'listServices']);

Route::get('/users/{id}', [MainController::class, 'getUser']);
Route::get('/categories/{id}', [MainController::class, 'getCategory']);
Route::get('/projects/{id}', [MainController::class, 'getProject']);
Route::get('/services/{id}', [MainController::class, 'getService']);
Route::get('/users/{id}/projects', [MainController::class, 'getProjectsByUser']);

Route::get('/services/ordered/{field}/{direction}', [MainController::class, 'listServicesOrdered']);

Route::post('/users/create', [MainController::class, 'createUser']);
Route::post('/categories/create', [MainController::class, 'createCategory']);
Route::post('/projects/create', [MainController::class, 'createProject']);
Route::post('/services/create', [MainController::class, 'createService']);

Route::put('/categories/{id}/update', [MainController::class, 'updateCategory']);
Route::put('/projects/{id}/update', [MainController::class, 'updateProject']);

Route::delete('/categories/{id}/delete', [MainController::class, 'deleteCategory']);
Route::delete('/projects/{id}/delete', [MainController::class, 'deleteProject']);
