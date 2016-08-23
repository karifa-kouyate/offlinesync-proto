<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>

	<style type="text/css">
	.container{
		width:350px;
		margin: 50px auto;
	}
	.fi{
		width:230px;
	}
	</style>
</head>
<body>

<div class="container">
	@if(isset($message))
	<p>{{$message}}</p>
	@endif
	<form method="post" action="{{route('test.sendsms')}}">
		<p>
			<label>Phone: </label><br/>
			<input type="text" name="phone" class="fi"  placeholder="+99900000011001"/>
		</p>
		<p>
			<label>SMS: </label><br/>
			<textarea name="sms" rows="5" cols="7" class="fi" placeholder="votre sms ici" ></textarea>
		</p>
		<button>ENVOYER</button>
	</form>
</div>

</body>
</html>