<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p>Hola {{$name}},</p>
		 <p>Gracias por registrarte en {{getcong('site_name')}}.</p>
		<p>Aquí tienes tu usuario y contraseña {{getcong('site_name')}}</p>

		<p>Usuario : {{$email}}</p>
		<p>contraseña {{ url('admin/password/reset/'.$token) }}</p>

		<p>Verifique su cuenta haciendo clic en el siguiente enlace (o cópielo en un navegador):</p>
		<p>{!! link_to('auth/confirm/' . $confirmation_code) !!}.<br></p>
	</body>
</html>
