@extends('layout.mainlayout')
@section('content')
<div class="card">
<div class="card-header">
<h3>Generate Report</h3>
</div>
<div class="card-body">
<form method="post">
		@csrf
		<fieldset class="form-group">
    <div class="form-group row">
    
      <div class="col-sm-10">
      <label>Select Report Option :</label>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="User_Report" onclick="ShowHideDiv()">
  <label class="form-check-label" for="inlineRadio1">User Report</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="donations_Report" onclick="ShowHideDiv()">
  <label class="form-check-label" for="inlineRadio2">Top 10 Donations</label>
</div>
</div>
</div>
<div class="form-row xxxxxxx" id="userReportDisp" style="display:none">
<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">From Date</label>
      <input type="date" class="form-control" id="inputEmail4" name = "from_date" placeholder="Email">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">To Date</label>
      <input type="date" class="form-control" id="inputPassword4" name = "to_date" placeholder="Password">
    </div>
    </div>
</div>
    <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  </fieldset>
	</form>
</div>
</div>
	
	@endsection
