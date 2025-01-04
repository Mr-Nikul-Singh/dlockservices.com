const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const bodyParser = require('body-parser');

// Initialize the Express app
const app = express();
const server = http.createServer(app);

// Set up CORS to allow requests from specific origin
const io = socketIo(server, {
  cors: {
    origin: "http://dlockservices.local:8082", // Allow your frontend domain
    methods: ["GET", "POST"]
  }
});

// Middleware to parse JSON requests
app.use(bodyParser.json());

// Endpoint to check if the server is running
app.get('/', (req, res) => {
    res.send('Notification Server is running');
});

// Endpoint to receive notifications from your app (e.g., CodeIgniter)
app.post('/notify', (req, res) => {
    const { user_id,fullname,message,created_at } = req.body;

    // Emit the notification to all connected clients
    io.emit('new_notification', { user_id,fullname,message,created_at });

    // Respond back to acknowledge receipt
    res.status(200).send({ status: 'Notification sent' });
});

// WebSocket connection event
io.on('connection', (socket) => {
    console.log('A user connected');
    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

// Start the server and listen on port 3000
server.listen(3000, () => {
    console.log('Notification server is running on http://localhost:3000');
});
