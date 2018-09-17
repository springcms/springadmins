<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">         
          <!-- form start -->
          <form id="editForm" action="{{old('actionForm')}}" method="POST">              
            {!! csrf_field() !!}
            {{ method_field('PATCH') }} 
            <input type="hidden" name="actionForm" id="actionForm"  value="{{old('actionForm')}}">    
            <div class="box-body">                  
                  <div class="form-group">
                    <label>Menu title</label>

                    <input type="text" name="title" id="edit_title"  value="{{old('title')}}" class="form-control" placeholder="Enter your name..." >
                    @if ($errors->edit->has('title'))
                          <span class="help-block">
                              <strong>{{ $errors->edit->first('title') }}</strong>
                          </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Menu name</label>
                    <input type="text" name="name" value="{{old('name')}}"  class="form-control" id="edit_name" placeholder="Enter user name">
                    @if ($errors->edit->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->edit->first('name') }}</strong>
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

@if($errors->edit->any())
    <script>
      //alert("alog");
      $('#modal-edit').modal();
    </script>  
@endif

