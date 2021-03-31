@extends('layout.mainlayout')
@section('content')
<h5 style="color: green">
			{{session('msg')}}
	</h5>
	<h5 style="color: green">
			{{session('msg2')}}
	</h5>
	<table class="table table-bordered table-hover">
	<thead style = 'background:#807969;color:white'>	
	<tr>
			<td>ID</td>
			<td>title</td>
			<td>Description</td>
			<td>Raised Amount</td>
			<td>Campaign Type</td>
			<td>bookmark date</td>
			<td>Action</td>
		</tr>
		</thead>
		<tbody>

		@for($i=0; $i < count($bookmark); $i++)
			<tr>
				<td>{{$bookmark[$i]->id}}</td>
				<td>{{$bookmark[$i]->title}}</td>
				<td>{{$bookmark[$i]->discription}}</td>
				<td>{{$bookmark[$i]->raised_fund}} tk</td>
				<td>{{$bookmark[$i]->ctype}}</td>
				<td>{{$bookmark[$i]->UpdatedDate}}</td>
				<td>
				<a href="{{route('home.deletebookmark', $bookmark[$i]->id)}}">Delete</a>|
				<a href="{{route('organization.createfb', $bookmark[$i]->id)}}">Add to Campaign</a>
				</td>
			</tr>
		@endfor
		</tbody>
	</table>
	@endsection
