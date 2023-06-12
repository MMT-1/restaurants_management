@extends('front.layout.master')

@section('title') Cart Item @endsection

@section('content')
<!-- start banner area -->

<!-- end banner area -->
<!-- start account area -->
<section class="cart-page cart-detail" style="min-height:80vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="restaurant_id" value="{{ $restaurantId }}"> --}}
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
                                <tr>
                                    <th scope="row" class="pro-img">
                                        <a href="shop-4-column-sidebar.html">
                                            @if(isset($cart->attributeType))
                                            <img width="130px" height="50px" src="{{asset('owner/food/attribute/'.$cart->image)}}" alt="food Image" />
                                            @else
                                            <img width="130px" height="50px" src="{{asset('owner/food/'.$cart->image)}}" alt="food Image" />
                                            @endif
                                        </a>
                                    </th>
                                    <td class="pro-name">
                                        <a href="">{{ $cart->food->food_name }}</a>
                                        @if(isset($cart->attributeType))
                                        <p>{{ $cart->attributeType->attribute_type }}: {{ $cart->attributeValue->attribute }}</p>
                                        @endif
                                    </td>
                                    <td class="pro-price">
                                        <p>{{ number_format($cart->price) }}</p>
                                    </td>
                                    <td class="pro-quantity">
                                        <div class="d-flex number-spinner justify-content-center">
                                            <input type="text" name="quantity[]" class="form-control text-center input-value" value="{{ $cart->quantity }}">
                                            <div class="buttons">
                                                <button data-dir="up" class="up-btn"><i class="flaticon-plus"></i></button>
                                                <button data-dir="dwn" class="down-btn"><i class="flaticon-remove"></i></button>
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
                    <div class="coupon-area d-flex justify-content-between">
                        <div class="coupon-input">
                            <input type="text" placeholder="coupon code" class="inputs">
                            <button class="button-style1">apply coupon <span class="btn-dot"></span></button>
                        </div>
                        <button type="submit" class="button-style1">confirm order <span class="btn-dot"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end account area -->

<!-- start cart-total area -->
<section class="cart-page cart-total">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="total-content">
                    <div class="title text-center">
                        <h5>cart total</h5>
                    </div>
                    <div class="sub d-flex justify-content-between">
                        <p>Subtotal:</p>
                        <p>{{ number_format($subTotal) }}</p>
                    </div>
                    <!-- Add any other relevant order totals here -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
