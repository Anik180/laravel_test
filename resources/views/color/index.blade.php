@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Color</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Color</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- datatable -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Color</h3>
              <a href="{{route('color.create')}}" type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
                    <i class="fas fa-plus-circle"></i>Add New
              </a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Color</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                	@foreach($color as $row)
                <tr>
                  <td>{{$row->color}}</td>
 
                  <td >
                    <a href="{{route('color.edit',$row->id)}}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>

                    <div class="btn-group">
                          <form method="post" action="{{route('color.destroy',$row->id)}}" >
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                        </div>
                  </td>
            
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Size</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    @endsection