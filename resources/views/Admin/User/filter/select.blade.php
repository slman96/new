<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<div class="row">
  <div class="col-md-12">
    <form>
        <label>Filter by country</label>
            <select id="countrySelect" name="country" class="form-control select2">
                <option value="">All</option>
                <option value="Syria">Syria</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Iraq">Iraq</option>
                <option value="Jordan">Jordan</option>
                <option value="Palestine">Palestine</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Oman">Oman</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Yemen">Yemen</option>
                <option value="Qatar">Qatar</option>
                <option value="Egypt">Egypt</option>
                <option value="Libya">Libya</option>
                <option value="Algeria">Algeria</option>
                <option value="Morocco">Morocco</option>
                <option value="Sudan">Sudan</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Somalia">Somalia</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Djibouti">Djibouti</option>
              </select>
    </form>
  </div>
</div>
<script>
$('.select2').select2();
</script>