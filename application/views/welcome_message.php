<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>chat en tiempo real</title>
	<style>
		body {
            height: 100vh; /* Ocupa toda la altura de la ventana */
            /*margin: 0; /* Elimina el margen por defecto */
            background: radial-gradient(circle, #001f3f, #000000);/* Degradado de izquierda a derecha */
            /*display: flex; /* Centrar contenido */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            color: white; /* Color del texto */
            font-family: Arial, sans-serif; /* Fuente */
        }
		#chat {
			width: 100%; height: 400px; overflow-y: scroll;border: 5px solid #ccc;
			width: 95%;
			background-color: #fffacd;
			border-color: WHITE;
			border-radius: 10px;
			text-size-adjust: 18PX;
			color: black;
		}
		#message {
			width: 80%;
			background-color: #fffacd;
			height: 50px;
			text-size-adjust: 18PX;
		}
		button {
			background-color: #fffacd;
			height: 50px;
			text-size-adjust: 18PX;
			border-color: WHITE;
			border-radius: 10px;
		}

	</style>
</head>
<body>
	<h1>Chat en Tiempo Real</h1>
	<div id="chat"></div>
	<p></p>
	<input type="text" id="message" placeholder="Escribe tu mensaje">
	<button id="send">Enviar</button>
	<script>
		var conn = new WebSocket('ws://localhost:8080'); var chat = document.getElementById('chat');
		var sendButton = document.getElementById('send');
		var messageInput = document.getElementById('message');
		conn.onopen = function(e) {
			chat.innerHTML += '<div>Conexión establecida</div>';
		}
		conn.onmessage = function(e) {
			chat.innerHTML += '<div>' + e.data + '</div>'; 
			chat.scrollTop = chat.scrollHeight;
		};
		sendButton.onclick = function() {
			var msg = messageInput.value;
			conn.send(msg);
			messageInput.value = '';
		};


	</script>
</body>
</html>        