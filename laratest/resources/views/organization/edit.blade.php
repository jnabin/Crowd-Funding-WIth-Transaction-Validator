@extends('layout.mainlayout')
@section('content')
	<div>
	@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Edit User</legend>
				<table>
				<tr>
					<td>Target Fund</td>
					<td><input type="text" name="target_fund" value="{{$target_fund}}" ></td>
				</tr>
				<tr>
					<td>Campaign Type</td>
					<td><input type="text" name="campaigntype" value="{{$ctype }}"></td>
				</tr>
				<tr>
					<td> <label for="Description"></label> Description</td>
					<td>
						<textarea id="Description" name="description" rows="4" cols="50">{{$description }}</textarea>
					</td>
				</tr>
				<tr>
					<td>End Date</td>
					<td><input type="datetime-local" name="enddate" value="{{$endDate }}"></td>
				</tr>
				<tr>
					<td>Title</td>
					<td><input type="test" name="title" value="{{$title }}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Update"></td>
				</tr>
			</table>
			</fieldset>
		</form>

		
		</div>
		@endsection