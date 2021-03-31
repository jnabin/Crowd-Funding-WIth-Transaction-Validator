@extends('layout.mainlayout')
@section('content')
	<div>
	</div>
		<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Create User</legend>
				<table>
				<tr>
					<td>Target Fund</td>
					<td><input type="text" name="target_fund" value = "{{old('target_fund')}}">
					@if($errors->has('target_fund'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('target_fund') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td>Campaign Type</td>
					<td><input type="text" name="campaigntype" value = "{{old('campaigntype')}}">
					@if($errors->has('campaigntype'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('campaigntype') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td> <label for="Description"></label> Description</td>
					<td>
						<textarea id="Description" name="description" rows="4" cols="50">{{old('description')}}</textarea>
					
					@if($errors->has('description'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('description') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td><label for="myfile">Select a Image</label></td>
					<td><input type="file" id="myfile" name="myfile">
					@if($errors->has('myfile'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('myfile') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td>Publish Date</td>
					<td><input id="datePicker" type="date" name="publisedDate" readonly>
					@if($errors->has('publisedDate'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('publisedDate') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td>End Date</td>
					<td><input type="date" name="enddate" value = "{{old('enddate')}}">
					@if($errors->has('enddate'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('enddate') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td>Title</td>
					<td><input type="test" name="title" value = "{{old('title')}}">
					@if($errors->has('title'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('title') }}</small></h6>
                  @endif </td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
			</fieldset>
		</form>
		@endsection