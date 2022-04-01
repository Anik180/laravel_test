@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create User</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Create User</li>
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
               <h3 class="card-title">Create User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('user.store')}}"  method="post">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date Of Birth">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Country</label>
                        <input type="text" class="form-control" id="Country" name="Country" placeholder="Enter Country">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <div class="form-check">
                           <input class="form-check-input" type="radio" value="1" name="status" id="flexRadioDefault1">
                           <label class="form-check-label" for="flexRadioDefault1">
                           Active User
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" value="0" name="status" id="flexRadioDefault2" checked>
                           <label class="form-check-label" for="flexRadioDefault2">
                           Inactive User
                           </label>
                        </div>
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