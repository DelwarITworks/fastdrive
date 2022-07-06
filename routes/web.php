<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\User\PracticalController;
use App\Http\Controllers\User\TheoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CentreController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TheoryscheduleController;
use App\Http\Controllers\Admin\AdminpaymentController;
use App\Http\Controllers\Admin\PartialpaymentController;
use App\Http\Controllers\Admin\BlogcateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TheorycentreController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutmoreController;
use App\Http\Controllers\Admin\SettingController;

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
Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from Rimon Nahid',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('5001000junkemail@gmail.com')->send(new \App\Mail\MyMail($details));
   
    dd("Email is Sent.");
});



Route::get('/test', function () {
    return view('test');
});
Route::get('/adminlayouts', function () {
    return view('admin.layouts.app');
});
Route::get('/', function () {
    return view('welcome');
});


Route::get('stripe',[ActionController::class, 'stripe']);
Route::post('stripe', [ActionController::class, 'stripePost'])->name('stripe.post');

//BASIC MENU
Route::get('/', [PublicController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs');
Route::get('/faqs', [PublicController::class, 'faqs'])->name('faqs');
Route::get('/terms', [PublicController::class, 'terms'])->name('terms');
Route::get('/privacy', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/about', [PublicController::class, 'about'])->name('about');


Route::post('/contact-create', [PublicController::class, 'contactCreate'])->name('contact.create');
Route::post('/testalert-create', [PublicController::class, 'testalertCreate'])->name('testalert.create');

Route::get('/adi', [PublicController::class, 'adi'])->name('adi');

Route::get('/update', [PublicController::class, 'test_update'])->name('test_update');
Route::get('/update_theory', [PublicController::class, 'test_update_theory'])->name('test_update_theory');

//GUEST PRACTICAL ACTION ROUTES 
Route::get('/practical-test', [PracticalController::class, 'practicalTest'])->name('practical.test');
Route::get('/practical-test-centre', [PracticalController::class, 'practicalCentre'])->name('practical.test.centre');

Route::post('/practical-test-form', [PracticalController::class, 'practicalForm'])->name('practical.test.form');
Route::get('/payment', [PracticalController::class, 'payment'])->name('practical.test.payment');
Route::post('/practical-test-done', [PracticalController::class, 'paymentDone'])->name('practical.test.done');

//GUEST THEORY ACTION ROUTES
Route::get('/theory-test', [TheoryController::class, 'theoryTest'])->name('theory.test');
Route::get('/theory-test-centre', [TheoryController::class, 'theoryCentre'])->name('theory.test.centre');
Route::post('/theory-test-form', [TheoryController::class, 'theoryForm'])->name('theory.test.form');
Route::get('/theory-payment', [TheoryController::class, 'theoryPayment'])->name('theory.test.payment');
Route::post('/theory-test-done', [TheoryController::class, 'paymentDone'])->name('theory.test.done');


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    //BLOGCATE ROUTES
    Route::get('/faq-list', [FaqController::class, 'index'])->name('admin.faq');
    Route::post('/create/faq', [FaqController::class, 'create'])->name('create.faq');
    Route::post('/update/faq/{faq}', [FaqController::class, 'update'])->name('update.faq');
    Route::get('/delete/faq/{faq}', [FaqController::class, 'delete'])->name('delete.faq');
    Route::get('/active-faq/{faq}', [FaqController::class, 'active'])->name('active.faq');
    Route::get('/deactive-faq/{faq}', [FaqController::class, 'deactive'])->name('deactive.faq');
    Route::get('/deactive-faq-list', [FaqController::class, 'deactiveList'])->name('deactive.faq.list');

    //BLOG ROUTES
    Route::get('/list-blog', [BlogController::class, 'index'])->name('index.blog');
    Route::get('/create-blog', [BlogController::class, 'create'])->name('create.blog');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
    Route::get('/edit-blog/{blog}', [BlogController::class, 'edit'])->name('edit.blog');
    Route::post('/update-blog/{blog}', [BlogController::class, 'update'])->name('update.blog');
    Route::get('/delete-blog/{blog}', [BlogController::class, 'delete'])->name('delete.blog');
    Route::get('/active-blog/{blog}', [BlogController::class, 'active'])->name('active.blog');
    Route::get('/deactive-blog/{blog}', [BlogController::class, 'deactive'])->name('deactive.blog');
    Route::get('/deactive-blog-list', [BlogController::class, 'deactiveList'])->name('deactive.blog.list');

    //BLOGCATE ROUTES
    Route::get('/blogcate', [BlogcateController::class, 'index'])->name('admin.blogcate');
    Route::post('/create/blogcate', [BlogcateController::class, 'create'])->name('create.blogcate');
    Route::post('/update/blogcate/{blogcate}', [BlogcateController::class, 'update'])->name('update.blogcate');
    Route::get('/delete/blogcate/{blogcate}', [BlogcateController::class, 'delete'])->name('delete.blogcate');
    Route::get('/active-blogcate/{blogcate}', [BlogcateController::class, 'active'])->name('active.blogcate');
    Route::get('/deactive-blogcate/{blogcate}', [BlogcateController::class, 'deactive'])->name('deactive.blogcate');
    Route::get('/deactive-blogcate-list', [BlogcateController::class, 'deactiveList'])->name('deactive.blogcate.list');

    //PAYMENT LIST ROUTES
    Route::get('/payments-list', [AdminpaymentController::class, 'index'])->name('payment.list');
    Route::get('/theory-payment-list', [AdminpaymentController::class, 'theoryPayments'])->name('theory.payment.list');

    //CENTRE ROUTES
    Route::get('/centre', [CentreController::class, 'index'])->name('admin.centre');
    Route::get('centre-export', [CentreController::class, 'export'])->name('centre.export');
    Route::post('centre-import', [CentreController::class, 'import'])->name('centre.import');

    Route::post('/create/centre', [CentreController::class, 'create'])->name('create.centre');
    Route::post('/update/centre/{centre}', [CentreController::class, 'update'])->name('update.centre');
    Route::get('/delete/centre/{centre}', [CentreController::class, 'delete'])->name('delete.centre');

    Route::get('/active-centre/{centre}', [CentreController::class, 'active'])->name('active.centre');
    Route::get('/deactive-centre/{centre}', [CentreController::class, 'deactive'])->name('deactive.centre');
    Route::get('/deactive-centre-list', [CentreController::class, 'deactiveList'])->name('deactive.centre.list');

    //THEORY CENTRE ROUTES
    Route::get('/theorycentre', [TheorycentreController::class, 'index'])->name('admin.theorycentre');
    Route::get('theorycentre-export', [TheorycentreController::class, 'export'])->name('theorycentre.export');
    Route::post('theorycentre-import', [TheorycentreController::class, 'import'])->name('theorycentre.import');

    Route::post('/create/theorycentre', [TheorycentreController::class, 'create'])->name('create.theorycentre');
    Route::post('/update/theorycentre/{theorycentre}', [TheorycentreController::class, 'update'])->name('update.theorycentre');
    Route::get('/delete/theorycentre/{theorycentre}', [TheorycentreController::class, 'delete'])->name('delete.theorycentre');
    Route::get('/active-theorycentre/{theorycentre}', [TheorycentreController::class, 'active'])->name('active.theorycentre');
    Route::get('/deactive-theorycentre/{theorycentre}', [TheorycentreController::class, 'deactive'])->name('deactive.theorycentre');
    Route::get('/deactive-theorycentre-list', [TheorycentreController::class, 'deactiveList'])->name('deactive.theorycentre.list');


    //PARTIAL PAYMENT
    Route::post('/practical-payment-partial/{payment}', [PartialpaymentController::class, 'paymentPartial'])->name('practical.partial.payment'); 
    Route::post('/theory-payment-partial/{payment}', [PartialpaymentController::class, 'theorypaymentPartial'])->name('theory.partial.payment'); 

    Route::post('/theory-payment-refund/{payment}', [PartialpaymentController::class, 'theorypaymentRefund'])->name('theory.payment.refund');
    Route::post('/practical-payment-refund/{payment}', [PartialpaymentController::class, 'paymentRefund'])->name('practical.payment.refund');

    Route::get('/partial-list/{payment}', [PartialpaymentController::class, 'partialList'])->name('partial.list');


    //ABOUT ROUTE ARE HERE
    Route::get('admin-about', [AboutController::class,'index'])->name('admin.about');
    Route::post('about-store',[AboutController::class,'store'])->name('store.about');
    Route::post('about-update',[AboutController::class,'update'])->name('update.about');

    
    //ABOUT MORE ROUTES
    Route::get('/aboutmore/{about}', [AboutmoreController::class, 'index'])->name('admin.aboutmore');
    Route::post('/create/aboutmore', [AboutmoreController::class, 'create'])->name('create.aboutmore');
    Route::post('/update/aboutmore/{aboutmore}', [AboutmoreController::class, 'update'])->name('update.aboutmore');
    Route::get('/delete/aboutmore/{aboutmore}', [AboutmoreController::class, 'delete'])->name('delete.aboutmore');
    Route::get('/active-aboutmore/{aboutmore}', [AboutmoreController::class, 'active'])->name('active.aboutmore');
    Route::get('/deactive-aboutmore/{aboutmore}', [AboutmoreController::class, 'deactive'])->name('deactive.aboutmore');
    Route::get('/deactive-aboutmore-list', [AboutmoreController::class, 'deactiveList'])->name('deactive.aboutmore.list');

     
    //contact MORE ROUTES
    Route::get('/contact-messages', [AdminController::class, 'contactMessages'])->name('admin.contact.messages');
    Route::get('/delete/contact/{contact}', [AdminController::class, 'delete'])->name('delete.contact');
    Route::get('/active-contact/{contact}', [AdminController::class, 'active'])->name('active.contact');
    Route::get('/deactive-contact/{contact}', [AdminController::class, 'deactive'])->name('deactive.contact');
    Route::get('/deactive-contact-list', [AdminController::class, 'deactiveList'])->name('deactive.contact.list');


    //SETTING ROUTE ARE HERE
    Route::get('setting', [SettingController::class,'index'])->name('setting');
    Route::post('setting-store',[SettingController::class,'store'])->name('store.setting');
    Route::post('setting-update',[SettingController::class,'update'])->name('update.setting');
});


// logout
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');