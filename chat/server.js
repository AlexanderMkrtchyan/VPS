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
    credentials: true,
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

// number of sockets in this namespace (on this node)
var pool = mysql.createPool({
  host: "localhost",
  user: "alex_admin",
  password: "Boxing1112_!",
  database: "alex_dating"
});


io.on("connection", (socket) => {



  const data = socket.handshake.auth.userId
  let def_rm = `SELECT DISTINCT default_room FROM friend_request WHERE accepter_id=${data} AND status=1`;

  function yodr() {
    pool.query(def_rm, (err, res) => {
      if (err) throw err
      let def_room = res[0].default_room
      getOnlineUsers(def_room)
    })
  }
  // setInterval(() => {
  //   yodr()
  // }, 60000)

  socket.data.userId = data

  async function getOnlineUsers(def_room) {
    let onlineUserList = []

    const sidor = await io.in(def_room).fetchSockets();
    let sidor_len = 0
    sidor.forEach(current_socket => {
      sidor_len++
      if (!onlineUserList.includes(current_socket.data.userId)) {
        onlineUserList.push(current_socket.data.userId)
      }
      if (sidor_len == sidor.length) {
        io.to(socket.id).emit('online pidors', onlineUserList)
      }
    });
  }




  var friend_list = []

  // getting uid of current user
  if (data == 0 || data == null) {
    return
  }




  socket.on('online status', () => {
    let onlineStatus = `UPDATE online_users SET time=CURRENT_TIMESTAMP WHERE user_id=${data}`;
    pool.query(onlineStatus, (err, res) => {
      if (err) throw err
    })
  })

  pool.getConnection(function (err, connection) {
    if (err) throw err; // not connected!

    // Updating online status
    let in_online_users = `SELECT * FROM online_users WHERE user_id=${data}`
    connection.query(in_online_users, function (err, result) {
      if (err) throw err;
      if (result.length > 0) {
        let online_status = `UPDATE online_users SET status=1, time=CURRENT_TIMESTAMP WHERE user_id=${data}`;
        if (err) throw err;
        connection.query(online_status, function (err, result) {
          if (err) throw err;
        });
      } else {
        let insert_online_user = `INSERT INTO online_users (user_id, status) VALUES (${data}, 1)`;
        if (err) throw err;
        connection.query(insert_online_user, function (err, result) {
          if (err) throw err;
        });
      }
    });


    // Giving user meta key for communication
    var sky = 'SELECT meta_value FROM wp_usermeta WHERE user_id=' + data + ' AND meta_key="skey"';

    // Use the connection
    var user_socket
    connection.query(sky, function (error, results, fields) {
      // When done with the connection, release it.
      const final = Object.values(JSON.parse(JSON.stringify(results)));
      let send_to = final[0].meta_value
      user_socket = send_to
      socket.join(send_to)
      socket.join(socket.id)
      // Handle error after the release.
      if (error) throw error;
    });

    // Getting and sending user notifications

    let user_notifications = 'SELECT * from `notifications` where user_id=' + data + ' ORDER BY `id` DESC'
    connection.query(user_notifications, function (error, results, fields) {
      if (error) throw error;
      // When done with the connection, release it.
      const final = Object.values(JSON.parse(JSON.stringify(results)));
      socket.join(socket.id)
      io.to(socket.id).emit('get notifications', final)
    });

    // Getting user friends
    function getUserFriendList() {
      return new Promise((resolve, reject) => {
        let user_friends = 'SELECT DISTINCT  accepter_id, room_id, default_room FROM friend_request WHERE requester_id=' + data + ' AND status=1 ';
        connection.query(user_friends, function (error, results, fields) {
          if (error) reject(error);
          let el_length = 0
          let sid = []
          results.forEach(el => {
            friend_list.push(el)
            socket.join(el.room_id)
            socket.join(el.default_room)
            sid.push({
              'accepter_id': el.accepter_id
            })
            el_length++
            if (el_length == results.length) {
              resolve(sid)
              // io.to(socket.id).emit('friend list', sid)
            }
          });
        });
      })
    }

    // getting unread messages
    getUserFriendList().then(klir => {
      return new Promise(resolve => {
        let unReadMesCount = `SELECT count, recieved_from FROM unread_messages WHERE user_id=${data}`
        connection.query(unReadMesCount, function (error, results, fields) {
          klir.map(function (item) {
            for (let count of results) {
              if (count.recieved_from == item.accepter_id) {
                item.count = count.count
              }
            }
          });
          resolve(klir)
        });
      })
    }).then(pudz => {
      var pidor = []
      let i = 0
      pudz.map(item => {
        i++
        let online_users = `SELECT time, user_id FROM online_users WHERE user_id=${item.accepter_id}`
        connection.query(online_users, function (error, results, fields) {
          if (results[0]) {
            let date = results[0].time
            let difference = Date.now() - Date.parse(date)
            let status
            if (difference > 60000) {
              status = 0
            } else {
              status = 1
            }
            item.status = status
          }
          pidor.push(item)
          if (i == pidor.length) {
            // sending friend list
            io.to(socket.id).emit('friend list', pidor)
          }
        });
      })
    })
    connection.release();
  });











  socket.on('friend_request', data => {
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
      let notification_row_id
      // saving notification
      let content = new Object()
      content.fr_type = data.fr_type
      content.requester_id = data.requester_id
      let content_data = JSON.stringify(content)
      let notify = `INSERT INTO notifications (type, status, user_id, content) VALUES ("friend_request",0,${data.accepter_id},${JSON.stringify(content_data)})`;

      con.query(notify, function (err, result) {
        if (err) throw err;
        notification_row_id = result.insertId
      });

      // getting uid of user and sending friend request notification
      let sky = 'SELECT meta_value FROM wp_usermeta WHERE user_id=' + data.accepter_id + ' AND meta_key="skey"';

      con.query(sky, function (err, result) {
        if (err) throw err;
        const final = Object.values(JSON.parse(JSON.stringify(result)));
        let send_to = final[0].meta_value
        socket.to(send_to).emit('asking for request', {
          'requester_id': data.requester_id,
          'fr_type': data.fr_type,
          'id': notification_row_id
        })
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

  //////////////////////////////////////////////////////////////////////
  ////////////////////// RECREATING NEW VIDEO CHAT /////////////////////
  //////////////////////////////////////////////////////////////////////
  socket.on('sending my id to another user', data => {
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.recieverId))) {
        socket.to(e.room_id).emit('caller peer id', {
          'peerId': data.peerId,
          'senderId': data.senderId,
          'constrains': data.constrains
        })
      }
    })
  })

  socket.on('reciever peer id after getting my id', data => {
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.senderId))) {
        socket.to(e.room_id).emit('remote peer id which will be called', {
          'peerId': data.peerId,
          'senderId': data.recieverId,
          'constrains': data.constrains
        })
      }
    })
  })

  socket.on('no answer', data => {
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.callerId))) {
        socket.to(e.room_id).emit('nothing')
      }
    })
  })
  socket.on('end call', data => {
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.callerId))) {
        socket.to(e.room_id).emit('nothing')
      }
    })
  })

  //////////////////////////////////////////////////////////////////////
  ////////////////  END OF RECREATING NEW VIDEO CHAT ///////////////////
  //////////////////////////////////////////////////////////////////////


  //-------------------------------------------------------------------------------//

  //////////////////////////////////////////////////////////////////////
  ////////////////////// BACKDROPS VIDEO CHAT /////////////////////
  //////////////////////////////////////////////////////////////////////
  socket.on('joining backdrop room', e => {
    // console.log(e)
    socket.join(e)
  })
  socket.on('sending backdrops id to another user', data => {
    // socket.join(data.room_id)
    socket.to(data.room_id).emit('caller peer id backdrop', {
      'peerId': data.peerId,
      'senderId': data.senderId,
      'constrains': data.constrains
    })
  })

  socket.on('recieve backdrop peer id', data => {

    socket.to(data.room_id).emit('remote peer id which will be called backdrop', {
      'peerId': data.peerId,
      'senderId': data.recieverId,
      'constrains': data.constrains
    })
  })

  socket.on('no answer backdrop', data => {
    socket.to(data.room_id).emit('nothing')
  })
  socket.on('end call backdrop', data => {
    socket.to(data.room_id).emit('nothing')

  })

  //////////////////////////////////////////////////////////////////////
  ////////////////  END OF BACKDROPS VIDEO CHAT ///////////////////
  //////////////////////////////////////////////////////////////////////




  // unset unread messages
  function unsetUnreadMessages(sen, res) {
    pool.getConnection(function (err, con) {
      if (err) throw err;

      // count unread messages
      let check = `SELECT * FROM unread_messages WHERE  user_id=${sen} AND recieved_from=${res}`;
      con.query(check, function (err, result) {
        if (err) throw err;
        console.log(result)

        let sql = `UPDATE unread_messages SET count=0 WHERE user_id=${sen} AND recieved_from=${res}`;
        if (err) throw err;
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log("Number of records inserted: " + result.affectedRows);
        });

      });

      con.release()
    })
  }


  // updating user unread messages
  function unreadMessages(res, sen) {

    pool.getConnection(function (err, con) {
      if (err) throw err;

      // count unread messages
      let check = `SELECT * FROM unread_messages WHERE  user_id=${sen} AND recieved_from=${res}`;
      con.query(check, function (err, result) {
        if (err) {
          throw err;
        }
        if (result.length > 0) {
          console.log(result)

          let sql = `UPDATE unread_messages SET count=${result[0].count + 1} WHERE user_id=${sen} AND recieved_from=${res}`;
          if (err) throw err;
          con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("Number of records inserted: " + result.affectedRows);
          });
        } else {
          let sql = `INSERT INTO unread_messages (user_id, count, recieved_from) VALUES (${sen}, 1,  ${res})`;
          if (err) throw err;
          con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("Number of records inserted: " + result.affectedRows);
          });
        }
      });

      con.release()
    })
  }

  // messaging

  socket.on('send message', data => {
    console.log(data)
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.reciever_id))) {
        socket.to(e.room_id).emit('recieve message', data)

        // Sending data to DB
        pool.getConnection(function (err, con) {
          if (err) throw err;
          let save_message = `INSERT INTO chat_system (message, type, user_id, reciever_id, room_id) VALUES ('${data.message}',1,${data.sender_id},${data.reciever_id}, '${e.room_id}')`;
          con.query(save_message, function (err, result) {
            if (err) throw err;
          });

          unreadMessages(data.sender_id, data.reciever_id)

          con.release()
        })
      }
    })
  })

  socket.on('get user message', data => {
    console.log(friend_list)
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.reciever_id))) {
        unsetUnreadMessages(data.sender_id, data.reciever_id)
        let room_id = e.room_id

        // Sending data to DB
        pool.getConnection(function (err, con) {
          if (err) throw err;

          let get_user_chat = `SELECT message, date, user_id, reciever_id, type FROM chat_system WHERE room_id='${room_id}' ORDER BY date ASC`;

          con.query(get_user_chat, function (err, result) {
            if (err) throw err;
            socket.emit('getting chat history', result)
          });
          con.release()
        })

      }
    })
  })


  // getting/sending audio messages

  socket.on('radio', function (data) {

    // can choose to broadcast it to whoever you want
    friend_list.forEach(e => {
      if (Object.values(e).includes(parseInt(data.reciever_id))) {

        socket.to(e.room_id).emit('voice', data)

        // Sending data to DB
        pool.getConnection(function (err, con) {
          if (err) throw err;
          let save_message = `INSERT INTO chat_system (message, type, user_id, reciever_id, room_id) VALUES ('${data.blob_link}',0,${data.sender_id},${data.reciever_id}, '${e.room_id}')`;

          con.query(save_message, function (err, result) {
            if (err) throw err;
          });
          con.release()
        })

      }
    })
  });



  ////////////////////////////////////////////////////////////////////
  ///////////////// MAKING DATING WITH AI ////////////////////////////
  ////////////////////////////////////////////////////////////////////
  socket.on('dating response status', data => {
    if (data.status) {
      console.log('jaj tam pdzit')
      pool.getConnection(function (err, con) {
        if (err) throw err;


        // inserting to dating

        let dating_time_notification = `SELECT * FROM users_dating WHERE user_id1=${data.user_id} AND user_id2=${data.requester_id} OR user_id1=${data.requester_id} AND user_id2=${data.user_id}`
        con.query(dating_time_notification, function (err, result) {
          if (err) throw err;

          if (result.length == 0) {
            let dating_time = `INSERT INTO users_dating (user_id1, user_id2, start_time, session_token) VALUES (${data.user_id},${data.requester_id},'${data.time}', '${uuid()}')`;
            con.query(dating_time, function (err, result) {
              if (err) throw err;
              sendToUser()
            });
          } else {
            let update_dating_time = `UPDATE users_dating SET start_time='${data.time}' WHERE user_id1=${data.user_id} and user_id2=${data.requester_id} OR user_id1=${data.requester_id} and user_id2=${data.user_id}`;
            con.query(update_dating_time, function (err, result) {
              if (err) throw err;
              sendToUser()
            });
          }
        });


        function sendToUser() {
          let sky = 'SELECT meta_value FROM wp_usermeta WHERE user_id=' + data.requester_id + ' AND meta_key="skey"';
          con.query(sky, function (err, result) {
            if (err) throw err;
            const final = Object.values(JSON.parse(JSON.stringify(result)));
            let send_to = final[0].meta_value
            console.log('jojem ashkit')
            let send_notif_link = `SELECT * FROM users_dating WHERE user_id1=${data.user_id} and user_id2=${data.requester_id} OR user_id1=${data.requester_id} and user_id2=${data.user_id}`
            con.query(send_notif_link, function (err, res) {
              if (err) throw err;
              socket.to(send_to).emit('get videochat link', {

                'user_id': data.user_id,
                'requester_id': data.requester_id,
                'token': res[0].session_token,
                'time': data.time
              })
              socket.emit('get videochat link', {
                'user_id': data.user_id,
                'requester_id': data.requester_id,
                'token': res[0].session_token,
                'time': data.time
              })

              let notif_data = new Object()
              notif_data.time = data.time
              notif_data.user1 = data.user_id
              notif_data.user2 = data.requester_id
              notif_data.token = res[0].session_token

              let already_selected = `SELECT content FROM notifications WHERE user_id=${data.user_id} AND user_id2=${data.requester_id} AND type='dating_session'`
              con.query(already_selected, function (err, result) {
                if (err) throw err;
                if (result.length == 0) {
                  let dating_notification = `INSERT INTO notifications (type, status, user_id,user_id2, content) VALUES ("dating_session",0,${data.user_id},${data.requester_id},'${JSON.stringify(notif_data)}')`;

                  con.query(dating_notification, function (err, result) {
                    if (err) throw err;
                  });

                } else {
                  let update_time = `UPDATE notifications SET content='${JSON.stringify(notif_data)}' WHERE user_id=${data.user_id} and user_id2=${data.requester_id} and type='dating_session'`;
                  con.query(update_time, function (err, result) {
                    if (err) throw err;
                  });
                }
              }); 

              // sending videochat link to notifications
              let videochat_link = `SELECT content FROM notifications WHERE user_id=${data.user_id} AND user_id2=${data.requester_id} AND type='dating_link'`
              con.query(videochat_link, function (err, result) {
                if (err) throw err;
                if (result.length == 0) {
                  let dating_notification = `INSERT INTO notifications (type, status, user_id,user_id2, content) VALUES ("dating_link",0,${data.user_id},${data.requester_id},'${JSON.stringify(notif_data)}')`;

                  con.query(dating_notification, function (err, result) {
                    if (err) throw err;
                  });

                } else {
                  let update_time = `UPDATE notifications SET content='${JSON.stringify(notif_data)}' WHERE user_id=${data.user_id} and user_id2=${data.requester_id} and type='dating_link'`;
                  con.query(update_time, function (err, result) {
                    if (err) throw err;
                  });
                }
              });


            });
          });


        }
        con.release()


      })
    } else {
      console.log('jaj tam glxit')
    }

  })

  socket.on('dating request', data => {


    pool.getConnection(function (err, con) {

      let notif_data = new Object()
      notif_data.time = data.date
      notif_data.user1 = data.user1
      notif_data.user2 = data.user2
      let already_selected = `SELECT content FROM notifications WHERE user_id=${data.user2} AND user_id2=${data.user1} AND type='dating_time'`
      con.query(already_selected, function (err, result) {
        if (err) throw err;
        if (result.length == 0) {
          let dating_notification = `INSERT INTO notifications (type, status, user_id,user_id2, content) VALUES ("dating_time",0,${data.user2},${data.user1},'${JSON.stringify(notif_data)}')`;

          con.query(dating_notification, function (err, result) {
            if (err) throw err;
          });

        } else {

          let update_time = `UPDATE notifications SET content='${JSON.stringify(notif_data)}' WHERE user_id=${data.user2} and user_id2=${data.user1} and type='dating_time'`;
          con.query(update_time, function (err, result) {
            if (err) throw err;
          });
        }
      });




      let sky = 'SELECT meta_value FROM wp_usermeta WHERE user_id=' + data.user2 + ' AND meta_key="skey"';

      con.query(sky, function (err, result) {
        if (err) throw err;
        const final = Object.values(JSON.parse(JSON.stringify(result)));
        let send_to = final[0].meta_value
        socket.to(send_to).emit('asking for dating', {
          'requester_id': data.user1,
          'time': data.date,
        })

      });

      con.release();
    })
    console.log(data)



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