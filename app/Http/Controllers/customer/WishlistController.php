<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\ProductWishlist;
use App\Traits\WishlistTrait;

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
        $count=ProductWishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$id])->count();
        if($count>0){
            ProductWishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$id])->delete();
        }
        $store = new ProductWishlist;
        $store->user_id=auth()->user()->id;
        $store->product_id=$id;
        $store->status=1;
        $store->save();
        return back()->with('success','Product has been added to wishlist');

    }

    //add to wishlist
    public function addWishlist($id){
        $count=ProductWishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$id])->count();
        if($count>0){
            ProductWishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$id])->delete();
        }
        $store = new ProductWishlist;
        $store->user_id=auth()->user()->id;
        $store->product_id=$id;
        $store->status=1;
        $store->save();
        return back()->with('success','Product has been added to wishlist');
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
        $delete=ProductWishlist::findOrFail($id);
        $delete->delete();
        return back()->with('success','Item has been delete from wishlist');
    }
}
