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
	<td>{{$target_fund}}</td>
</tr>
<tr>
	<td>Raised Fund</td>
	<td>{{$raised_fund}}</td>
</tr>
<tr>
	<td>Campaign Type</td>
	<td>{{$ctype}}</td>
</tr>
<tr>
	<td>Description</td>
	<td>{{$description}}</td>
</tr>
<tr>
	<td>Publish Date</td>
	<td>{{$publisedDate}}</td>
</tr>
<tr>
	<td>Status</td>
	<td>{{$status}}</td>
</tr>
<tr>
	<td>Title</td>
	<td>{{$title}}</td>
</tr>
<tr>
	<td>Are sure? this can't be undone!</td>
	<td></td>
</tr>
<tr>
	<td><input type="submit" name="submit" value="Confirm"></td>
	<td></td>
</tr>
</table>
			</fieldset>
		</form>
		</div>
		@endsection