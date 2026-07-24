<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view("home");
    }

    public function categorylist(){
        return view("categorylist");
    }

    public function categorydetails(){
        return view("categorydetails");
    }

    public function jobopening(){
        return view("jobopening");
    }

    public function contact(){
        return view("contact");
    }

    public function applyjob(){
        return view("applyjob");
    }

    public function addetails(){
        return view("ad-details");
    }

    public function adlist1(){
        return view("ad-list-column1");
    }

    public function adlist2(){
        return view("ad-list-column2");
    }

    public function adlist3(){
        return view("ad-list-column3");
    }

    public function user(){
        return view("user-form");
    }

}
