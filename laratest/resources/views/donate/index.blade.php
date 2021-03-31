@extends('layout.mainlayout1')

@section('ajaxmeta')
<meta name="_token" content="{{ csrf_token() }}">
@endsection
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
        <a href="{{route('donate.donation', $campaigns[$i]['id'])}}">Donate</a> |
        @else
        <p class="card-text" style = "color:green">Completed</p>
				@endif	
					<a href="{{route('Donate.report', $campaigns[$i]['id'])}}">Report</a>
      </div>
    </div>
  </div>
  @endfor
</div>
<br>
<hr>

@endsection