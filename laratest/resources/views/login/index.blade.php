
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
  <br><br>
  <div class="container" style = "font-size:20px">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
		  <h3 class="panel-title">New user? <a style = "color:blue" href="{{route('registration.index')}}">Registration</a></h3>
		  <h5 class="panel-title">
			<small style="color: red">{{session('msg')}}</small>
			</h5>
      <h5 class="panel-title">
			<small style="color: green">{{session('msg1')}}</small>
			</h5>
         </div>
         <div class="panel-body">
          <form method="post">
            @csrf
            <div class = "form-group row">
              <div class = "col-md-12 offset-md-6">
                <a href="{{ route('login.google') }}" class = "btn btn-danger btn-block">Login With Google</a>
                <a href="{{ route('login.facebook') }}" class = "btn btn-primary btn-block">Login With Facebook</a>
              </div>
            </div>
            <p style = "text-align: center; font-size: 1.7rem">OR</p>
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control input-sm" placeholder="username" value = "{{old('username')}}">
              @if($errors->has('username'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('username') }}</small></h6>
                  @endif
			</div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"  value = "{{old('password')}}">
                  @if($errors->has('password'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('password') }}</small></h6>
                  @endif
                </div>
            
            <input type="submit" value="Login" class="btn btn-info btn-block">
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>








