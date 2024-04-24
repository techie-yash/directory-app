<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BranchManagementController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProFeatureManagementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;


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

// Route::get('/', function () {
//     // dd('done');
//     return view('web-page');
// });
// Route::get('/', [UserController::class, 'webpage'])->name('webpage');
// Route::get('/web-view/{id}', [UserController::class, 'webView'])->name('webView');


Route::get('setlocale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
})->name('setlocale');

Route::get('/profile', [UserController::class, 'user'])->name('profile.show');

Route::group(['middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // User Management==================================
    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::post('/user/add', [UserController::class, 'addUser'])->name('users.store');
    Route::match(['get', 'post'], '/user/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::match(['get', 'post'], '/user/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');




    Route::get('/features/add', [CMSController::class, 'addFeatures'])->name('addFeatures');
    Route::post('/features/store', [CMSController::class, 'storefeatures'])->name('storefeatures');
    Route::match(['get', 'post'], '/features/{id}/delete', [CMSController::class, 'destroyfeatures'])->name('destroyfeatures');


    Route::prefix('page')->group(function(){
        // About Us Management==============================
        Route::get('/about', [CMSController::class, 'about'])->name('about.index');
        Route::put('/about', [CMSController::class, 'updateAboutUs'])->name('about.update');

        //Contact Page Management
        Route::get('/contact', [CMSController::class, 'showForm'])->name('contact');
        Route::post('/contact', [CMSController::class, 'submitForm'])->name('contact.submit');


        // Faq Management===================================
        Route::get('/faq', [CMSController::class, 'index'])->name('faq.index');
        Route::post('/faq', [CMSController::class, 'store'])->name('faq.store');
        Route::match(['get', 'post'], '/faq/{id}/delete', [CMSController::class, 'destroy'])->name('faq.destroy');

    });

    Route::get('/terms', [CMSController::class, 'terms'])->name('terms.update');
    Route::put('/terms/add', [CMSController::class, 'updateTerms'])->name('updateTerms');



    // Manage Modules===================================
    Route::get('/role', [ModuleController::class, 'showrole'])->name('role');
    Route::post('/role', [ModuleController::class, 'submitRole'])->name('role.submit');
    Route::match(['get', 'post'], '/role/{id}/delete', [ModuleController::class, 'roleDestroy'])->name('role.destroy');

    //offers Modules====================================
    Route::get('/offers', [ModuleController::class, 'showOffers'])->name('offers');
    Route::post('/offers', [ModuleController::class, 'submitOffers'])->name('offers.submit');
    Route::match(['get', 'post'], '/offers/{id}/delete', [ModuleController::class, 'offersDestroy'])->name('offers.destroy');

    //interests Modules=================================
    Route::get('/interests', [ModuleController::class, 'showInterests'])->name('interests');
    Route::post('/interests', [ModuleController::class, 'submitInterests'])->name('interests.submit');
    Route::match(['get', 'post'], '/interests/{id}/delete', [ModuleController::class, 'interestsDestroy'])->name('interests.destroy');

    //events Modules====================================
    Route::get('/events', [ModuleController::class, 'showEvents'])->name('events');
    Route::post('/events', [ModuleController::class, 'submitEvents'])->name('events.submit');
    Route::match(['get', 'post'], '/events/{id}/delete', [ModuleController::class, 'eventsDestroy'])->name('events.destroy');

    //forms Modules=====================================
    Route::get('/form', [ModuleController::class, 'showform'])->name('form');
    Route::post('/form', [ModuleController::class, 'submitform'])->name('form.submit');
    Route::match(['get', 'post'], '/formdelete/{id}', [ModuleController::class, 'formDestroy'])->name('form.destroy');

    //Manage Currency Modules============================
    Route::get('/currency', [ModuleController::class, 'currencyform'])->name('currency');
    Route::post('/currency', [ModuleController::class, 'submitcurrency'])->name('currency.submit');
    Route::match(['get', 'post'], '/currency/{id}/delete', [ModuleController::class, 'currencyDestroy'])->name('currency.destroy');

    //Manage Top City List Modules=======================
    Route::get('/city', [ModuleController::class, 'cityList'])->name('cityList');
    Route::get('/city/add', [ModuleController::class, 'addCity'])->name('addCity.submit');
    Route::post('/city/store', [ModuleController::class, 'storeCity'])->name('storeCity');
    Route::match(['get', 'post'], '/city/{id}/delete', [ModuleController::class, 'cityDestroy'])->name('cityDestroy');

    Route::get('/location', [ModuleController::class, 'locationList'])->name('locationList');
    Route::get('/location/add', [ModuleController::class, 'addLocation'])->name('location.add');
    Route::post('/location/store', [ModuleController::class, 'storeLocation'])->name('storeLocation');



    //Manage Packages Modules============================
    Route::post('/package', [PackageController::class, 'package'])->name('package');
    Route::match(['get', 'post'], '/package/{id}/delete', [PackageController::class, 'packageDestroy'])->name('package.destroy');

    Route::get('/business-category', [PackageController::class, 'businessCategoryList'])->name('businessCategoryList');
    Route::get('/business-category/add', [PackageController::class, 'addBusinessCategory'])->name('addBusinessCategory');
    Route::post('/business-category/store', [PackageController::class, 'storeBusinessCategory'])->name('storeBusinessCategory');
    Route::match(['get', 'post'], '/business-category/{id}/delete', [PackageController::class, 'businessCategorydelete'])->name('businessCategorydelete');



});

//Customer Panel 

Route::group(['middleware' => 'checkIfCustomer','prefix'=>'customer'],function(){ 
    // Route::get('/customer/register', 'CustomerRegistrationController@showRegistrationForm')->name('customer.register'); 
    Route::get('/register', [CustomerController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/register', [CustomerController::class, 'register'])->name('submit.register');
    Route::get('/login', [CustomerController::class, 'showloginForm'])->name('customer.login');
    Route::post('/login', [CustomerController::class, 'login'])->name('customer.login');
});


    // Define the routes that require custom authentication here
    Route::group(['middleware' => 'checkIfNotCustomer','prefix'=>'customer'],function(){ 
        Route::get('/dashboard', [CustomerController::class, 'dashboardCustomer'])->name('customer.dashboard');
        Route::get('/logout', [CustomerController::class, 'logoutCustomerpanel'])->name('logoutCustomerpanel');
        Route::match(['get', 'post'], '/profile/update', [CustomerController::class, 'profileUpdate'])->name('profileUpdate');
        Route::get('/member', [CustomerController::class, 'memberList'])->name('memberList');
        Route::get('/member/add', [CustomerController::class, 'addMember'])->name('addMember');
        Route::post('/member/store', [CustomerController::class, 'storeMember'])->name('storeMember');
        Route::match(['get', 'post'], '/member/{id}/update', [CustomerController::class, 'memberUpdate'])->name('member.update');
        Route::match(['get', 'post'], '/member/{id}/delete', [CustomerController::class, 'memberdelete'])->name('member.delete');
    
        //Branch Management 
        Route::get('/branch', [BranchManagementController::class, 'branchList'])->name('branchList');
        Route::get('/branch/add', [BranchManagementController::class, 'addBranch'])->name('addBranch.submit');
        Route::post('/branch/store', [BranchManagementController::class, 'storeBranch'])->name('storeBranch');
        Route::match(['get', 'post'], '/branch/{id}/update', [BranchManagementController::class, 'branchUpdate'])->name('branch.update');
        Route::match(['get', 'post'], '/branch/{id}/delete', [BranchManagementController::class, 'branchDestroy'])->name('branch.destroy');
    
        // Add business
        Route::get('/business', [BranchManagementController::class, 'businessList'])->name('businessList');
        Route::get('/business/add', [BranchManagementController::class, 'addBusiness'])->name('addBusiness');
        Route::post('/business/store', [BranchManagementController::class, 'storeBusiness'])->name('storeBusiness');
        Route::match(['get', 'post'], '/business/{id}/delete', [BranchManagementController::class, 'businessdelete'])->name('businessdelete');
        Route::match(['get', 'post'], '/business/{id}/details', [BranchManagementController::class, 'viewBusinessdetails'])->name('viewBusinessdetails');
        Route::get('/get-subcategories/{category}', [BranchManagementController::class, 'getSubcategories'])->name('getSubcategories');

        //Manage Videos
        Route::get('/video', [VideoController::class, 'videoList'])->name('videoList');
        Route::match(['get','post'], '/video/add', [VideoController::class, 'addVideo'])->name('addVideo');
        Route::match(['get','post'], '/video/{id}/delete', [VideoController::class, 'deleteVideo'])->name('deleteVideo');
    
        //Manage Offer
        Route::get('/offer', [ProFeatureManagementController::class, 'offerList'])->name('offerList');
        Route::match(['get','post'],'/offer/add', [ProFeatureManagementController::class, 'addOffer'])->name('addOffer');
        Route::match(['get','post'], '/offer/{id}/delete', [ProFeatureManagementController::class, 'deleteOffer'])->name('deleteOffer');
    
        //Manage Delievry Network
        Route::get('/delivery-network', [ProFeatureManagementController::class, 'delievryNetworkList'])->name('delievryNetworkList');
        Route::match(['get','post'],'/delivery-network/add', [ProFeatureManagementController::class, 'addDelievryNetwork'])->name('addDelievryNetwork');
        Route::match(['get','post'], '/delivery-network/{id}/delete', [ProFeatureManagementController::class, 'deleteDelievry'])->name('deleteDelievry');
    
        //Manage Our Partner
        Route::get('/partner', [ProFeatureManagementController::class, 'ourPartnerlist'])->name('ourPartnerlist');
        Route::match(['get','post'],'/partner/add', [ProFeatureManagementController::class, 'addPartner'])->name('addPartner');
        Route::match(['get','post'], '/partner/{id}/delete', [ProFeatureManagementController::class, 'deletePartner'])->name('deletePartner');
    
        //Manage Bulletin
        Route::get('/bulletin', [ProFeatureManagementController::class, 'bulletinlist'])->name('bulletinlist');
        Route::match(['get','post'],'/bulletin/add', [ProFeatureManagementController::class, 'addBulletin'])->name('addBulletin');
        Route::match(['get','post'], '/bulletin/{id}/delete', [ProFeatureManagementController::class, 'deleteBulletin'])->name('deleteBulletin');
    
        //Manage Bulletin
        Route::get('/magzine', [ProFeatureManagementController::class, 'magzinelist'])->name('magzinelist');
        Route::match(['get','post'],'/magazine/add', [ProFeatureManagementController::class, 'addMagzine'])->name('addMagzine');
        Route::match(['get','post'], '/magazine/{id}/delete', [ProFeatureManagementController::class, 'deleteMagzine'])->name('deleteMagzine');
    
        //Manage Post 
        Route::get('/posts', [ProFeatureManagementController::class, 'postList'])->name('postList');
        Route::match(['get','post'],'/posts/add', [ProFeatureManagementController::class, 'addPost'])->name('addPost');
        Route::match(['get','post'], '/posts/{id}/delete', [ProFeatureManagementController::class, 'deletePost'])->name('deletePost');
    
        //Manage Event
        Route::get('/events', [ProFeatureManagementController::class, 'eventList'])->name('eventList');
        Route::match(['get','post'],'/events/add', [ProFeatureManagementController::class, 'addEvent'])->name('addEvent');
        Route::match(['get','post'], '/events/{id}/delete', [ProFeatureManagementController::class, 'deleteEvent'])->name('deleteEvent');
    
        Route::get('/category/add', [ProductController::class, 'addCategory'])->name('addCategory');
        Route::match(['get','post'],'/category/store', [ProductController::class, 'storeCategory'])->name('storeCategory');
        Route::match(['get','post'], '/category/{id}/delete', [ProductController::class, 'deleteCategory'])->name('deleteCategory');
    
        Route::match(['get','post'],'/product/add', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::match(['get','post'], '/product/{id}/delete', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    
        Route::match(['get','post'],'/page/add', [ProductController::class, 'addPage'])->name('addPage');
    
    });
    
    // User Panel
    Route::group(['middleware' => 'language'], function () {

        Route::group(['middleware' => 'CheckifUser','prefix'=>'user'],function(){ 
            Route::get('/login', [UserController::class, 'userPanelLogin'])->name('userPanelLogin');
            Route::get('/register', [UserController::class, 'userPanelRegister'])->name('userPanelRegister');
            Route::post('/store/register', [UserController::class, 'storePanelRegister'])->name('storePanelRegister');
            Route::post('/submitLogin', [UserController::class, 'submitLogin'])->name('submitLogin');
        });
        
        Route::group(['middleware' => 'CheckifNotUser','prefix'=>'user'],function(){            
            Route::get('/dashboard', [UserController::class, 'dashboardUserPanel'])->name('dashboardUserPanel');
            Route::get('/logout', [UserController::class, 'logoutUserPanel'])->name('logoutUserPanel');
            Route::match(['get','post'],'/profile', [UserController::class, 'updateUserdetail'])->name('updateUserdetail');
            Route::post('/change-password', [UserController::class, 'changePass'])->name('changePass');

            Route::post('/reviews/add', [FrontendController::class, 'addReview'])->name('addReview');
        });

        Route::get('/listing/{id}/', [FrontendController::class, 'directoryView'])->name('directoryView');
        Route::get('/listing/{id}/menu', [FrontendController::class, 'uiMenu'])->name('uiMenu');
        Route::get('/listing/{id}/offers', [FrontendController::class, 'uiOffers'])->name('uiOffers');
        Route::get('/listing/{id}/magazine', [FrontendController::class, 'uiMagazine'])->name('uiMagazine');
        Route::get('/listing/category/{id}/{slug}', [FrontendController::class, 'uiDirectory'])->name('uiDirectory');
        Route::get('/listing/{id}/branches', [FrontendController::class, 'uiBranches'])->name('uiBranches');
        Route::get('/listing/{id}/events', [FrontendController::class, 'uiEvents'])->name('uiEvents');
        Route::get('/listing/{id}/products', [FrontendController::class, 'uiProducts'])->name('uiProducts');
        Route::get('/listing/{id}/forms', [FrontendController::class, 'uiForms'])->name('uiForms');
        Route::get('/listing/{id}/post', [FrontendController::class, 'uiPost'])->name('uiPost');
        Route::get('/listing/{id}/review', [FrontendController::class, 'uiReview'])->name('uiReview');
        Route::get('/listing/{id}/viewPost', [FrontendController::class, 'viewPost'])->name('viewPost');
        Route::get('/listing/{id}/viewEvent', [FrontendController::class, 'viewEvent'])->name('viewEvent');
        Route::get('/listing/locations/{id}/{slug}', [FrontendController::class, 'viewLocations'])->name('viewLocations');
        Route::get('/get-business-listings', [FrontendController::class, 'getBusinessListings'])->name('getBusinessListings');

        Route::get('/', [FrontendController::class, 'webpage'])->name('webpage');
        // Route::get('/web-view/{id}', [UserController::class, 'webView'])->name('webView');
        Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
        Route::get('/contact', [FrontendController::class, 'contacUs'])->name('contacUs');
        Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
        Route::get('/about', [FrontendController::class, 'aboutUs'])->name('aboutUs');
        Route::get('/pricing', [FrontendController::class, 'pricing'])->name('pricing');
        Route::get('/advertise', [FrontendController::class, 'advertiseWithUs'])->name('advertiseWithUs');
        Route::get('/download/{filename}', [FrontendController::class, 'download'])->name('download');
        Route::get('/send-test-email', [FrontendController::class, 'sendTestEmail'])->name('sendTestEmail');

    });






// Route::get('/ui-about', [FrontendController::class, 'uiAbout'])->name('uiAbout');
// Route::get('/ui-menu', [FrontendController::class, 'uiMenu'])->name('uiMenu');
// Route::get('/ui-offers', [FrontendController::class, 'uiOffers'])->name('uiOffers');
// Route::get('/ui-magazine', [FrontendController::class, 'uiMagazine'])->name('uiMagazine');
// Route::get('/ui-directory', [FrontendController::class, 'uiDirectory'])->name('uiDirectory');
// Route::get('/ui-branches', [FrontendController::class, 'uiBranches'])->name('uiBranches');
// Route::get('/ui-events', [FrontendController::class, 'uiEvents'])->name('uiEvents');
// Route::get('/ui-products', [FrontendController::class, 'uiProducts'])->name('uiProducts');
// Route::get('/ui-forms', [FrontendController::class, 'uiForms'])->name('uiForms');
