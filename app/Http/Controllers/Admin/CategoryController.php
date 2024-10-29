<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\IsAdmin;
use App\Models\Category;
use Illuminate\Auth\Middleware\Authenticate as MiddlewareAuthenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    public function _construct()
    {
        return $this->middleware([Isadmin::class, Authenticate::class]);
    }
    public function index()
    {
        $categories = Category::all(); // Fetches all categories
    return view('admin.categories.index', compact('categories'));
            
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:categories'],
        ]);
    
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    
        return redirect()->route('admin.categories.index')->with('success', 'Category created');
    }
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
            return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);
    
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }
    
    
    

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('sucess', 'Category Deleted');
    }
    public function rules(Category $category)
{
    return [
        'name' => [
            'required',
            'string',
            'min:3',
            'max:35',
            Rule::unique('categories')->ignore($category->id),
        ],
        'description' => 'nullable|string',
        'slug' => [
            'required',
            'string',
            'min:3',
            'max:35',
            Rule::unique('categories')->ignore($category->id),
        ],
    ];
}
}
