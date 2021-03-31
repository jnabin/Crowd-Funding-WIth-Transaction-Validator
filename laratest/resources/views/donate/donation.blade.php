@extends('layout.mainlayout1')

@section('content')
<div>
	<form method="post">
		@csrf
		<fieldset>
			<legend>Donation</legend>
			<table>
			<tr>
			<td>Campaign title :</td>
			<td>{{$title}}</td>
			</tr>
			<tr>
			<td>Target Fund :</td>
			<td>{{$target_fund}} tk</td>
			</tr>
			<tr>
			<td>Raised Fund :</td>
			<td>{{$raised_fund}} tk</td>
			</tr>
				<tr>
					<td><label for="Donation"></label>Donate Amount:</td>
					<td>
						<input type="text" name="donation" id="Donation" value = "{{old('donation')}}">
						@if($errors->has('donation'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('donation') }}</small></h6>
                  @endif 
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="Donate">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	</div>
@endsection