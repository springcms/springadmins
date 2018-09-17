
@extends('springadmins::layouts.page')

@section('title', 'Customer list')

@section('content_header')

    <h1>Customers list</h1> 


     <div class="toolbar-widget list-header" id="Toolbar-listToolbar">
        <div class="control-toolbar">

            <!-- Control Panel -->
            <div class="toolbar-item toolbar-primary">
                <div data-control="toolbar" data-disposable="">
                  <a  class="btn btn-primary oc-icon-plus" data-toggle="modal" data-target="#modal-create">
                      {{trans('Create Customer info')}} </a>
                          
                </div>
            </div>
            
        </div>
    </div>
    @include('springadmins::admin.partials.alertlist')
    @include('springadmins::admin.customers.partials.search')

    <div class="col-lg-13">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Customers list</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer name</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    @foreach($customers as $customer)
                        <tr>
                          <td>{{$customer->id}}</td>
                          <td>{{$customer->fullname}}</td> 
                          <td>{{$customer->phonenumber}}</td>
                          <td>{{$customer->created_at}}</td>
                          <td>{{$customer->updated_at}}</td>
                          <td>
                               <div class="btn-group">
                                  <a href="#modal-delete" class="btn btn-default btn-sm" 
                                    data-toggle="modal" data-target="#modal-delete" 
                                 
                                    data-deleteurl="{{route('customers.destroy', ['cus_id' => $customer->id])}}" 
                                    data-name="{{$customer->fullname}}" ><i class="fa fa-trash-o"></i></a>
                                  <a href="#modal-edit" class="btn btn-default btn-sm" 
                                      data-toggle="modal" data-target="#modal-edit"                                      
                                      data-title="{{$customer->fullname}}"
                                      data-editurl="{{ route('customers.update', ['cus_id' => $customer->id])}}"
                                      data-name="{{$customer->fullname}}" >
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
                  {{ $customers->links() }}
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
    @include('springadmins::admin.customers.modals.create')
    @include('springadmins::admin.customers.modals.delete')
    @include('springadmins::admin.customers.modals.edit') 
   
    <!-- Script affter all-->
    @include('springadmins::admin.customers.scripts.manage')
@stop


