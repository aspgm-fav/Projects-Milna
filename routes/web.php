<?php

Route::get('/', 'Frontend\HomepageController@index');
Auth::routes(['verify' => true]);
Route::get('verifikasi', 'UserController@auth')->name('verifikasi');
Route::get('akun','UserController@ringks')->name('ringksn');
Route::get('product','ProductController@index')->name('product.index');
Route::post('product','ProductController@store')->name('product.store');
Route::get('product/{id}','ProductController@edit')->name('product.edit');
Route::put('product/{id}/update','ProductController@update')->name('product.update');
Route::match(['PUT','PATCH','GET'],'product/show/{id}','ProductController@show')->name('product.show');
Route::get('product/{id}/restore','ProductController@restore')->name('product.restore');
Route::delete('product/{id}','ProductController@destroy')->name('product.destroy');
Route::delete('/product/{id}/delete', 'ProductController@deletePermanent')->name('product.delete-permanent');
Route::get('barangtidakdijual','ProductController@trash')->name('product.trash');
Route::get('selectall','ProductController@selectAll')->name('product.selectAll');
Route::get('selectallre','ProductController@selectAllre')->name('product.selectAll.re');
Route::resource('check', 'CheckoutController');
Route::get('ulasan/{id}','CheckoutController@form')->name('form.ulasan');
Route::match(['post','put', 'patch'],'product/{id}/ulas', 'CheckoutController@ulas')->name('ulasan');
Route::resource('cart','CartController');
Route::get('keranjang/{id}','CheckoutController@form')->name('keranjang');
Route::patch('carts/update', 'CartController@store')->name('carts.store');
Route::delete('carts/remove', 'CartController@remove')->name('carts.remove');
Route::resource('user','UserController');
Route::post('review','ProductController@review')->name('give-review');
