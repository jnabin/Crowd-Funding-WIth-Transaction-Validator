@extends('layout.mainlayout')
@section('content')
<div>
	<form method="post">
		@csrf
		<fieldset>
			<legend>Enter Description</legend>
			<table>
			<tr>
			<td>Campaign title    :</td>
			<td>{{$title}}</td>
			</tr>
				<tr>
					<td> <label for="Description"></label> Enter report</td>
					<td>
						<textarea id="Description" name="Description" rows="4" cols="50"></textarea>
						@if($errors->has('Description'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('Description') }}</small></h6>
                  @endif  
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="submit">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	</div>
	@endsection
