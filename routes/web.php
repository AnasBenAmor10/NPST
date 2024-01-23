<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
// Groupe de routes pour les étudiants
// Route::middleware(['check.user_type:1'])->group(function () {
//     Route::get('/Student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
// });

// // Groupe de routes pour les enseignants
// Route::middleware(['check.user_type:2'])->group(function () {
//     // Ajoutez des routes spécifiques aux enseignants ici
// });

// // Groupe de routes pour les sociétés
// Route::middleware(['check.user_type:3'])->group(function () {
//     // Ajoutez des routes spécifiques aux sociétés ici
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route Student
    Route::get('/dashboard/Stages', [UserController::class, 'viewStage'])->name('Student.viewStage');
    Route::get('/dashboard/send-request-to-company/{companyId}', [UserController::class, 'sendRequestToCompany'])->name('student.sendRequestToCompany');
    Route::get('/dashboard/view-my-stage-requests', [UserController::class, 'viewMyStageRequests'])->name('student.viewMyStageRequests');
    Route::get('/dashboard/demande-stage', [UserController::class, 'demandestage'])->name('student.demandestage');
    Route::get('/dashboard/informations', [UserController::class, 'informations'])->name('Student.informations');
    Route::get('/dashboard/demande-Encadrant', [UserController::class, 'demandeencadrant'])->name('student.demandeencadrant');
    Route::get('/dashboard/assign-encadrant-to-stage/{stageId}', [UserController::class, 'assignEncadrantToStage'])->name('student.assignEncadrantToStage');
    Route::post('/dashboard/assign-encadrant-to-stage/{stageId}', [UserController::class, 'Encadrantdone'])->name('student.encadrantdone');
    // Route Company
    // Route::get('/dashboard/company', [CompanyController::class, 'dashboard'])->name('company.dashboard');
    Route::get('/dashboard/company/informations', [CompanyController::class, 'informations'])->name('company.informations');
    Route::Post('/dashboard/{stageId}/review', [CompanyController::class, 'reviewstagerequest'])->name('company.reviewstagerequest');
    Route::post('/respond-to-stage-request/{stageId}', [CompanyController::class, 'respondToStageRequest'])->name('company.respondToStageRequest');
    Route::get('/dashboard/company/view-stage-requests', [CompanyController::class, 'viewStageRequests'])->name('company.viewStageRequests');
    Route::get('/respond-to-stage-request/{requestId}/{companyId}', [CompanyController::class, 'respondToStageRequest'])->name('company.respondToStageRequest');
});


require __DIR__ . '/auth.php';
