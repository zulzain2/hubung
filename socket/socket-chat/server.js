const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const fetch = require('node-fetch'); 
const dotenv = require('dotenv').config({ path: '../../.env' })

const app = express();
const server = http.createServer(app);
app.get('/', (req, res) => {
    res.send('Socket Chat Successful response.');
  });
app.get('/socketchat', (req, res) => {
    res.send('Socket Chat Successful response.');
  });
  
const io = socketio(server, {
    cors: {
      origin: "*",
    }
  });
const url = process.env.APP_URL;
const userssocketid = {};
const usersid = {};
// Run when client connects
io.on('connection', socket => {

    // Welcome current user
    console.log('connect');

    socket.on('userOnline', function(data){
        console.log('user ' + data.userId + ' online');
        // saving userId to object with socket ID
        userssocketid[socket.id] = data.userId;
        usersid[data.userId] = socket.id;
    });

    socket.on('userOtherOnline', function(data){
        var userId = data.userId;
       
        if(usersid[userId]){
            console.log('User' + userssocketid[usersid[userId]] + ' is online.')
            socket.emit("userOtherOnline", data.userId);
        }
        else
        {
            console.log('User' + userId + ' is offline.')
            socket.emit("userOtherOffline", userId);
        }
    
        
    });

    // socket.emit('message', 'Welcome to ChatCord!'); 

    // Broadcast when a user connects
    // socket.broadcast.emit('message', 'A user has joined the chat!');

    // Run when client disconnects
    socket.on('disconnect' , () => {
        console.log('disconnect');
        // io.emit('message' , 'A user has left the chat.');

        console.log('user ' + userssocketid[socket.id] + ' offline');
        // remove saved socket from userssocketid object
        delete usersid[userssocketid[socket.id]];
        delete userssocketid[socket.id];
        
        
    });

    // Listen for chatMessage
    socket.on('chatMessage' , (msg , id_user_other , id_user) => {

        var dataPost = new URLSearchParams();
        dataPost.append('text_message', msg);
        dataPost.append('id_user', id_user);
        dataPost.append('id_user_other', id_user_other);

        fetch(`${url}/store/chatcontent` , {
            method: 'POST',
            body: dataPost,
        })
        .then(function(response) { 
            return response.json();
        }).then(function(resultsJSON){

            var results = resultsJSON;

            if(results.status === 'success'){
                io.to(''+id_user_other+id_user+'')
                .to(''+id_user+id_user_other+'')
                .emit('message' , results);
            }
            else
            {

            }

        })
        .catch(function(err) {
            console.log('Error Post Chat Content: ' + err);
        });

    });


    socket.on('myroom', (id_user , id_other_user) => {
        socket.join(''+id_user+id_other_user+'');
    });

});

const PORT = process.env.PORT || 3000;

server.listen(PORT, () => console.log(`Server running on port ${PORT}`));