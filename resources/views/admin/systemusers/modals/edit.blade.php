<div class="modal fade" id="modal-edit-user">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">         
          <!-- form start -->
          <form id="editForm" action="{{old('actionForm')}}" method="post">              
            {!! csrf_field() !!}
            {{ method_field('PATCH') }} 
            <input type="hidden" name="actionForm" id="actionForm"  value="{{old('actionForm')}}">    
            <div class="box-body">                  
                  <div class="form-group">
                    <label>Full name</label>

                    <input type="text" name="fullname" id="edit_name"  value="{{old('fullname')}}" class="form-control" placeholder="Enter your name..." >
                    @if ($errors->has('fullname'))
                          <span class="help-block">
                              <strong>{{ $errors->first('fullname') }}</strong>
                          </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" name="loginname" value="{{old('loginname')}}"  class="form-control" id="edit_username" placeholder="Enter user name">
                    @if ($errors->has('loginname'))
                          <span class="help-block">
                              <strong>{{ $errors->first('loginname') }}</strong>
                          </span>
                    @endif
                  </div>              
            </div>             
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
       
      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@if($errors->any())
  @section('adminlte_js')
    <script>
      //alert("alog");
      $('#modal-edit-user').modal();
    </script>  
  @stop
@endif

