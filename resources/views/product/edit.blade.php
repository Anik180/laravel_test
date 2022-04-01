@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Product</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Edit Product</li>
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
               <h3 class="card-title">Edit Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('product.update',$product->id)}}"  method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="card-body">
<div class="row">
                     <div class="form-group col-md-6">
                        <label >Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Category</label>
                        <select class="form-control" name="category_id" required style="width: 100%;" >
                           <option disabled=""selected="">Select One</option>
                           @foreach($category as $row)
                           <option value="{{$row->id}}" <?php if($row->id==$product->category_id){echo "Selected";}?>>{{$row->category}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label>Specification</label>
                        <input type="text" class="form-control" id="specification" name="specification" value="{{$product->specification}}">
                     </div>
                     <div class="form-group col-md-6">
                        <label >Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter photo">
                     </div>
                     <div class="form-group col-md-6">
                        <label >Old Photo</label>
                        <img src="{{URL::to($product->photo)}}" style="height: 100px;width: 100px;">
                        <input type="hidden" name="oldimage" value="{{$product->photo}}">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label>Quantity</label>
                        <input type="text" class="form-control" id="qty" name="qty" value="{{$product->qty}}">
                     </div>
                  </div>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection