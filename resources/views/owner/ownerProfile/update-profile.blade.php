@extends('admin.layout.master')

@section('title') Edit owner @endsection

@section('content')
 
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
            <div class="card mb-3">
                  <div class="card-body">
                    <form action="{{route('owner.ownerProfile',$owner->id)}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        {{method_field('PATCH')}}
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
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Select country:</label>
                                                        <select class="form-control" name="country_id">
                                                              @foreach($country as $countrys)
                                                                @php $select=""; @endphp
                                                                 @if($countrys->id==$owner->country_id)
                                                                   @php $select="selected"; @endphp
                                                                 @endif
                                                                <option value="{{$countrys->id}}" {{$select}}>{{$countrys->country_name}}</option>
                                                              @endforeach   
                                                        </select>
                                                    </div>
                                                </div>
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

                                                <div class="col-lg-6">
                                                    <label>Status:</label>
                                                    <select class="form-control" name="status">
                                                           @if($owner->status==1)
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
                                                        <textarea class="form-control" name="address" placeholder="Enter Address">{{$owner->address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>  
                                       </div>
                                  </div>
                                <!-- end card -->

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> restaurant details</h3>
                                    </div>


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>restaurant Name (required):</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="restaurant_name" type="text" value="{{optional($owner->restaurants)->restaurant_name}}" placeholder="restaurant Name"  />
                                                        @if($errors->has('restaurant_name'))
                                                            <span class="text-danger"> {{$errors->first('restaurant_name')}}</span>
                                                        @endif
                                                    </div>
                                               </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <label>Status:</label>
                                                <select class="form-control" name="restaurant_status">
                                                       @if(optional($owner->restaurants)->status==1)
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
                                                    <textarea class="form-control" name="restaurant_address" placeholder="Enter restaurant Address">{{optional($owner->restaurants)->restaurant_address}}</textarea>
                                                </div>
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
                                        <img class="mb-2" src="{{asset('owner/profile/'.$owner->image)}}" width="200" height="200" alt="owner profile">
                                        <div class="row">
                                            <div class="col-lg-12">
                                               <input type="file" name="image" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                    <!-- end card-body -->

                                 <div class="card mb-3">
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
