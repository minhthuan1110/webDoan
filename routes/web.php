<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginWithSocialNetworkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EAV\AttributeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourImageController;
use App\Http\Controllers\TourPlanController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VnpayController;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\User;
use App\Notifications\SendNotificationToCustomers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\TourMuntipleImage;
use App\Models\Area;

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

/*
|-----------------------------------------------------------------------
| Email Verification.
|-----------------------------------------------------------------------
*/
// gui email xac thuc lan 1
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// gui lai email xac minh
Route::post('/email/verification-notification', [VerifyEmailController::class, 'resendEmail'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// tien hanh xac thuc va chuyen huong ve /home
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verification'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

/*
|-----------------------------------------------------------------------
| Forgot Password and Reset Password.
|-----------------------------------------------------------------------
*/
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', [ResetPasswordController::class, 'requestPasswordReset'])
    ->middleware('guest')->name('password.email');

// dat lai mat khau
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])
    ->middleware('guest')->name('password.update');

/*
|-----------------------------------------------------------------------
| Login, Register normally and Log out.
|-----------------------------------------------------------------------
*/

// Route::get('login', function () {
//     return view('auth.login');
// });
// Route::get('register', function () {
//     return view('auth.register');
// });
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|-----------------------------------------------------------------------
| Login with Socials Network (Facebook, Google).
|-----------------------------------------------------------------------
*/
Route::get('/auth/{provider}/redirect', [LoginWithSocialNetworkController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [LoginWithSocialNetworkController::class, 'callback']);


/*
|-----------------------------------------------------------------------
| Routes for Customers.
|-----------------------------------------------------------------------
*/
// Set language
// Route::group(['middleware' => 'locale'], function () {
//     Route::get('change-language/{language}', [Controller::class, 'changeLanguage'])->name('change_language');
// });
// ->middleware('verified');


Route::get('/', [BaseController::class, 'home']);
Route::get('about-us', [BaseController::class, 'about']);
Route::get('/contact', [BaseController::class, 'contact']);

// ! Các route liên quan đến Tours
Route::group(['prefix' => '/tour'], function () {
    Route::get('/', [BaseController::class, 'listTour']);
    Route::get('/list', [BaseController::class, 'listTour']);
    Route::post('/search', [BaseController::class, 'search']);
    Route::get('/domestic', [BaseController::class, 'domestic']);
    Route::get('/foreign', [BaseController::class, 'foreign']);
    Route::get('/{tour_id}', [BaseController::class, 'detailTour']);
    Route::get('/{tour_id}/booking', [BookingController::class, 'userCreate']);
    Route::post('/booking/store', [BookingController::class, 'userStore']);
});
Route::prefix('/blog')->group(function () {
    Route::get('/', [BaseController::class, 'blog']);
    Route::get('/{article_id}', [BaseController::class, 'detailArticle']);
});

// ! Các route liên quan đến Users , 'middleware' => 'user'
Route::group(['prefix' => '/user', 'as' => 'user.', 'middleware' => 'auth:user'], function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update', [UserController::class, 'userUpdate']);
    Route::get('/change-password', [UserController::class, 'changePassword']);
    Route::post('/update-password', [UserController::class, 'updatePassword']);
    Route::get('/booking', [UserController::class, 'getBooking']);
});
Route::get('/booking/{code}', [BookingController::class, 'bookingDetail']);

Route::get('/notification', [UserController::class, 'getNotification']);
Route::get('/notification/mark-as-read-all', [UserController::class, 'markAsReadAll']);
Route::get('/notification/delete-all', [UserController::class, 'deleteAllNotification']);
Route::get('/notification/mark-as-read/{notification_id}', [UserController::class, 'markAsRead']);
Route::get('/notification/delete/{notification_id}', [UserController::class, 'deleteNotification']);

// Lấy thông tin của mã giảm giá
Route::get('/promotion/{promotion_id}', [PromotionController::class, 'getPromotion']);
Route::get('/social-element', [Controller::class, 'socialElement']);

// Thanh toán online qua VnPay
Route::get('/vnpay', [VnpayController::class, 'create'])->name('vnpay');
Route::get('/return-vnpay', [VnpayController::class, 'return'])->name('vnpay.return');

/*
|-----------------------------------------------------------------------
| Routes for Administrators.
|-----------------------------------------------------------------------
*/

Route::get('/generate-code/{length}', [Controller::class, 'generateCode'])->name('generate_code');

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', [BackendController::class, 'dashboard']);

    Route::group(['prefix' => '/tag', 'as' => 'tag.'], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/index-data', [TagController::class, 'indexData'])->name('index_data');
        // Route::get('/add', [TagController::class, 'create'])->name('add');
        Route::post('/store', [TagController::class, 'store'])->name('store');
        Route::get('/edit/{tag_id}', [TagController::class, 'edit'])->name('edit');
        Route::post('/update/{tag_id}', [TagController::class, 'update'])->name('update');
        Route::get('/delete/{tag_id}', [TagController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/vehicle', 'as' => 'vehicle.'], function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index');
        Route::get('/index-data', [VehicleController::class, 'indexData'])->name('index_data');
        // Route::get('/add', [VehicleController::class, 'create'])->name('add');
        Route::post('/store', [VehicleController::class, 'store'])->name('store');
        Route::get('/edit/{vehicle_id}', [VehicleController::class, 'edit'])->name('edit');
        Route::post('/update/{vehicle_id}', [VehicleController::class, 'update'])->name('update');
        Route::get('/delete/{vehicle_id}', [VehicleController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/contact', 'as' => 'contact.'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/index-data', [ContactController::class, 'indexData'])->name('index_data');
        Route::post('/store', [ContactController::class, 'store'])->name('store');
        Route::get('/edit/{contact_id}', [ContactController::class, 'edit'])->name('edit');
        Route::post('/update/{contact_id}', [ContactController::class, 'update'])->name('update');
        Route::get('/delete/{contact_id}', [ContactController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/about', 'as' => 'about.'], function () {
        Route::get('/', [AboutUsController::class, 'index'])->name('index');
        Route::post('/update/{about_id}', [AboutUsController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => '/area', 'as' => 'area.'], function () {
        Route::get('/', [AreaController::class, 'index'])->name('index');
        Route::get('/index-data', [AreaController::class, 'indexData'])->name('index_data');
        // Route::get('/add', [AreaController::class, 'create'])->name('add');
        Route::post('/store', [AreaController::class, 'store'])->name('store');
        Route::get('/edit/{area_id}', [AreaController::class, 'edit'])->name('edit');
        Route::post('/update/{area_id}', [AreaController::class, 'update'])->name('update');
        Route::get('/delete/{area_id}', [AreaController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/location', 'as' => 'location.'], function () {
        Route::get('/', [LocationController::class, 'index'])->name('index');
        Route::get('/index-data', [LocationController::class, 'indexData'])->name('index_data');
        // Route::get('/add', [LocationController::class, 'create'])->name('add');
        Route::post('/store', [LocationController::class, 'store'])->name('store');
        Route::get('/edit/{location_id}', [LocationController::class, 'edit'])->name('edit');
        Route::post('/update/{location_id}', [LocationController::class, 'update'])->name('update');
        Route::get('/delete/{location_id}', [LocationController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/payment', 'as' => 'payment.'], function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('/index-data', [PaymentController::class, 'indexData'])->name('index_data');
        // Route::get('/add', [PaymentController::class, 'create'])->name('add');
        Route::post('/store', [PaymentController::class, 'store'])->name('store');
        Route::get('/edit/{payment_id}', [PaymentController::class, 'edit'])->name('edit');
        Route::post('/update/{payment_id}', [PaymentController::class, 'update'])->name('update');
        Route::get('/delete/{payment_id}', [PaymentController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/attribute', 'as' => 'attribute.'], function () {
        Route::get('/', [AttributeController::class, 'index'])->name('index');
        Route::get('/index-data', [AttributeController::class, 'indexData'])->name('index_data');
        Route::get('/add', [AttributeController::class, 'create'])->name('add');
        Route::post('/store', [AttributeController::class, 'store'])->name('store');
        Route::get('/edit/{attribute_id}', [AttributeController::class, 'edit'])->name('edit');
        Route::post('/update/{attribute_id}', [AttributeController::class, 'update'])->name('update');
        Route::get('/delete/{attribute_id}', [AttributeController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/promotion', 'as' => 'promotion.'], function () {
        Route::get('/', [PromotionController::class, 'index'])->name('index');
        Route::get('/index-data', [PromotionController::class, 'indexData'])->name('index_data');
        Route::get('/add', [PromotionController::class, 'create'])->name('add');
        Route::post('/store', [PromotionController::class, 'store'])->name('store');
        Route::get('/edit/{promotion_id}', [PromotionController::class, 'edit'])->name('edit');
        Route::post('/update/{promotion_id}', [PromotionController::class, 'update'])->name('update');
        Route::get('/delete/{promotion_id}', [PromotionController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/tour', 'as' => 'tour.'], function () {
        Route::get('/', [TourController::class, 'index'])->name('index');
        Route::get('/index-data', [TourController::class, 'indexData'])->name('index_data');
        Route::get('/add', [TourController::class, 'create'])->name('add');
        Route::post('/store', [TourController::class, 'store'])->name('store');
        Route::get('/edit/{tour_id}', [TourController::class, 'edit'])->name('edit');
        Route::post('/update/{tour_id}', [TourController::class, 'update'])->name('update');
        Route::get('/delete/{tour_id}', [TourController::class, 'destroy'])->name('delete');

        Route::group(['prefix' => '/plan', 'as' => 'plan.'], function () {
            Route::get('/{tour_id}', [TourPlanController::class, 'index'])->name('index');
            Route::get('/index-data/{tour_id}', [TourPlanController::class, 'indexData'])->name('index_data');
            // Route::get('/add/{tour_id}', [TourPlanController::class, 'create'])->name('add');
            Route::post('/store', [TourPlanController::class, 'store'])->name('store');
            // Route::get('/edit/{tour_id}', [TourPlanController::class, 'edit'])->name('edit');
            Route::post('/update/{plan_id}', [TourPlanController::class, 'update'])->name('update');
            Route::get('/delete/{plan_id}', [TourPlanController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => '/image', 'as' => 'image.'], function () {
            Route::post('/image/save', [TourImageController::class, 'store'])->name('store');
            Route::get('/delete/{image_id}', [TourImageController::class, 'destroy'])->name('delete');
        });
    });

    Route::group(['prefix' => '/article', 'as' => 'article.'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('/index-data', [ArticleController::class, 'indexData'])->name('index_data');
        Route::get('/add', [ArticleController::class, 'create'])->name('add');
        Route::post('/store', [ArticleController::class, 'store'])->name('store');
        Route::get('/edit/{article_id}', [ArticleController::class, 'edit'])->name('edit');
        Route::post('/update/{article_id}', [ArticleController::class, 'update'])->name('update');
        Route::get('/delete/{article_id}', [ArticleController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/slider', 'as' => 'slider.'], function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::get('/index-data', [SliderController::class, 'indexData'])->name('index_data');
        Route::get('/add', [SliderController::class, 'create'])->name('add');
        Route::post('/store', [SliderController::class, 'store'])->name('store');
        Route::get('/edit/{slider_id}', [SliderController::class, 'edit'])->name('edit');
        Route::post('/update/{slider_id}', [SliderController::class, 'update'])->name('update');
        Route::get('/delete/{slider_id}', [SliderController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => '/admin-manage', 'as' => 'manage.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        // Route::get('/add', [AdminController::class, 'create'])->name('add');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::get('/edit/{admin_id}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/update/{admin_id}', [AdminController::class, 'update'])->name('update');
        Route::get('/edit/{admin_id}/permission', [AdminController::class, 'editPermission'])->name('edit.permission');
        Route::post('/update/{admin_id}/permission', [AdminController::class, 'updatePermission'])->name('update.permission');
        // Route::get('/block/{admin_id}', [AdminController::class, 'block'])->name('block');
        // Route::get('/active/{admin_id}', [AdminController::class, 'active'])->name('active');
    });

    Route::group(['prefix' => '/user-manage', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/add', [UserController::class, 'create'])->name('add');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{user_id}', [UserController::class, 'update'])->name('update');
        // Route::get('/block/{admin_id}', [AdminController::class, 'block'])->name('block');
        // Route::get('/active/{admin_id}', [AdminController::class, 'active'])->name('active');
    });

    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::group(['prefix' => 'request', 'as' => 'request.'], function () {
            Route::get('/', [BookingController::class, 'request'])->name('index');
            Route::get('/detail/{booking_id}', [BookingController::class, 'requestDetail'])->name('detail');
            Route::post('/update/{booking_id}', [BookingController::class, 'updateRequest'])->name('update');
        });
        Route::get('/add', [BookingController::class, 'create'])->name('add');
        Route::post('/store-step-1', [BookingController::class, 'storeStep1'])->name('store1');
        Route::get('/store/hocks', [BookingController::class, 'hocks'])->name('hocks');
        Route::post('/store-step-2', [BookingController::class, 'storeStep2'])->name('store2');
        Route::get('/edit/{booking_id}', [BookingController::class, 'edit'])->name('edit');
        Route::post('/update/{booking_id}', [BookingController::class, 'update'])->name('update');
        // Route::get('/delete/{booking_id}', [BookingController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/show/{transaction_id}', [TransactionController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::post('/export-pdf', [ReportController::class, 'pdf'])->name('pdf');
    });

    Route::get('/account', [AdminController::class, 'editAccount']);
    Route::post('/account/update', [AdminController::class, 'updateAccount']);
    Route::get('/change-password', [AdminController::class, 'changePassword']);
    Route::post('/update-password', [AdminController::class, 'updatePassword']);
});

Route::get('/x', function () {
    $findUser = User::where('facebook_id', '45')->first();
    dd(isset($findUser));
});
