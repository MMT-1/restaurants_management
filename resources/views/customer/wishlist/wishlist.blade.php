@extends('front.layout.master')

@section('title') Wishlist @endsection

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
                                    <th scope="col">product name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">add to Cart</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse($list as $key=>$item)
                              <tr>
                                    <th scope="row" class="pro-img">
                                        <a href="shop-4-column-sidebar.html">
                                          <img width="130px" height="50px" src="{{asset('vendor/product/'.$item->product->image)}}">
                                        </a>
                                    </th>
                                    <td class="pro-name">
                                        <a href="shop-4-column-sidebar.html">{{$item->product->product_name}}</a>
                                    </td>
                                    <td class="pro-price"><p>{{number_format($item->product->sale_price)}}</p></td>
                                  
                                    <td class="pro-total"><a href="{{route('add.cart',$item->product->id)}}"><p><i class="flaticon-shopping-cart" style="font-size:20px;color:#000;cursor:pointer"></i></p></a></td>
                                    <td class="pro-delete">
                                    <a href="{{route('item.delete',$item->id)}}">
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
                    
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end account area -->

<!-- start cart-total area -->

@endsection



