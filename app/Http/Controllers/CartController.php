<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $carts =  Cart::content();
        return view('guest.cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $currentProduct = Product::where('id', $validate['productId'])->first();
        Cart::add(['id' => $currentProduct->id, 'name' => $currentProduct->title, 'qty' => $validate['quantity'], 'price' => $currentProduct->price]);
        return  redirect()->route('cart.index')->with('success', 'add success cart');
    }

    public function remove(Request $request)
    {
        if ($request->has('rowId')) {
            $rowId =  $request->query('rowId');
            Cart::remove($rowId);
            return  redirect()->route('cart.index')->with('success', 'remove success cart');
        }
    }

    public function checkout()
    {
        $carts =  Cart::content();
        return view('guest.checkout', compact('carts'));
    }
}
