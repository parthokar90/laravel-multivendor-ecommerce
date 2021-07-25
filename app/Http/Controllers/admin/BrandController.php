<?php
  
namespace App\Http\Controllers\admin;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\BrandValidate;
use Illuminate\Support\Str;
use App\Traits\CommonTrait;
use App\Models\admin\Brand;
use DataTables;
  
class BrandController extends Controller
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
        $list = Brand::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                 //for image
                 ->addColumn('image', function($row){
                    $src=asset('admin/brand/'.$row->image);
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
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit Brand" href="'.route('brands.edit',$row->id).'"> <i class="fa fa-edit"></i></a>';
                     return $btn;
                   })

                   ->rawColumns(['image','status','action'])

                   ->make(true);
              }
            return view('admin.brand.index');
     }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandValidate $request)
    {
          //check if file is upload
          $image_name='';
          if($request->hasFile('image')){
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('admin/brand/'), $image_name);
          } 
  
          $store = new Brand;  

          $store->brand_name=$request->brand_name;

          $store->slug=Str::slug($request->brand_name);

          $store->image=$image_name;

          $store->created_by=auth()->user()->id;

          $store->status=$request->status;  

          $store->save();

          return redirect()->route('brands.index')
          ->with('success','Brand created successfully.');
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(BrandValidate $request,Brand $brand)
    {
         //check if file is upload
         if($request->hasFile('image')){
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('admin/brand/'), $image_name);
          }else{
            $image_name = $brand->image;
          }

          $brand->Brand_name=$request->brand_name;

          $brand->slug=Str::slug($request->brand_name);

          $brand->image=$image_name;

          $brand->created_by=auth()->user()->id;

          $brand->status=$request->status;  

          $brand->save();

          return redirect()->route('brands.index')
          ->with('success','Brand update successfully.');    
    }
}