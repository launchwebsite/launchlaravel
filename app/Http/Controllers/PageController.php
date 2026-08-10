<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Career;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $careers    = Career::all();
        $category   = Category::withCount('products')->get();
        $categories = Category::withCount('products')->with([
            'subcategories' => function ($query) {
                $query->withCount('products');
            },
        ])
            ->latest()->take(4)->get();

        return view("home", compact('category', 'categories', 'careers'));
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
        $careers = Career::all();

        return view("jobopening", compact('careers'));
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
    $attributes = Attributes::all();
    $categories = Category::all();
    $sub_categories = SubCategory::all();

    return view('addpost', compact(
        'attributes',
        'categories',
        'sub_categories'
    ));
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
