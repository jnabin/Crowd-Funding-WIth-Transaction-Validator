@extends('layout.mainlayout')
@section('content')
  <h4 style="color: red">
			{{session('msg1')}}
	</h4>
	<div class="row">
  @foreach($reports as $report)
  <div class="col-sm-9 b">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">About <a href="{{route('organization.show', $report->cid)}}">{{$report->title}}</a> Capaign</h6>
        <p class="card-text">{{$report->description}} <span> {{$report-> updatedDate}}</span> </p>
					<a href="{{route('organization.deletedashboard', $report->id)}}">Delete</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection