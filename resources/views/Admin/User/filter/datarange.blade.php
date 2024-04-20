<form id="datrange">
    <div class="row">
        <div class="col-md-5">
            <label  dir="rtl" for="">{{__("strings.start_date")}}</label>
            <input id="startdate" name="startdate" type="date" class="form-control">
          </div>
          <div class="col-md-5">
            <label  dir="rtl" for="">{{__("strings.end_date")}}</label>
            <input id="enddate" name="enddate" type="date" class="form-control">
          </div>
          <div class="col-md-2" style="margin-top: 30px">
            <button id="filterbtn" class="btn btn-primary">{{__("strings.Filter")}}</button>
          </div>
    </div>
    
</form>