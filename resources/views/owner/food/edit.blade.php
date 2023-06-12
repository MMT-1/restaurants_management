@extends('owner.layout.master')

@section('title') Create food @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Create food</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                       <form method="post" action="{{route('restaurant.foods.update', $food->id)}}" enctype="multipart/form-data">
                         @csrf 
                         @method('PUT')
                         <div class="row">
                           <div class="col-md-9">
                             
                             <div class="form-group">
                              <label>food Name <span class="text-danger">*</span></label>
                               <input type="text" name="food_name" class="form-control" placeholder="food Name" value="{{ $food->food_name }}"/>
                               @if($errors->has('food_name'))
                               <span class="text-danger"> {{$errors->first('food_name')}}</span>
                               @endif
                             </div>

                             <div class="form-group">
                              <label>food Description <span class="text-danger">*</span></label>
                               <textarea class="form-control" cols="5" rows="5" name="long_description" placeholder="food Description">{{ $food->long_description }}</textarea>
                               @if($errors->has('long_description'))
                               <span class="text-danger"> {{$errors->first('long_description')}}</span>
                               @endif
                             </div>

                             <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Inventory</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Shipping</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Attribute</a>
                                    <a class="nav-link" id="v-pills-tag-tab" data-toggle="pill" href="#v-pills-tag" role="tab" aria-controls="v-pills-tag" aria-selected="false">Seo</a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                     <h4>General Information</h4>

                                       <div class="form-group">
                                        <label>Regular Price</label>
                                        <input type="text" name="regular_price" class="form-control" placeholder="Regular Price" value="{{ $food->regular_price }}"/>
                                       </div>

                                       <div class="form-group">
                                        <label>Sell Price</label>
                                        <input type="text" name="sale_price"  class="form-control" placeholder="Sell Price" value="{{ $food->sale_price }}"/>
                                       </div>

                                       <div class="form-group">
                                        <label>Cost Price</label>
                                        <input type="text" name="cost_price"  class="form-control" placeholder="Cost Price" value="{{ $food->cost_price }}"/>
                                       </div>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <h4>Stock Information</h4>
                                        <div class="form-group">
                                            <label for="stock_status">Stock Status</label>
                                            <select class="form-control" id="stock_status" name="stock_status">
                                                <option value="1" {{ $food->stock_status == 1 ? 'selected' : '' }}>In Stock</option>
                                                <option value="0" {{ $food->stock_status == 0 ? 'selected' : '' }}>Out of Stock</option>
                                            </select>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="quantity">Stock Quantity</label>
                                            <input type="text" name="quantity" value="{{ $food->quantity }}" class="form-control" placeholder="Stock Quantity">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alert_quantity">Alert Quantity</label>
                                            <input type="text" name="alert_quantity" value="{{ $food->alert_quantity }}" class="form-control" placeholder="Alert Quantity">
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                      <h4>Shipping Information</h4>
                                       <div class="form-group">
                                        <label>Shipping</label>
                                        <input type="text" name="dimension" class="form-control" placeholder="Shipping"/>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <h4>Attribute Information</h4>
                                     <div class="form-group">
                                        <label>Select Type</label>
                                        <select class="form-control" name="" id="attribute_type">
                                          <option value="">Select</option>
                                           @foreach($attributeType as $types)
                                             <option myselect="{{$types->attribute_type}}" value="{{$types->id}}">{{$types->attribute_type}}</option>
                                           @endforeach 
                                        </select>
                                     </div>

                                     <div class="form-group">
                                        <label>Value</label>
                                        <select class="form-control" name="" id="att_value">
                                          <option value="">Select Type First</option>
                                        </select>
                                     </div>

                                     <button type="button" class="btn btn-success" id="add_att"><i class="fa fa-plus"></i> Add</button>
                                     <div class="table-responsive">
                                     <table class="table table-bordered mt-3" id="att_table" style="display:none">
                                       <tr>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>Qty</th>
                                            <th>Alert Qty</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                       </tr>
                                     </table>
                                     </div>
                                     
                                    </div>



                                    <div class="tab-pane fade show" id="v-pills-tag" role="tabpanel" aria-labelledby="v-pills-tag-tab">
                                      <h4>Seo Information</h4>
 
                                        <div class="form-group">
                                         <label>Tag</label>
                                         <input type="text" name="tag" value="" class="form-control" placeholder="Enter Tag comma seperate"/>
                                        </div>

 
                                     </div>


                                    </div>
                                </div>
                             </div>
                             <div class="form-group mt-3">
                              <label>Short Description <span class="text-danger">*</span></label>
                               <textarea class="form-control" cols="5" rows="5" name="short_description" placeholder="food Short Description">{{ $food->short_description }}</textarea>
                               @if($errors->has('short_description'))
                               <span class="text-danger"> {{$errors->first('short_description')}}</span>
                               @endif
                             </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">

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
                                        <h3><i class="fas fa-star"></i> Featured food?</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="radio" id="f1" name="is_featured" value="1" {{ $food->is_featured == 1 ? 'checked' : '' }}>
                                                <label for="f1"> Yes</label><br>
                                                <input type="radio" id="f2" name="is_featured" value="0" {{ $food->is_featured == 0 ? 'checked' : '' }}>
                                                <label for="f2"> No</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-certificate"></i> Select Category <span class="text-danger">*</span></h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row">
                                            @if($errors->has('category_id'))
                                                <span class="text-danger"> {{$errors->first('category_id')}}</span>
                                            @endif
                                            <div class="col-lg-12" style="height: 200px; overflow-y: scroll;">
                                                @foreach($category as $categorys)
                                                    <input type="checkbox" id="{{$categorys->id}}" name="category_id[]" value="{{$categorys->id}}" {{ $food->categories && in_array($categorys->id, $food->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                    <label for="{{$categorys->id}}"> {{$categorys->category_name}}</label><br>
                                                    @foreach($categorys->subCategory as $child)
                                                        <input class="ml-4" type="checkbox" id="{{$child->id}}" name="category_id[]" value="{{$child->id}}" {{ $food->categories && in_array($child->id, $food->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                        <label for="{{$child->id}}"> {{$child->category_name}}</label><br>
                                                    @endforeach 
                                                @endforeach 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                

                              <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fab fa-bandcamp"></i> Select restaurant <span class="text-danger">*</span></h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select class="form-control" name="restaurant_id">
                                                @foreach($restaurant as $restaurants)
                                                    <option value="{{$restaurants->id}}" {{ $restaurants->id == $food->restaurant_id ? 'selected' : '' }}>{{$restaurants->restaurant_name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            

                              <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> food Image <span class="text-danger">*</span></h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="{{ asset('owner/food/' . $food->image) }}" alt="Current Image" style="width: 200px;">
                                          <input type="file" name="image" class="form-control" accept="image/*">
                                          @if($errors->has('image'))
                                          <span class="text-danger"> {{$errors->first('image')}}</span>
                                          @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- end card-body -->

                             <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> food Gallery </h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>                                
                             </div>
                             
                           </div>
                         </div>
                      </div>
                  </div>
             </div>
        </div>
    </div>
</div>
<script>
// attribute value ajax request
 $("#attribute_type").change(function(){
    let id=$("#attribute_type").val(); 
    $.ajax({
               type:'GET',
               url:'{{url('att/value/')}}'+'/'+id,
               success:function(response) {
                var schema_one = '';
                $.each(response, function(i, item) {
                    schema_one += '<option value="' + item.id + '">' + item.attribute + '</option>';
                });
                $('#att_value').html(schema_one);
               },error:function(response){
                 console.log(response);
               }
            });
      });

 //attribute add click function
 $("#add_att").click(function(){
    let att_type = $("#attribute_type").val();
    if(att_type===''){
      alert('Select type first');
      return false;
    }
    let types = $("#attribute_type :selected").text();
    let types_val = $("#attribute_type :selected").val();
    let values = $("#att_value :selected").text();
    let values_val = $("#att_value :selected").val();
    $("#att_table").append('<tr> <td><input type="hidden" name="type_id[]" value="'+types_val+'">'+types+'</td> <td><input type="hidden" name="value_id[]" value="'+values_val+'">'+values+'</td> <td><input type="number" name="att_qty[]" style="width:70px"></td> <td><input type="number" name="att_alert_qty[]" style="width:70px"></td> <td><input type="number" name="att_sale_price[]" style="width:70px"></td> <td><input type="file" name="att_image[]"></td> <td>Delete</td> </tr>');
    $("#att_table").show();
 });
</script>
@endsection 
