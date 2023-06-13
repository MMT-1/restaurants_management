@extends('front.layout.master')

@section('title')
    Cart Item
@endsection

@section('content')

<style>
    .form-group input:focus,.form-group input:active,.form-group textarea:focus,.form-group textarea:active{
        border: 1px solid #569041 !important;
        box-shadow: none
    }
</style>
    <!-- start banner area -->

    <!-- end banner area -->
    <!-- start account area -->
    <section class="cart-page cart-detail" style="min-height:80vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">image</th>
                                        <th scope="col">food name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">total</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($item as $cart)
                                        <input type="hidden" name="restaurant_id" value="{{ $cart->restaurant_id }}">

                                        <tr>
                                            <th scope="row" class="pro-img">
                                                <a href="shop-4-column-sidebar.html">
                                                    @if (isset($cart->attributeType))
                                                        <img width="130px" height="50px"
                                                            src="{{ asset('owner/food/attribute/' . $cart->image) }}"
                                                            alt="food Image" />
                                                    @else
                                                        <img width="130px" height="50px"
                                                            src="{{ asset('owner/food/' . $cart->image) }}"
                                                            alt="food Image" />
                                                    @endif
                                                </a>
                                            </th>
                                            <td class="pro-name">
                                                <input type="hidden" name="food_id" value="{{ $cart->food->id }}">
                                                <a href="">{{ $cart->food->food_name }}</a>
                                                @if (isset($cart->attributeType))
                                                    <p>{{ $cart->attributeType->attribute_type }}:
                                                        {{ $cart->attributeValue->attribute }}</p>
                                                @endif
                                            </td>
                                            <td class="pro-price">
                                                <input type="hidden" value="{{ number_format($cart->price) }}" name="price1">
                                                <p>{{ number_format($cart->price) }}</p>
                                            </td>

                                            <td class="pro-quantity">
                                                <div class="d-flex number-spinner justify-content-center">
                                                    <input type="number" name="quantity[]"
                                                        class="form-control text-center input-value"
                                                        value="{{ $cart->quantity }}">
                                                    <div class="buttons">
                                                        <button data-dir="up" class="up-btn"><i
                                                                class="flaticon-plus"></i></button>
                                                        <button data-dir="dwn" class="down-btn"><i
                                                                class="flaticon-remove"></i></button>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="pro-total">
                                                <p>{{ number_format($cart->sub_total) }}</p>
                                            </td>
                                            <td class="pro-delete">
                                                <a href="{{ route('item.delete', $cart->id) }}">
                                                    <i class="flaticon-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No Item Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <section class="cart-page cart-total mt-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <div class="total-content">
                                            <div class="title text-center">
                                                <h5>cart total</h5>
                                            </div>
                                            <div class="sub d-flex justify-content-between">
                                                <p>Subtotal:</p>
                                                <input type="hidden" value="{{ number_format($subTotal) }}" name="total">
                                                <p>{{ number_format($subTotal) }}</p>
                                            </div>
                                            <!-- Add the email field -->
                                            <div class="form-group mt-2">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    required>
                                            </div>

                                            <!-- Add the mobile field -->
                                            <div class="form-group mt-2">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" name="mobile" id="mobile" class="form-control"
                                                    required>
                                            </div>

                                            <!-- Add the address field -->
                                            <div class="form-group mt-2">
                                                <label for="address">Address</label>
                                                <textarea name="address" id="address" class="form-control" required></textarea>
                                            </div>

                                            <!-- Add the full name field -->
                                            <div class="form-group mt-2">
                                                <label for="full_name">Full Name</label>
                                                <input type="text" name="full_name" id="full_name" class="form-control"
                                                    required>
                                            </div>
                                            <button type="submit" class="button-style1 w-100 mt-2">confirm order <span class="btn-dot"></span></button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end account area -->

    <!-- start cart-total area -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const upButtons = document.querySelectorAll(".up-btn");
            const downButtons = document.querySelectorAll(".down-btn");

            // Function to handle the quantity update
            function updateQuantity(element, increment) {
                const input = element.closest(".number-spinner").querySelector(".input-value");
                let quantity = parseInt(input.value);
                quantity += increment;
                if (quantity < 1) {
                    quantity = 1;
                }
                input.value = quantity;

                // Get the form and data
                const form = element.closest("form");
                const url = form.getAttribute("action");
                const data = new FormData(form);

                // Send the AJAX request
                fetch(url, {
                        method: "PUT",
                        body: data
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response if needed
                        console.log(data);
                    })
                    .catch(error => {
                        // Handle any errors
                        console.error(error);
                    });
            }

            // Event listener for up buttons
            upButtons.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    updateQuantity(this, 1);
                });
            });

            // Event listener for down buttons
            downButtons.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    updateQuantity(this, -1);
                });
            });
        });
    </script>
@endsection
