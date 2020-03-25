<?php

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

Auth::routes();

Route::namespace('Auth')->prefix('auth')->name('auth.')->group(function () {
    Route::post('/sign-up/validate', 'RegisterController@signupValidation')->name('sign-up.validate');
});

Route::namespace('User')->middleware('language')->group(function () {
    Route::get('/', 'PageController@index')->name('user.home');

    Route::get('restaurant/{id}/about', 'RestaurantController@about')->name('user.restaurant.about');

    Route::get('/reviews', 'RestaurantController@reviews')->name('user.restaurant.reviews');

    Route::get('/menu', 'RestaurantController@menu')->name('user.restaurant.menu');

    Route::resource('restaurant', 'RestaurantController');

    Route::get('/language/{locale}', 'PageController@locale')->name('user.locale');

    Route::get('/about-us', 'PageController@about')->name('user.about');

    Route::get('/blog', 'PageController@blog')->name('user.blog');

    Route::get('/careers', 'PageController@careers')->name('user.careers');

    Route::get('/press', 'PageController@press')->name('user.press');

    Route::get('/faq', 'PageController@faq')->name('user.faq');

    Route::get('/contact-us', 'PageController@contact')->name('user.contact');

    Route::post('/contact/post', 'PageController@postContact')->name('user.contact.post');

    Route::get('/why-eatoeat', 'PageController@why')->name('user.why');

    Route::get('/cancellations-and-refunds', 'PageController@cancellations')->name('user.cancellations');

    Route::get('/terms-and-conditions', 'PageController@terms')->name('user.terms');

    Route::get('/privacy-policy', 'PageController@privacy')->name('user.privacy');

    Route::get('/search', 'PageController@search')->name('user.search');

    Route::get('/landing', 'PageController@landing')->name('admin.landing');

    Route::resource('cuisine', 'CuisineController');

    Route::resource('cart', 'CartController');

    Route::post('/location', 'UserController@location')->name('user.location');

    Route::post('/restaurant/validate-order', 'RestaurantController@validateOrder')->name('user.restaurant.validate-order');

    Route::post('/restaurant/validate-takeaway-order', 'RestaurantController@validateTakeawayOrder')->name('user.restaurant.validate-takeaway-order');

    Route::get('contact-thank-you', 'PageController@contactThankYou')->name('contact.thank.you');

    Route::get('reservation-thank-you', 'PageController@reservationThankYou')->name('reservation.thank.you');

    Route::get('user/guest', 'UserController@guest')->name('user.guest');
});

Route::get('master-admin/landing', 'MasterAdmin\PageController@landing')->name('master-admin.landing');

Route::namespace('User')->middleware(['auth', 'user', 'language', 'guest_filter'])->group(function () {
    Route::post('/user/favourite', 'UserController@favourite')->name('user.favourite');

    Route::post('/user/favourite-menu-item', 'UserController@favouriteMenuItem')->name('user.favourite-menu-item');

//    Route::get('/user/favourites', 'UserController@favourites')->name('user.favourites');

    Route::get('/user/favourites', 'UserController@menuItemFavourites')->name('user.favourites');

    Route::get('/user/deliveries', 'UserController@deliveries')->name('user.deliveries');

    Route::get('/user/takeaways', 'UserController@takeaways')->name('user.takeaways');

    Route::get('/user/reservations', 'UserController@reservations')->name('user.reservations');

    Route::get('/user/profile', 'UserController@profile')->name('user.profile');

    Route::post('/user/profile/post', 'UserController@profilePost')->name('user.profile.post');

    Route::get('/user/password', 'UserController@password')->name('user.password');

    Route::post('/user/password/post', 'UserController@passwordPost')->name('user.password.post');

    Route::get('/user/dining', 'UserController@dining')->name('user.dining');

    Route::post('/user/dining/post', 'UserController@diningPost')->name('user.dining.post');

    Route::get('/user/communication', 'UserController@communication')->name('user.communication');

    Route::post('/user/communication/post', 'UserController@communicationPost')->name('user.communication.post');

    Route::get('/user/payment', 'UserController@payment')->name('user.payment');

    Route::post('/user/payment/post', 'UserController@paymentPost')->name('user.payment.post');
});
Route::namespace('User')->middleware(['auth', 'user', 'language'])->group(function () {
    Route::get('/user/address', 'UserController@address')->name('user.address');

    Route::resource('user', 'UserController');

    Route::get('delivery/confirm', 'DeliveryController@confirm')->name('delivery.confirm');

    Route::get('delivery/paypal-success', 'DeliveryController@paypalSuccess')->name('user.delivery.paypal-success');

    Route::get('delivery/paypal-fail', 'DeliveryController@paypalFail')->name('user.delivery.paypal-fail');

    Route::post('delivery/validate', 'DeliveryController@validateDelivery')->name('delivery.validate');

    Route::post('delivery/email', 'DeliveryController@email')->name('delivery.email');

    Route::resource('delivery', 'DeliveryController');

    Route::get('takeaway/confirm', 'TakeawayController@confirm')->name('takeaway.confirm');

    Route::get('takeaway/paypal-success', 'TakeawayController@paypalSuccess')->name('user.takeaway.paypal-success');

    Route::get('takeaway/paypal-fail', 'TakeawayController@paypalFail')->name('user.takeaway.paypal-fail');

    Route::post('takeaway/validate', 'TakeawayController@validateTakeaway')->name('takeaway.validate');

    Route::post('takeaway/email', 'TakeawayController@email')->name('takeaway.email');

    Route::resource('takeaway', 'TakeawayController');

    Route::post('reservation/email', 'ReservationController@email')->name('reservation.email');

    Route::resource('reservation', 'ReservationController');

    Route::post('address/update-all', 'AddressController@updateAddress')->name('address.update.all');

    Route::resource('address', 'AddressController');

    Route::resource('review', 'ReviewController')->only(['store']);

    Route::post('/ticket/user/message', 'TicketController@userMessage')->name('ticket.user.message');

    Route::resource('ticket', 'TicketController');

    Route::post('promotion/validate', 'PromotionController@validatePromocode')->name('promotion.validate');

    Route::resource('promotion', 'PromotionController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'language'])->group(function () {
    Route::post('delivery/get', 'DeliveryController@getDeliveries')->name('delivery.get');

    Route::resource('delivery', 'DeliveryController');

    Route::post('takeaway/get', 'TakeawayController@getTakeaways')->name('takeaway.get');

    Route::resource('takeaway', 'TakeawayController');

    Route::post('reservation/get', 'ReservationController@getReservations')->name('reservation.get');

    Route::resource('reservation', 'ReservationController');

    Route::post('menu/get', 'MenuController@getMenus')->name('menus.get');

    Route::post('cuisines/get', 'MenuController@getCuisines')->name('cuisines.get');

    Route::post('menu/get/items', 'MenuController@getMenu')->name('menu.get');

    Route::resource('menu', 'MenuController');

    Route::post('menu/delete', 'MenuController@delete')->name('menu.delete');

    Route::post('menu-item/force-delete', 'MenuItemController@forceDelete')->name('menu-item.force-delete');

    Route::resource('menu-item', 'MenuItemController');

    Route::resource('review', 'ReviewController');

    Route::post('/ticket/restaurant/message', 'TicketController@restaurantMessage')->name('ticket.restaurant.message');

    Route::resource('ticket', 'TicketController');

    Route::get('/restaurant/own', 'RestaurantController@own')->name('restaurant.own');

    Route::post('/restaurant/online', 'RestaurantController@postOnline')->name('restaurant.online');

    Route::get('/restaurant/online', 'RestaurantController@getOnline')->name('restaurant.online');

    Route::post('/restaurant/slider/remove', 'RestaurantController@removeSlider')->name('restaurant.slider.remove');

    Route::middleware(['own'])->resource('restaurant', 'RestaurantController');

    Route::resource('delivery-location', 'DeliveryLocationController');

    Route::resource('takeaway-location', 'TakeawayLocationController');

    Route::resource('promotion', 'PromotionController');

    Route::get('report/data/bar', 'ReportController@dataBar')->name('report.data.bar');

    Route::get('report/data', 'ReportController@data')->name('report.data');

    Route::get('report/total', 'ReportController@total')->name('report.total');

    Route::resource('report', 'ReportController');

    Route::resource('customer', 'CustomerController');

    Route::get('global-settings', 'SiteSettingController@index');
    Route::post('global-settings/store', 'SiteSettingController@store');

});

Route::namespace('MasterAdmin')->prefix('master-admin')->name('master-admin.')->middleware(['auth', 'master-admin', 'language'])->group(function () {
    Route::get('restaurant/request', 'RestaurantController@request')->name('restaurant.request');

    Route::post('restaurant/get-request', 'RestaurantController@getRequests')->name('restaurant.request.get');

    Route::post('restaurant/get', 'RestaurantController@get')->name('restaurant.get');

    Route::post('restaurant/deactive', 'RestaurantController@deactive')->name('restaurant.deactive');

    Route::resource('restaurant', 'RestaurantController');

    Route::post('menu/get', 'MenuController@getMenus')->name('menus.get');

    Route::post('menu/get/items', 'MenuController@getMenu')->name('menu.get');

    Route::resource('menu', 'MenuController');

    Route::resource('menu-item', 'MenuItemController');

    Route::post('menu-clone/approve', 'MenuCloneController@approve')->name('menu-clone.approve');

    Route::post('menu-clone/get/items', 'MenuCloneController@getMenu')->name('menu-clone.get');

    Route::resource('menu-clone', 'MenuCloneController');

    Route::post('menu-item-clone/approve', 'MenuItemCloneController@approve')->name('menu-item-clone.approve');

    Route::resource('menu-item-clone', 'MenuItemCloneController');

    Route::resource('delivery-location', 'DeliveryLocationController');

    Route::resource('takeaway-location', 'TakeawayLocationController');

    Route::resource('promotion', 'PromotionController');

    Route::resource('cuisine', 'CuisineController');

    Route::post('user/get', 'UserController@getUsers')->name('user.get');

    Route::post('user/restore', 'UserController@restore')->name('user.restore');

    Route::resource('user', 'UserController');

    Route::post('subscription/get', 'SubscriptionController@getSubscriptions')->name('subscription.get');

    Route::resource('subscription', 'SubscriptionController');

    Route::resource('site-promotion', 'SitePromotionController');

    Route::resource('setting', 'SettingController');

    Route::post('admin-user/get', 'AdminUserController@getUsers')->name('admin-user.get');

    Route::post('admin-user/restore', 'AdminUserController@restore')->name('admin-user.restore');

    Route::get('admin-user/profile', 'AdminUserController@profile')->name('admin-user.profile');

    Route::post('admin-user/profile/post', 'AdminUserController@profilePost')->name('admin-user.profile.post');

    Route::resource('admin-user', 'AdminUserController');

    Route::post('request/get', 'RequestController@getRequests')->name('request.get');

    Route::post('request/restaurant/update', 'RequestController@restaurantUpdate')->name('request.restaurant.update');

    Route::get('request/restaurant/{restaurant_id}', 'RequestController@restaurant')->name('request.restaurant');

    Route::post('request/delivery/update', 'RequestController@deliveryUpdate')->name('request.delivery.update');

    Route::get('request/delivery/{restaurant_id}', 'RequestController@delivery')->name('request.delivery');

    Route::post('request/takeaway/update', 'RequestController@takeawayUpdate')->name('request.takeaway.update');

    Route::get('request/takeaway/{restaurant_id}', 'RequestController@takeaway')->name('request.takeaway');

    Route::post('request/promotion/update', 'RequestController@promotionUpdate')->name('request.promotion.update');

    Route::get('request/promotion/{restaurant_id}', 'RequestController@promotion')->name('request.promotion');

    Route::get('request/menu/{restaurant_id}', 'RequestController@menu')->name('request.menu');

    Route::get('request/menu-item/{restaurant_id}', 'RequestController@menuItems')->name('request.menu-item');

    Route::resource('request', 'RequestController');

    Route::get('report/sales', 'ReportController@sales')->name('report.sales');

    Route::get('report/sales/data', 'ReportController@salesData')->name('report.sales.data');

    Route::get('report/sales/bar', 'ReportController@salesBar')->name('report.sales.bar');

    Route::get('report/revenue', 'ReportController@revenue')->name('report.revenue');

    Route::get('report/revenue/data', 'ReportController@revenueData')->name('report.revenue.data');

    Route::get('report/subscription', 'ReportController@subscription')->name('report.subscription');

    Route::get('report/subscription/data', 'ReportController@subscriptionData')->name('report.subscription.data');

    Route::resource('payment-method', 'PaymentMethodController');

    Route::resource('order', 'OrderController');

    Route::post('order/get', 'OrderController@get')->name('order.get');

    Route::resource('review', 'ReviewController');

    Route::post('review/get', 'ReviewController@getReviews')->name('review.get');

    Route::post('review/set', 'ReviewController@setStatus')->name('review.set');

    //Route::get('global-settings', 'SiteSettingController@index');
    //Route::post('global-settings/store', 'SiteSettingController@store');
    Route::get('theme-settings', 'SiteSettingController@general')->name('settings.general');

    Route::get('mail-settings', 'SiteSettingController@mail')->name('settings.mail');

    Route::get('api-settings', 'SiteSettingController@api')->name('settings.services-api');

    Route::get('app-settings', 'SiteSettingController@app')->name('settings.app-settings');

    Route::get('page-settings/home', 'SiteSettingController@getHomePage')->name('page.home');

    Route::get('page-settings/menu', 'SiteSettingController@getMenuPage')->name('page.menu');

    Route::get('page-settings/about', 'SiteSettingController@getAboutPage')->name('page.about');

    Route::get('page-settings/contact', 'SiteSettingController@getContactPage')->name('page.contact');

    Route::get('page-settings/terms', 'SiteSettingController@getTermsPage')->name('page.terms');

    Route::get('page-settings/privacy', 'SiteSettingController@getPrivacyPage')->name('page.privacy');

    Route::get('page-settings/faq', 'SiteSettingController@getFaqPage')->name('page.faq');

    Route::get('page-settings/review', 'SiteSettingController@getReviewPage')->name('page.review');

    Route::post('page-settings/store', 'SiteSettingController@postPageData');

    Route::post('restaurant/slider/remove', 'RestaurantController@removeSlider')->name('restaurant.slider.remove');

    Route::get('attributes-settings', 'SiteSettingController@getManageAttributesPage')->name('attributes');
});

Route::get('image-validation', function () {
    $menu_items = \App\MenuItem::orderBy('name', 'asc')->get();

    foreach ($menu_items as $menu_item) {
        $menu_item->status = false;
    }

    return view('image-validation', ['menu_items' => $menu_items]);
});
/*
Route::get('emailtemplate', function () {
    return view('user.email.delivery');
});
Route::prefix('email-template')->name('email-template.')->group(function () {

    Route::get('/list', function () {
        return view('email-template.list');
    });

    Route::get('/user-registration', function () {
        return view('email-template.user-registration');
    })->name('user-registration');
    Route::get('/delivery-confirmed', function () {
        return view('email-template.delivery-confirmed');
    })->name('delivery-confirmed');
    Route::get('/delivery-declined', function () {
        return view('email-template.delivery-declined');
    })->name('delivery-declined');
    Route::get('/delivery-dispatched', function () {
        return view('email-template.delivery-dispatched');
    })->name('delivery-dispatched');
    Route::get('/delivery-delivered', function () {
        return view('email-template.delivery-delivered');
    })->name('delivery-delivered');
    Route::get('/takeaway-confirmed', function () {
        return view('email-template.takeaway-confirmed');
    })->name('takeaway-confirmed');
    Route::get('/takeaway-declined', function () {
        return view('email-template.takeaway-declined');
    })->name('takeaway-declined');
    Route::get('/takeaway-ready', function () {
        return view('email-template.takeaway-ready');
    })->name('takeaway-ready');
    Route::get('/reservation-confirmed', function () {
        return view('email-template.reservation-confirmed');
    })->name('reservation-confirmed');
    Route::get('/reservation-declined', function () {
        return view('email-template.reservation-declined');
    })->name('reservation-declined');
    Route::get('/reset-password', function () {
        return view('email-template.reset-password');
    })->name('reset-password');
    Route::get('/reset-password-confirmed', function () {
        return view('email-template.reset-password-confirmed');
    })->name('reset-password-confirmed');
});*/
