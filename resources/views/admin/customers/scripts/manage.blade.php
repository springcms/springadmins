
<script type="text/javascript">
    $('#modal-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      //var id_delete = button.data('id') // Extract info from data-* attributes
      var deleteurl = button.data('deleteurl')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      
      var modal = $(this)    
      modal.find('#deleteForm').attr('action',deleteurl);    
     // modal.find('#id_delete').val(id_delete)       
    });

   $('#modal-edit').on('show.bs.modal', function (e) {
      var button = $(e.relatedTarget) // Button that triggered the modal
      var title = button.data('title'); 
      var name = button.data('name');
      var editurl = button.data('editurl'); 


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.  
      var modal_edit = $(this) 
      modal_edit.find('#editForm').attr('action',editurl);     
      modal_edit.find('#actionForm').val(editurl);
      modal_edit.find('#edit_title').val(title);      
      modal_edit.find('#edit_name').val(name);
    });


  $(function () {

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    
  });


</script>  


