@extends('admin.layout.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"
        integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('title') Edit Customer @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Edit Customer</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-9 col-xl-9">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> Profile details</h3>
                                     </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name (required)</label>
                                                        <input class="form-control" name="first_name" type="text" value="{{$customer->first_name}}" placeholder="First Name" />
                                                         @if($errors->has('first_name'))
                                                            <span class="text-danger"> {{$errors->first('first_name')}}</span>
                                                         @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                         <label>Last Name (required)</label>
                                                         <input class="form-control" name="last_name" type="text" value="{{$customer->last_name}}" placeholder="Last Name" />
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
                                                        <input class="form-control" name="email" type="email" value="{{$customer->email}}" placeholder="Email" />
                                                         @if($errors->has('email'))
                                                           <span class="text-danger"> {{$errors->first('email')}}</span>
                                                         @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Password </label>
                                                        <input class="form-control" name="password" type="password"  placeholder="Password" autocomplete="off" value="" />
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
                                                               @if($customer->gender==1)
                                                                <option value="1" selected>Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Other</option>
                                                                @elseif($customer->gender==2)
                                                                <option value="1">Male</option>
                                                                <option value="2" selected>Female</option>
                                                                <option value="3" selected>Other</option>
                                                                @else 
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3" selected>Other</option>
                                                               @endif  
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Zip code (required):</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="zip_code" type="text" value="{{$customer->zip_code}}" placeholder="Zip code" />
                                                            @if($errors->has('zip_code'))
                                                            <span class="text-danger"> {{$errors->first('zip_code')}}</span>
                                                            @endif
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>

                                         
    
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Mobile (required):</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="mobile" type="text" value="{{$customer->mobile}}" placeholder="Mobile" />
                                                            @if($errors->has('mobile'))
                                                            <span class="text-danger"> {{$errors->first('mobile')}}</span>
                                                            @endif
                                                        </div>
                                                   </div>
                                                </div>
                                                

                                                <div class="col-lg-6">
                                                    <label>Status:</label>
                                                    <select class="form-control" name="status">
                                                           @if($customer->status==1)
                                                            <option value="1" selected>Active</option>
                                                            <option value="0">Inactive</option>
                                                            @else 
                                                            <option value="1">Active</option>
                                                            <option value="0" selected>Inactive</option>
                                                           @endif  
                                                    </select>
                                                </div>
    
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address" placeholder="Enter Address">{{$customer->address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>  
                                       </div>
                                  </div>
                                <!-- end card -->

                                
                            </div>
                            <!-- end col -->





                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">

                                <div class="card mb-3">
                                    <div class="card-body text-center">    
                                        <div class="row">    
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-info btn-block mt-3"> <i class="fa fa-check"></i> Update</button>
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
                                        <img class="mb-2" src="{{asset('customer/profile/'.$customer->image)}}" width="200" height="200" alt="customer profile">
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
