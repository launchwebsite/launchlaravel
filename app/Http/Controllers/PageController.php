<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;

class PageController extends Controller
{
    public function home()
    {
        $category = Category::withCount('products')->get();

        $products = Product::latest()->take(6)->get();
        $topRatings = Product::inRandomOrder()->take(4)->get();
        $topAdvertiser = Product::inRandomOrder()->take(4)->get();
        $topEngaged = Product::inRandomOrder()->take(4)->get();

        // Career count for each category
        $careerCategoryCounts = Career::select(
            'CT_Id',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('CT_Id')
            ->pluck('total', 'CT_Id');

        // Career count for each subcategory
        $careerSubcategoryCounts = Career::select(
            'SC_Id',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('SC_Id')
            ->pluck('total', 'SC_Id');

        $categories = Category::where('CT_Name', '!=', 'Jobs')
            ->withCount('products')
            ->with([
                'subcategories' => function ($query) {
                    $query->withCount('products');
                },
            ])
            ->latest()
            ->take(4)
            ->get();

        $careerCount = Career::count();
        $careers     = Career::get();

        $allProductsForCities = Product::select('PR_Details')->get();
        $cities = collect();
        foreach ($allProductsForCities as $p) {
            $loc = $p->PR_Details['Location'] ?? null;
            if ($loc) {
                $locParts = explode(',', $loc);
                $cities->push(trim($locParts[0]));
            }
        }
        $topCities = $cities->countBy()->sortDesc()->take(6);

        return view('home', compact(
            'category',
            'categories',
            'careerCategoryCounts',
            'careerCount',
            'careerSubcategoryCounts',
            'careers',
            'products',
            'topRatings',
            'topAdvertiser',
            'topEngaged',
            'topCities'
        ));
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

        // Career count for each category
        $careerCategoryCounts = Career::select(
            'CT_Id',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('CT_Id')
            ->pluck('total', 'CT_Id');

        // Career count for each subcategory
        $careerSubcategoryCounts = Career::select(
            'SC_Id',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('SC_Id')
            ->pluck('total', 'SC_Id');

        $categories = Category::withCount('products')
            ->with([
                'subcategories' => function ($query) {
                    $query->withCount('products');
                },
            ])
            ->latest()
            ->get();

        $careerCount = Career::count();
        $careers     = Career::get();

        return view('categorylist', compact(
            'categoriess',
            'categories',
            'careerCategoryCounts',
            'careerCount',
            'careerSubcategoryCounts',
            'careers'
        ));
    }

    public function categorydetails(Request $request)
    {
        $query = Product::with(['category', 'subcategory']);

        $catIds = [];
        $scIds = [];

        if ($request->has('popularity') && is_array($request->popularity) && count($request->popularity) > 0) {
            foreach ($request->popularity as $id) {
                $scIds[] = Hashids::decode($id)[0] ?? $id;
            }
        } else {
            if ($request->has('category') && !empty($request->category)) {
                $catIds[] = Hashids::decode($request->category)[0] ?? $request->category;
            }

            if ($request->has('subcategory') && !empty($request->subcategory)) {
                $scIds[] = Hashids::decode($request->subcategory)[0] ?? $request->subcategory;
            }
        }

        if (!empty($catIds)) {
            $query->whereIn('CT_Id', $catIds);
        }

        if (!empty($scIds)) {
            $query->whereIn('SC_Id', $scIds);
        }

        // Generate locations based on current category filters (before location filter is applied)
        $locationQuery = clone $query;
        $filteredProductsForLocation = $locationQuery->select('PR_Details')->get();
        $locations = collect();
        foreach ($filteredProductsForLocation as $p) {
            $loc = $p->PR_Details['Location'] ?? null;
            if ($loc) {
                $locations->push(trim($loc));
            }
        }
        $topLocations = $locations->countBy()->sortDesc()->take(10);

        if ($request->has('location') && is_array($request->location)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->location as $loc) {
                    $q->orWhere('PR_Details->Location', 'LIKE', '%' . $loc . '%');
                }
            });
        }
        $show = $request->input('show', 12);
        if (!in_array($show, [12, 24, 36])) {
            $show = 12;
        }

        $sort = $request->input('sort', 'default');
        if ($sort == 'oldest') {
            $query->oldest();
        } elseif ($sort == 'price_low') {
            $query->orderByRaw('CAST(JSON_EXTRACT(PR_Details, "$.Price") AS UNSIGNED) ASC');
        } elseif ($sort == 'price_high') {
            $query->orderByRaw('CAST(JSON_EXTRACT(PR_Details, "$.Price") AS UNSIGNED) DESC');
        } else {
            $query->latest();
        }

        $products = $query->paginate($show)->withQueryString();

        $categories = Category::where('CT_Name', '!=', 'Jobs')
            ->withCount('products')
            ->with(['subcategories' => function ($query) {
                $query->withCount('products');
            }])
            ->get();

        $popularSubcategories = \App\Models\SubCategory::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(10)
            ->get();

        return view("categorydetails", compact('products', 'categories', 'topLocations', 'popularSubcategories'));
    }

    public function jobopening(Request $request)
    {
        $query = Career::query();

        if ($request->has('category') && !empty($request->category)) {
            $catId = Hashids::decode($request->category)[0] ?? $request->category;
            $query->where('CT_Id', $catId);
        }

        if ($request->has('subcategory') && !empty($request->subcategory)) {
            $subcatId = Hashids::decode($request->subcategory)[0] ?? $request->subcategory;
            $query->where('SC_Id', $subcatId);
        }

        $careers = $query->get();

        return view("jobopening", compact('careers'));
    }

    public function applyjob()
    {
        // Get selected career from session
        $careerId = session('apply_job_id');

        // If no job was selected, go back to job openings
        if (! $careerId) {
            return redirect()
                ->route('jobopening')
                ->with('error', 'Please select a job before applying.');
        }

        // Get career
        $career = Career::findOrFail($careerId);

        return view('applyjob', compact('career'));
    }

    public function selectJob(Request $request)
    {
        if ($request->has('career_id')) {
            $request->merge(['career_id' => Hashids::decode($request->career_id)[0] ?? $request->career_id]);
        }

        $request->validate([
            'career_id' => 'required|exists:careers,CR_Id',
        ]);

        // Store selected career ID in session
        session([
            'apply_job_id' => $request->career_id,
        ]);

        return redirect()->route('applyjob');
    }

    public function storeApplication(Request $request)
    {
        if ($request->has('CR_Id')) {
            $request->merge(['CR_Id' => Hashids::decode($request->CR_Id)[0] ?? $request->CR_Id]);
        }

        $request->validate([
            'CR_Id'      => 'required|exists:careers,CR_Id',
            'CA_Name'    => 'required|string|max:255',
            'CA_Email'   => 'required|email|max:255',
            'CA_Phone'   => 'required|string|max:20',
            'CA_JobType' => 'required|string|max:100',
            'CA_Resume'  => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $resumePath = null;

        if ($request->hasFile('CA_Resume')) {
            $resumePath = $request->file('CA_Resume')
                ->store('resumes', 'public');
        }

        CareerApplication::create([
            'CR_Id'      => $request->CR_Id,
            'CA_Name'    => $request->CA_Name,
            'CA_Email'   => $request->CA_Email,
            'CA_Phone'   => $request->CA_Phone,
            'CA_JobType' => $request->CA_JobType,
            'CA_Resume'  => $resumePath,
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
        $attributes     = Attributes::all();
        $categories     = Category::all();
        $sub_categories = SubCategory::all();

        return view('addpost', compact(
            'attributes',
            'categories',
            'sub_categories'
        ));
    }

    public function addetails($id = null)
    {
        if (!$id) {
            return view('layouts.layout');
        }

        $realId = Hashids::decode($id)[0] ?? $id;
        $product = Product::with(['vendor', 'category', 'subcategory'])->findOrFail($realId);

        $related = Product::where('SC_Id', $product->SC_Id)
            ->where('PR_Id', '!=', $product->PR_Id)
            ->latest()
            ->take(5)
            ->get();

        return view('ad-details', compact('product', 'related'));
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
