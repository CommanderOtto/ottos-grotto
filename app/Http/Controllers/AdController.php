<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::with('category')->get();

        //Passes the $ads collection into home.blade.php file.
        return view('home', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('ads.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'message' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:100',
        ]);

        //categoryid is NOT empty (true or false)
        $hasExisting = !empty($validated['category_id']);
        //new category is filled (true or false)
        $hasNew = filled($validated['new_category'] ?? null);

        //if categoryid is filled and new category is filled, then throw this message
        if ($hasExisting === $hasNew) {
            throw ValidationException::withMessages([
                'category_id' => 'Select an existing category or enter a new one, but not both.',
            ]);
        }

        //save category and ad at the same time or roll back
        DB::transaction(function () use ($validated, $hasNew) {

            if ($hasNew) {
                $category = Category::firstOrCreate([
                    'name' => trim($validated['new_category'])
                ]);

                $categoryId = $category->id;
            } else {
                $categoryId = $validated['category_id'];
            }

            Ad::create([
                'title' => $validated['title'],
                'price' => $validated['price'],
                'location' => $validated['location'],
                'message' => $validated['message'],
                'category_id' => $categoryId,
            ]);
        });

        return redirect()
            ->route('home')
            ->with('success', 'Your advertisement was published!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
