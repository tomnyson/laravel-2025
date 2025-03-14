<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->select('id', 'title', 'price','description', 'stock', 'image')->get();
        return view('products.index', compact('products'));
    }
    public function create() {
        return view('products.add');
    }
    public function store(Request $request) {
        $dataValidator = $request->validate(
          [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'status' => 'required|numeric|min:0',
          ]
        );
        $random = Str::random(5); 
        $dataValidator['slug'] = Str::of($request->title.'-'.$random )->slug;
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $dataValidator['image'] = $imageName;
        $product = Product::create($dataValidator);
        Session::flash('message', 'thêm thành công');
        return redirect()->route('products.index');

    }
}
