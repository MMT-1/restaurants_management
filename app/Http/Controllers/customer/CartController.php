<?php

namespace App\Http\Controllers\customer;

use App\Traits\CartTrait;
use App\Models\owner\Food;
use Illuminate\Http\Request;
use App\Models\customer\FoodCart;
use App\Http\Controllers\Controller;

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
    
        $food_id = $request->food_id;
        $attribute_id = $request->attribute;
        $quantity = $request->quantity;
    
        // check if the food already exists in the cart
        $cartItem = FoodCart::where('user_id', auth()->user()->id)
                                ->where('food_id', $food_id)
                                ->first();
    
        if ($cartItem) {
            // update the existing cart item with the new quantity
            $cartItem->quantity += $quantity;
            $cartItem->sub_total = $cartItem->price * $cartItem->quantity; // update the sub_total attribute

            $cartItem->save();
            return back()->with('success', 'food quantity has been updated in cart');
        }
    
        // check food has attribute or not
        $food = Food::findOrFail($food_id);

        $price = $food->sale_price;
        $image = $food->image;


        // create a new food cart model and set its attributes
        $cartItem = new FoodCart;
        $cartItem->user_id = auth()->user()->id;
        $cartItem->food_id = $food_id;
        // $cartItem->attribute_id = $attribute_id;
        $cartItem->quantity = $quantity;
        $cartItem->owner_id = $food->owner_id;
        $cartItem->restaurant_id = $food->restaurant_id;
        $cartItem->price = $price;
        $cartItem->sub_total = $price * $quantity;
        $cartItem->image = $image;
    
        // save the model to the database
        $cartItem->save();
    
        return back()->with('success', 'food has been added to cart');
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
        $delete=FoodCart::findOrFail($id);
        $delete->delete();
        return back()->with('error','Item has been removed');
    } 




    public function addCart(Request $request, $id)
    {
        $cartItem = FoodCart::where(['user_id' => auth()->user()->id, 'food_id' => $id])->first();
    
        if ($cartItem) {
            // increment the quantity and update the sub_total
            $cartItem->quantity += 1;
            $cartItem->sub_total = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            // fetch the food model based on the $id parameter
            $food = Food::findOrFail($id);
    
            $store = new FoodCart;
            $store->user_id = auth()->user()->id;
            $store->food_id = $id;
            $store->quantity = 1;
            $store->owner_id = $food->owner_id;
            $store->restaurant_id = $food->restaurant_id;
            $store->price = $food->sale_price;

            $store->sub_total = $store->price * $store->quantity;
            $store->image = $food->image;
    
            $store->save();
        }
    
        return back()->with('success', 'food has been added to Cart');
    }
    
    


}