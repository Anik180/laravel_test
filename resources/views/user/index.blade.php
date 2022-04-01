@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- datatable -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All User</h3>
              <a href="{{route('user.create')}}" type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
                    <i class="fas fa-plus-circle"></i>Add New
              </a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>email</th>
                  <th>Date Of Birth</th>
                  <th>city</th>
                  <th>Country</th>
                  <th>status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                	@foreach($user as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->date_of_birth}}</td>
                  <td>{{$row->city}}</td>
                  <td>{{$row->Country}}</td>
   
                  @if($row->status == 1)
                  <td class="badge bg-green">Active</td>
                  @else
                  <td class="badge bg-red">Inactive</td>
                  @endif
 
                  <td><a href="{{route('user.edit',$row->id)}}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                    <div class="btn-group">
                          <form method="post" action="{{route('user.destroy',$row->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                      </div>
                  </td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>email</th>
                  <th>Date Of Birth</th>
                  <th>city</th>
                  <th>Country</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    @endsection