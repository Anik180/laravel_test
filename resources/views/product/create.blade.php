@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Product</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Create Product</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- left column -->
         <div class="col-lg-8 offset-lg-2">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Create Product</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form role="form" action="{{route('product.store')}}"  method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Product Name</label>
                           <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Category</label>
                           <select class="form-control" name="category_id" required style="width: 100%;" >
                              <option disabled=""selected="">Select One</option>
                              @foreach($category as $row)
                              <option value="{{$row->id}}">{{$row->category}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Photo</label>
                           <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter photo">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Specification</label>
                           <input type="text" class="form-control" id="specification" name="specification" placeholder="Enter Specification">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Description</label>
                           <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Quantity</label>
                           <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quantity">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Product variant</h3>
                           </div>
                           <!-- /.card-header -->
                           <div id="product_variants">
                           <div class="card-body" id="product_vari_1">
                              <div class="row">
                               
                                 <div class=" col-md-3">
                                    <label>Color</label>
                                    <select class="form-control" id="color_id" name="color_id[]"  style="width: 100%;" >
                                       <option disabled=""selected="">Select One</option>
                                       @foreach($color as $row)
                                       <option value="{{$row->id}}">{{$row->color}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label>Size</label>
                                    <select class="form-control" id="size_id" name="size_id[]"  style="width: 100%;" >
                                       <option disabled=""selected="">Select One</option>
                                       @foreach($size as $row)
                                       <option value="{{$row->id}}">{{$row->size}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label>Gender</label>
                                    <select class="form-control" id="gender_id" name="gender_id[]"  style="width: 100%;" >
                                       <option disabled=""selected="">Select One</option>
                                       @foreach($gender as $row)
                                       <option value="{{$row->id}}">{{$row->gender}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label >Price</label>
                                    <input type="text" class="form-control" id="price" name="price[]" placeholder="Enter Price">
                                 </div>
                              {{-- </div>
                              <div class="row"> --}}
                                 <div class="col-md-3">
                                    <label >Quantity</label>
                                    <input type="text" class="form-control" id="qty" name="qty[]" placeholder="Enter Quantity">
                                 </div>
                              <div class="col-md-3">
                                    <label >Action</label>
                              <td>
                              <button type="button" class="btn btn-block bg-gradient-success" onclick="add_more()">Add</button>
                              </td>
                                 </div>
                              </div>

                           </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>

                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<script type="text/javascript">

   var loop_count=1;
   function add_more(){
      loop_count++;
        var html ='<div class="card-body" id="product_vari_'+loop_count+'"><div class="row">';


        var color_id_html=jQuery('#color_id').html();
        html+='<div class="col-md-3"><label>Color</label><select class="form-control" id="color_id" name="color_id" style="width: 100%;">'+color_id_html+'</select></div>';
        var size_id_html=jQuery('#size_id').html();
        html+='<div class="col-md-3"><label>Size</label><select class="form-control" id="size_id" name="size_id"  style="width: 100%;">'+size_id_html+'</select></div>';
        var gender_id_html=jQuery('#gender_id').html();
        html+='<div class="col-md-3"><label>Gender</label><select class="form-control" id="gender_id" name="gender_id"  style="width: 100%;">'+gender_id_html+'</select></div>';
        html+='<div class="col-md-3"><label >Price</label><input type="text" class="form-control" id="price" name="price" placeholder="Enter Price"></div>';
        html+='<div class="col-md-3"><label >Quantity</label><input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quantity"></div>';
        html+='<div class="col-md-3"><label >Action</label><td><button type="button" class="btn btn-block bg-gradient-danger" onclick=remove_more("'+loop_count+'")>Remove</button></td></div>';
        

        html+='</div></div>';

        jQuery('#product_variants').append(html)

      
   }
     function remove_more(loop_count){
         jQuery('#product_vari_'+loop_count).remove();
        }
</script>
@endsection