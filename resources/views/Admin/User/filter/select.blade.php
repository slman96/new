
<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<div class="row" dir="{{__("strings.ltr")}}">
  <div class="col-md-12">
    <form>
        <label>{{__("strings.Filter_by_country")}}</label>
            <select id="countrySelect" name="country" class="form-control select2">
                <option value="">{{__("strings.All")}}</option>
                <option value="Syria">{{__("strings.Syria")}}</option>
                <option value="Lebanon">{{__("strings.Lebanon")}}</option>
                <option value="Iraq">{{__("strings.Iraq")}}</option>
                <option value="Jordan">{{__("strings.Jordan")}}</option>
                <option value="Palestine">{{__("strings.Palestine")}}</option>
                <option value="Saudi Arabia">{{__("strings.Saudi_Arabia")}}</option>
                <option value="United Arab Emirates">{{__("strings.United_Arab_Emirates")}}</option>
                <option value="Bahrain">{{__("strings.Bahrain")}}</option>
                <option value="Oman">{{__("strings.Oman")}}</option>
                <option value="Kuwait">{{__("strings.Kuwait")}}</option>
                <option value="Yemen">{{__("strings.Yemen")}}</option>
                <option value="Qatar">{{__("strings.Qatar")}}</option>
                <option value="Egypt">{{__("strings.Egypt")}}</option>
                <option value="Libya">{{__("strings.Libya")}}</option>
                <option value="Algeria">{{__("strings.Algeria")}}</option>
                <option value="Morocco">{{__("strings.Morocco")}}</option>
                <option value="Sudan">{{__("strings.Sudan")}}</option>
                <option value="Tunisia">{{__("strings.Tunisia")}}</option>
                <option value="Somalia">{{__("strings.Somalia")}}</option>
                <option value="Mauritania">{{__("strings.Mauritania")}}</option>
                <option value="Djibouti">{{__("strings.Djibouti")}}</option>
              </select>
    </form>
  </div>
</div>
<script>
$('.select2').select2();
</script>