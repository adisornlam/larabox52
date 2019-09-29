@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Content
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Content</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Contents List</h3>
                  <div class="box-tools">
                  <a href="{{url('/admin/contents/create')}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Active</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($contents as $content)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $content->name}}</td>
                      <td>{{ $content->categories->name}}</td>
                    <td>{{$content->active}}</td>
                      <td>
                          <a class="btn btn-info" href="{{ route('admin.contents.show',$content->id) }}">Show</a>
                          <a class="btn btn-primary" href="{{ route('admin.contents.edit',$content->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['admin.contents.destroy', $content->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $contents->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection