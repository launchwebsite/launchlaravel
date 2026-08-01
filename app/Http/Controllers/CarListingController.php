<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class CarListingController extends Controller
{
    protected $carsCategoryId = 2; // confirm actual CT_Id for Cars

    private function rules(): array
    {
        return [
            'LS_Title'   => 'required|string|max:255',
            'LS_Price'   => 'required|numeric',
            'LS_City'    => 'nullable|string|max:100',
            'LS_Country' => 'nullable|string|max:100',
            'brand'      => 'required|string|max:100',
            'model'      => 'required|string|max:100',
            'year'       => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'mileage'    => 'required|integer|min:0',
            'fuel_type'  => 'required|in:petrol,diesel,electric,hybrid',
            'transmission' => 'required|in:automatic,manual',
            'condition'  => 'required|in:new,used',
        ];
    }

    public function index()
    {
        $listings = Listing::where('VR_Id', auth()->guard('vendor')->id())
            ->where('CT_Id', $this->carsCategoryId)
            ->latest()
            ->paginate(10);

        return view('vendor.listings.cars.index', compact('listings'));
    }

    public function create()
    {
        return view('vendor.listings.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Listing::create([
            'VR_Id'      => auth()->guard('vendor')->id(),
            'CT_Id'      => $this->carsCategoryId,
            'LS_Title'   => $validated['LS_Title'],
            'LS_Price'   => $validated['LS_Price'],
            'LS_City'    => $validated['LS_City'] ?? null,
            'LS_Country' => $validated['LS_Country'] ?? null,
            'LS_Attributes' => [
                'brand'        => $validated['brand'],
                'model'        => $validated['model'],
                'year'         => $validated['year'],
                'mileage'      => $validated['mileage'],
                'fuel_type'    => $validated['fuel_type'],
                'transmission' => $validated['transmission'],
                'condition'    => $validated['condition'],
            ],
            'LS_Status' => 0,
        ]);

        return redirect()->route('listings.cars.index')->with('success', 'Car listed successfully.');
    }

    public function edit($id)
    {
        $listing = Listing::where('VR_Id', auth()->guard('vendor')->id())
            ->where('CT_Id', $this->carsCategoryId)
            ->findOrFail($id);

        return view('vendor.listings.cars.edit', compact('listing'));
    }

    public function update(Request $request, $id)
    {
        $listing = Listing::where('VR_Id', auth()->guard('vendor')->id())
            ->where('CT_Id', $this->carsCategoryId)
            ->findOrFail($id);

        $validated = $request->validate($this->rules());

        $listing->update([
            'LS_Title'   => $validated['LS_Title'],
            'LS_Price'   => $validated['LS_Price'],
            'LS_City'    => $validated['LS_City'] ?? null,
            'LS_Country' => $validated['LS_Country'] ?? null,
            'LS_Attributes' => [
                'brand'        => $validated['brand'],
                'model'        => $validated['model'],
                'year'         => $validated['year'],
                'mileage'      => $validated['mileage'],
                'fuel_type'    => $validated['fuel_type'],
                'transmission' => $validated['transmission'],
                'condition'    => $validated['condition'],
            ],
        ]);

        return redirect()->route('listings.cars.index')->with('success', 'Car listing updated.');
    }

    public function destroy($id)
    {
        $listing = Listing::where('VR_Id', auth()->guard('vendor')->id())
            ->where('CT_Id', $this->carsCategoryId)
            ->findOrFail($id);

        $listing->delete();

        return redirect()->route('listings.cars.index')->with('success', 'Car listing deleted.');
    }
}
