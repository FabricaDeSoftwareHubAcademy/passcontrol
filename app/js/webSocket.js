try {
    const WebSocket = require("ws");
    const wss = new WebSocket.Server({ port: 8080 });
    console.log('Server on...');

    wss.on('connection', ws => {
        console.log('Client connected');
        ws.on('message', message => {

            const data = JSON.parse(message);

            if (data.type === 'buttonClicked') {
                // Broadcast to all clients except sender
                wss.clients.forEach(client => {
                    if (client !== ws && client.readyState === WebSocket.OPEN) {
                        client.send(JSON.stringify({ type: 'updateScreenB', payload: data.payload }));
                    }
                });
            }
        });
    });
}catch(erro){
    console.warn(erro);
}
