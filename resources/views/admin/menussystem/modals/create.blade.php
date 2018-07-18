<div class="modal  fade" id="modal-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create new menu system</h4>
      </div>
      <div class="modal-body">
	        <form action="{{route('menus-system.store')}}" method="post">
	                {!! csrf_field() !!}
	              <div class="box-body">
	                <div class="form-group as-feedback {{ $errors->has('title') ? 'has-error' : '' }} ">
	                  <label>Menu title</label>
	                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter your name..." >
	                  @if ($errors->create->has('title'))
	                        <span class="help-block">
	                            <strong>{{ $errors->create->first('title') }}</strong>
	                        </span>
	                  @endif
	                </div>
	                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
	                  <label for="exampleInputEmail1">Menu name</label>
	                  <input type="text" name="name" value="{{ old('name') }}"  class="form-control" id="name" placeholder="Enter user name">
	                  @if ($errors->create->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->create->first('name') }}</strong>
	                        </span>
	                  @endif
	                </div>
	              </div>
	              <!-- /.box-body -->	            
	             <div class="modal-footer">
	                <button type="submit" class="btn btn-primary">Submit</button>
	                <button type="button"  class="btn btn-default" data-dismiss="modal"  >Close</a>
	              </div>
	            </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@if($errors->create->any())
        <script>
          //alert("alog");
          $('#modal-create').modal("show");
        </script>  
@endif
