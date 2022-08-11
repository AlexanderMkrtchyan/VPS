const localVideo = document.querySelector('#localVideo');
const remoteVideo = document.querySelector('#remoteVideo');
const mute = document.querySelector('#mute')
const unmute = document.querySelector('#unmute')
const stop_video = document.querySelector('#stop_video')
const show_video = document.querySelector('#start_video')
const video_call = document.querySelector('#video_call')
const audio_call = document.querySelector('#audio_call')
const video_answer = document.querySelector('#video_answer')
const audio_answer = document.querySelector('#audio_answer')
const no_answer = document.querySelector('#no_answer')
const end_call = document.querySelector('#end_call')
const sound = document.querySelector('#call_music')


let caller_id
peer.on('open', id => {
  console.log('Peer Id is: ' + id)
})

window.addEventListener('click', e => {
  sound.play()
})

mute.addEventListener('click', e => {
  localVideo.srcObject.getTracks()[0].enabled = false
})
unmute.addEventListener('click', e => {
  localVideo.srcObject.getTracks()[0].enabled = true
})
stop_video.addEventListener('click', e => {
  localVideo.srcObject.getTracks()[1].enabled = false
})
show_video.addEventListener('click', e => {
  localVideo.srcObject.getTracks()[1].enabled = true
})

end_call.addEventListener('click', e => {
  sound.pause();
  sound.muted = true;

  overlay.style.display = 'none';
  popup.style.display = 'none';
  if (localVideo.srcObject) {
    localVideo.srcObject.getTracks().forEach(function (track) {
      if (track.readyState == 'live') {
        track.stop();
      }
    });
  }

  if (remoteVideo.srcObject) {
    remoteVideo.srcObject.getTracks().forEach(function (track) {
      if (track.readyState == 'live') {
        track.stop();
      }
    });
  }
  socket.emit('end call', {
    'callerId': caller_id,
    'accepterId': user_id
  })
})

// call functionality
video_call.addEventListener('click', e => {
  sound.muted = false
  overlay.style.display = 'block';
  popup.style.display = 'block';
  socket.emit('sending my id to another user', {
    'peerId': peer.id,
    'senderId': user_id,
    'recieverId': uid,
    'constrains': {
      video: true,
      audio: true
    }
  })
})

audio_call.addEventListener('click', e => {
  sound.muted = false
  overlay.style.display = 'block';
  popup.style.display = 'block';
  socket.emit('sending my id to another user', {
    'peerId': peer.id,
    'senderId': user_id,
    'recieverId': uid,
    'constrains': {
      video: false,
      audio: true
    }
  })
})

socket.on('caller peer id', data => {
  caller_id = data.senderId
  socket.emit('reciever peer id after getting my id', {
    'peerId': peer.id,
    'senderId': data.senderId,
    'recieverId': user_id,
    'constrains': data.constrains
  })
})

socket.on('remote peer id which will be called', data => {
  navigator.mediaDevices.getUserMedia({
    audio: true,
    video: true
  }).then(myStream => {
    socket.on('nothing', e => {
      myStream.getTracks().forEach(function (track) {
        if (track.readyState == 'live') {
          track.stop();
        }
      });
      alert('boz@ chi patasxanum')
      sound.pause()
      overlay.style.display = 'none';
      popup.style.display = 'none';
    })
    if (!data.constrains.video && !data.constrains.audio) {
      alert('this bitch wont speak with you')
      return
    } else if (!data.constrains.video && data.constrains.audio) {
      myStream.getTracks()[1].stop()
    }
    sound.muted = true;

    localVideo.srcObject = myStream
    var call = peer.call(data.peerId, myStream);
    socket.emit('calling', {
      'callerId': user_id,
      'accepterId': uid
    })
    call.on('stream', function (answerStream) {
      console.log(answerStream)
      sound.muted = true;

      console.log('getting answer on call')
      remoteVideo.srcObject = answerStream
      remoteVideo.onloadedmetadata = function (e) {
          // Do something with the video here.
          remoteVideo.play()
        },
        function (err) {
          console.log("The following error occurred: " + err.name);
        }
    });
  })
})


function give_answer() {
  return new Promise(resolve => {
    video_call.style.display = 'none'
    video_answer.addEventListener('click', e => {
      sound.muted = true;

      resolve({
        audio: true,
        video: true
      })
    })
    audio_answer.addEventListener('click', e => {
      sound.muted = true;

      resolve({
        audio: true,
        video: false
      })
    })
    no_answer.addEventListener('click', e => {
      overlay.style.display = 'none';
      popup.style.display = 'none';
      sound.pause()
      resolve(false)
    })
  })
}




peer.on('call', async call => {
  sound.muted = false
  overlay.style.display = 'block';
  popup.style.display = 'block';
  video_answer.style.backgroundColor = 'red'
  audio_answer.style.backgroundColor = 'green'
  let answer_way = await give_answer()
  if (!answer_way) {
    socket.emit('no answer', {
      'callerId': caller_id,
      'accepterId': user_id
    })
    return
  }
  navigator.mediaDevices.getUserMedia(answer_way).then(answerStream => {
    call.answer(answerStream);
    localVideo.srcObject = answerStream
    call.on('stream', function (userVideoStream) {
      console.log('getting connected user media stream')
      remoteVideo.style.display = 'inline-block'
      remoteVideo.srcObject = userVideoStream
    })

  })
});

// Initialize Variables
var closePopup = document.getElementById("popupclose");
var overlay = document.getElementById("overlay");
var popup = document.getElementById("popup");
// Close Popup Event
closePopup.onclick = function () {
  overlay.style.display = 'none';
  popup.style.display = 'none';
};


///////////////////////////////////////
//////////////CHAT SYSTEM//////////////
///////////////////////////////////////

// Current local time

function get_time() {
  const now = new Date();
  const offsetMs = now.getTimezoneOffset() * 60 * 1000;
  const dateLocal = new Date(now.getTime() - offsetMs);
  const str = dateLocal.toISOString().slice(0, 19).replace(/-/g, "/").replace("T", " ");
  return str
}
let chat_blocks = document.getElementById('chat_blocks')




  async function sidrdze(){
    

  }
// Getting friend list

socket.on('friend list', async data => {
  // const boxes = document.querySelectorAll('.qs-chat--user');

  // boxes.forEach(box => {
  //   box.remove();
  // });
  for (let user of data) {
    jQuery.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        'user_id': user.accepter_id,
        'action': 'askForFriend'
      },
      success: user_data => {
        user_data = JSON.parse(user_data)
        console.log(user_data)
        let user_list = document.getElementById('user_list')

        function sidor() {
          if (user.count > 0) {
            return '<div  class="qs-chat--user-msg-count">' + user.count + '</div>'
          } else {
            return ''
          }
        } 
        let online_status
        user.status ? online_status = 'online' : online_status = ''
        let html = '<div  class="qs-chat--user" id="' + user.accepter_id + '" data-id="' + user.accepter_id + '" >\
                      <div class="qs-chat--user-img">\
                      <span class="online-status ' + online_status + '"></span>\
                          <img id="user_profile_image" src="' + user_data[0] + '" alt="">\
                      </div>\
                      <div class="qs-chat--user-details">\
                          <div class="qs-chat--user-name">\
                              <div class="user_name">' + user_data[1] + '</div>\
                              ' + sidor() + '\
                              <div class="qs-chat--user-time"></div>\
                          </div>\
                          <div class="recieved_message_in_user_list" class="qs-chat--user-msg">\
                              your message here\
                          </div>\
                      </div>\
                  </div>'
        user_list.insertAdjacentHTML("beforebegin", html);
      }
    })
  }
})





const to_append = document.getElementById('inserting_messages')
let clicked_user_image_src = ''
let uid
let user_name
let logged_in_user_image_src = document.getElementById('user_profile_image').src

// Getting clicked user information

chat_blocks.addEventListener('click', e => {
  document.getElementById('default_chat_image').style.display = 'none'
  e.composedPath().forEach(element => {
    if (element.classList && element.classList.contains('qs-chat--user')) {
      let unread_messages = element.children[1].children[0].children[1]
      if (unread_messages.classList.contains('qs-chat--user-msg-count')) {
        unread_messages.remove()
      }
      let chat_user_image = document.getElementById('chat_user_image')
      let sending_profile_image = document.getElementById('s_image')
      let chat_user_image_src = element.children[0].children[1].src
      user_name = element.children[1].children[0].children[0].innerHTML
      sending_profile_image.src = chat_user_image_src
      chat_user_image.children[0].src = chat_user_image_src
      clicked_user_image_src = chat_user_image_src
      uid = element.getAttribute('data-id')
      let chat_block_user = document.getElementsByClassName('chat_username')[0]
      chat_block_user.innerHTML = user_name

      socket.emit('get user message', {
        'reciever_id': uid,
        'sender_id': user_id
      })
    }
  })
})

// Getting clicked user chat history

socket.on('getting chat history', data => {
  to_append.replaceChildren();
  data.forEach(history => {

    if (history.type) {
      if (history.user_id == user_id) {
        let recieved_html = '<div class="qs-chat--display-msg out">\
        <div class="msg-right">\
            <div class="qs-chat--display-msg-name">\
                Me\
            </div>\
            <div id="outcome_message" class="qs-chat--display-msg-text">\
                ' + history.message + '\
            </div>\
            <div class="qs-chat--display-msg-date">\
            ' + history.date + '\
            </div>\
        </div>\
        <div class="msg-left">\
            <img src="' + logged_in_user_image_src + '" alt="">\
        </div>\
        </div>';
        to_append.insertAdjacentHTML("beforeend", recieved_html);
      } else {
        let sent_html = '<div class="qs-chat--display-msg in">\
        <div class="msg-left">\
            <img src="' + recieved_message_link() + '" alt="">\
        </div>\
        <div class="msg-right">\
            <div  class="qs-chat--display-msg-name">\
                ' + user_name + '\
            </div>\
            <div  class="qs-chat--display-msg-text">\
                ' + history.message + '\
            </div>\
            <div class="qs-chat--display-msg-date">\
                ' + history.date + '\
            </div>\
        </div>\
    </div>'
        to_append.insertAdjacentHTML("beforeend", sent_html);
      }
    } else {
      if (history.user_id != user_id) {
        let sent_html = '<div class="qs-chat--display-msg in">\
      <div class="msg-left">\
          <img src="' + recieved_message_link() + '" alt="">\
      </div>\
      <div class="msg-right">\
          <div  class="qs-chat--display-msg-name">\
              ' + user_name + '\
          </div>\
          <audio controls>\
            <source src="' + history.message + '" type="audio/ogg">\
          </audio>\
          <div class="qs-chat--display-msg-date">\
              ' + history.date + '\
          </div>\
      </div>\
  </div>'
        to_append.insertAdjacentHTML("beforeend", sent_html);
      } else {
        let recieved_html = '<div class="qs-chat--display-msg out">\
        <div class="msg-right">\
            <div class="qs-chat--display-msg-name">\
                Me\
            </div>\
            <audio controls>\
            <source src="' + history.message + '" type="audio/ogg">\
          </audio>\
            <div class="qs-chat--display-msg-date">\
            ' + history.date + '\
            </div>\
        </div>\
        <div class="msg-left">\
            <img src="' + logged_in_user_image_src + '" alt="">\
        </div>\
        </div>';
        to_append.insertAdjacentHTML("beforeend", recieved_html);
      }
    }
  })



})



function sendMessage() {
  let message = document.getElementById('message')
  if (message.value.trim().length < 2) {
    return
  }
  let data_to_send = new Object();
  data_to_send.reciever_id = uid
  data_to_send.message = message.value
  data_to_send.sender_id = user_id
  socket.emit('send message', data_to_send)
  let current_user_image = document.getElementsByClassName('qs-profile--avatar')
  let cur_user_img_src = current_user_image[0].children[0].children[0].src
  // sending message to user
  let html = '<div class="qs-chat--display-msg out">\
                            <div class="msg-right">\
                                <div class="qs-chat--display-msg-name">\
                                    Me\
                                </div>\
                                <div id="outcome_message" class="qs-chat--display-msg-text">\
                                    ' + message.value + '\
                                </div>\
                                <div class="qs-chat--display-msg-date">\
                                ' + get_time() + '\
                                </div>\
                            </div>\
                            <div class="msg-left">\
                                <img src="' + cur_user_img_src + '" alt="">\
                            </div>\
                        </div>';

  to_append.insertAdjacentHTML("beforeend", html);
  message.value = ''
  message.setSelectionRange(0, 0)
}

// Sending message to user

let send_msg_btn = document.getElementById('send_message')
send_msg_btn.addEventListener('click', sl => {
  sendMessage()
})
let message_textarea = document.getElementById('message')
message_textarea.addEventListener('keypress', e => {
  if (e.key == "Enter") {
    e.preventDefault()
    sendMessage()
  }
})

function recieved_message_link() {
  if (clicked_user_image_src != '') {
    return clicked_user_image_src
  } else {
    return ''
  }
}

// Recieving message from user

socket.on('recieve message', e => {

  let ulist = document.querySelector('[data-id="' + e.sender_id + '"]')
  let unread_messages = ulist.children[1].children[0].children[1]
  if (unread_messages.classList.contains('qs-chat--user-time')) {
    let html = '<div  class="qs-chat--user-msg-count">1</div>'
    unread_messages.insertAdjacentHTML("beforebegin", html);

  } else {
    let count = parseInt(unread_messages.innerHTML) + 1

    unread_messages.innerHTML = count
  }

  let ulist_child = ulist.querySelector('.qs-chat--user-details')
  ulist_child.querySelector('.recieved_message_in_user_list').innerHTML = e.message

  // getting message in chat field
  let html = '<div class="qs-chat--display-msg in">\
                                  <div class="msg-left">\
                                      <img src="' + recieved_message_link() + '" alt="">\
                                  </div>\
                                  <div class="msg-right">\
                                      <div  class="qs-chat--display-msg-name">\
                                          ' + user_name + '\
                                      </div>\
                                      <div  class="qs-chat--display-msg-text">\
                                          ' + e.message + '\
                                      </div>\
                                      <div class="qs-chat--display-msg-date">\
                                          ' + get_time() + '\
                                      </div>\
                                  </div>\
                              </div>'
  to_append.insertAdjacentHTML("beforeend", html);


})



// Sending audio message

let plbtn = document.getElementById('play_voice')
let stop_recording = document.getElementById('stop_voice')
let record = document.getElementById('record_voice')
record.addEventListener('click', e => {
  start_rec()
})

function stop_rec() {
  return new Promise(resolve => {
    stop_recording.addEventListener('click', e => {
      resolve('done')
    })
  })
}

function start_rec() {
  var constraints = {
    audio: true
  };
  navigator.mediaDevices.getUserMedia(constraints).then(function (mediaStream) {
    var mediaRecorder = new MediaRecorder(mediaStream);
    mediaRecorder.onstart = function (e) {
      this.chunks = [];
    };
    mediaRecorder.ondataavailable = function (e) {
      this.chunks.push(e.data);
    };
    mediaRecorder.onstop = function (e) {
      var blob = new Blob(this.chunks, {
        'type': 'audio/ogg; codecs=opus'
      });




      let url = window.URL.createObjectURL(blob)

      let html = '<div class="qs-chat--display-msg out">\
                            <div class="msg-right">\
                                <div class="qs-chat--display-msg-name">\
                                    Me\
                                </div>\
                                <audio controls>\
                                  <source src="' + url + '" type="audio/ogg">\
                                </audio>\
                                <div class="qs-chat--display-msg-date">\
                                ' + get_time() + '\
                                </div>\
                            </div>\
                            <div class="msg-left">\
                                <img src="' + logged_in_user_image_src + '" alt="">\
                            </div>\
                        </div>';
      to_append.insertAdjacentHTML("beforeend", html);


      (async () => {
        var formdata = new FormData();
        formdata.append('file', blob)
        formdata.append('user_id', user_id)
        formdata.append('action', 'upload_audio_message')

        jQuery.ajax({
          url: ajax_object.ajax_url,
          type: 'POST',
          cache: false,
          processData: false,
          contentType: false,
          data: formdata,
          success: function (data) {
            socket.emit('radio', {
              'blob': blob,
              'reciever_id': uid,
              'sender_id': user_id,
              'blob_link': data
            });
          },
          error: function (er) {
            console.log(er)
          }
        });
      })()
    };

    // Start recording
    mediaRecorder.start();

    // Stop recording after 5 seconds and broadcast it to server
    stop_rec().then(e => {
      mediaRecorder.stop()
      mediaStream.getTracks() // get all tracks from the MediaStream
        .forEach(track => track.stop()); // stop each of them
    })
  });
}


// When the client receives a voice message it will play the sound
socket.on('voice', function (data) {
  var blob = new Blob([data.blob], {
    'type': 'audio/ogg; codecs=opus'
  });
  console.log(data)
  src = window.URL.createObjectURL(blob);

  // getting audio message in chat field
  let html = '<div class="qs-chat--display-msg in">\
      <div class="msg-left">\
          <img src="' + recieved_message_link() + '" alt="">\
      </div>\
      <div class="msg-right">\
          <div  class="qs-chat--display-msg-name">\
              ' + user_name + '\
          </div>\
          <audio controls>\
          <source src="' + src + '" type="audio/ogg">\
        </audio>\
          <div class="qs-chat--display-msg-date">\
              ' + get_time() + '\
          </div>\
      </div>\
  </div>'


  to_append.insertAdjacentHTML("beforeend", html);

});

socket.emit('online/offline', navigator.onLine)


window.addEventListener('load', function () {

});




socket.on('online pidors', e => {
  let users = document.getElementsByClassName('qs-chat--user')
  for (const user of users) {
    let online = user.firstElementChild.firstElementChild.classList
    if (!e.includes(parseInt(user.id))) {
      if (online.contains('online')) {
        online.remove('online')
      }
    } else {
      if (!online.contains('online')) {
        online.add('online')
      }
    }
  }
})

 

// socket.on('online', data => {
//   let online_user = document.getElementById(data)
//   if (!online_user.children[0].children[0].classList.contains('online')) {
//     console.log(online_user.children[0].children[0])
//     let on = online_user.children[0].children[0]
//     let html = '<span class="online-status online"></span>'
//     on.insertAdjacentHTML('beforebegin', html)
//   }
// })

// socket.on('offline', data => {
//   console.log(data)
//   let online_user = document.getElementById(data)
//   if (online_user.children[0].children[0].classList.contains('online')) {
//     online_user.children[0].children[0].remove()
//   }
// })





///////////////////////////// DATING TIME SUBMITION /////////////


const dating_btn = document.getElementById('make_dating')
const dating_picker = document.getElementById('dating_picker')
const dating_time = document.getElementById('dating_time')
const submit_dating = document.getElementById('submit_dating')
dating_btn.addEventListener('click', ()=>{
  dating_picker.hidden = false


  const [date, time] = formatDate(new Date()).split(' ');
  function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
  }
  
  function formatDate(date) {
    return (
      [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
      ].join('-') +
      ' ' +
      [
        padTo2Digits(date.getHours()),
        padTo2Digits(date.getMinutes()),
        padTo2Digits(date.getSeconds()),
      ].join(':')
    );
  }
  dating_time.min = date + 'T' + time;
  dating_time.value = date + 'T' + time;
})
submit_dating.addEventListener('click', ()=>{
  let tm = dating_time.value
 
  
  let user1 = document.getElementById('my_id').getAttribute('data-id')
  socket.emit('dating request', {'user1': user1, 'user2': uid, 'date':tm})
  dating_picker.hidden = true
})
