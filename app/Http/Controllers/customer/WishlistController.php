<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Traits\WishlistTrait;
use App\Http\Controllers\Controller;
use App\Models\customer\FoodWishlist;
use App\Models\customer\ProductWishlist;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    //import trait 
    use WishlistTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $list=$this->wishListItem();
       return view('customer.wishlist.wishlist',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->food_id;

        $count=FoodWishlist::where(['user_id'=>auth()->user()->id,'food_id'=>$id])->count();
        if($count>0){
            FoodWishlist::where(['user_id'=>auth()->user()->id,'food_id'=>$id])->delete();
        }
        $store = new FoodWishlist;
        $store->user_id=auth()->user()->id;
        $store->food_id=$id;
        $store->status=1;
        $store->save();
        return back()->with('success','food has been added to wishlist');

    }

    //add to wishlist
    public function addWishlist($id){
        $count=FoodWishlist::where(['user_id'=>auth()->user()->id,'food_id'=>$id])->count();
        if($count>0){
            FoodWishlist::where(['user_id'=>auth()->user()->id,'food_id'=>$id])->delete();
        }
        $store = new FoodWishlist;
        $store->user_id=auth()->user()->id;
        $store->food_id=$id;
        $store->status=1;
        $store->save();
        return back()->with('success','food has been added to wishlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=FoodWishlist::findOrFail($id);
        $delete->delete();
        return back()->with('success','Item has been delete from wishlist');
    }
}
