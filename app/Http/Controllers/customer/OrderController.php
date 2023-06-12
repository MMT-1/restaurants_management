<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\customer\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    
public function store(Request $request)
{
    // Validate the request data
     

    // Get the authenticated user
    $user = auth()->user();

    
    // Create a new order
    $order = new Order();
    $order->user_id = $user->id;
    $order->restaurant_id = 1;
    // Set other order attributes as necessary
    $order->save();

    $foodIds = $request->input('food_id');
    $quantities = $request->input('quantity');
    
    if (is_array($foodIds) && is_array($quantities)) {
        foreach ($foodIds as $index => $foodId) {
            $quantity = $quantities[$index];
            // Rest of your code here
        }
    } else {
        // Handle the case when the input values are null
        return back()->with('error', 'Invalid input values');
    }

    
    $orderId = $order->id;

    // Your logic here, such as sending email notifications, redirecting to a success page, or displaying a confirmation message

    // Redirect to the cart page with the order ID
    return redirect()->route('customer.cart.cartItem', $orderId)->with('success', 'Order has been placed successfully.');
}
}
