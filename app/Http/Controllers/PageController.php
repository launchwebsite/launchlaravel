<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Career;
use App\Models\CareerApplication;
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


  public function applyjob($id)
{
    $career = Career::findOrFail($id);

    return view('applyjob', compact('career'));
}


public function storeApplication(Request $request)
{
    $request->validate([
        'CR_Id' => 'required|exists:careers,CR_Id',
        'CA_Name' => 'required|string|max:255',
        'CA_Email' => 'required|email|max:255',
        'CA_Phone' => 'required|string|max:20',
        'CA_JobType' => 'required|string|max:100',
        'CA_Resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
    ]);

    $resumePath = null;

    if ($request->hasFile('CA_Resume')) {
        $resumePath = $request->file('CA_Resume')
            ->store('resumes', 'public');
    }

    CareerApplication::create([
        'CR_Id' => $request->CR_Id,
        'CA_Name' => $request->CA_Name,
        'CA_Email' => $request->CA_Email,
        'CA_Phone' => $request->CA_Phone,
        'CA_JobType' => $request->CA_JobType,
        'CA_Resume' => $resumePath,
    ]);

    return redirect()
        ->route('jobopening')
        ->with('success', 'Your application has been submitted successfully.');
}

    public function contact()
    {
        return view("contact");
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
