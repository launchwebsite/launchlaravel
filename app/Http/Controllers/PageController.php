<?php
namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $category   = Category::withCount('products')->get();
        $categories = Category::withCount('products')->with([
            'subcategories' => function ($query) {
                $query->withCount('products');
            },
        ])
            ->latest()->take(4)->get();

        return view("home", compact('category', 'categories'));
    }

    public function categorylist()
    {
        $categoriess = Category::withCount('products')
            ->with([
                'subcategories' => function ($query) {
                    $query->withCount('products');
                },
            ])
            ->latest()
            ->get();

        return view('categorylist', compact('categoriess'));
    }

    public function categorydetails()
    {
        return view("categorydetails");
    }

    public function jobopening()
    {
        return view("jobopening");
    }

    public function contact()
    {
        return view("contact");
    }

    public function applyjob()
    {
        return view("applyjob");
    }

    public function adpost()
    {
        return view("addpost");
    }

    public function addetails()
    {
        return view("ad-details");
    }

    public function adlist1()
    {
        return view("ad-list-column1");
    }

    public function adlist2()
    {
        return view("ad-list-column2");
    }

    public function adlist3()
    {
        return view("ad-list-column3");
    }

    public function user()
    {
        return view("user-form");
    }

}
