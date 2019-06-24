var WebSocketServer = require("ws").Server;
var wss = new WebSocketServer({ port: 3000 });

wss.on("connection", function(ws) {

	ws.on("message", function(message) {

		if (message === 'exit') {
			ws.close();
		} else {

			wss.clients.forEach(function(client) {
				client.send(message);
			});

		}

	});

	ws.send("SIE. SISTEMA DE INFORMAÇÃO DE EVENTO");

});

//para executar na linha de comando faz se node ws