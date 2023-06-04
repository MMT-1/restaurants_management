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
use App\Http\Requests\admin\ProductValidate;

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
                $btn = '<a class="btn btn-primary btn-sm" title="Edit Product" href="' . route('shop.products.edit', $row->id) . '"> <i class="fa fa-edit"></i></a>';
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

    
   

public function ActiveShop()
{
    $vendor = Auth::guard('vendor')->user();
    $shops = Shop::where('vendor_id', $vendor->id)->where('status', 1)->get();
    return $shops;
}


public function create()
{
    $attributeType = $this->activeType();
    $shops = $this->ActiveShop();
    $brand = $this->activeBrand();
    $category = $this->allParentCategory();
    return view('vendor.product.create', compact('attributeType', 'shops', 'brand', 'category'));
}




public function store(ProductValidate $request)
{
    // Check if file is uploaded
    $image_name = '';
    if ($request->hasFile('image')) {
        $image_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(('vendor/product/'), $image_name);
    }

    // Get the vendor
    $vendor = Auth::guard('vendor')->user();

    // Create the product
    $product = new Product;
    $product->product_name = $request->product_name;
    $product->product_slug = Str::slug($request->product_name);
    $product->quantity = $request->quantity;
    $product->alert_quantity = $request->alert_quantity;
    $product->regular_price = $request->regular_price;
    $product->sale_price = $request->sale_price;
    $product->cost_price = $request->cost_price;
    $product->image = $image_name;
    $product->is_featured = $request->is_featured;
    $product->stock_status = $request->stock_status;
    $product->brand_id = $request->brand_id;
    $product->vendor_id = $vendor->id;
    $product->shop_id = $request->shop_id;
    $product->short_description = $request->short_description;
    $product->long_description = $request->long_description;
    $product->tag = $request->tag;
    $product->save();


    return redirect()->route('shop.products')->with('success', 'Product has been successfully stored');
}




public function allActiveShopByVendor($vendorId)
{
    return Shop::where('vendor_id', $vendorId)->get();
}

public function edit($id)
{
  $vendorId = auth()->user()->id;
  $product = Product::where('vendor_id', $vendorId)->findOrFail($id);    
  $attributeType = $this->activeType();
  $shop = $this->allActiveShopByVendor(auth()->user()->id); // Get shops belonging to the authenticated vendor
  $brand = $this->activeBrand();
    $category = $this->allParentCategory();

    return view('vendor.product.edit', compact('product', 'attributeType', 'shop', 'brand', 'category'));
}



public function update(Request $request, $id)
{
    // Find the product to be updated
    $vendorId = auth()->user()->id;
    $product = Product::where('vendor_id', $vendorId)->findOrFail($id);   
    // Update the product fields
    $product->product_name = $request->input('product_name');
    $product->product_slug = Str::slug($request->input('product_name'));
    $product->quantity = $request->input('quantity');
    $product->alert_quantity = $request->input('alert_quantity');
    $product->regular_price = $request->input('regular_price');
    $product->sale_price = $request->input('sale_price');
    $product->cost_price = $request->input('cost_price');
    $product->is_featured = $request->input('is_featured');
    $product->stock_status = $request->input('stock_status');
    $product->brand_id = $request->input('brand_id');
    $product->shop_id = $request->input('shop_id');
    $product->short_description = $request->input('short_description');
    $product->long_description = $request->input('long_description');
    $product->tag = $request->input('tag');

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Delete the old image file
        if ($product->image) {
            $oldImagePath = public_path('vendor/product/'.$product->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload and save the new image file
        $image_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('vendor/product/'), $image_name);
        $product->image = $image_name;
    }

    // Save the updated product
    $product->save();

    // Update the categories for the product
    if ($request->has('category_id')) {
        $categories = [];
        foreach ($request->input('category_id') as $categoryId) {
            $categories[] = new ProductCategory([
                'category_id' => $categoryId,
                'created_by' => auth()->user()->id,
                'status' => 1
            ]);
        }

        $product->category()->delete();
        $product->category()->saveMany($categories);
    } else {
        $product->category()->delete();
    }

    return redirect()->route('shop.products')->with('success', 'Product has been successfully updated.');
}



}



