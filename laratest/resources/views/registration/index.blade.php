<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
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
          <h3 class="panel-title">Please sign up for Donation <small>It's free!</small></h3>
          <br>
          <h4 class="panel-title">Already have account?<a style="color:blue" href="/login"><b>login</b></a></h4>
         </div>
         <div class="panel-body">
          <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" value="{{old('first_name')}}">
                  @if($errors->has('first_name'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('first_name') }}</small></h6>
                  @endif          
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="{{old('last_name')}}">
                  @if($errors->has('last_name'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('last_name') }}</small></h6>
                  @endif
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="{{old('email')}}">
              @if($errors->has('email'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('email') }}</small></h6>
                  @endif
            </div>

            <div class="form-group">
            <td><label class="panel-title" style= "color:#807e7a" for="myfile">Select a Image</label></td>
          <td><input type="file" id="myfile" class="form-control-file input-sm" name="myfile"></td>
          @if($errors->has('myfile'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('myfile') }}</small></h6>
                  @endif
            </div>

            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control input-sm" placeholder="username" value = "{{old('username')}}">
              @if($errors->has('username'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('username') }}</small></h6>
                  @endif
            </div>


            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"  value = "{{old('password')}}">
                  @if($errors->has('password'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('password') }}</small></h6>
                  @endif
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                  @if($errors->has('password_confirmation'))
                  <h6 class="panel-title"><small style ="color:red">{{ $errors->first('password_confirmation') }}</small></h6>
                  @endif
                  <h6 class="panel-title" >
			              <small style="color: red">{{session('msg1')}}</small>
	                </h6>
                </div>
              </div>
            </div>
            
            <input type="submit" value="Register" class="btn btn-info btn-block">
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>








