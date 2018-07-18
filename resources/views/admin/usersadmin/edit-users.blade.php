@extends('adminlte::page')
@section('title', 'AdminLTE LaraCMS')

@section('content_header')
    <h1>Edit User </h1>
   @if($user)
      <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fill all user information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="#" method="post">
                {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label>Full name</label>
                  <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter your name..." >
                  @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User name</label>
                  <input type="text" name="username" value="{{ $user->username }}"  class="form-control" id="username" placeholder="Enter user name">
                  @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                  @endif
                </div>
                
                </div> 

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info pull-right" href="users" >List</a>
              </div>
            </form>
          </div>
   @else
      <div class="alert alert-warning">
        <strong>Warning!</strong> Indicates a warning that might need attention.
      </div>  
   @endif
    
@stop