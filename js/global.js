// var socket = io.connect({});
// socket.onAny((event, ...args) => {
//   console.log(event, args);
// });


// // const peer = new Peer({
// //   host: '/',
// //   port: '3001',
// // })
let user_id = document.getElementById('my_id').dataset.id
console.log(user_id)






// socket.on('connection', e => {
//   console.log(e)
//   console.log('klir')
// })




// //   setInterval(() => notifyMe(), 600000);

// // function notifyMe(data) {


// //   // Let's check if the browser supports notifications
// //   if (!("Notification" in window)) {
// //     alert("This browser does not support desktop notification");
// //   }

// //   // Let's check whether notification permissions have already been granted
// //   else if (Notification.permission === "granted") {
// //     // If it's okay let's create a notification
// //     var notification = new Notification("Hi there! You are 10 minutes in this page... What the hell are you doing here?");
// //   }

// //   // Otherwise, we need to ask the user for permission
// //   else if (Notification.permission !== "denied") {
// //     Notification.requestPermission().then(function (permission) {
// //       // If the user accepts, let's create a notification
// //       if (permission === "granted") {
// //         var notification = new Notification("Hi there! Why you denied my notifications?");
// //       }
// //     });
// //   }

// //   // At last, if the user has denied notifications, and you
// //   // want to be respectful there is no need to bother them any more.
// // }

















// socket.on('asking for request', (uid, flirt) => {
//   console.info('asking for rquest: ' + uid)
//   jQuery.ajax({
//     url: ajax_object.ajax_url,
//     type: 'POST',
//     dataType: "JSON",
//     data: {
//       'user_id': uid,
//       'action': 'askForFriend'
//     },
//     success: function (data) {
//       console.log(data)
//       let num = parseInt(flirt.slice(-1))
//       console.log(num)

//       let flirts = ['smile', 'wink', 'flower', 'heart'][num - 1]
//       let notification = document.getElementById('klir')
//       console.log(notification)

//       let html = '<div class="qs-notif--item">\
//                     <div class="qs-notif--img" >\
//                         <img src="' + data[0] + '" alt="">\
//                     </div>\
//                     <div class="qs-notif--content">\
//                         <div class="qs-notif--part">\
//                             <a href="http://localhost/profile/?id=' + uid + '" target="_blank">' + data[1] + '</a> sent you \
//                             <svg role="img">\
//                                 <use href="' + ajax_object.directory_uri + '/icons/icons.svg#' + flirts + '"/>\
//                             </svg>\
//                             <div class="qs-notif--btn">\
//                                 <a class="qs-btn btn-secondary btn-xsm" href="http://localhost/profile/?id=' + uid + '" target="_blank">See profile</a>\
//                             </div>\
//                         </div>\
//                         <div class="qs-notif--part">\
//                             <time>3 Nov 11:30</time>\
//                         </div>\
//                     </div>\
//                   </div>'
//       notification.insertAdjacentHTML("beforebegin", html);













//       // accept/deny request

//       const accept = document.getElementById('accept_request')
//       const deny = document.getElementById('deny_request')

//       deny.addEventListener('click', () => {
//         document.getElementById('notificat').style.display = 'none'
//       })
//       accept.addEventListener('click', () => {
//         socket.emit('accepted_request', {
//           'accepter_id': user_id,
//           'requester_id': uid
//         })
//       })
//     },
//     error: function (er) {
//       console.log(er)
//     }
//   });
// })
// socket.on('get_skey', data => {
//   console.warn(data)
// })

// socket.emit('global_connected', user_id)