
@extends('springadmins::layouts.page')

@section('title', 'AdminLTE LaraCMS')

@section('content_header')

    <h1>Users list</h1> 


     <div class="toolbar-widget list-header" id="Toolbar-listToolbar">
        <div class="control-toolbar">

            <!-- Control Panel -->
            <div class="toolbar-item toolbar-primary">
                <div data-control="toolbar" data-disposable="">
        <a  class="btn btn-primary oc-icon-plus" data-toggle="modal" data-target="#modal-create-user">
            {{trans('springadmins::springadmins.create-new-user')}} </a>
                
        </div>
            </div>
            
        </div>
    </div>
    @include('springadmins::admin.partials.alertlist')
    @include('springadmins::admin.usersadmin.partials.search')

    <div class="col-lg-13">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List admin users</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Full name</th>
                      <th>Login name</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->fullname}}</td>
                          <td>{{$user->loginname}}</td>                      
                          <td>{{$user->created_at}}</td>
                          <td>{{$user->updated_at}}</td>
                          <td>
                               <div class="btn-group">
                                  <a href="#modal-delete-user" class="btn btn-default btn-sm" 
                                    data-toggle="modal" data-target="#modal-delete-user" 
                                 
                                    data-deleteurl="{{route('users-admin.destroy', ['user' => $user->id])}}" 
                                    data-loginname="{{$user->loginname}}" ><i class="fa fa-trash-o"></i></a>
                                  <a href="#modal-edit-user" class="btn btn-default btn-sm" 
                                      data-toggle="modal" data-target="#modal-edit-user"                                      
                                      data-fullname="{{$user->fullname}}"
                                      data-editurl="{{ route('users-admin.update', ['user' => $user->id])}}"
                                      data-loginname="{{$user->loginname}}" >
                                    <i class="fa fa-edit"></i></a>
                                </div>
                            
                          </td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <div class="pull-right">
                  {{ $users->links() }}
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>          
@stop    



@section('springadmins_js')
   
    @include('springadmins::admin.usersadmin.modals.delete')
    @include('springadmins::admin.usersadmin.modals.edit')
    @include('springadmins::admin.usersadmin.modals.create')
    <!-- Script affter all-->
    @include('springadmins::admin.usersadmin.scripts.manage-users')
@stop

