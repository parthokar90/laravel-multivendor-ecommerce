<?php
  
namespace App\Http\Controllers\admin;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\CategoryValidate;
use Illuminate\Support\Str;
use App\Traits\CommonTrait;
use App\Models\admin\Category;
use DataTables;
  
class CategoryController extends Controller
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
        $list = Category::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                 //for image
                 ->addColumn('image', function($row){
                    $src=asset('admin/category/'.$row->image);
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
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit Category" href="'.route('categories.edit',$row->id).'"> <i class="fa fa-edit"></i></a>';
                     return $btn;
                   })

                   ->rawColumns(['image','status','action'])

                   ->make(true);
              }
            return view('admin.category.index');
     }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = $this->activeCategory();
        return view('admin.category.create',compact('categorys'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidate $request)
    {
          //check if file is upload
          $image_name='';
          if($request->hasFile('image')){
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('admin/category/'), $image_name);
          } 
  
          $store = new Category;  

          $store->parent_id=$request->parent_id;

          $store->category_name=$request->category_name;

          $store->category_type=$request->category_type;

          $store->slug=Str::slug($request->category_name);

          $store->image=$image_name;

          $store->created_by=auth()->user()->id;

          $store->status=$request->status;  

          $store->save();

          return redirect()->route('categories.index')
          ->with('success','Category created successfully.');
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categorys = $this->activeCategory();
        return view('admin.category.edit',compact('categorys','category'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidate $request,Category $category)
    {
         //check if file is upload
         if($request->hasFile('image')){
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('admin/category/'), $image_name);
          }else{
            $image_name = $category->image;
          }

          $category->parent_id=$request->parent_id;

          $category->category_name=$request->category_name;

          $category->category_type=$request->category_type;

          $category->slug=Str::slug($request->category_name);

          $category->image=$image_name;

          $category->created_by=auth()->user()->id;

          $category->status=$request->status;  

          $category->save();

          return redirect()->route('categories.index')
          ->with('success','Category update successfully.');    
    }
}