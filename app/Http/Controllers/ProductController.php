<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Traits\FileStorage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use FileStorage;

    public function index(Request $request)
    {
        $products = Products::orderBy('id', 'asc');

        if ($request->query('category')) {
            $products = $products->where('category_id', $request->query('category'));
        }

        if ($request->query('pricefilter')) {
            $prices = explode('-', $request->query('pricefilter'));
            $products = $products->where('price', '<=', (int)$prices[1])->where('price', '>=', $prices[0]);
        }

        $products = $products->get();

        $categories = Category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        Products::create($request->except('photo') + [
            'photo' => $this->storeFile('uploads/products', $request->file('photo'))
        ]);
        return redirect('/products');
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Category::all();
        return view('Products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->except('photo'));
        if ($request->hasFile('photo')) {
            $this->destroyFile('uploads/products', $product->getRawOriginal('photo'));

            $product->update([
                'photo' => $this->storeFile('uploads/products', $request->file('photo'))
            ]);
        }

        return redirect('/products');
    }
}
