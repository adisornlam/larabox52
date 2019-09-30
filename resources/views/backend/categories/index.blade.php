@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    @if(session()->get('success'))
      <div class="callout callout-success">
          <h4>{{ session()->get('success') }}</h4>
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Category List</h3>
                  <div class="box-tools">
                    <a href="{{url('/admin/category/create')}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $category->name}}</td>
                      <td>
                          <a class="btn btn-info" href="{{ route('admin.category.show',$category->id) }}">Show</a>
                          <a class="btn btn-primary" href="{{ route('admin.category.edit',$category->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['admin.category.destroy', $category->id],'style'=>'display:inline']) !!}
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $categories->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection