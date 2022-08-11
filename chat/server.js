// const socket = require('socket.io');
// const http = require('https');
// const request = require('request');
// const fs = require('fs');
// var mysql = require('mysql2');
// const socket_client = require("socket.io-client")("https://quigleyshores.com:3000");

// socket_client.on("connect_error", (err) => {
//   console.log(`Bozi txen sxala talis ${err.message}`);
// });


// const privateKey = fs.readFileSync('/etc/letsencrypt/live/quigleyshores.com/privkey.pem', 'utf8')
// const certificate = fs.readFileSync('/etc/letsencrypt/live/quigleyshores.com/cert.pem', 'utf8')
// const chain = fs.readFileSync('/etc/letsencrypt/live/quigleyshores.com/chain.pem')
// const credentials = {
//     key: privateKey, 
//     cert: certificate,
//     ca: chain
// }
const { 
  readFileSync
} = require("fs");
const {
  createSecureServer
} = require("http2");
const {
  Server
} = require("socket.io");
var mysql = require('mysql2');
const httpServer = createSecureServer({
  allowHTTP1: true,
  key: readFileSync('/usr/local/hestia/data/users/alex/ssl/quigleybrook.com.key'),
  cert: readFileSync('/usr/local/hestia/data/users/alex/ssl/quigleybrook.com.crt')
});

const io = new Server(httpServer, {
  cors: {
    origin: "https://quigleybrook.com",
    methods: ["GET", "POST"],
    credentials: true
  }
});

function uuid() {
  var dt = new Date().getTime();
  var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
    var r = (dt + Math.random() * 16) % 16 | 0;
    dt = Math.floor(dt / 16);
    return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
  });
  return uuid;
}




io.on("connection", (socket) => {




  // var pool = mysql.createPool({
  //   host: "localhost",
  //   user: "root",
  //   database: "dating",
  //   connectionLimit: 10,

  // });
  socket.on('global_connected', data => {
    console.log('global_connected data: ' + data)
    // getting uid of current user
    if (data == 0 || data == null) {
      return
    }


    // create the connection to database
    const pool = mysql.createPool({
      host: 'localhost',
      user: 'alex_admin',
      password: 'Boxing1112_!',
      database: 'alex_dating',
      port: '/var/run/mysqld/mysqld.sock'
    });






    var sky = 'SELECT meta_value FROM wp_usermeta WHERE user_id=' + data + ' AND meta_key="skey"';

    // Use the connection
    pool.query(sky, function (error, results, fields) {
      if (error) throw error;
      console.log(results)
      // When done with the connection, release it.
      const final = Object.values(JSON.parse(JSON.stringify(results)));
      let send_to = final[0].meta_value
      socket.join(send_to)
      socket.join(socket.id)
      io.to(socket.id).emit('get_skey', send_to)
      // Handle error after the release.
    });
  })



  socket.on('friend_request', data => {
    console.log(data)
    pool.getConnection(function (err, con) {
      let friends = false
      let check = 'SELECT * FROM friend_request WHERE  requester_id=' + data.requester_id + ' AND accepter_id=' + data.accepter_id + ' LIMIT 1';
      con.query(check, function (err, result) {
        if (err) throw err;
        if (result.length > 0) {
          let sql = 'UPDATE friend_request SET ' + data.fr_type + '=1 WHERE requester_id=' + data.requester_id + ' AND accepter_id=' + data.accepter_id + '';
          if (err) throw err;
          con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("Number of records inserted: " + result.affectedRows);
          });
        } else {
          let sql = 'INSERT INTO friend_request (requester_id, accepter_id, ' + data.fr_type + ') VALUES (' + data.requester_id + ',' + data.accepter_id + ',1)';
          if (err) throw err;
          con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("Number of records inserted: " + result.affectedRows);
          });
        }
      });
      let friend_check = 'SELECT * FROM friend_request WHERE  requester_id=' + data.accepter_id + ' AND accepter_id=' + data.requester_id + ' LIMIT 1';

      con.query(friend_check, function (err, result) {
        if (err) throw err;
        if (result.length > 0) {
          let room_id = uuid()
          let friend_1 = 'UPDATE friend_request SET status=1 , room_id="' + room_id + '" WHERE requester_id=' + data.requester_id + ' AND accepter_id=' + data.accepter_id + '';
          let friend_2 = 'UPDATE friend_request SET status=1 , room_id="' + room_id + '" WHERE requester_id=' + data.accepter_id + ' AND accepter_id=' + data.requester_id + '';
          con.query(friend_1, function (err, result) {
            if (err) throw err;
            console.log("friend 1");
          });
          con.query(friend_2, function (err, result) {
            if (err) throw err;
            console.log("friend 2");
          });
        }
      });
      // getting uid of user 
      let sky = 'SELECT meta_value FROM wp_usermeta WHERE user_id=' + data.accepter_id + ' AND meta_key="skey"';

      con.query(sky, function (err, result) {
        if (err) throw err;
        const final = Object.values(JSON.parse(JSON.stringify(result)));
        let send_to = final[0].meta_value
        socket.to(send_to).emit('asking for request', data.requester_id, data.fr_type)
      });
      con.release();
    });


  })
  socket.on('accepted_request', data => {

    let uuid4 = uuid()
    pool.getConnection((err, con) => {
      let sql = 'UPDATE friend_request SET status=1, room_id="' + uuid4 + '" WHERE requester_id=' + data.requester_id + ' AND accepter_id=' + data.accepter_id + '';
      if (err) throw err;
      con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Number of records inserted: " + result.affectedRows);
      });
      con.release();
    })
  })

  socket.on('accept_friend', (id1, id2) => {


  })

  socket.on('both_ids', (room, id) => {

    socket.to(room).emit('both_sockets', id)
  })



  socket.on('join-room', (roomId, userId, constrains) => {
    console.log(userId)
    socket.join(roomId)
    socket.to(roomId).emit('user-connected', userId, constrains)

    socket.on('disconnect', () => {
      socket.to(roomId).emit('user-disconnected', userId)
    })
  })





  // ...
});

httpServer.listen(3000);




// var http_server = http.createServer(credentials).listen(3000, () => {
//   console.log('Node server is connected boz@')
// })

// var io = socket(http_server, {
//   cors: {
//     origin: "*",
//     methods: ["GET", "POST"],
//     credentials: true
//   }
// })

// function uuid() {
//   var dt = new Date().getTime();
//   var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
//     var r = (dt + Math.random() * 16) % 16 | 0;
//     dt = Math.floor(dt / 16);
//     return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
//   });
//   return uuid;
// }

// io.on('connection', async (socket) => {








// //
// //const sgMail = require('@sendgrid/mail')
// //sgMail.setApiKey(process.env.SENDGRID_API_KEY)
// //const msg = {
// //  to: 'alexander88m@gmail.com', // Change to your recipient
// //  from: 'quigley@quigleyshores.com', // Change to your verified sender
// //  subject: 'Sending with SendGrid is Fun',
// //  text: 'and easy to do anywhere, even with Node.js',
// //  html: '<strong>and easy to do anywhere, even with Node.js</strong>',
// //}
// //sgMail
// //  .send(msg)
// //  .then(() => {
// //    console.log('Email sent')
// //  })
// //  .catch((error) => {
// //    console.error(error)
// //  })
// //


































//   // var con = mysql.createConnection({
//   //   host: "localhost",
//   //   user: "dating",
//   //   password: "Boxing11",
//   //   database: "dating"
//   // });
//   // con.connect(function(err) {
//   //   if (err) throw err;
//   //   con.query("SELECT * FROM chat_system", function (err, result, fields) {
//   //     if (err) throw err;
//   //     console.log('sql data is fetched')
//   //     socket.emit('sql data', {result})
//   //   });
//   // });
//   // socket.emit('socket-connected', {'socket_id': socket.id})
//   // //////////// PEEEEEEEEEEERRRRRRR /////////////////
//   // socket.on('join-room', data => {
//   //   console.log('peer_id: ' +data.peer_id + 'socket_id: ' + data.socket_id)
//   //   socket.join(data.socket_id)
//   //   socket.broadcast.emit('user-connected', {'socket_id':data.socket_id, 'peer_id': data.peer_id})  
//   //   socket.on('disconnecting', () => {
//   //     console.log('this klir is disconnected: ' + data.peer_id)
//   //     console.log('this is socket rooms: ' + socket.rooms);
//   //     socket.broadcast.emit('user disconnected', {'socket_id': data.socket_id, 'peer_id': data.peer_id})
//   //   })  
//   // })
//   // socket.on('call to socket', data=>{
//   //   console.log('call to socket works')
//   //   socket.emit('user is calling', data)
//   // })
//   /////////// PPPPPPPPPPPPPPPPP///////////////////

//   //   socket.on('peer connected', data=>{
//   //     socket.broadcast.emit('peer is', {'id':data.peer_id})
//   //   })
//   //   socket.on('chat page', function(data){
//   //     if(!connected_users.includes(data.user_id)){
//   //       connected_users.push(data.user_id)
//   //     }
//   //     socket.join(data.user_id)
//   //     socket.broadcast.emit('new connected user',{'user': data.user, 'user_id': data.user_id, 'user_image': data.user_image, 'socket_id': data.sid})
//   //   })
//   //   socket.on('user room', function(room){
//   //    socket.join(room.room);
//   //   })
//   //   socket.on('small room', function(data){
//   //     socket.join(data.room);
//   //     socket.join(data.small_room);

//   //   })

//   //   socket.on('small chat message', (data)=>{

//   //     io.to(data.room_id).emit('small message', data)
//   //     io.to(data.to_user_id).emit('notification', data) 
//   //   })

//   //   socket.on('leav_rooms', function(room_leave){

//   //     io.to(room_leave.room).emit('message', {'message': room_leave.to_user + ' left the chat'})
//   //     socket.leave(room_leave.room)
//   //   })

//   // io.emit('sql users', user_conversation)

// })