<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\FileStorage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use FileStorage;

    public function index(Request $request)
    {
        $categories = Category::all();
        return view('/categories', ['categories' => $categories]);
    }


    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        Category::create($request->except('photo') + [
            'photo' => $this->storeFile('uploads/categories', $request->file('photo'))
        ]);
        return redirect('/categories');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
    }
}
