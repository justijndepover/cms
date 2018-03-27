<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function(){
    return view('admin');
})->name('admin');

// Every route that is registered through the Route::module function will be available in the left side menu
// The second parameter registers the actual url.
// Route::module('pages', ['documents'])
// documents will be available as url, pages will be in the left side menu linking to /documents

Route::module('pages', [
    'pages'
]);

Route::get('support', 'Admin\SupportController@index');
Route::get('support/phpinfo', 'Admin\SupportController@phpinfo');
