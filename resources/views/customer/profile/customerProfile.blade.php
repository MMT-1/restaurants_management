@extends('front.layout.master')

@section('title') Profile @endsection

@section('content')
<style>
 

.form-control:focus {
    box-shadow: none;
    border-color: #589442
}

.profile-button {
    background: #589442;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #589442
}

.profile-button:focus {
    background: #589442;
    box-shadow: none
}

.profile-button:active {
    background: #589442;
    box-shadow: none
}

.back:hover {
    color: #589442;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #589442;
    color: #fff;
    cursor: pointer;
    border: solid 1px #589442
}
.rowCon{
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}



.profile-image-container {
        position: relative;
        display: inline-block;
    }

    .select-image-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, 0%);
        color: #fff;
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
    }

    .profile-image-input {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <form method="POST" action="{{ route('customerProfile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row rowCon">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="profile-image-container position-relative">

                <img class="rounded-circle mt-5" width="150px" src="{{ asset('customer/profile/' . $user->image) }}">
                <div class="select-image-overlay">
                    <input type="file" class="profile-image-input" id="profile-image-input" name="image" value="select image">
                    Select Image
                </div>
                </div>
                <span class="font-weight-bold">{{ $user->first_name }} {{ $user->last_name }}</span>
                <span class="text-black-50">{{ $user->email }}</span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Mobile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{ $user->mobile }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $user->address }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Zip Code</label>
                        <input type="text" class="form-control" placeholder="Zip Code" name="zip_code" value="{{ $user->zip_code }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        

                        <label  class="labels">Gender:</label>
                                                        <select class="form-control" name="gender">
                                                            <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Male</option>
                                                            <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Female</option>
                                                            <option value="3" {{ $user->gender == 3 ? 'selected' : '' }}>Other</option>
                                                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Zip Code</label>
                        <input type="text" class="form-control" placeholder="Zip Code" name="zip_code" value="{{ $user->zip_code }}">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    </form>
</div>




@endsection

