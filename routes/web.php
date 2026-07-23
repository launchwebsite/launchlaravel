<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/category_list', function () {
    return view('categorylist');
})->name('categorylist');

Route::get('/category_details', function () {
    return view('categorydetails');
})->name('categorydetails');

Route::get('/job_opening', function () {
    return view('jobopening');
})->name('jobopening');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/add_post', function () {
    return view('addpost');
})->name('adpost');

Route::get('/apply_job', function () {
    return view('applyjob');
})->name('applyjob');

Route::get('/ad_details', function () {
    return view('ad-details');
})->name('addetails');

Route::get('/ad_list1', function () {
    return view('ad-list-column1');
})->name('adlist1');

Route::get('/ad_list2', function () {
    return view('ad-list-column2');
})->name('adlist2');

Route::get('/ad_list3', function () {
    return view('ad-list-column3');
})->name('adlist3');

Route::get('/user_form', function () {
    return view('user-form');
})->name('user');


Route::get('/index', function () {
    return view('index');
})->name('index');
