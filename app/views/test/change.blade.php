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
	<form method="post" action="{{route('test.change')}}">
		<p>
			<label>Access Token: </label><br/>
			<input type="text" name="key" class="fi" />
		</p>
		<button>CHANGER</button>
	</form>
</div>

</body>
</html>