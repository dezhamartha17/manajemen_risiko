<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\master\ActivityController;
use App\Http\Controllers\master\DepartmentController;
use App\Http\Controllers\master\RiskController;
use App\Http\Controllers\master\RiskValueController;
use App\Http\Controllers\transaksi\AssessmentController;
use App\Http\Controllers\transaksi\MonitoringController;
use App\Http\Controllers\transaksi\RecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\master\UserController;
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
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.show');

Route::get('/user/show',[UserController::class, 'show'])->name('user.show');
Route::get('/user/add',[UserController::class, 'add'])->name('user.add');
Route::post('/user/store',[UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}',[UserController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}',[UserController::class, 'destroy'])->name('user.destroy');

Route::get('/risk/show',[RiskController::class, 'show'])->name('risk.show');
Route::get('/risk/add',[RiskController::class, 'add'])->name('risk.add');
Route::post('/risk/store',[RiskController::class, 'store'])->name('risk.store');
Route::get('/risk/edit/{id}',[RiskController::class, 'edit'])->name('risk.edit');
Route::put('/risk/update/{id}',[RiskController::class, 'update'])->name('risk.update');
Route::delete('/risk/destroy/{id}',[RiskController::class, 'destroy'])->name('risk.destroy');

Route::get('/department/show',[DepartmentController::class, 'show'])->name('department.show');
Route::get('/department/add',[DepartmentController::class, 'add'])->name('department.add');
Route::post('/department/store',[DepartmentController::class, 'store'])->name('department.store');
Route::get('/department/edit/{id}',[DepartmentController::class, 'edit'])->name('department.edit');
Route::put('/department/update/{id}',[DepartmentController::class, 'update'])->name('department.update');
Route::delete('/department/destroy/{id}',[DepartmentController::class, 'destroy'])->name('department.destroy');

Route::get('/activity/show',[ActivityController::class, 'show'])->name('activity.show');
Route::get('/activity/add',[ActivityController::class, 'add'])->name('activity.add');
Route::post('/activity/store',[ActivityController::class, 'store'])->name('activity.store');
Route::get('/activity/edit/{id}',[ActivityController::class, 'edit'])->name('activity.edit');
Route::put('/activity/update/{id}',[ActivityController::class, 'update'])->name('activity.update');
Route::delete('/activity/destroy/{id}',[ActivityController::class, 'destroy'])->name('activity.destroy');

Route::get('/riskvalue/show',[RiskValueController::class, 'show'])->name('riskvalue.show');
Route::get('/riskvalue/add',[RiskValueController::class, 'add'])->name('riskvalue.add');
Route::post('/riskvalue/store',[RiskValueController::class, 'store'])->name('riskvalue.store');
Route::get('/riskvalue/edit/{id}',[RiskValueController::class, 'edit'])->name('riskvalue.edit');
Route::put('/riskvalue/update/{id}',[RiskValueController::class, 'update'])->name('riskvalue.update');
Route::delete('/riskvalue/destroy/{id}',[RiskValueController::class, 'destroy'])->name('riskvalue.destroy');

Route::get('/monitoring/show',[MonitoringController::class, 'show'])->name('monitoring.show');
Route::get('/monitoring/add',[MonitoringController::class, 'add'])->name('monitoring.add');
Route::post('/monitoring/store',[MonitoringController::class, 'store'])->name('monitoring.store');
Route::get('/monitoring/edit/{id}',[MonitoringController::class, 'edit'])->name('monitoring.edit');
Route::put('/monitoring/update/{id}',[MonitoringController::class, 'update'])->name('monitoring.update');
Route::delete('/monitoring/destroy/{id}',[MonitoringController::class, 'destroy'])->name('monitoring.destroy');

Route::get('/assessment/show',[AssessmentController::class, 'show'])->name('assessment.show');
Route::get('/assessment/add',[AssessmentController::class, 'add'])->name('assessment.add');
Route::post('/assessment/dampak',[AssessmentController::class, 'getDampakByActivity'])->name('assessment.dampak');
Route::get('/assessment/get-dampak',[AssessmentController::class, 'getImpacts'])->name('assessment.get-dampak');
Route::post('/assessment/store',[AssessmentController::class, 'store'])->name('assessment.store');
Route::get('/assessment/edit/{id}',[AssessmentController::class, 'edit'])->name('assessment.edit');
Route::put('/assessment/update/{id}',[AssessmentController::class, 'update'])->name('assessment.update');
Route::delete('/assessment/destroy/{id}',[AssessmentController::class, 'destroy'])->name('assessment.destroy');

Route::get('/recommendation/show',[RecommendationController::class, 'show'])->name('recommendation.show');
Route::get('/recommendation/add',[RecommendationController::class, 'add'])->name('recommendation.add');
Route::post('/recommendation/store',[RecommendationController::class, 'store'])->name('recommendation.store');
Route::get('/recommendation/edit/{id}',[RecommendationController::class, 'edit'])->name('recommendation.edit');
Route::put('/recommendation/update/{id}',[RecommendationController::class, 'update'])->name('recommendation.update');
Route::delete('/recommendation/destroy/{id}',[RecommendationController::class, 'destroy'])->name('recommendation.destroy');