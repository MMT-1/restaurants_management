<?php

namespace App\Http\Controllers\vendor;

use DataTables;
use App\Models\vendor\Shop;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\vendor\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\vendor\ProductCategory;
use App\Models\vendor\ProductAttribute;

class ShopProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    use CommonTrait;

  public function index(Request $request)
{
    if ($request->ajax()) {
        $vendor = Auth::guard('vendor')->user();
        $shop = $vendor->shop;

        $list = Product::where('vendor_id', $vendor->id)->orderBy('id', 'DESC')->get();

        return Datatables::of($list)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $src = asset('vendor/product/' . $row->image);
                return '<img src="' . $src . '" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status = 'Active';
                } else {
                    $status = 'Inactive';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-primary btn-sm" title="Edit Product" href="' . route('products.edit', $row->id) . '"> <i class="fa fa-edit"></i></a>';
                return $btn;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
    }

    $vendor = Auth::guard('vendor')->user();
    $shop = $vendor->shop;
    $products = Product::where('vendor_id', $vendor->id)->orderBy('id', 'DESC')->get();

    return view('vendor.product.index', compact('products'));
}

    
   


public function create()
{
    $attributeType=$this->activeType();
    $shop=$this->allActiveShop();
    $brand=$this->activeBrand();
    $category=$this->allParentCategory();
    return view('vendor.product.create',compact('attributeType','shop','brand','category'));
}




public function store(ProductValidate $request)
{
     //check if file is upload
     $image_name='';
     if($request->hasFile('image')){
       $image_name = time().'.'.$request->image->getClientOriginalExtension();
       $request->image->move(('vendor/product/'), $image_name);
     } 

     //shop wise vendor
     $vendor=Shop::where('id',$request->shop_id)->first();

    //product information
    $store = new Product;
    $store->product_name=$request->product_name;
    $store->product_slug=Str::slug($request->product_name);
    $store->quantity=$request->quantity;
    $store->alert_quantity=$request->alert_quantity;
    $store->regular_price=$request->regular_price;
    $store->sale_price=$request->sale_price;
    $store->cost_price=$request->cost_price;
    $store->image=$image_name;
    $store->is_featured=$request->is_featured;
    $store->stock_status=$request->stock_status;
    $store->brand_id=$request->brand_id;
    $store->vendor_id=$vendor->vendor_id;
    $store->shop_id=$request->shop_id;
    $store->short_description=$request->short_description;
    $store->long_description=$request->long_description;
    $store->tag=$request->tag;
    $store->save();

    //category information
    for($i=0;$i<count($request->category_id);$i++){
      $category = new ProductCategory;
      $category->product_id = $store->id;
      $category->category_id = $request->category_id[$i];
      $category->created_by = auth()->user()->id;
      $category->status = 1;
      $category->save();
    }

    //attribute information
    if($request->type_id!=''){
    for($i=0;$i<count($request->type_id);$i++){
      $att_image_name='';
      if($request->hasFile('att_image')){
        $att_image_name = time().'.'.$request->att_image[$i]->getClientOriginalExtension();
        $request->att_image[$i]->move(('vendor/product/attribute/'), $att_image_name);
      } 
      $attribute = new ProductAttribute;
      $attribute->product_id = $store->id;
      $attribute->type_id = $request->type_id[$i];
      $attribute->value_id = $request->value_id[$i];
      $attribute->quantity = $request->att_qty[$i];
      $attribute->alert_quantity = $request->att_alert_qty[$i];
      $attribute->regular_price = 0;
      $attribute->sale_price = $request->att_sale_price[$i];
      $attribute->cost_price = 0;
      $attribute->image = $att_image_name;
      $attribute->created_id = 0;
      $attribute->status = 1;
      $attribute->save();
    }
  }



    return redirect()->route('products.index')->with('success','Product has been successfully store');
}




}
