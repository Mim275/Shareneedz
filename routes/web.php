<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\MobileBankingController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\sitsetting;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DonnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\DonationClarificationController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SentRequestControllerController;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Team;
use App\Models\Donner;
use App\Http\UserMiddleware;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\App;
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


Route::get('/clear', function() {
	$run = Artisan::call('config:clear');
	$run = Artisan::call('cache:clear');
	$run = Artisan::call('config:cache');
	return 'FINISHED';  
});

// localization route

Route::get("locale/{lange}", [LocalizationController::class, 'setLang']);

Auth::routes(['verify' => true]);

Route::get('/',  [HomeController::class, 'index'])->name('index');
Route::get('/donate',  [HomeController::class, 'donate'])->name('donate');
Route::get('/share',  [HomeController::class, 'share'])->name('share');
Route::get('/food',  [HomeController::class, 'food'])->name('food');
Route::get('/cloth',  [HomeController::class, 'cloth'])->name('cloth');
Route::get('/help', [HomeController::class, 'help'])->name('help');
Route::get('/book',  [HomeController::class, 'book'])->name('book');
Route::get('/search',  [HomeController::class, 'search'])->name('search');
Route::resource('post', PostController::class);



// ------------------- user Route ---------------------------
Route::group(['middleware'=>['auth','user', 'verified']], function (){
    Route::get("user/locale/{lange}", [LocalizationController::class, 'setLang']);
	Route::get('user/dashboard', [UserController::class, 'userdashboard'])->name('user.dashboard'); 	
	//profile Update
	Route::post('user/update/profile{id}', [UserController::class, 'updateprofile'])->name('user.update.profile');
	Route::put('password-update',[UserController::class, 'updatecreadintial'])->name('creadintial.update');
	Route::put('email-update',[UserController::class, 'updateemail'])->name('email.update');
	Route::get('user/invoice/{id}', [UserController::class, 'userinvoice'])->name('user.invoice'); 
	Route::post('sentrequest/{id}', [SentRequestControllerController::class, 'sentrequest'])->name('sentrequest'); 
});


// ------------------- volunteer Route ---------------------------
Route::group(['middleware'=>['auth','volunteer', 'verified']], function (){
	Route::get("volunteer/locale/{lange}", [LocalizationController::class, 'setLang']);
	Route::get('volunteer/dashboard', [VolunteerController::class, 'volunteerdashboard'])->name('volunteer.dashboard'); 	
	//profile Update
	Route::post('volunteer/update/profile{id}', [VolunteerController::class, 'updateprofile'])->name('volunteer.update.profile');
	Route::put('password-update',[VolunteerController::class, 'updatecreadintial'])->name('creadintial.update');
	Route::put('email-update',[VolunteerController::class, 'updateemail'])->name('email.update');
	Route::get('acceptrequest/{rid}/{bid}', [SentRequestControllerController::class, 'acceptrequest'])->name('acceptrequest'); 
	
});


// ------------------- admin Route ---------------------------
Route::group(['middleware'=>['auth','admin', 'verified']], function (){
    Route::get("admin/locale/{lange}", [LocalizationController::class, 'setLang']);
	Route::get('admin/dashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard'); 	
// admin setting 
	Route::get('admin/dashboard/setting', [AdminController::class, 'setting'])->name('setting.dashboard'); 
	Route::post('admin/update/profile{id}', [AdminController::class, 'updateprofile'])->name('admin.update.profile');
	Route::put('password-update',[AdminController::class, 'updatecreadintial'])->name('creadintial.update');
	Route::put('email-update',[AdminController::class, 'updateemail'])->name('email.update');	
// site setting 
	Route::get('admin/dashboard/sitesetting', [AdminController::class, 'sitsettinginfo'])->name('sitesetting'); 
	Route::post('admin/sitesettingupdate{id}', [AdminController::class, 'sitesettingupdate'])->name('admin.sitesettingupdate'); 
// mobile banking
	Route::resource('mobilebanking', MobileBankingController::class);
	Route::resource('bankaccount', BankAccountController::class);
// slider
	Route::resource('slider', SliderController::class);
	Route::resource('gallery', GalleryController::class);
	Route::resource('team', TeamController::class);
	Route::resource('donner', DonnerController::class);
	// post 
	Route::resource('sharepost', AdminPostController::class);
	// invoice
	Route::resource('donatclarify', DonationClarificationController::class);
	// userlist
	Route::get('userlist', [UserController::class, 'userlist'])->name('userlist');
	// Volunteer list admin
	Route::get('volunteerlist', [VolunteerController::class, 'volunteerlist'])->name('volunteerlist');
	// pending request
	Route::get('pendingrequest', [SentRequestControllerController::class, 'pendingrequest'])->name('pendingrequest');
	// acceptrequest
	Route::get('acceptrequestlist', [SentRequestControllerController::class, 'acceptrequestlist'])->name('acceptrequestlist');
});






Route::get('dashboard', function () {
    $setting = SiteSetting::first();
	$sliders = Slider::all();
	$gallerys = Gallery::all();
	$teams = Team::all();
	$donners = Donner::all();
	$localization   =  App::getLocale();
    return view('index', compact('setting','sliders','gallerys','teams', 'donners','localization'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
