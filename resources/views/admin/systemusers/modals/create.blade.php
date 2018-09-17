<div class="modal  fade" id="modal-create-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create new user</h4>
      </div>
      <div class="modal-body">
	        <form action="{{route('system-users.store')}}" method="post">
	                {!! csrf_field() !!}
	              <div class="box-body">
	                <div class="form-group as-feedback {{ $errors->has('fullname') ? 'has-error' : '' }} ">
	                  <label>Full name</label>
	                  <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control" placeholder="Enter your name..." >
	                  @if ($errors->has('fullname'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('fullname') }}</strong>
	                        </span>
	                  @endif
	                </div>
	                <div class="form-group has-feedback {{ $errors->has('loginname') ? 'has-error' : '' }}">
	                  <label for="exampleInputEmail1">User name</label>
	                  <input type="text" name="loginname" value="{{ old('loginname') }}"  class="form-control" id="loginname" placeholder="Enter user name">
	                  @if ($errors->has('loginname'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('loginname') }}</strong>
	                        </span>
	                  @endif
	                </div>
	                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
	                  <label for="password">Password</label>
	                  <input type="password" name="password"  class="form-control" id="password" placeholder="Password">
	                  @if ($errors->has('password'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('password') }}</strong>
	                        </span>
	                  @endif
	                </div>  
	                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
	                  <label for="password_confirmation1">Password confirmation</label>
	                  <input type="password" name="password_confirmation"  class="form-control" id="password_confirmation1" placeholder="password confirmation">
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
	                <button type="button"  class="btn btn-default" data-dismiss="modal"  >Close</a>
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
			$('#modal-create-user').modal();
		</script>  
	@stop
@endif