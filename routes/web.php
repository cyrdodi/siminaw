<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DevGovtController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebMonitorController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\OrganizationController;

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

Route::get('/dashboard2', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard2');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/application', [ApplicationController::class, 'index'])->name('application.index');
  Route::get('/application/create', [ApplicationController::class, 'create'])->name('application.create');
  Route::get('/application/attach-ogranization/{application}', [ApplicationController::class, 'attachOrganization'])->name('application.attachOrganization');
  Route::get('/application/attach-organization/{application}/{organization}/edit', [ApplicationController::class, 'attachOrganizationEdit'])->name('application.attachOrganization.edit');
  Route::get('/application/show/{application}', [ApplicationController::class, 'show'])->name('application.show');
  Route::get('/application/show/{application}/attach-organization', [ApplicationController::class, 'showAttachOrganization'])->name('application.show.attachOrganization');
  Route::get('/application/show/{application}/attach-organization/{organization}/edit', [ApplicationController::class, 'showAttachOrganizationEdit'])->name('application.show.attachOrganization.edit');
  Route::delete('/application/delete/{application}', [ApplicationController::class, 'delete'])->name('application.delete');
  Route::get('/application/edit/{application}', [ApplicationController::class, 'edit'])->name('application.edit');

  Route::get('/web-monitor', [WebMonitorController::class, 'index'])->name('webMonitor');

  // master data
  Route::get('/organization', [OrganizationController::class, 'index'])->name('organization');
  Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organization.create');

  Route::get('/vendor', [VendorController::class, 'index'])->name('vendor');
  Route::get('/vendor/create', [VendorController::class, 'create'])->name('vendor.create');

  Route::get('/dev-govt', [DevGovtController::class, 'index'])->name('devGovt');
  Route::get('/dev-govt/create', [DevGovtController::class, 'create'])->name('devGovt.create');
});

require __DIR__ . '/auth.php';
