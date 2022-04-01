<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->select('products.*','categories.category')
            ->get();
       return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->select('products.*','categories.category')
            ->get();
        $category = DB::table('categories')->get();
        $size = DB::table('sizes')->get();
        $color = DB::table('colors')->get();
        $gender = DB::table('genders')->get();
       return view('product.create',compact('product','category','size','color','gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           $data=array();
           $data['category_id']=$request->category_id;
           $data['specification']=$request->specification;
           $data['product_name']=$request->product_name;
           $data['photo']=$request->photo;
           $data['description']=$request->description;
           $data['qty']=$request->qty;
        

           $image=$request->photo;
           if($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('product_photo/'.$image_name);
            $data['photo']='product_photo/'.$image_name;
            DB::table('products')->insert($data);
            return Redirect()->back()->with('alert', 'Successfully Create Product!');
           }else{
            return Redirect()->back();
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

        $product=DB::table("products")->where('id',$id)->first();
        $category=DB::table('categories')->get();
       return view('product.edit',compact('product','category'));
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
       
           $data=array();
           $data['category_id']=$request->category_id;
           $data['specification']=$request->specification;
           $data['product_name']=$request->product_name;
           $data['photo']=$request->photo;
           $data['description']=$request->description;
           $data['qty']=$request->qty;
         
           $oldimage=$request->oldimage;
           $image=$request->photo;
           if($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('product_photo/'.$image_name);
            $data['photo']='product_photo/'.$image_name;
            DB::table('products')->where('id',$id)->update($data);
            unlink($oldimage);
            return Redirect()->route('product.index')->with('alert', 'Successfully Update Product!');
           }
            $data['photo']=$oldimage;
             DB::table('products')->where('id',$id)->update($data);
            return Redirect()->route('product.index')->with('alert', 'Successfully Update Product!');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $product=DB::table("products")->where('id',$id)->first();
           unlink($product->photo);
           DB::table("products")->where('id',$id)->delete();
           return Redirect()->back()->with('alert', 'Successfully Delete');
    }
}
