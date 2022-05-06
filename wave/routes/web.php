<?php

Route::impersonate();

// landing page routes
Route::get('/', '\Wave\Http\Controllers\HomeController@index')->name('wave.landing-home');
Route::get('/landing-blog', '\Wave\Http\Controllers\HomeController@landingBlog')->name('wave.landing-blog');
Route::get('/landing-blog-detail', '\Wave\Http\Controllers\HomeController@landingBlogDetail')->name('wave.landing-blog-detail');
Route::get('/landing-privacy-policy', '\Wave\Http\Controllers\HomeController@landingPrivacyPolicy')->name('wave.landing-privacy-policy');
Route::get('/landing-terms-of-services', '\Wave\Http\Controllers\HomeController@landingTermsOfServices')->name('wave.landing-terms-of-services');




//Route::get('@{username}', '\Wave\Http\Controllers\ProfileController@index')->name('wave.profile');

// Documentation routes
Route::view('docs/{page?}', 'docs::index')->where('page', '(.*)');

// Additional Auth Routes
Route::get('logout', 'Auth\LoginController@logout')->name('wave.logout');
Route::get('user/verify/{verification_code}', 'Auth\RegisterController@verify')->name('verify');
Route::post('register/complete', '\Wave\Http\Controllers\Auth\RegisterController@complete')->name('wave.register-complete');

Route::get('blog', '\Wave\Http\Controllers\BlogController@index')->name('wave.blog');
Route::get('blog/{category}', '\Wave\Http\Controllers\BlogController@category')->name('wave.blog.category');
Route::get('blog/{category}/{post}', '\Wave\Http\Controllers\BlogController@post')->name('wave.blog.post');


/***** Pages *****/
Route::get('p/{page}', '\Wave\Http\Controllers\PageController@page');

/***** Pricing Page *****/
Route::view('pricing', 'theme::pricing')->name('wave.pricing');

/***** Billing Routes *****/
Route::post('/billing/webhook', '\Wave\Http\Controllers\WebhookController@handleWebhook');
Route::post('paddle/webhook', '\Wave\Http\Controllers\SubscriptionController@hook');
Route::post('checkout', '\Wave\Http\Controllers\SubscriptionController@checkout')->name('checkout');

Route::get('test', '\Wave\Http\Controllers\SubscriptionController@test');

Route::group(['middleware' => 'wave'], function () {
  Route::get('dashboard', '\Wave\Http\Controllers\DashboardController@index')->name('wave.dashboard');
});

Route::group(['middleware' => 'auth'], function () {
  /* Route::group(['middleware' => ['roles'], 'roles' => ['basic', 'prime', 'admin']], function () { */
  Route::get('settings/{section?}', '\Wave\Http\Controllers\SettingsController@index')->name('wave.settings');
  /* Route::post('settings/profile', '\Wave\Http\Controllers\SettingsController@profilePut')->name('wave.settings.profile.put'); */
  Route::post('settings/profile', '\Wave\Http\Controllers\SettingsController@profileUpdate')->name('wave.settings.profile_update.post');
  Route::post('settings/invoiceaddress', '\Wave\Http\Controllers\SettingsController@invoiceUpdate')->name('wave.settings.invoiceaddress.post');
  /* Route::post('settings/profile', '\Wave\Http\Controllers\SettingsController@profilePut')->name('wave.settings.profile.put'); */
  Route::put('settings/security', '\Wave\Http\Controllers\SettingsController@securityPut')->name('wave.settings.security.put');
  Route::get('settings/invoices/{invoice}', '\Wave\Http\Controllers\SettingsController@invoice')->name('wave.invoice');
  Route::get('notifications', '\Wave\Http\Controllers\NotificationController@index')->name('wave.notifications');
  Route::get('announcements', '\Wave\Http\Controllers\AnnouncementController@index')->name('wave.announcements');
  Route::get('announcement/{id}', '\Wave\Http\Controllers\AnnouncementController@announcement')->name('wave.announcement');
  Route::post('announcements/read', '\Wave\Http\Controllers\AnnouncementController@read')->name('wave.announcements.read');
  Route::get('notifications', '\Wave\Http\Controllers\NotificationController@index')->name('wave.notifications');
  Route::post('notification/read/{id}', '\Wave\Http\Controllers\NotificationController@delete')->name('wave.notification.read');
  Route::post('cancel', '\Wave\Http\Controllers\SubscriptionController@cancel')->name('wave.cancel');
  Route::view('checkout/welcome', 'theme::welcome');

  Route::post('subscribe', '\Wave\Http\Controllers\SubscriptionController@subscribe')->name('wave.subscribe');
  Route::view('trial_over', 'theme::trial_over')->name('wave.trial_over');
  Route::view('cancelled', 'theme::cancelled')->name('wave.cancelled');
  Route::post('switch-plans', '\Wave\Http\Controllers\SubscriptionController@switchPlans')->name('wave.switch-plans');
  /* }); */
});









/********** Checkout/Billing Routes ***********/

Route::group(['middleware' => 'admin.user'], function () {
  Route::view('admin/do', 'wave::do');
});
