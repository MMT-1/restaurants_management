<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--==== favicon css ====-->
     <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.png')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- owner css files -->
    
    <!--==== bootstrap css ====-->
    
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

    <!--==== fontawesome css ====-->

    <!--==== flaticon css ====-->


    <!--==== slider css ====-->

    <!--==== venobox css ====-->

    <!--==== scroll animation css ====-->

    <!--==== range slider css ====-->

    <!--==== style css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">

    <!--==== responsive css ====-->
    <link rel="stylesheet" href="{{asset('front/login/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/login/fonts/icomoon/style.css')}}">

  
</head>

@section('title') Customer Login @endsection

   <!-- start banner area -->

<!-- end banner area -->

<!-- start account area -->

@section('title') Customer Login @endsection

<div class="d-lg-flex half">
  <div class="bg order-1 order-md-2" style="background-image: url('{{asset('front/assets/images/1682747491.jpg')}}');"></div>
  <div class="contents order-2 order-md-1">

    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6">
          <h3>Sign Up to <strong>Website</strong></h3>
          <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
         
        <form action="{{route('customer.registration.process')}}" method="post">
          @csrf 
          <div class="form-group first">
              <label for="username">First Name</label>
              <input  class="form-control" id="username" type="text" value="{{old('first_name')}}" name="first_name" placeholder="First Name *">
              @if($errors->has('first_name'))
                <span class="text-danger"> {{$errors->first('first_name')}}</span>
             @endif
            </div>

            <div class="form-group last mb-3 mt-3">
              <label for="last_name">Last Name</label>
              <input  class="form-control"  type="text" name="last_name" value="{{old('last_name')}}"  placeholder="Last Name *" id="last_name">
              @if($errors->has('last_name'))
                         <span class="text-danger"> {{$errors->first('last_name')}}</span>
                         @endif
            </div>

            <div class="form-group last mb-3 mt-3">
              <label for="email">Email</label>
              <input  class="form-control"  type="email" name="email" placeholder="e-mail address *"  value="{{old('email')}}" id="email">
              @if($errors->has('email'))
                          <span class="text-danger"> {{$errors->first('email')}}</span>
                         @endif
            </div>
            
            <div class="form-group last mb-3 mt-3">
                <label for="password">Password</label>
                <input  class="form-control"   type="password" name="password" placeholder="password *" id="password">
                @if($errors->has('password'))
                          <span class="text-danger"> {{$errors->first('password')}}</span>
                         @endif
              </div>

            <div class="form-group last mb-3 mt-3">
                <label for="mobile">Mobile</label>
                <input  class="form-control"   type="text" name="mobile" placeholder="Mobile No *" id="mobile">
                @if($errors->has('mobile'))
                <span class="text-danger"> {{$errors->first('mobile')}}</span>
                @endif
              </div>


            <div class="d-flex mb-3 align-items-center">
              <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                <input type="checkbox" checked="checked"/>
                <div class="control__indicator"></div>
              </label>
              <span class="ms-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
            </div>

            <input type="submit" value="Sign Up" class="btn btn-block btn-primary w-100 btn-color">

             
<div class="text-center mt-3">
<span >Have an Account? <a href="{{route('customer.login')}}">Login</a> </span>

</div>

          </form>
        </div>
      </div>
    </div>
  </div>

  
</div>
  
<!-- end account area -->
