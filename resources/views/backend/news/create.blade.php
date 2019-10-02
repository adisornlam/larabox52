@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มข้อมูลข่าวสาร
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li><a href="/admin/news"><i class="fa fa-dashboard"></i>ข้อมูลข่าวสาร</a></li>
        <li class="active">เพิ่มรายการ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              {{-- <h3 class="box-title">Horizontal Form</h3> --}}
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{route('admin.news.store')}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">หมวดหมู่</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="categories_id" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">หัวข้อ</label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รายละเอียดแบบย่อ</label></label>
                  <div class="col-sm-6">
                    <textarea class="form-control" name="short_desc" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รายละเอียด</label>
                  <div class="col-sm-10">
                    <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ภาพปก</label>
                  <div class="col-sm-3">
                    <input type="file" name="image">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ไฟล์แนบ</label>
                  <div class="col-sm-3">
                    <input type="file" name="attachment">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link</label>
                  <div class="col-sm-6">
                    <input type="text" name="link" class="form-control" id="link">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="active" value="1" checked> เปิดใช้งาน
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">ยกเลิก</button>
                <button type="submit" class="btn btn-info pull-right">บันทึก</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('scripts')
    <!-- CK Editor -->
    <script src="../../bower_components/ckeditor/ckeditor.js"></script>
  @endsection
  @section('script')
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
      })
    </script>
  @endsection