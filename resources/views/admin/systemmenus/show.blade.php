
@extends('springadmins::layouts.page')

@section('title', 'System menus')

@section('content_header')

    <h1>Users list</h1> 


     <div class="toolbar-widget list-header" id="Toolbar-listToolbar">
        <div class="control-toolbar">

            <!-- Control Panel -->
            <div class="toolbar-item toolbar-primary">
                <div data-control="toolbar" data-disposable="">
                  <a  class="btn btn-primary oc-icon-plus" data-toggle="modal" data-target="#modal-create">
                      {{trans('create menu system')}} </a>
                          
                </div>
            </div>
            
        </div>
    </div>
    @include('springadmins::admin.partials.alertlist')
    @include('springadmins::admin.systemmenus.partials.search')

    <div class="col-lg-13">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List admin menus system</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Menu title</th>
                      <th>Menu name</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    @foreach($menu_systems as $menu)
                        <tr>
                          <td>{{$menu->id}}</td>
                          <td>{{$menu->title}}</td>
                          <td>{{$menu->name}}</td>                      
                          <td>{{$menu->created_at}}</td>
                          <td>{{$menu->updated_at}}</td>
                          <td>
                               <div class="btn-group">
                                  <a href="#modal-delete" class="btn btn-default btn-sm" 
                                    data-toggle="modal" data-target="#modal-delete" 
                                 
                                    data-deleteurl="{{route('system-menus.destroy', ['menu' => $menu->id])}}" 
                                    data-name="{{$menu->name}}" ><i class="fa fa-trash-o"></i></a>
                                  <a href="#modal-edit" class="btn btn-default btn-sm" 
                                      data-toggle="modal" data-target="#modal-edit"                                      
                                      data-title="{{$menu->title}}"
                                      data-editurl="{{ route('system-menus.update', ['menu' => $menu->id])}}"
                                      data-name="{{$menu->name}}" >
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
                  {{ $menu_systems->links() }}
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
    @include('springadmins::admin.systemmenus.modals.create')
    @include('springadmins::admin.systemmenus.modals.delete')
    @include('springadmins::admin.systemmenus.modals.edit') 
   
    <!-- Script affter all-->
    @include('springadmins::admin.systemmenus.scripts.manage')
@stop


