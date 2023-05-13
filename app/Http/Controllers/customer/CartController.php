<?php

namespace App\Http\Controllers\customer;

use App\Traits\CartTrait;
use Illuminate\Http\Request;
use App\Models\vendor\Product;
use App\Http\Controllers\Controller;
use App\Models\customer\ProductCart;
use App\Models\vendor\ProductAttribute;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    //import trait
    use CartTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // $carts = ProductCart::with('product')->where('user_id', auth()->user()->id)->get();

    // return view('customer.cart.cartItem', compact('carts'));

    $subTotal=0;
        $item=$this->cartItem();
        $subTotal=$this->cartSubTotal();
        if($item->count()>0){
            return view('customer.cart.cartItem',compact('item','subTotal'));
        }else{
            return view('front.error.cartEmpty');
        }
        

        
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
        // check product quantity must be greater than 0
        if ($request->quantity <= 0) {
            return back()->with('error', 'Quantity must be greater than 0');
        }
    
        $product_id = $request->product_id;
        $attribute_id = $request->attribute;
        $quantity = $request->quantity;
    
        // check if the product already exists in the cart
        $cartItem = ProductCart::where('user_id', auth()->user()->id)
                                ->where('product_id', $product_id)
                                ->first();
    
        if ($cartItem) {
            // update the existing cart item with the new quantity
            $cartItem->quantity += $quantity;
            $cartItem->sub_total = $cartItem->price * $cartItem->quantity; // update the sub_total attribute

            $cartItem->save();
            return back()->with('success', 'Product quantity has been updated in cart');
        }
    
        // check product has attribute or not
        $product = Product::findOrFail($product_id);

        $price = $product->sale_price;
        $image = $product->image;


        // create a new product cart model and set its attributes
        $cartItem = new ProductCart;
        $cartItem->user_id = auth()->user()->id;
        $cartItem->product_id = $product_id;
        // $cartItem->attribute_id = $attribute_id;
        $cartItem->quantity = $quantity;
        $cartItem->vendor_id = $product->vendor_id;
        $cartItem->shop_id = $product->shop_id;
        $cartItem->price = $price;
        $cartItem->sub_total = $price * $quantity;
        $cartItem->image = $image;
    
        // save the model to the database
        $cartItem->save();
    
        return back()->with('success', 'Product has been added to cart');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $delete=ProductCart::findOrFail($id);
        $delete->delete();
        return back()->with('error','Item has been removed');
    } 




    public function addCart(Request $request, $id)
    {
        $cartItem = ProductCart::where(['user_id' => auth()->user()->id, 'product_id' => $id])->first();
    
        if ($cartItem) {
            // increment the quantity and update the sub_total
            $cartItem->quantity += 1;
            $cartItem->sub_total = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            // fetch the Product model based on the $id parameter
            $product = Product::findOrFail($id);
    
            $store = new ProductCart;
            $store->user_id = auth()->user()->id;
            $store->product_id = $id;
            $store->quantity = 1;
            $store->vendor_id = $product->vendor_id;
            $store->shop_id = $product->shop_id;
            $store->price = $product->sale_price;

            $store->sub_total = $store->price * $store->quantity;
            $store->image = $product->image;
    
            $store->save();
        }
    
        return back()->with('success', 'Product has been added to Cart');
    }
    
    


}