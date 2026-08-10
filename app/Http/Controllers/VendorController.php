<?php
namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{

    public function create()
    {
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.vendor-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'VR_Name'      => 'required|string|max:255',
            'VR_Phone'     => 'required|string|max:20',
            'CT_Id'        => 'required',
            'new_category' => 'nullable:CT_Id,new|string|max:255',
            'VR_Type'      => 'required|in:private-company,self-employed',
            'VR_Email_1'   => 'required|email|unique:users,email|unique:vendors,VR_Email_1',
            'VR_Email_2'   => 'nullable|email',
            'VR_Password'  => 'required|string|min:8',
        ]);

        DB::beginTransaction();

        try {

            if ($validated['CT_Id'] == 'new') {

                $category = Category::where('CT_Name', $validated['new_category'])->first();

                if (! $category) {
                    $category = Category::create([
                        'CT_Name' => $validated['new_category'],
                    ]);
                }

                $categoryId = $category->CT_Id;

            } else {

                $category = Category::where('CT_Id', $validated['CT_Id'])->first();

                if (! $category) {
                    return back()->withErrors([
                        'CT_Id' => 'Selected category is invalid.',
                    ])->withInput();
                }

                $categoryId = $category->CT_Id;
            }

            User::create([
                'name'     => $validated['VR_Name'],
                'email'    => $validated['VR_Email_1'],
                'password' => Hash::make($validated['VR_Password']),
                'Role_Id'  => 2,
            ]);

            Vendor::create([
                'VR_Name'     => $validated['VR_Name'],
                'VR_Email_1'  => $validated['VR_Email_1'],
                'VR_Email_2'  => $validated['VR_Email_2'] ?? null,
                'VR_Phone'    => $validated['VR_Phone'],
                'CT_Id'       => $categoryId,
                'VR_Password' => Hash::make($validated['VR_Password']),
                'VR_Type'     => $validated['VR_Type'],
                'VR_Status'   => 0,
            ]);

            DB::commit();

            return redirect()->route('user')->with('success', 'Vendor account created successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $vendor     = Vendor::findOrFail($id);
        $categories = Category::orderBy('CT_Name')->get();

        return view('admin.vendor-edit', compact('vendor', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        $validated = $request->validate([
            'VR_Name'      => 'required|string|max:255',
            'VR_Phone'     => 'required|string|max:20',
            'CT_Id'        => 'required',
            'new_category' => 'nullable:CT_Id,new|string|max:255',
            'VR_Type'      => 'required|in:private-company,self-employed',
            'VR_Email_1'   => [
                'required',
                'email',
                Rule::unique('vendors', 'VR_Email_1')->ignore($vendor->VR_Id, 'VR_Id'),
                Rule::unique('users', 'email')->ignore($vendor->VR_Email_1, 'email'),
            ],
            'VR_Email_2'   => 'nullable|email',
            'VR_Password'  => 'nullable|string|min:8',
        ]);

        DB::beginTransaction();

        try {

            // Determine Category ID
            if ($validated['CT_Id'] == 'new') {

                $category = Category::where('CT_Name', $validated['new_category'])->first();

                if (! $category) {
                    $category = Category::create([
                        'CT_Name' => $validated['new_category'],
                    ]);
                }

                $categoryId = $category->CT_Id;

            } else {

                $category = Category::where('CT_Id', $validated['CT_Id'])->first();

                if (! $category) {
                    return back()->withErrors([
                        'CT_Id' => 'Selected category is invalid.',
                    ])->withInput();
                }

                $categoryId = $category->CT_Id;
            }

            $userData = [
                'name'  => $validated['VR_Name'],
                'email' => $validated['VR_Email_1'],
            ];

            $vendorData = [
                'VR_Name'    => $validated['VR_Name'],
                'VR_Email_1' => $validated['VR_Email_1'],
                'VR_Email_2' => $validated['VR_Email_2'] ?? null,
                'VR_Phone'   => $validated['VR_Phone'],
                'CT_Id'      => $categoryId,
                'VR_Type'    => $validated['VR_Type'],
            ];

            if (! empty($validated['VR_Password'])) {
                $userData['password']      = Hash::make($validated['VR_Password']);
                $vendorData['VR_Password'] = Hash::make($validated['VR_Password']);
            }

            // Keep the linked User row (matched by original email) in sync
            User::where('email', $vendor->VR_Email_1)->update($userData);

            $vendor->update($vendorData);

            DB::commit();

            return redirect()->route('admin.vendor')->with('success', 'Vendor updated successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function dashboard()
    {
        if (auth()->guard('vendor')->user()->VR_Status == 0) {
            session()->flash('approval_pending', true);
        }

        return view('vendor.index');
    }

    public function VendorPostAdd(Request $request)
    {
        $request->validate(
            [
                'CT_Id'       => 'required|exists:categories,CT_Id',
                'SC_Id'       => 'required|exists:sub_categories,SC_Id',
                'AT_Inputs'   => 'required|array',

                'VR_Type'     => 'required|in:private-company,self-employed',
                'VR_Name'     => 'required|string|max:255',
                'VR_Email_1'  => 'required|email|max:255',
                'VR_Email_2'  => 'nullable|email|max:255',
                'VR_Phone'    => 'required|string|max:15',
                'VR_Password' => 'required|string|max:15',

            ],
            [
                'CT_Id.required'       => 'Please select a Category.',
                'SC_Id.required'       => 'Please select a Subcategory.',
                'AT_Inputs.required'   => 'Please fill in the product details.',

                'VR_Type.required'     => 'Please select seller type.',
                'VR_Name.required'     => 'Please enter your name.',
                'VR_Email_1.required'  => 'Please enter your email.',
                'VR_Email_1.email'     => 'Please enter a valid email address.',
                'VR_Phone.required'    => 'Please enter your mobile number.',
                'VR_Password.required' => 'Please enter your mobile number.',
            ]
        );

        $details = [];

        if ($request->has('AT_Inputs')) {

            foreach ($request->AT_Inputs as $attributeId => $value) {

                $attribute = Attributes::find($attributeId);

                if ($attribute) {

                    // Checkbox values come as arrays
                    if (is_array($value)) {
                        $value = implode(',', $value);
                    }

                    $details[$attribute->AT_Inputs] = $value;
                }
            }
        }

        User::create([
            'name'     => $request->VR_Name,
            'email'    => $request->VR_Email_1,
            'password' => Hash::make($request->VR_Password),
            'Role_Id'  => 2,
        ]);

        /*
        |--------------------------------------------------------------------------
        | 2. Create Vendor
        |--------------------------------------------------------------------------
        */

        $vendor = Vendor::create([
            'VR_Name'     => $request->VR_Name,
            'VR_Email_1'  => $request->VR_Email_1,
            'VR_Email_2'  => $request->VR_Email_2,
            'VR_Password' => $request->VR_Password,
            'VR_Phone'    => $request->VR_Phone,
            'VR_Type'     => $request->VR_Type,

            // Set these according to your application
            'VR_Status'   => 0,
            'CT_Id'       => $request->CT_Id,
        ]);

        Product::create([
            'CT_Id'      => $request->CT_Id,
            'SC_Id'      => $request->SC_Id,
            'Role_Id'    => 2,
            'VR_Id'      => $vendor->VR_Id,
            'PR_Details' => $details,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your Post  created successfully.');
    }

    public function postlist()
    {
        $vendor = Auth::guard('vendor')->user();

        $products = Product::where('VR_Id', $vendor->VR_Id)
            ->latest('PR_Id')
            ->get();

        return view('vendor.postlist', compact('products', 'vendor'));
    }

//App
 public function addpost()
{
    $categories = Category::all();

    $sub_categories = SubCategory::all();

    $attributes = Attributes::all();

    return view('vendor.product', compact(
        'categories',
        'sub_categories',
        'attributes'
    ));
}


  public function poststore(Request $request)
{
    $request->validate(
        [
            'CT_Id'     => 'required|exists:categories,CT_Id',
            'SC_Id'     => 'required|exists:sub_categories,SC_Id',
            'AT_Inputs' => 'required|array',
        ],
        [
            'CT_Id.required'     => 'Please select a Category.',
            'CT_Id.exists'       => 'Selected category is invalid.',

            'SC_Id.required'     => 'Please select a Subcategory.',
            'SC_Id.exists'       => 'Selected subcategory is invalid.',

            'AT_Inputs.required' => 'Please fill in the product details.',
            'AT_Inputs.array'    => 'Invalid product details.',
        ]
    );

    /*
    |--------------------------------------------------------------------------
    | Check Subcategory belongs to selected Category
    |--------------------------------------------------------------------------
    */

    $subcategory = SubCategory::where('SC_Id', $request->SC_Id)
        ->where('CT_Id', $request->CT_Id)
        ->first();

    if (!$subcategory) {
        return back()
            ->withInput()
            ->withErrors([
                'SC_Id' => 'Selected subcategory does not belong to the selected category.'
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Get only attributes belonging to selected Category + Subcategory
    |--------------------------------------------------------------------------
    */

    $attributes = Attributes::where('CT_Id', $request->CT_Id)
        ->where('SC_Id', $request->SC_Id)
        ->get()
        ->keyBy('AT_Id');

    /*
    |--------------------------------------------------------------------------
    | Prepare Product Details
    |--------------------------------------------------------------------------
    */

    $details = [];

    foreach ($request->AT_Inputs as $attributeId => $value) {

        // Only process valid attributes
        if (!$attributes->has($attributeId)) {
            continue;
        }

        $attribute = $attributes->get($attributeId);

        /*
        |--------------------------------------------------------------------------
        | File upload
        |--------------------------------------------------------------------------
        */

        if ($attribute->AT_Structure === 'file') {

            if ($request->hasFile("AT_Inputs.$attributeId")) {

                $file = $request->file("AT_Inputs.$attributeId");

                if ($file->isValid()) {

                    $fileName = time() . '_' . $file->getClientOriginalName();

                    $filePath = $file->storeAs(
                        'products',
                        $fileName,
                        'public'
                    );

                    $value = $filePath;
                } else {
                    $value = null;
                }
            } else {
                $value = null;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Checkbox values
        |--------------------------------------------------------------------------
        */

        elseif (is_array($value)) {

            $value = implode(',', $value);
        }

        /*
        |--------------------------------------------------------------------------
        | Save attribute name => value
        |--------------------------------------------------------------------------
        */

        $details[$attribute->AT_Inputs] = $value;
    }

    /*
    |--------------------------------------------------------------------------
    | Logged-in Vendor
    |--------------------------------------------------------------------------
    */

    $vendor = Auth::guard('vendor')->user();

    if (!$vendor) {
        return redirect()
            ->route('vendor.login')
            ->with('error', 'Please login as a vendor.');
    }

    /*
    |--------------------------------------------------------------------------
    | Create Product
    |--------------------------------------------------------------------------
    */

    Product::create([
        'CT_Id'      => $request->CT_Id,
        'SC_Id'      => $request->SC_Id,
        'Role_Id'    => 2,
        'VR_Id'      => $vendor->VR_Id,
        'PR_Details' => $details,
    ]);

    return redirect()
        ->route('vendor.post-form')
        ->with('success', 'Product created successfully.');
}
}
