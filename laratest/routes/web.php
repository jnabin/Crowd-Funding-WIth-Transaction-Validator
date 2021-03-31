<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\NodeController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/registration', [RegistrationController::class, 'signup']);
Route::post('/login',  [LoginController::class, 'verify']);
Route::get('/logout', [logoutController::class, 'index']);
Route::post('/node/store', [NodeController::class, 'store']);

// Google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);


Route::group(['middleware'=>['sess']], function(){

	Route::get('/home', [HomeController::class, 'index'])->middleware('sess')->name('home.index');
	Route::get('/search', [HomeController::class, 'search']);
	Route::get('/campaignlist', [HomeController::class, 'campaignlist'])->name('home.campaignlist');
	Route::get('/bookmarkslist', [HomeController::class, 'bookmarkslist'])->name('home.bookmarkslist');
	Route::get('/details/{id}', [OrganizationController::class, 'show'])->name('organization.show');
	Route::get('/deletebookmark/{id}', [HomeController::class, 'delete'])->name('home.deletebookmark');

	Route::group(['middleware'=>['type']], function(){
		Route::get('/create', [OrganizationController::class, 'create'])->name('organization.create');
		Route::get('/createfb/{id}', [OrganizationController::class, 'createfb'])->name('organization.createfb');
		Route::get('/generateReport', [OrganizationController::class, 'generateReport'])->name('organization.generatereport');
		Route::post('/generateReport', [OrganizationController::class, 'displayReport']);
		Route::post('/createfb/{id}', [OrganizationController::class, 'store']);
		Route::post('/create', [OrganizationController::class, 'store']);
		Route::get('/user/edit/{id}', [OrganizationController::class, 'edit'])->name('organization.edit');
		Route::post('/user/edit/{id}', [OrganizationController::class, 'update']);
		Route::get('/delete/{id}', [OrganizationController::class, 'delete'])->name('organization.delete');
		Route::post('/delete/{id}', [OrganizationController::class, 'destroy']);
		Route::get('/oreport/{id}', [OrganizationController::class, 'report'])->name('organization.report');
		Route::post('/oreport/{id}', [OrganizationController::class, 'reported']);
		Route::get('/bookmark/{id}', [OrganizationController::class, 'bookmark'])->name('organization.bookmark');
		Route::get('/dashboard', [OrganizationController::class, 'dashboard'])->name('organization.dashboard');
		Route::get('/deletedashboard/{id}', [OrganizationController::class, 'deletedash'])->name('organization.deletedashboard');
		Route::get('/api/getFromNode', [OrganizationController::class, 'getFromNode'])->name('organization.getFromNode');
		Route::get('/myprofile', [OrganizationController::class, 'profile'])->name('organization.profile');
	});

	
});
Route::group(['middleware'=>['sess1']], function(){
	Route::get('/donate', [DonateController::class, 'index'])->name('donate.index');
	Route::get('/profile', [DonateController::class, 'profile'])->name('donate.profile');
	Route::get('/donation/{id}', [DonateController::class, 'donation'])->name('donate.donation');
	Route::post('/donation/{id}', [DonateController::class, 'storedonation']);
	Route::get('/report/{id}', [DonateController::class, 'report'])->name('Donate.report');
	Route::post('/report/{id}', [DonateController::class, 'reported']);
});