<?php
  
namespace App\Http\Controllers\admin;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\VendorValidate;
use App\Http\Requests\admin\VendorUpdateValidation;
use App\Models\vendor\Vendor;
use App\Models\vendor\Shop;
use Illuminate\Support\Str;
use App\Traits\CommonTrait;
use DataTables;
  
class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    //import trait
    use CommonTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Vendor::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                  //for image
                  ->addColumn('image', function($row){
                    $src=asset('vendor/profile/'.$row->image);
                    return '<img src="'.$src.'" border="0" width="40" class="img-rounded" align="center" />';
                   })

                  // for status  
                  ->addColumn('status', function($row){
                    if($row->status==1){
                       $status='Active';
                     }else{
                        $status='Inactive';
                     }    
                      return $status;
                    })

                  //for action column
                  ->addColumn('action', function($row){
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit Vendor" href="'.route('vendors.edit',$row->id).'"> <i class="fa fa-edit"></i>Edit Profile</a>';
                     return $btn;
                   })
                   ->rawColumns(['image','status','action'])
                   ->make(true);
              }
            return view('admin.vendor.index');
     }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $country = $this->activeCountry();

      return view('admin.vendor.create',compact('country'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorValidate $request)
    {

            // vendor profile information

            //check if file is upload
            $image_name='';
            if($request->hasFile('image')){
              $image_name = time().'.'.$request->image->getClientOriginalExtension();
              $request->image->move(('vendor/profile/'), $image_name);
            } 

            $store = new Vendor;  

            $store->first_name=$request->first_name;

            $store->last_name=$request->last_name;

            $store->email=$request->email;
      
            $store->password= Hash::make($request->password);

            $store->mobile=$request->mobile;

            $store->image=$image_name;

            $store->address=$request->address;

            $store->country_id=$request->country_id;

            $store->role=2;

            $store->city=$request->city;

            $store->zip_code=$request->zip_code;

            $store->gender=$request->gender;

            $store->created_by=auth()->user()->id;

            $store->status=$request->status;
        
            $store->save();

            //vendor shop information

            //check if file is upload
             $logo_name='';
              if($request->hasFile('image')){
                  $logo_name = time().'.'.$request->logo->getClientOriginalExtension();
                  $request->logo->move(('vendor/shop/'), $logo_name);
             } 

            $shop = new Shop;

            $shop->shop_name=$request->shop_name;

            $shop->logo=$logo_name;

            $shop->shop_slug=Str::slug($request->shop_name);

            $shop->shop_address=$request->shop_address;

            $shop->vendor_id=$store->id;

            $shop->created_by=auth()->user()->id;

            $shop->status=$request->shop_status;

            $shop->save();

            return redirect()->route('vendors.index')
            ->with('success','Vendor created successfully.');
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
       $country = $this->activeCountry();

       return view('admin.vendor.edit',compact('vendor','country'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(VendorUpdateValidation $request,Vendor $vendor)
    {

              //check if file is upload
              $image_name='';
              if($request->hasFile('image')){
                $image_name = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(('vendor/profile/'), $image_name);
              }else{
                $image_name=$vendor->image;
              } 

              if($request->password==''){
                $pass=$vendor->password;
              }else{
                $pass=Hash::make($request->password);
              }

              $vendor->first_name=$request->first_name;

              $vendor->last_name=$request->last_name;

              $vendor->email=$request->email;

              $vendor->password = $pass;

              $vendor->mobile=$request->mobile;

              $vendor->image=$image_name;

              $vendor->address=$request->address;

              $vendor->country_id=$request->country_id;

              $vendor->role=2;

              $vendor->city=$request->city;

              $vendor->zip_code=$request->zip_code;

              $vendor->gender=$request->gender;

              $vendor->created_by=auth()->user()->id;

              $vendor->status=$request->status;
          
              $vendor->save();

              //vendor shop information
              $shop=Shop::where('vendor_id',$vendor->id)->first();

              //check if file is upload
              $logo_name='';
               if($request->hasFile('logo')){
                        $logo_name = time().'.'.$request->logo->getClientOriginalExtension();
                        $request->logo->move(('vendor/shop/'), $logo_name);
               }else{
                 $logo_name= $shop->logo;
               } 

              $shop->shop_name=$request->shop_name;

              $shop->logo=$logo_name;

              $shop->shop_slug=Str::slug($request->shop_name);

              $shop->shop_address=$request->shop_address;

              $shop->vendor_id=$vendor->id;

              $shop->created_by=auth()->user()->id;

              $shop->status=$request->shop_status;

              $shop->save();

              return redirect()->route('vendors.index')
              ->with('success','Vendor updated successfully.');

    }


}