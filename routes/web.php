<?php
/* Index Zone  */
Route::get('/', function () {
    return view('index');
});
/*   HomeController   Zone  */
Route::put('/act','homeController@act');
Route::get('/re_act','homeController@re_act');
Route::get('path/{id}' ,'homeController@path');