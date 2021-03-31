@extends('layout.mainlayout')
@section('content')
	<div>
	@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
	</div>
		<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Create User</legend>
				<table>
				<tr>
					<td>Target Fund</td>
					<td><input type="text" name="target_fund" value = "{{$bookmark[0]->target_fund}}"></td>
				</tr>
				<tr>
					<td>Campaign Type</td>
					<td><input type="text" name="campaigntype" value = "{{$bookmark[0]->ctype}}"></td>
				</tr>
				<tr>
					<td> <label for="Description">Description</label></td>
					<td>
						<textarea id="Description" name="description" rows="4" cols="50">{{$bookmark[0]->discription}}</textarea>
					</td>
				</tr>
				<tr>
					<td><label for="myfile">Select a Image</label></td>
					<td><input type="file" id="myfile" name="myfile"></td>
				</tr>
				<tr>
					<td>End Date</td>
					<td><input type="datetime-local" name="enddate"></td>
				</tr>
				<tr>
					<td>Title</td>
					<td><input type="test" name="title" value = "{{$bookmark[0]->title}}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="create"></td>
				</tr>
			</table>
			</fieldset>
		</form>
		@endsection