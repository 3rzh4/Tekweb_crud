<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style>
        body {
  background: #3498db;
  font-family: sans-serif;
}
 
h2 {
  color: #fff;
}
 
.login {
  padding: 1em;
  margin: 2em auto;
  width: 17em;
  background: #fff;
  border-radius: 3px;
}
 
label {
  font-size: 10pt;
  color: #555;
}
 
input[type="text"],
input[type="password"],
textarea {
  padding: 8px;
  width: 95%;
  background: #efefef;
  border: 0;
  font-size: 10pt;
  margin: 6px 0px;
}
 
.tombol {
  background: #3498db;
  color: #fff;
  border: 0;
  padding: 5px 8px;
  margin: 20px 0px;
}
        </style>
</head>
<body>
	<br/>
	<br/>
	<center><h2>Login</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<form action="{{ route('login') }}" method="POST">
            @csrf
			<div>
				<label>Email:</label>
				<input type="text" name="email" class="form-control" id="email"value="{{ old('email') }}"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" class="form-control"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
			</div>
		</form>
	</div>
</body>
</html>