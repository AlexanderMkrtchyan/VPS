var localVideo = document.querySelector('#localVideo');
var remoteVideo = document.querySelector('#remoteVideo');
var mute = document.querySelector('#mute')
var stop_video = document.querySelector('#stop_video')
var video_call = document.querySelector('#video_call')
var audio_call = document.querySelector('#audio_call')
var video_answer = document.querySelector('#video_answer')
var audio_answer = document.querySelector('#audio_answer')
var no_answer = document.querySelector('#no_answer')




mute.addEventListener('click', e=>{
  remoteVideo.mute = true
  console.log('mute')
})


const peers = {}
var room = 'foo'



socket.on('user-disconnected', userId => {
  if (peers[userId]) peers[userId].close()
})

function give_call(){
  return new Promise(resolve=>{
    video_call.addEventListener('click', e=>{
      resolve({audio: true, video: true})
    })
    audio_call.addEventListener('click', e=>{
      resolve({audio: true, video: false})
    })
  })
}

function give_answer(){
  return new Promise(resolve=>{
    video_call.style.display = 'none'
    video_answer.addEventListener('click', e=>{
      resolve({audio: true, video: true})
    })
    audio_answer.addEventListener('click', e=>{
      resolve({audio: true, video: false})
    })
    no_answer.addEventListener('click', e=>{
      resolve(false)
    })
  })
}

peer.on('open', async id => {
    console.log('Peer Id is: ' + id)
    socket.emit('join-room', room, id)
})


socket.on('both_sockets', async id=>{
  

  let constrains = await give_call()
  navigator.mediaDevices.getUserMedia(constrains).then(stream=>{
    const call = peer.call(id, stream)
    call.on('stream', userVideoStream => {
      console.log('getting connected user media stream')
      remoteVideo.style.display = 'inline-block'
      remoteVideo.srcObject = userVideoStream
    })
  })
})
socket.onAny((event, ...args) => {
  console.log(event, args);
});
  
socket.on('user-connected', async (userId) => {
  
  
  
  console.log('giving my media stream...')
  socket.emit('both_ids',room, peer.id)
  let constrains = await give_call()
  
  

  navigator.mediaDevices.getUserMedia(constrains).then(stream=>{
    const call = peer.call(userId, stream)
    call.on('stream', userVideoStream => {
      console.log('getting connected user media stream')
      remoteVideo.style.display = 'inline-block'
      remoteVideo.srcObject = userVideoStream
    })
  })
  
})


peer.on('call', async call => {
  audio_answer.style.background = 'yellow'
  video_answer.style.background = 'green'
  no_answer.style.background = 'red'
  console.log('getting answer')
  let answer_way = await give_answer()
  console.log(answer_way)
  if(answer_way){
    navigator.mediaDevices.getUserMedia(answer_way).then(stream=>{
      call.answer(stream)
      console.log('answering to call')
      call.on('stream', userVideoStream => {
        console.log('getting connected user media stream')
        remoteVideo.style.display = 'inline-block'
        remoteVideo.srcObject = userVideoStream
      })
    })
  }else{
    call.on('close', () => {
          remoteVideo.style.display = 'none'
        })
  }

  

})


