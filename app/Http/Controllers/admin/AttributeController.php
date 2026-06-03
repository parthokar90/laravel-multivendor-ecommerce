<?php
  
namespace App\Http\Controllers\admin;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\CommonTrait;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeValue;
use DataTables;
  
class AttributeController extends Controller
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
        $list = Attribute::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

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
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit" href="'.route('attributes.edit',$row->id).'"> <i class="fa fa-edit"></i></a>';
                     return $btn;
                   })

                   ->rawColumns(['status','action'])
                   ->make(true);
              }
            return view('admin.attribute.index');
       }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $this->activeType();
        return view('admin.attribute.create',compact('type'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->attributes_type=='attributes_type'){


            $this->validate($request,[
                'attribute_type' => ['required', '', '', '', 'unique:attributes'],
            ]);

            $store = new Attribute;  

            $store->attribute_type=$request->attribute_type;

            $store->attribute_default=0;

            $store->created_by=auth()->user()->id;

            $store->status=$request->status;  

            $store->save();

            return redirect()->back()
            ->with('success','Attribute type created successfully.');
         }else{
            $this->validate($request,[
                'type' => 'required',
                'value' => 'required',
            ]);
            //check selected type has duplicate value
            $count=AttributeValue::where('type_id',$request->type)->where('attribute',$request->value)->count();
            if($count>0){
                return redirect()->back()
                ->with('value-error','Please enter unique value name for this type.');
            }
            $store = new AttributeValue;  

            $store->type_id=$request->type;

            $store->attribute=$request->value;

            $store->created_by=auth()->user()->id;

            $store->status=$request->status;  

            $store->save();

            return redirect()->back()
            ->with('success','Attribute created successfully.');
         }
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    { 
        return view('admin.attribute.edit',compact('attribute'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Attribute $attribute)
    {
            $this->validate($request, [
                "attribute_type" => 'required|unique:attributes,attribute_type,'.$attribute->id
            ]);
            
            $attribute->attribute_type=$request->attribute_type;

            $attribute->attribute_default=0;

            $attribute->created_by=auth()->user()->id;

            $attribute->status=$request->status;  

            $attribute->save();

            return redirect()->back()
            ->with('success','Type has been update successfully.');  
    }

    //attribute value update
    public function attributeValue(Request $request,$id){
      $this->validate($request, [
            "attribute" => 'required'
      ]);
      $update = attributeValue::findOrFail($id);

      $update->attribute=$request->attribute;

      $update->status=$request->status;

      $update->created_by=auth()->user()->id;

      $update->save();

      return redirect()->back()
      ->with('success','Value has been update successfully.');  
    }
}