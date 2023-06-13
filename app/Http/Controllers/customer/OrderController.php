<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\customer\Order;
use App\Models\customer\FoodCart;
use App\Models\customer\FoodOrder;
use App\Http\Controllers\Controller;
use Datatables;
class OrderController extends Controller
{
    //
    
public function store(Request $request)
{
    // Validate the request data
    // $foodIds = $request->input('food_id');
    // $quantities = $request->input('quantity');

    // Get the authenticated user
    $user = auth()->user();

    $cartItems = FoodCart::where('user_id', auth()->user()->id)->get();

    // Create a new order
    $order = new Order();
    $order->user_id = $user->id;
    $order->restaurant_id = $request->input('restaurant_id');
    $order->email = $request->input('email');
    $order->mobile = $request->input('mobile');
    $order->address = $request->input('address');
    $order->full_name = $request->input('full_name');
 

    // Set other order attributes as necessary
    $order->save();
// Calculate the total for the order
$total = $cartItems->sum(function ($cartItem) {
    return $cartItem->quantity * $cartItem->price;
});
   // Assign values to the newly added columns
  
   // Save the updated order
   
    
    $foodIds = $request->input('food_id');
    $quantities = $request->input('quantity', []);
    $price = $request->input('price1');

    foreach ($cartItems as $index => $cartItem) {
        $foodId = $cartItem->food_id;
        $cartItem->quantity = $quantities[$index] ?? 1;
        $food_name = $cartItem->food_name;

        $order->foods()->attach($foodId, [
            'quantity' => $cartItem->quantity,
            'total' => $price * $cartItem->quantity,
            // Set any other relevant attributes
        ]);
    }
      // Update the order total
      $order->total = $order->foods()->sum('total');
      $order->save();

    // Your logic here, such as sending email notifications, redirecting to a success page, or displaying a confirmation message

    // Redirect to the cart page with the order ID
    return redirect()->route('home.page')->with('success', 'Order has been placed successfully.');
}

public function show(Request $request)
{
     $orders = Order::all();
     return view('admin.order.orders', compact('orders'));




 
}


public function destroy(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->delete();
    
    // Perform any additional actions or display a success message
    
    return redirect()->route('orders.show')->with('success', 'Order deleted successfully');
}



}
