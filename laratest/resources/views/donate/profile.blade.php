@extends('layout.mainlayout1')
@section('user')
{{$name}}
@endsection
@section('content')
<div class="card xx c">

<div class="card-header">
<h3 style="color:#47473b">Search Campaigns</h3>
</div>
<div class="card-body">
<div class="form-inline">
<input type="text" class="form-control" id="search" name="search" placeholder = "search by title"></input>
</div>
<table class="table table-bordered table-hover">
<thead style = 'background:#807969;color:white'>
<tr>
<th>ID</th>
<th>Campaign Title</th>
<th>Campaign Type</th>
<th>Description</th>
<th>Raised Amount</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

	@endsection