<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CartTrait;
use App\Models\customer\ProductCart;
use App\Models\vendor\ProductAttribute;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    //import trait
    use CartTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subTotal=0;
        $item=$this->cartItem();
        $subTotal=$this->cartSubTotal();
        if($item->count()>0){
            return view('customer.cart.cartItem',compact('item','subTotal'));
        }else{
            return view('front.error.cartEmpty');
        }
        
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
        //check product quantity must be greater then 0
        if($request->quantity==0){
          return back()->with('error','Quantity must not be zero');
        }

        $product_id   =$request->product_id;
        $attribute_id =$request->attribute;

        //check product has attribute or not
        $product=ProductAttribute::where('product_id',$product_id)->first();
        if($product->type_id!='' ){

        }
     

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
    public function delete($id){
        $delete=ProductCart::findOrFail($id);
        $delete->delete();
        return back()->with('error','Item has been removed');
    } 
}
