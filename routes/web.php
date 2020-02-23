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
//blog routes writeforus
Route::get('/', 'PagesController@index')->name('blogindex');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/writeforus', 'PagesController@about')->name('writeforus');
Route::get('/contact', 'PagesController@contact')->name('contact');

//admin routes will be prefixed with admin and folowed by their section
Route::prefix('admin')->middleware('blockedUsers')->group(function(){
    // categories prefixed
    Route::prefix('categories')->group(function(){
        Route::get('/', 'CategoriesController@index')->name('adCatIndex');
        Route::get('/create', 'CategoriesController@create')->name('adCreateCat');
        Route::post('/create', 'CategoriesController@store')->name('adStoreCat');
        Route::get('/detail/{id}-{title}', 'CategoriesController@view')->name('addetailCat');
        Route::get('/edit/{id}-{title}', 'CategoriesController@edit')->name('adEditCat');
        Route::patch('/edit/{id}-{title}', 'CategoriesController@update')->name('adUpdateCat');
        Route::delete('/delete/{id}', 'CategoriesController@destroy');
    });

    //routes for rating of series
    Route::prefix('ratings')->group(function(){
        Route::get('/', 'RatingsController@index')->name('adRateIndex');
        Route::get('/create', 'RatingsController@create')->name('adCreateRate');
        Route::post('/create', 'RatingsController@store')->name('adStoreRate');
        Route::get('/detail/{id}-{title}', 'RatingsController@view')->name('addetailRate');
        Route::get('/edit/{id}-{title}', 'RatingsController@edit')->name('adEditRate');
        Route::patch('/edit/{id}-{title}', 'RatingsController@update')->name('adUpdateRate');
        Route::delete('/delete/{id}', 'RatingsController@destroy');
    });


    //route prefix for series
    Route::prefix('series')->group(function(){
        Route::get('/', 'SeriesController@index')->name('adseriesIndex');
        Route::get('/create', 'SeriesController@create')->name('adSeriesCreate');
        Route::post('/create', 'SeriesController@store')->name('adStoreSeries');
        Route::get('/view/{id}-{title}', 'SeriesController@show')->name('addetailSeries');
        Route::get('/edit/{id}-{title}', 'SeriesController@edit')->name('adEditSeries');
        Route::patch('/edit/{id}-{title}', 'SeriesController@update')->name('adUpdateSeries');
    });

    Route::prefix('episodes')->group(function(){
        Route::get('/', 'EpisodesController@index')->name('adEpisodesIndex');
        Route::get('/create', 'EpisodesController@create')->name('adEpisodesCreate');
        Route::post('/create', 'EpisodesController@store')->name('adStoreEpisodes');
        Route::get('/view/{slug}', 'EpisodesController@show')->name('adEpisodesDetail');
        Route::get('/edit/{id}-{slug}', 'EpisodesController@edit')->name('adEpisodesEdit');
        Route::patch('/edit/{id}-{slug}', 'EpisodesController@update')->name('adEpisodesUpdate');
        Route::get('/publish/{id}-{slug}', 'EpisodesController@publishPost');
        Route::get('/unpublish/{id}-{slug}', 'EpisodesController@unPublishPost');

    });

    Route::prefix('comments')->group(function(){
        Route::get('/', 'CommentsController@index')->name('adCommentsIndex');
        Route::get('/detail/{id}', 'CommentsController@show')->name('adCommentsDetail');
        Route::patch('/unaprove/{id}', 'CommentsController@unaprove')->name('adCommentsUnaprove');
        Route::patch('/aprove/{id}', 'CommentsController@aprove')->name('adCommentsAprove');
        Route::delete('/remove/{id}', 'CommentsController@destroy')->name('adCommentsRemove');
    });

    Route::prefix('subscribers')->group(function(){
        Route::get('/', 'SubscribersController@index')->name('adSubscribersIndex');
        Route::patch('/paid/{id}', 'SubscribersController@paid');
        Route::patch('/deactivate/{id}', 'SubscribersController@deactivate');
        Route::patch('/activate/{id}', 'SubscribersController@activate');
    });

    Route::prefix('messages')->group(function(){
        Route::get('/', 'MessagesController@index')->name('adMessagesIndex');
        Route::get('/readmsg/{id}-{name}', 'MessagesController@read');
        Route::get('/readmessages', 'MessagesController@readmessages')->name('adReadMessagesIndex');
        Route::get('/archieve/{id}-{name}', 'MessagesController@archieved');
        Route::get('/archievedmessages', 'MessagesController@archievedmessages')->name('adarchievedMessagesIndex');
        Route::get('/delete/{id}-{name}', 'MessagesController@delete');
    });

    Route::prefix('users')->group(function(){
        Route::get('/', 'UsersController@index')->name('adUsersIndex');
        Route::get('/mute/{user}', 'UsersController@mute')->name('adMuteUsers');
        Route::get('/unmute/{user}', 'UsersController@unmute')->name('adUnmuteUsers');
        Route::get('/block/{user}', 'UsersController@block')->name('adBlockUsers');
        Route::get('/unblock/{user}', 'UsersController@unblock')->name('adUnblockUsers');
        Route::get('/view/{user}', 'UsersController@show')->name('adUserDetail');
        Route::patch('/view/{user}', 'UsersController@update')->name('adUserUpdate');
    });





});





Auth::routes(['verify' => true]);

//admin route
Route::get('/home', 'HomeController@index')->name('home');
//Authenticated users route. three people can come in here; Super-Admin, Admin and Writer, however everyone can asscess, public profile of a writer
Route::prefix('profile')->middleware('blockedUsers')->group(function(){
    Route::get('/', 'ProfilesController@index')->name('profilehome');
    Route::get('/create', 'ProfilesController@create')->name('createProfile');
    Route::post('/create', 'ProfilesController@store')->name('storeProfile');
    Route::get('/detail/{username}/{name}', 'ProfilesController@show')->name('viewProfile');
    Route::get('/edit/{profile}', 'ProfilesController@edit')->name('editProfile');
    Route::patch('/edit/{profile}', 'ProfilesController@update')->name('updateProfile');

});

//series routes
Route::prefix('series')->group(function(){
    Route::get('/', 'Blog\SeriesController@index')->name('blogserieshome');
    Route::get('/{id}-{title}', 'Blog\SeriesController@show')->name('blogseriesdetail');
    Route::post('/follow/{user}', 'FollowController@store')->name('followroute');
});

//episodes routes
Route::prefix('episodes')->group(function(){
    Route::get('/', 'Blog\EpisodesController@index')->name('blogEpisodehome');
    Route::get('/{slug}', 'Blog\EpisodesController@detail')->name('blogEpisodedetail');
});

//categories routes
Route::prefix('categories')->group(function(){
    Route::get('/', 'Blog\CategoriesController@index')->name('blogCategoriehome');
    Route::get('/{id}-{title}', 'Blog\CategoriesController@show')->name('blogCategorydetail');
});
