@extends('adminlte::page')
@section('title', 'AdminLTE LaraCMS')

@section('content_header')
    <h1>Create User </h1>
   
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
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your name..." >
                  @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                  @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">User name</label>
                  <input type="text" name="username" value="{{ old('username') }}"  class="form-control" id="username" placeholder="Enter user name">
                  @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                  @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                  @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                  @endif
                </div>  
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Password confirmation</label>
                  <input type="password" name="password_confirmation"  class="form-control" id="exampleInputPassword1" placeholder="password confirmation">
                  @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                  @endif
                </div> 

              </div>
              <!-- /.box-body -->
             
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="button"  class="btn btn-default" href="users"  >Cancel</a>
              </div>
            </form>
          </div>
@stop