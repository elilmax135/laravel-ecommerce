<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display products with an option to add to cart
    public function index()
    {
        $products = Product::all();
        return view('cart.index', compact('products'));
    }

    // Add product to cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Validate quantity
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity,
        ]);

        // Add to cart logic
        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            ['quantity' => $request->quantity]
        );

        // Reduce product stock
        $product->quantity -= $request->quantity;
        $product->save();

        return redirect()->route('cart.view')->with('success', 'Product added to cart!');
    }


    // View cart items
    public function view()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.view', compact('cartItems'));
    }

    // Remove item from cart
    public function remove($id)
    {
        $cartItems = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cartItems->delete();

        return redirect()->route('cart.view')->with('success', 'Product removed from cart!');
    }
    public function generatePDF()
{
    // Fetch the authenticated user
    $user = auth()->user();

    // Fetch the user's cart items
    $cartItems = $user->cart; // Assuming 'cart' relationship is properly defined in the User model

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.view')->with('error', 'Your cart is empty, nothing to generate!');
    }

    // Calculate the grand total
    $grandTotal = 0;
    foreach ($cartItems as $item) {
        $grandTotal += $item->product->price * $item->quantity;
    }

    // Pass the cart items, grand total, and user information to the view
    $pdf = Pdf::loadView('cart.pdf', compact('cartItems', 'grandTotal', 'user'));

    // Download the PDF with a user-specific filename
    return $pdf->download($user->name . '_cart_invoice.pdf');
}
public function placeOrder()
{
    $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

    foreach ($cartItems as $item) {
        $product = $item->product;

        if ($product->quantity < $item->quantity) {
            return redirect()->route('cart.view')->with('error', 'Insufficient stock for ' . $product->productname);
        }

        // Reduce stock
        $product->quantity -= $item->quantity;
        $product->save();
    }

    // Clear the cart
    Cart::where('user_id', Auth::id())->delete();

    return redirect()->route('products.index')->with('success', 'Order placed successfully!');
}


}

