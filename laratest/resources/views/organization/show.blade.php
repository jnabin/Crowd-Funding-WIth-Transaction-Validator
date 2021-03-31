@extends('layout.mainlayout')
@section('content')
<div class="card">
<div class="card-header">
<h3>Information of {{$title}} Campaign</h3>
</div>
<div class="card-body">
	<table class="table table-bordered table-hover">
				<tr>
					<td>uid</td>
					<td>{{$uid}}</td>
				</tr>
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
					<td>{{$ctype }}</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>{{$description}}
					</td>
				</tr>
				<tr>
					<td>Publish Date</td>
					<td>{{ $publisedDate }}</td>
				</tr>
				<tr>
					<td>End Date</td>
					<td>{{ $endDate }}</td>
				</tr>
				<tr>
					<td>Title</td>
					<td>{{$title }}</td>
				</tr>
			</table>
			</div>
</div>
			@endsection