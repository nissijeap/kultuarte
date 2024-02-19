<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Instantiate a new CategoryController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index','show']]);
       $this->middleware('permission:create-category', ['only' => ['create','store']]);
       $this->middleware('permission:edit-category', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        // $categories = Category::orderBy('id','DESC')->paginate(3);

        return view('categories.index', compact('categories', 'user'));
    }

    public function create(): View
    {
        $user = Auth::user();
        return view('categories.create', compact('user'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('categories.index')
                ->withSuccess('New category is added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $user = Auth::user();

        return view('categories.edit', [
            'category' => $category,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->withSuccess('Category is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')
                ->withSuccess('Category is deleted successfully.');
    }
}
