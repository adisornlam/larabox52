@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ข้อมูลข่าวสาร
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li class="active">ข้อมูลข่าวสาร</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">รายการข้อมูลข่าวสาร</h3>
                  <div class="box-tools">
                    <a href="{{url('/admin/news/create')}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>หัวข้อ</th>
                      <th>หมวดหมู่</th>
                      <th>สถานะ</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($news as $content)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $content->name}}</td>
                      <td>{{ $content->categories->name}}</td>
                    <td>{{$content->active}}</td>
                      <td>
                          <a class="btn btn-info" href="{{ route('admin.news.show',$content->id) }}">แสดง</a>
                          <a class="btn btn-primary" href="{{ route('admin.news.edit',$content->id) }}">แก้ไข</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['admin.news.destroy', $content->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $news->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection