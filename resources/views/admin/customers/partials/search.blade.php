<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title">Search more</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
     
        <form id="searchForm"  action="{{old('actionForm')}}" method="get">
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <!-- Date and time range -->
                <div class="form-group">
                  <label>Date and time range:</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text"  class="form-control pull-right" id="reservationtime">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.col -->
              <div class="col-md-3">
                <div class="form-group">
                  <label>Full name</label>
                  <input type="text" name="sfullname" class="form-control" value="{{request()->get('sfullname')}}" placeholder="Enter ...">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Disabled Result</label>
                  <select class="form-control select2" name="provices" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-3">
                <div class="form-group">
                  <label>Multiple</label>
                   <input type="text" name="sfullname1" class="form-control" value="{{\Request::get('sfullname1')}}" placeholder="sfullname1 ...">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Disabled Result</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <div class="col-md-3">
                <div class="form-group">
                  <label>Multiple</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Disabled Result</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-1">
                 <button type="button" class="btn btn-block btn-default">Refresh</button>               
              </div>
               <div class="col-md-3">               
                 <button type="submit" class="btn btn-block btn-primary">Search...</button>
              </div>
              
            </div>

          </div>
       </form>
        <!-- /.box-body -->
        <div class="box-footer">
          Fill all what you want to search above!
        </div>
        
      </div>