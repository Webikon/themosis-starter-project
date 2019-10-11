<?php

/**
 * Application routes.
 */

/** Default WP templates **/
// Front/Home page.
Route::any('/', 'HomepageController@front');


// Blog page.
Route::any('home', 'BlogController@index');

// Blog single post.
Route::any('single', 'BlogController@single');

// Blog archive.
Route::any('archive', 'BlogController@index');

// Blog search.
Route::any('search', 'BlogController@search');


// Generic page.
Route::any('page', 'PageController@page');

// 404 page.
Route::any('404', 'PageController@error404');


// Books (CPT) archive page.
Route::any('postTypeArchive', ['book', 'uses' => 'BookController@archive']);

// Book (CPT) singular page.
Route::any('singular', ['book', 'uses' => 'BookController@single']);


/** Custom templates **/
// Contact page.
Route::any('template', ['contact', 'uses' => 'PageController@contact']);
