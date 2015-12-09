<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br/>
<b>Add Photo : </b><br/>

{!! Form::open(['url'=>'/add','files' => true])!!}
	
	
	<br/><br/>
	{!! Form::label('album_name','Album Name : ')!!}
	{!! Form::text('album_name')!!}
	<br/><br/>
	{!! Form::label('photo_name','Name : ') !!}
	{!! Form::text('photo_name')  !!}
	<br/><br/>
	
	{!! Form::label('photo','Upload Photo : ') !!}
	{!! Form::file('photo') !!}
	<br/><br/>
	
	{!! Form::submit('submit')!!}

{!! Form::close()!!}

<a href="/pixelbug/loggedin">back</a> 

@if($errors->any())
	
		@foreach($errors->all() as $error)
			
			{{$error}}
			<br/>
		@endforeach
@endif

</body>
</html>