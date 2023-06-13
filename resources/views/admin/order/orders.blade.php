{{-- @extends('admin.layout.master')

@section('title') Orders @endsection

@section('content')
    <div class="container">
        <h2>Orders</h2>

        @foreach ($orders as $order)
            <div class="order">
                <h3>Order ID: {{ $order->id }}</h3>
                <p>Restaurant: {{ $order->restaurant->restaurant_name }}</p>
                <p>Email: {{ $order->email }}</p>
                <p>Mobile: {{ $order->mobile }}</p>
                <p>Address: {{ $order->address }}</p>
                <p>Full Name: {{ $order->full_name }}</p>
                <p>total: {{ $order->total }}</p>

                <h4>Food Items:</h4>
                <ul>
                    @foreach ($order->foods as $food)
                        <li>{{ $food->food_name }} (Quantity: {{ $food->pivot->quantity }})</li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        @if ($orders->isEmpty())
            <p>No orders found.</p>
        @endif
    </div>
@endsection --}}

@extends('admin.layout.master')

@section('title') Food List @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Food List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                       @include('admin.include.message')
                       <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                     <th>Restaurant</th>
                                     <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th> 
                                    <th>Full Name</th>
                                    <th>Total</th>
                                    <th>Food</th>
                                    <th>Action</th>
                            
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->restaurant->restaurant_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                            <ul>
                                                @foreach ($order->foods as $food)
                                                    <li>{{ $food->food_name }} (Quantity: {{ $food->pivot->quantity }})</li>
                                                @endforeach
                                            </ul>
                                    </td>
                                    <td><form action="{{ route('order.destroy', $order->id) }}" class="pro-delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="flaticon-delete"></i>
                                        </button>
                                    </form></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                  </div>
             </div>
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    $(function () {
      var table = $('.datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('orders.show') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
               {data: 'email', name: 'email'},
              {data: 'mobile', name: 'mobile'},
              {data: 'address', name: 'address'},
              {data: 'full_name', name: 'full_name'},
              {data: 'total', name: 'total'},
               {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true,
                  responsive: true
              },
          ]
      });
    });
  </script> --}}
@endsection 
