@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Edit Category</li>
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
               <h3 class="card-title">Edit Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('category.update',$category->id)}}"  method="post">
               @csrf
               @method('PUT')
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-12">
                        <label >Category Name</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{$category->category}}">
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