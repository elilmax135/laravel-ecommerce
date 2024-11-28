<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\View\View;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

protected $products;

public function __construct(){
    $this->products = new product();
}



    public function index()
    {

        $products=$this->products->all();
$categories =Category::pluck('name','id');

        return view('product.index',compact('products','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $requestData = $request->all();
    $fileName=time().$request->file('photo')->getClientOriginalName();
    $path = $request->file('photo')->storeAs('storage',$fileName,'public');
    $requestData["photo"]= '/storage/'.$path;
    product::create($requestData);
    return redirect('product');


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories =Category::pluck('name','id');
        $products = product::all();
        return view('product.show',compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = product::find($id);
        $categories =Category::pluck('name','id');
        return view('product.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validate the input
    $request->validate([
        'productname' => 'required|string|max:255',
        'cat_id' => 'required|integer',
        'discription' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Update product details
    $product->productname = $request->productname;
    $product->cat_id = $request->cat_id;
    $product->discription = $request->discription;
    $product->price = $request->price;
    $product->quantity = $request->quantity;

    // Handle image upload
    if ($request->hasFile('photo')) {
        // Delete the old image if it exists
        if ($product->photo && file_exists(public_path($product->photo))) {
            unlink(public_path($product->photo));
        }

        // Store the new image
        $path = $request->file('photo')->store('product_images', 'public');
        $product->photo = 'storage/' . $path;
    }

    // Save the updated product
    $product->save();

    return redirect()->route('product.show', ['product' => $product->id])->with('success', 'Product updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::destroy($id);
        return redirect('product')->with('flash_message', 'product deleted!');
    }
}
