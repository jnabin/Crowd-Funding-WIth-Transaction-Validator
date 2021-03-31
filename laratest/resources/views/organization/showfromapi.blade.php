@extends('layout.mainlayout')
@section('content')
<div class="card">
<div class="card-header">
<h3>Getting Information of User From Node</h3>
</div>
<div class="card-body">

	<table class="table table-bordered table-hover">
	<thead style = 'background:#807969;color:white'>	
	<tr>
			<td>Name</td>
			<td>Gmail</td>
			<td>Image</td>
			<td>Username</td>
			<td>Donate Amount</td>
			<td>Registered Date</td>
		</tr>
		</thead>
		<tbody>

		@for($i=0; $i < count((array)$responsex); $i++)
			<tr>
				<td>{{$responsex[$i]->name}}</td>
				<td>{{$responsex[$i]->email}}</td>
				<td> <img src="\{{$responsex[$i]->image}}" alt="a good user"></td>
				<td>{{$responsex[$i]->username}} tk</td>
				<td>{{$responsex[$i]->donateAmount}}</td>
				<td>{{$responsex[$i]->addedDate}}</td>
				
			</tr>
		@endfor
		</tbody>
	</table>
			</div>
</div>
			@endsection