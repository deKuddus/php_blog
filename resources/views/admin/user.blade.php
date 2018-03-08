@extends('admin.layouts.app')

@section('main_content')
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Users</h3>
          <a href="{{route('user.create')}}" class=" col-lg-offset-5 btn btn-success">Create New</a>


          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Data Table </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($users as $key => $user)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td><a href="{{route('user.edit',$user->id)}}"><span class="glyphicon glyphicon-edit"></span></a> </td>
                  <td><form action="{{route('post.destroy',$user->id)}}" method="post" id="delete_form_{{$user->id}}" style="display: none">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                     </form>
                     <a href="" onclick="

                      if(confirm('Are sure to delete?'))
                      {
                        event.preventDefault();
                        document.getElementById('delete_form_{{$user->id}}').submit();
                      }
                      else{
                        event.preventDefault();
                      }
                     ">
                        <span class="glyphicon glyphicon-trash"></span></a>
                    </a></td>
                  
                  </tr>
                 @endforeach 

                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection