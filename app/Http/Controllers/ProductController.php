<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
  public function index()
  {
    $products = DB::table('products')
      ->join('categories', 'products.category_id', '=', 'categories.id')
      ->select('products.*', 'categories.name as category_name')
      ->paginate(5);

    // $products = DB::table('products')
    // ->join('categories', 'products.category_id', '=', 'categories.id')
    // ->leftJoin('productImages', 'products.id', '=', 'productImages.product_id')
    // ->select(
    //     'products.id',
    //     'products.title',
    //     'products.description',
    //     'products.price',
    //     'products.stock',
    //     'products.status',
    //     'products.slug',
    //     'products.image',
    //     'products.category_id',
    //     'categories.name as category_name',
    //     DB::raw('GROUP_CONCAT(productImages.imagePath) as image_paths')
    // )
    // ->groupBy(
    //     'products.id',
    //     'products.title',
    //     'products.description',
    //     'products.price',
    //     'products.stock',
    //     'products.status',
    //     'products.slug',
    //     'products.image',
    //     'products.category_id',
    //     'categories.name'
    // )
    // ->paginate(5);
    // dd($products);

    return view('products.index', compact('products'));
  }
  public function create()
  {
    $categories = Category::all();
    return view('products.add', compact('categories'));
  }
  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'description' => 'nullable',
      'price' => 'required|numeric|min:0',
      'stock' => 'required|numeric|min:0',
      'status' => 'required|numeric|min:0',
      'category_id' => 'required|numeric|min:0|exists:categories,id',
      'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Tạo slug ngẫu nhiên
    $random = Str::random(5);
    $data['slug'] = Str::slug($request->title . '-' . $random);

    // Lưu ảnh chính
    if ($request->hasFile('image')) {
      $imageName = uniqid() . '.' . $request->image->extension();
      $request->image->storeAs('public/images', $imageName);
      $data['image'] = $imageName;
    }
    // Tạo product
    $product = Product::create($data);
    // Lưu các ảnh phụ
    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $image) {
        $subImageName = uniqid() . '.' . $image->extension();
        $image->storeAs('public/images', $subImageName);

        Images::create([
          'product_id' => $product->id,
          'imagePath' => $subImageName
        ]);
      }
    }

    Session::flash('message', 'Thêm sản phẩm thành công!');
    return redirect()->route('products.index');
  }

  public function edit($id)
  {
    $product = DB::table('products')->where('id', $id)->first();
    return view('products.edit', compact('product'));
  }

  public function update(Request $request, $id)
  {
    $dataValidator = $request->validate(
      [
        'title' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'nullable',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:0',
        'status' => 'required|numeric|min:0',
      ]
    );
    try {
      $random = Str::random(5);
      $dataValidator['slug'] = Str::of($request->title . '-' . $random)->slug;
      if (!empty($request->image)) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $dataValidator['image'] = $imageName;
      }
      Product::where('id', $id)->update($dataValidator);
      Session::flash('message', 'cập nhật thành công');
    } catch (\Exception $e) {
      Session::flash('message', 'Cập nhật thất bại: ' . $e->getMessage());
    }
    return redirect()->route('products.index');
  }


  public function delete($id)
  {
    $delete = DB::table('products')->where('id', $id)->delete();
    if ($delete) {
      Session::flash('message', 'Xóa thành công');
    } else {
      Session::flash('message', 'Xóa thất bại');
    }
    return redirect()->route(route: 'products.index');
  }
}
