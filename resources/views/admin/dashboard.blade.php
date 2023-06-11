@extends('admin.layout.master')

@section('title') Dashboard @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="far fa-user float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Users</h6>
                <h1 class="m-b-20 text-white counter">{{$userCount}}</h1>
                <span class="text-white">12 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-purple">
                <i class="fas fa-home float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Restaurant</h6>
                <h1 class="m-b-20 text-white counter">{{$restaurantcount}}</h1>
                <span class="text-white">12 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fas fa-shopping-cart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Reservation</h6>
                <h1 class="m-b-20 text-white counter">{{$reservationcount}}</h1>
                <span class="text-white">25 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="fas fa-pizza-slice float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Food</h6>
                <h1 class="m-b-20 text-white counter">{{$foodcount}}</h1>
                <span class="text-white">5 New</span>
            </div>
        </div>
    </div>
    <!-- end row -->

     
    <!-- end row -->
    <div class="row">
         

         

        <div class="col-12">
             
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
             
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
                                <form action="{{ route('activity.clear') }}" method="POST" >
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1">Clear</button>
                                </form>
                                <tr>
                                    <th>Sl</th>
                                    <th>Log Name</th>
                                    <th>Description</th>
                                    <th>Timestamp</th>
                                     
                                </tr>
                            </thead>
                        </table>
                    </div>
                  </div>
             </div>
        </div>
    </div>
</div>

            <!-- end card-->
        </div>
    </div>
    <!-- end row-->
</div>
<!-- END container-fluid -->
<script type="text/javascript">
    $(function () {
      var table = $('.datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('activity.logs') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'log_name', name: 'log_name'},
              {data: 'description', name: 'description'},
              {data: 'created_at', name: 'created_at'},
              
             
          ]
      });
    });
  </script>
@endsection 
