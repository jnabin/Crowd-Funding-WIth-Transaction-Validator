@extends('layout.mainlayout')
@section('content')
  <h4 style="color: red">
			{{session('msg1')}}
	</h4>
	<div class="row">
  @for($i=0; $i < count($campaigns); $i++)
  <div class="col-sm-3 b">
    <div class="card">
    <img class="card-img-top" src="{{$campaigns[$i]['image']}}" alt="Campaign image{{$i}}">
      <div class="card-body">
        <h5 class="card-title"><a href="{{route('organization.show', $campaigns[$i]['id'])}}">{{$campaigns[$i]['title']}}</a></h5>
        <p class="card-text">{{$campaigns[$i]['description']}}</p>
        <p class="card-text">Target fund: {{$campaigns[$i]['target_fund']}} tk</p>
        <p class="card-text">Raised fund: {{$campaigns[$i]['raised_fund']}} tk</p>
        @if($campaigns[$i]['raised_fund']<$campaigns[$i]['target_fund'])
        <p class="card-text">Status : <span style = "color:red">Running</span></p>
        @else
        <p class="card-text">Status : <span style = "color:green">Completed</span></p>
				@endif	
        <a href="{{route('organization.edit', $campaigns[$i]['id'])}}">Edit</a> |
					<a href="{{route('organization.delete', $campaigns[$i]['id'])}}">Delete</a>|
					<a href="{{route('organization.report', $campaigns[$i]['id'])}}">Report</a>|
					<a href="{{route('organization.bookmark', $campaigns[$i]['id'])}}">Bookmark</a>
      </div>
    </div>
  </div>
  @endfor
</div>
@endsection