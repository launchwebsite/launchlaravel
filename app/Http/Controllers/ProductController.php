<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $attributes     = Attributes::all();
    $categories     = Category::all();
    $sub_categories = SubCategory::all();

    return view('admin.product', compact('attributes', 'categories', 'sub_categories'));
}
}
