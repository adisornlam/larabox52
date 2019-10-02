@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ผู้ใช้งาน
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li class="active">ผู้ใช้งาน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">รายการผู้ใช้งาน</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ชื่อ</th>
                      <th>อีเมล์</th>
                      <th>สิทธิ์การใช้งาน</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $user->name}}</td>
                      <td>{{ $user->email}}</td>
                    <td>{{$user->roles->first()->description}}</td>
                      <td>
                          <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">แสดง</a>
                          <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">แก้ไข</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $users->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection