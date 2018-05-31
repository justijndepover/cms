<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('table', function(){
    $return = [
        ['id' => 1, 'name' => 'Justijn Depover', 'birthday' => '1993-07-08', 'active' => true, 'checked' => false],
        ['id' => 2, 'name' => 'Verónica Rodriguez Bravo', 'birthday' => '1971-08-06', 'active' => true, 'checked' => false],
        ['id' => 3, 'name' => 'Silvia Rey Echeverría', 'birthday' => '2007-07-22', 'active' => false, 'checked' => false],
        ['id' => 4, 'name' => 'Ella Wilcken', 'birthday' => '1999-12-22', 'active' => false, 'checked' => false],
        ['id' => 5, 'name' => 'Simon van Luyssel', 'birthday' => '2008-08-22', 'active' => true, 'checked' => false],
        ['id' => 6, 'name' => 'Eva Eugenia Valbuena Ponce', 'birthday' => '1996-10-10', 'active' => true, 'checked' => false],
        ['id' => 7, 'name' => 'Beverly Lopez', 'birthday' => '2013-01-14', 'active' => true, 'checked' => false],
        ['id' => 8, 'name' => 'Melle Heerschop', 'birthday' => '2014-10-25', 'active' => false, 'checked' => false],
        ['id' => 9, 'name' => 'Natalie Powell', 'birthday' => '2008-08-08', 'active' => true, 'checked' => false],
        ['id' => 10, 'name' => 'Norah ter Waarbeek-van Zwaben', 'birthday' => '2006-12-09', 'active' => true, 'checked' => false],
        ['id' => 11, 'name' => 'Montserrat Correa Medina', 'birthday' => '1994-04-07', 'active' => false, 'checked' => false],
    ];

    return json_encode($return);
});

Route::get('keys', function(){
    $return = [
        ['name' => 'Name', 'key' => 'name', 'type' => 'text', 'sortable' => false, 'searchable' => true, 'link' => '/admin/support/components'],
        ['name' => 'Date', 'key' => 'birthday', 'type' => 'date', 'sortable' => false, 'searchable' => true],
        ['name' => 'Active', 'key' => 'active', 'type' => 'status', 'sortable' => false, 'searchable' => false, 'small' => true, 'link' => '/{{id}}/edit'],
    ];

    return json_encode($return);
});
