<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});


Route::post('/mobile/login','IndexController@appLogin');

Route::post('/mobile/update','IndexController@appUpdateProfile');

Route::get('/add/{padre}/{hijo}','IndexController@addTeam');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['auth', 'admin'] ], function () {

	Route::get('/', 'IndexController@index');



	Route::post('login', 'IndexController@postLogin');

	Route::get('logout', 'IndexController@logout');

  Route::post('email', 'SenalesController@sendsignal');

  Route::get('multilevel/download/commissions','MultiLevelController@downloadCommissions');

  Route::get('pay', 'MultiLevelController@pay');

  Route::get('multilevel/manuales','MultiLevelController@transaccionesManuales');


	Route::get('dashboard', 'DashboardController@index');

	Route::get('profile', 'AdminController@profile');

	Route::post('profile', 'AdminController@updateProfile');

	Route::post('profile_pass', 'AdminController@updatePassword');

	Route::get('settings', 'SettingsController@settings');

	Route::post('settings', 'SettingsController@settingsUpdates');

	Route::post('social_links', 'SettingsController@social_links_update');

	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');

	Route::post('about_us', 'SettingsController@about_us_page');

	Route::post('careers_with_us', 'SettingsController@careers_with_us_page');

	Route::post('terms_conditions', 'SettingsController@terms_conditions_page');

	Route::post('privacy_policy', 'SettingsController@privacy_policy_page');

	Route::post('headfootupdate', 'SettingsController@headfootupdate');

	Route::get('slider', 'SliderController@sliderlist');

	Route::get('slider/addslide', 'SliderController@addeditSlide');

	Route::post('slider/addslide', 'SliderController@addnew');

	Route::get('slider/addslide/{id}', 'SliderController@editSlide');

	Route::get('slider/delete/{id}', 'SliderController@delete');


	Route::get('testimonials', 'TestimonialsController@testimonialslist');

	Route::get('testimonials/addtestimonial', 'TestimonialsController@addeditestimonials');

	Route::post('testimonials/addtestimonial', 'TestimonialsController@addnew');

	Route::get('testimonials/addtestimonial/{id}', 'TestimonialsController@edittestimonial');

	Route::get('testimonials/delete/{id}', 'TestimonialsController@delete');


	Route::get('properties', 'PropertiesController@propertieslist');

	Route::get('properties/addproperty', 'PropertiesController@addeditproperty');

	Route::post('properties/addproperty', 'PropertiesController@addnew');

	Route::get('properties/addproperty/{id}', 'PropertiesController@editproperty');

	Route::get('properties/status/{id}', 'PropertiesController@status');

	Route::get('properties/featuredproperty/{id}', 'PropertiesController@featuredproperty');

	Route::get('properties/delete/{id}', 'PropertiesController@delete');


	Route::get('featuredproperties', 'FeaturedPropertiesController@propertieslist');


	Route::get('users', 'UsersController@userslist');

	Route::get('users/adduser', 'UsersController@addeditUser');

	Route::post('users/adduser', 'UsersController@addnew');

	Route::get('users/adduser/{id}', 'UsersController@editUser');

    Route::get('master-accounts', 'MasterAccountsController@index');
    Route::get('master-accounts/add/', 'MasterAccountsController@addView');
    Route::post('master-accounts/add/', 'MasterAccountsController@create');

    Route::post('master-accounts/edit/', 'MasterAccountsController@edit');

    Route::get('master-accounts/edit/{id}', 'MasterAccountsController@editView');
    Route::get('master-accounts/delete/{id}', 'MasterAccountsController@delete');

    Route::get('soft-trainings', 'SoftTrainingsController@index');
    Route::get('soft-trainings/add/', 'SoftTrainingsController@addView');
    Route::post('soft-trainings/add/', 'SoftTrainingsController@add');
    Route::get('soft-trainings/edit/{id}','SoftTrainingsController@edit');
    Route::get('soft-trainings/{id}','SoftTrainingsController@content');
    Route::get('soft-trainings/content/add/{id}','SoftTrainingsController@addcontent');
    Route::post('soft-trainings/content/add/{id}','SoftTrainingsController@storecontent');
    Route::get('soft-trainings/content/edit/{id}','SoftTrainingsController@editcontent');
    Route::get('soft-trainings/content/delete/{id}','SoftTrainingsController@contentdelete');
    Route::get('soft-trainings/delete/{id}','SoftTrainingsController@delete');



  Route::get('users/change-agc-status/{id}', 'UsersController@changeAgcStatus');
  Route::get('users/change-autotrading-status/{id}', 'UsersController@changeAutotradingStatus');

	Route::get('users/addcsv', 'UsersController@viewcsv');
	Route::post('users/addcsv', 'UsersController@addcsv');
  Route::get('transacciones', 'UsersController@transacciones');
  Route::get('transacciones/delete/{id}', 'UsersController@deletetransaccion');



	Route::get('users/delete/{id}', 'UsersController@delete');



	Route::get('cities', 'CityController@citylist');

	Route::get('cities/addcity', 'CityController@addeditcity');

	Route::post('cities/addcity', 'CityController@addnew');

	Route::get('cities/addcity/{id}', 'CityController@editcity');

	Route::get('cities/delete/{id}', 'CityController@delete');

	Route::get('cities/status/{id}', 'CityController@status');



	Route::get('subscriber', 'SubscriberController@subscriberlist');

	Route::get('subscriber/delete/{id}', 'SubscriberController@delete');


	Route::get('partners', 'PartnersController@partnerslist');

	Route::get('partners/addpartners', 'PartnersController@addpartners');

	Route::post('partners/addpartners', 'PartnersController@addnew');

	Route::get('partners/addpartners/{id}', 'PartnersController@editpartners');

	Route::get('partners/delete/{id}', 'PartnersController@delete');

	Route::get('inquiries', 'InquiriesController@inquirieslist');

	Route::get('inquiries/delete/{id}', 'InquiriesController@delete');


  	Route::get('training', 'TrainingController@index');
    Route::get('training/streaming/{id}','TrainingController@streaming');
    Route::get('training/add/','TrainingController@add');
    Route::post('training/add/','TrainingController@store');
    Route::get('training/edit/{id}','TrainingController@edit');
    Route::get('training/{id}','TrainingController@content');
    Route::get('training/content/add/{id}','TrainingController@addcontent');
    Route::post('training/content/add/{id}','TrainingController@storecontent');
    Route::get('training/content/edit/{id}','TrainingController@editcontent');
    Route::get('training/content/delete/{id}','TrainingController@contentdelete');
    Route::get('training/delete/{id}','TrainingController@delete');
    Route::get('training/live/enable/{id}','TrainingController@enableLive');
    Route::get('training/live/disable/{id}','TrainingController@disableLive');


    Route::get('subscriptions','SubscriptionController@index');
    Route::get('subscription/add/','SubscriptionController@add');
    Route::post('subscription/add/','SubscriptionController@store');
    Route::get('subscription/edit/{id}','SubscriptionController@edit');
    Route::post('subscription/update/{id}','SubscriptionController@update');

    Route::get('estrategias/','EstrategiasController@index');
    Route::get('estrategias/add/','EstrategiasController@add');
    Route::post('estrategias/add/','EstrategiasController@store');
    Route::get('estrategias/edit/{id}','EstrategiasController@edit');
    Route::get('estrategias/{id}','EstrategiasController@content');
    Route::get('estrategias/content/add/{id}','EstrategiasController@addcontent');
    Route::post('estrategias/content/add/{id}','EstrategiasController@storecontent');
    Route::get('estrategias/content/edit/{id}','EstrategiasController@editcontent');


    Route::get('senales','SeñalesController@index');
    Route::get('senales/add/','SeñalesController@add');
    Route::post('senales/add/','SeñalesController@store');
    Route::get('senales/edit/{id}','SeñalesController@edit');
    Route::get('senales/{id}','SeñalesController@content');

    Route::get('rooms','RoomsController@index');
    Route::get('rooms/add/','RoomsController@add');
    Route::post('rooms/add/','RoomsController@store');
    Route::get('rooms/edit/{id}','RoomsController@edit');
    Route::get('rooms/delete/{id}','RoomsController@delete');
    Route::get('rooms/status/{id}','RoomsController@status');


    Route::get('analisis','AnalisisController@index');
    Route::get('analisis/add','AnalisisController@add');
    Route::post('analisis/add/','AnalisisController@store');
    Route::get('analisis/edit/{id}','AnalisisController@edit');
    Route::get('analisis/delete/{id}','AnalisisController@delete');

    Route::get('tutorials','TutorialsController@index');
    Route::get('tutorials/add','TutorialsController@add');
    Route::post('tutorials/add/','TutorialsController@store');
    Route::get('tutorials/edit/{id}','TutorialsController@edit');
    Route::get('tutorials/delete/{id}','TutorialsController@delete');


    Route::get('podcast','PodcastController@index');
    Route::get('podcast/add','PodcastController@add');
    Route::post('podcast/add/','PodcastController@store');
    Route::get('podcast/edit/{id}','PodcastController@edit');
    Route::get('podcast/delete/{id}','PodcastController@delete');


    Route::get('multinivel','MultiLevelController@index');
    Route::get('multinivel/delete/{id}','MultiLevelController@deleteUser');
    Route::get('multinivel/add','MultiLevelController@add');
    Route::post('multinivel/add','MultiLevelController@store');
    Route::get('multinivel/nivel','MultiLevelController@nivel');
    Route::get('multinivel/comisiones','MultiLevelController@commissions');

    Route::get('multinivel/nivel/add','MultiLevelController@addNivel');
    Route::post('multinivel/nivel/add','MultiLevelController@storeNivel');

    Route::get('multinivel/nivel/edit/{id}','MultiLevelController@editNivel');
    Route::post('multinivel/nivel/edit/{id}','MultiLevelController@updateNivel');
    Route::get('multinivel/nivel/delete/{id}','MultiLevelController@delete');


    Route::get('multinivel/team/{id}','MultiLevelController@team');

    Route::get('multinivel/checklevel','MultiLevelController@calcularNiveles');
    Route::get('multinivel/checklevel','MultiLevelController@calcularNiveles');
    Route::get('multinivel/checktransactions','MultiLevelController@checkTransactionsBTC');
    Route::get('multinivel/sinpago','MultiLevelController@deleteNoPagos');
    Route::get('multinivel/reestructurar/{id}','MultiLevelController@reestructurar');
    Route::post('multinivel/reestructurar/{id}','MultiLevelController@reestructurando');



    /*
  	Route::get('bricks/addbricks', 'BricksController@addeditbricks');
		Route::post('bricks/addproduct', 'BricksController@addproduct');
		Route::post('bricks/editar', 'BricksController@addproduct');
		Route::get('bricks/edit/{id}', 'BricksController@edit');
		Route::get('bricks/delete/{id}', 'BricksController@delete');
*/



    Route::get('conversations','ConversationController@index');
    Route::get('conversations/add','ConversationController@add');
    Route::post('conversations/add','ConversationController@store');
    Route::get('conversations/edit/{id}','ConversationController@edit');
    Route::get('conversations/delete/{id}','ConversationController@delete');
    Route::get('conversations/inscribed/{id}','ConversationController@inscribed');

		Route::get('blog','BlogController@index');
		Route::get('blog/addblogs','BlogController@create');
		Route::get('blog/edit/{id}','BlogController@edit');
		Route::post('blog/addblogs','BlogController@store');


	Route::get('types', 'TypesController@typeslist');

	Route::get('types/addtypes', 'TypesController@addedittypes');

	Route::get('types/addtypes', 'TypesController@addedittypes');

	Route::post('types/addtypes', 'TypesController@addnew');

	Route::get('types/addtypes/{id}', 'TypesController@edittypes');

	Route::get('types/delete/{id}', 'TypesController@delete');

});


Route::get('app/profile','App\IndexController@profile');
Route::get('app/buy/{id}','App\IndexController@buy');
Route::post('app/profile','Admin\AdminController@updateProfile');
Route::get('app/logout', 'App\IndexController@logout');
Route::post('app/profile_pass', 'Admin\AdminController@updatePassword');


Route::group(['namespace' => 'App', 'prefix' => 'app','middleware' =>  ['auth', 'agc'] ], function () {

	Route::get('/', 'IndexController@index');
  Route::get('dashboard','IndexController@dashboard');
  Route::get('entrenamiento','TrainingController@index');
  Route::get('entrenamiento/{id}','TrainingController@entrenamiento');
  Route::get('entrenamiento/ver/{id}','TrainingController@ver');

  Route::get('estrategias','EstrategiasController@index');
  Route::get('estrategias/{id}','EstrategiasController@estrategia');
  Route::get('estrategias/ver/{id}','EstrategiasController@ver');

   Route::get('rooms','RoomsController@index');
   Route::get('rooms/{id}','RoomsController@content');

  Route::get('senales','SenalesController@index');

  Route::get('softskills','SoftSkillsController@index');
  Route::get('softskills/{id}','SoftSkillsController@softskill');
  Route::get('softskills/ver/{id}','SoftSkillsController@ver');

  Route::get('tutorials','TutorialsController@index');
  Route::get('tutorials/ver/{id}','TutorialsController@see');

  Route::get('analisis','AnalisisController@index');
  Route::get('analisis/ver/{id}','AnalisisController@see');


  Route::get('conversatorios','ConversatoriosController@index');

  Route::get('podcast','PodcastController@index');

  //team
  Route::get('team','TeamController@index');

  //comissions
  Route::get('commissions','CommissionsController@index');

  //autotrading
  Route::get('autotrading','AutotradingController@index');

  Route::get('autotrading','AutotradingController@index');
  Route::get('autotrading/subscribe/{mt4_login}','AutotradingController@subscribe');
  Route::get('autotrading/unsubscribe','AutotradingController@unsubscribe');

  Route::get('autotrading/settings','AutotradingController@settings');
  Route::post('autotrading/configuration','AutotradingController@configuration');
  Route::get('change-autotrading-status','AutotradingController@changeAutotradingStatus');

  Route::get('autotrading/account','AutotradingController@account');
  Route::post('autotrading/account','AutotradingController@updateAcount');







  /*Route::get('estrategias/{id}','EstrategiasController@estrategia');
  Route::get('estrategias/ver/{id}','EstrategiasController@ver');*/

});




Route::get('/', 'IndexController@index');

Route::get('about-us', 'IndexController@aboutus_page');
Route::get('verificar','IndexController@verificar');

Route::get('credits', 'IndexController@careers_with_page');

Route::get('memberships', 'IndexController@memberships');

Route::post('buy','StoreController@buy');

Route::get('courses', 'IndexController@courses');
Route::get('course/{id}', 'IndexController@course');
Route::get('strategies', 'IndexController@strategies');
Route::get('strategie/{id}', 'IndexController@strategie');
Route::get('alerts', 'IndexController@alerts');


Route::get('blogs', 'IndexController@blog');
Route::get('blog/{id}', 'IndexController@article');

Route::get('conversations','IndexController@conversations');
Route::get('conversation/{id}','IndexController@conversation');
Route::get('conversation-suscribe/{id}','IndexController@conversationsuscribe');
Route::get('conversation-cancel/{id}','IndexController@conversationsuscribecancel');



Route::get('profile', 'IndexController@profile');

Route::get('transactions', 'IndexController@transactions');


Route::get('careers-with-us', 'IndexController@careers_with_page');

Route::get('terms-conditions', 'IndexController@terms_conditions_page');

Route::get('privacy-policy', 'IndexController@privacy_policy_page');

Route::get('contact-us', 'IndexController@contact_us_page');

Route::get('contact-artis', 'IndexController@contact_artis_page');

Route::post('contact-us', 'IndexController@contact_us_sendemail');


Route::get('/', 'IndexController@index');

Route::post('subscribe', 'IndexController@subscribe');

Route::get('agents', 'AgentsController@index');

Route::get('builders', 'AgentsController@builder_list');

Route::get('properties', 'PropertiesController@index');

Route::get('store', 'StoreController@view_all');
Route::get('store/{id}', 'StoreController@view_one');
Route::get('store/buy/{id}', 'StoreController@buy');
//Route::get('verificar/', 'StoreController@verificar');
Route::get('api', 'StoreController@EstadoTransacciones');

Route::get('sale', 'PropertiesController@saleproperties');

Route::get('rent', 'PropertiesController@rentproperties');

Route::get('properties/{slug}', 'PropertiesController@propertysingle');

Route::get('type/{slug}', 'PropertiesController@propertiesbytype');

Route::post('agentscontact', 'PropertiesController@agentscontact');

Route::post('searchproperties', 'PropertiesController@searchproperties');

Route::post('search', 'PropertiesController@searchkeywordproperties');


Route::get('login-artis', 'IndexController@login_artis');

Route::get('login', 'IndexController@login');
Route::post('login', 'IndexController@postLogin');

Route::get('register', 'IndexController@register');
Route::post('register', 'IndexController@postRegister');

Route::get('logout', 'IndexController@logout');

// Password reset link request routes...
Route::get('admin/password/email', 'Auth\PasswordController@getEmail');

Route::get('admin/password/reset/2cY0Xj8wsRMIGGqPTF95ukvJqnVCuQuJQjc9u6PA', 'Auth\PasswordController@getEmailMail');

Route::get('home', 'Auth\PasswordController@getEmailMail');

Route::post('admin/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('admin/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('admin/password/reset', 'Auth\PasswordController@postReset');

Route::get('auth/confirm/{code}', 'IndexController@confirm');

//Route::post('users/login', 'Auth\AuthController@postLogin');
