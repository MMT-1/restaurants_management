@extends('owner.layout.master')


@section('title') Edit owner @endsection

@section('content')
<!-- <form method="POST" action="{{ route('owner.ownerProfile.update') }}">
    @csrf
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $owner->first_name }}" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $owner->last_name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $owner->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
</form> -->


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Edit owner</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3 ">
                  <div class="card-body">
                    <form action="{{ route('owner.ownerProfile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-9 col-xl-9">
                                <div class="card mb-3 border border-dark rounded">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> Profile details</h3>
                                     </div>
                                      <div class="card-body ">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name (required)</label>
                                                        <input class="form-control" name="first_name" type="text" value="{{$owner->first_name}}" placeholder="First Name" />
                                                         @if($errors->has('first_name'))
                                                            <span class="text-danger"> {{$errors->first('first_name')}}</span>
                                                         @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                         <label>Last Name (required)</label>
                                                         <input class="form-control" name="last_name" type="text" value="{{$owner->last_name}}" placeholder="Last Name" />
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
                                                        <input class="form-control" name="email" type="email" value="{{$owner->email}}" placeholder="Email" />
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
                                               
<!--     
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Select city:</label>
                                                        <select class="form-control" name="city">
                                                                <option value="1">Argentina</option>
                                                                <option value="2">Australia</option>
                                                        </select>
                                                    </div>
                                                </div> -->

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Gender:</label>
                                                        <select class="form-control" name="gender">
                                                               @if($owner->gender==1)
                                                                <option value="1" selected>Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Other</option>
                                                                @elseif($owner->gender==2)
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
                                            </div>

                                            <!-- <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Zip:</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="zip_code" type="text" value="{{$owner->zip_code}}"  placeholder="Zip Code" />
                                                        </div>
                                                   </div>
                                                </div>

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
                                            </div> -->
    
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Mobile (required):</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="mobile" type="text" value="{{$owner->mobile}}" placeholder="Mobile" />
                                                            @if($errors->has('mobile'))
                                                            <span class="text-danger"> {{$errors->first('mobile')}}</span>
                                                            @endif
                                                        </div>
                                                   </div>
                                                </div>

                                                <input type="hidden" name="status" value="{{$owner->status}}">
    
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address" placeholder="Enter Address">{{$owner->address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>  
                                       </div>
                                  </div>
                                <!-- end card -->

                                <div class="card mb-3 border border-dark rounded">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> Restaurant details</h3>
                                    </div>


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Restaurant Name (required):</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="restaurant_name" type="text" value="{{optional($owner->restaurants)->restaurant_name}}" placeholder="restaurant Name"  />
                                                        @if($errors->has('restaurant_name'))
                                                            <span class="text-danger"> {{$errors->first('restaurant_name')}}</span>
                                                        @endif
                                                    </div>
                                               </div>
                                            </div>

                                            
                                            <input type="hidden" name="restaurant_status" value="{{optional($owner->restaurants)->status}}">
                                             

                                            <div class="col-lg-12">
                                                
    
                                                <input type="hidden" id="latitude" name="latitude" value="{{optional($owner->restaurants)->latitude}}">
                                                    <input type="hidden" id="longitude" name="longitude" value="{{optional($owner->restaurants)->longitude}}">
                                                    <div class="form-group">
                                                  
                                                    <input type="text" class="form-control" style="position:relative" name="location" id="location" value="{{optional($owner->restaurants)->restaurant_address}}"/>
    
                                                 
                                                    </div>
                                                <div id="map" style="width:100%;height:300px;position:relative  padding-top: 20px;"></div>       
                                        </div>  
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">

                                <div class="card mb-3">
                                    <div class="card-body text-center">    
                                        <div class="row">    
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-info btn-block mt-3 w-100"> <i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- end card-body -->

                                 <div class="card mb-3 border border-dark rounded">
                                    <div class="card-header">
                                        <h3><i class="far fa-file-image"></i> Profile Image</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <img class="mb-2" src="{{asset('owner/profile/'.$owner->image)}}" width="200" height="200" alt="owner profile">
                                        <div class="row">
                                            <div class="col-lg-12">
                                               <input type="file" name="image" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                    <!-- end card-body -->

                                 <div class="card mb-3 border border-dark rounded">
                                    <div class="card-header">
                                        <h3><i class="far fa-file-image"></i> restaurant Logo </h3>
                                    </div>
                                    <div class="card-body text-center">
                                    <img class="mb-2" src="{{asset('owner/restaurant/'.optional($owner->restaurants)->logo)}}" width="200" height="200" alt="owner profile">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="file" name="logo" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                         </div>
                     </form>
                  </div>
             </div>
         </div>
     </div>
 </div>
@endsection 
