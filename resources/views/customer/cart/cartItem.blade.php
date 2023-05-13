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
                <form action="#!">
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
                                @forelse($item as $carts)
                                <tr>
                                    <th scope="row" class="pro-img">
                                        <a href="shop-4-column-sidebar.html">
                                            @if(isset($carts->attributeType))
                                              <img width="130px" height="50px" src="{{asset('vendor/product/attribute/'.$carts->image)}}" alt="Product Image"/>
                                              @else 
                                               <img width="130px" height="50px" src="{{asset('vendor/product/'.$carts->image)}}" alt="Product Image"/>
                                            @endif
                                        </a>
                                    </th>
                                    <td class="pro-name">
                                        <a href="shop-4-column-sidebar.html">{{$carts->product->product_name}}</a>
                                        @if(isset($carts->attributeType))
                                        <p>{{$carts->attributeType->attribute_type}}: {{$carts->attributeValue->attribute}}</p>
                                        @endif 
                                    </td>
                                    <td class="pro-price"><p>{{number_format($carts->price)}}</p></td>
                                    <td class="pro-quantity">
                                        <div class="d-flex number-spinner justify-content-center">
                                            <input type="text" class="form-control text-center input-value" value="{{$carts->quantity}}">
                                            <div class="buttons">
                                                <button data-dir="up" class="up-btn"><i class="flaticon-plus"></i></button>
                                                <button data-dir="dwn" class="down-btn"><i class="flaticon-remove"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-total"><p>{{number_format($carts->sub_total)}}</p></td>
                                    <td class="pro-delete">
                                        <a href="{{route('item.delete',$carts->id)}}">
                                            <i class="flaticon-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <p>No Item Found</p>
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="coupon-area d-flex justify-content-between">
                        <div class="coupon-input">
                            <input type="text" placeholder="coupon code" class="inputs">
                            <button class="button-style1">apply coupon <span class="btn-dot"></span></button>
                        </div>
                        <button type="submit" class="button-style1">update cart <span class="btn-dot"></span></button>
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
                        <p>{{number_format($subTotal)}}</p>
                    </div>
                    <div class="checkout">
                        <div class="d-flex justify-content-between">
                            <h5>total</h5>
                            <p>£220.00</p>
                        </div>
                        <a href="checkout.html" class="button-style1">checkout <span class="btn-dot"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



