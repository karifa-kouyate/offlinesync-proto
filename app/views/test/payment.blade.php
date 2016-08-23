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
	<form method="post" action="{{route('test.payment')}}">
		<p>
			<label>Phone: </label><br/>
			<input type="text" name="phone" class="fi"  placeholder="+99900000011001"/>
		</p>
		<p>
			<label>Montant: </label><br/>
			<input type="number" name="amount" class="fi"  placeholder="5.00"/>
		</p>
		<button>PRELEVER</button>
	</form>
</div>

</body>
</html>