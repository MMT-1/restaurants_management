@extends('admin.layout.master')
<style>
    #location {
  position: relative !important;
  top: auto !important;
  left: auto !important;
        margin-bottom:20px !important;
}

</style>
@section('title') Create Customer @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Create Customer</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> Profile details</h3>
                                     </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name (required)</label>
                                                        <input class="form-control" name="first_name" type="text" value="{{old('first_name')}}" placeholder="First Name" />
                                                         @if($errors->has('first_name'))
                                                            <span class="text-danger"> {{$errors->first('first_name')}}</span>
                                                         @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                         <label>Last Name (required)</label>
                                                         <input class="form-control" name="last_name" type="text" value="{{old('last_name')}}" placeholder="Last Name" />
                                                          @if($errors->has('last_name'))
                                                             <span class="text-danger"> {{$errors->first('last_name')}}</span>
                                                          @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Valid Email (required)</label>
                                                        <input class="form-control" name="email" type="email" value="{{old('email')}}" placeholder="Email" />
                                                         @if($errors->has('email'))
                                                           <span class="text-danger"> {{$errors->first('email')}}</span>
                                                         @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Password (required)</label>
                                                        <input class="form-control" name="password" type="password"  placeholder="Password" />
                                                         @if($errors->has('password'))
                                                           <span class="text-danger"> {{$errors->first('password')}}</span>
                                                         @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Gender:</label>
                                                        <select class="form-control" name="gender">
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>   

                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Mobile (required):</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="mobile" type="text" value="{{old('mobile')}}" placeholder="Mobile" />
                                                            @if($errors->has('mobile'))
                                                            <span class="text-danger"> {{$errors->first('mobile')}}</span>
                                                            @endif
                                                        </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Zip code (required):</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="zip_code" type="text" value="{{old('zip_code')}}" placeholder="Zip code" />
                                                            @if($errors->has('zip_code'))
                                                            <span class="text-danger"> {{$errors->first('zip_code')}}</span>
                                                            @endif
                                                        </div>
                                                   </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label>Status:</label>
                                                    <select class="form-control" name="status">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address" placeholder="Enter Address" value="{{old('address')}}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                  </div>
                                <!-- end card -->

                            </div>
                            <!-- end col -->
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">

                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-info btn-block mt-3"> <i class="fa fa-check"></i> Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- end card-body -->

                                 <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="far fa-file-image"></i> Profile Image</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col-lg-12">
                                               <input type="file" name="image" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                    <!-- end card-body -->

                                
                            </div>
                         </div>
                     </form>
                  </div>
             </div>
         </div>
     </div>
 </div>

@endsection 
