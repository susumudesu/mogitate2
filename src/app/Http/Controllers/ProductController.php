<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;


class ProductController extends Controller
{
    public function index()
    {
        
        $query = Product::query();
        
        $products = $query->orderByDesc('created_at')->Paginate(6);
        return view('index', compact('products'));
    }
    
    public function search(Request $request)
    {
        $query = Product::query();
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
        $query->where('name', 'like', '%' . $keyword . '%');
        }
        
        $products = $query->orderByDesc('created_at')->Paginate(6);

        return view('index', compact('keyword','products'));
    }


    public function register(Request $request)
    {
        $productId = $request->input('product_id');
        return view('register', compact('productId'));
    }

    public function confirm($productId,ProductRequest $request)
    {
        $product = Product::create($request->only(['name','price','file','description','product_id','season_id']));
        $product->seasons()->attach(request()->seasons);
        return redirect('/products');
    }

    public function show($productId)
    {
        $products = Product::find($productId);
        return view('detail')->with('products',$products);
    }

    public function update($productId,ProductRequest $request)
    {
        $product = $request->only(['file','name','price','description']);
        $season = $request->only('season_id');
        Product::find($productId)->update($product);
        Product_Season::find($productId)->update($season);
        return view('index');
    }

    public function destroy($productId)
    {
        Product::destroy($productId);
        return view('index');
    }
}
