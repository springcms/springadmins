<div class="modal modal-danger fade" id="modal-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form id="deleteForm" action="#" method="post">         
        {!! csrf_field() !!}        
        {{ method_field('DELETE') }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete confirm</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
          <input type="hidden" name="id_delete" value="">
        </div>
        <div class="modal-footer">            
            <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline pull-left">Delete</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

 

