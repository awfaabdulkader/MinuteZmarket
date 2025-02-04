<?php

namespace App\Http\Controllers\discount;

use App\Models\Product;
use App\Models\Category;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon; // Add this import

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('AdminSide.discounts' , compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('translations')->get();
        $products = Product::with('translations')->get();
        return view('AdminSide.createDiscounts', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'percentage' => 'required|numeric|between:0,100',
            'type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean',
            'applies_to' => 'required|in:all,category,product',
        ]);
    
        // Ensure proper date format
        $validatedData['start_date'] = Carbon::parse($request->start_date)->startOfDay();
        $validatedData['end_date'] = Carbon::parse($request->end_date)->endOfDay();


        $now = Carbon::now();
        $validatedData['is_active'] = $request->has('is_active') && 
         $now->between($validatedData['start_date'], $validatedData['end_date']);   
            
            
        $discount = Discount::create($validatedData);
    
        // Handle relationships
        if ($request->has('product_ids') && $discount->applies_to === 'product') {
            $discount->products()->sync($request->product_ids);
        }
    
        if ($request->has('category_ids') && $discount->applies_to === 'category') {
            $discount->categories()->sync($request->category_ids);
        }
    
        return redirect()->route('discounts.index')
            ->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $categories = Category::all();
        $products = Product::all();
        return view('AdminSide.editdiscount', compact('discount', 'categories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'percentage' => 'required|numeric|between:0,100',
            'type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean',
            'applies_to' => 'required|in:all,category,product',
        ]);
    
        // Ensure proper date format
        $validatedData['start_date'] = Carbon::parse($request->start_date)->startOfDay();
        $validatedData['end_date'] = Carbon::parse($request->end_date)->endOfDay();


        $now = Carbon::now();
        $validatedData['is_active'] = $request->has('is_active') && 
         $now->between($validatedData['start_date'], $validatedData['end_date']);   
            
            
        $discount->update($validatedData);
    
        // Handle relationships
        if ($request->has('product_ids') && $discount->applies_to === 'product') {
            $discount->products()->sync($request->product_ids);
        }
    
        if ($request->has('category_ids') && $discount->applies_to === 'category') {
            $discount->categories()->sync($request->category_ids);
        }
    
        return redirect()->route('discounts.index')
            ->with('success', 'Discount created successfully.');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return back();
    }

    
}
