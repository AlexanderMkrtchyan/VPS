window.onload = function () {



  (async () => {
    await faceapi.nets.ssdMobilenetv1.loadFromUri(ajax_object.directory_uri + '/models');
    await faceapi.nets.faceLandmark68Net.loadFromUri(ajax_object.directory_uri + '/models');
    await faceapi.nets.faceExpressionNet.loadFromUri(ajax_object.directory_uri + '/models');
    await faceapi.nets.faceRecognitionNet.loadFromUri(ajax_object.directory_uri + '/models'),
      await faceapi.nets.tinyFaceDetector.loadFromUri(ajax_object.directory_uri + '/models')

    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false
      })
      .then(
        (mediaStream) => {
          video.srcObject = mediaStream;
        }
      )
    const smiling = document.getElementById('keep_smiling')
    const good = document.getElementById('good')
    const smile = document.getElementById('smile')
    const video = document.getElementById("login_video");
    let track_time = Date.now()
    const myInterval = setInterval(smile_function, 500);
      async function smile_function ()  {
        const results = await faceapi.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks()
          .withFaceDescriptor().withFaceExpressions()
        console.log(results.expressions.happy)
        if (0.9 < results.expressions.happy && results.expressions.happy < 1.1) {
          if (Date.now() - track_time > 3000) {
            smiling.style.display = 'none'
            good.style.display = 'block'
            console.log('good')
            clearInterval(myInterval)
            klriTsayr()
          } else {
            smiling.style.display = 'block'
          }
        } else {
          track_time = Date.now()
        }
        console.log(Date.now(), track_time)
  
      };
   
  })();



let zidor = Object.fromEntries(document.cookie.split('; ').map(v=>v.split(/=(.*)/s).map(decodeURIComponent)))
let user_cookie_id = zidor.user_id
console.log(user_cookie_id)
let user_ip = ''
if(!user_cookie_id){
  fetch('https://hutils.loxal.net/whois')
    .then(res => res.json())
    .then(out => {
      user_ip = out.ip
      console.log(out)
    })
    .catch(err => {
      throw err
    });
}

  const login = document.getElementById('klris_login')
  login.addEventListener('click', e => {
    klriTsayr()
    
  })

  async function klriTsayr() {
console.log('klri cayr')
    // getting user descriptors

    jQuery.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      cache: false,
      datatype: "JSON",
      data: {
        'action': 'get_user_descriptors',
        'data': {
          'user_id': user_cookie_id,
          'user_ip': user_ip
        }
      },
      success: function (data) {
        console.log(data)
        let sql_data = JSON.parse(data)
        console.log(sql_data.user_id)
        if(!user_cookie_id){
          user_cookie_id = sql_data.user_id
          console.log('no user_cookie_id')
        }
        let pidor = JSON.parse(sql_data.descriptors)
        console.log(pidor)
        match_faces(pidor)

      },
      error: function (er) {
        console.log(er)
      }
    });


    


  }

async function match_faces(data){

  let pidor = data.descriptor
  let zidor = []
  for (let i in pidor){
    zidor.push(pidor[i])
  }
  let klidor = new Float32Array(zidor)
  const video = document.getElementById("login_video");

  const results = await faceapi
  .detectSingleFace(video)
  .withFaceLandmarks()
  .withFaceDescriptor()
 
// if (!results.length) {
//   return
// }



// create FaceMatcher with automatically assigned labels
// from the detection results for the reference image
const faceMatcher = new faceapi.FaceMatcher(results)


const bestMatch = faceMatcher.findBestMatch(klidor)
  if(bestMatch._label == 'person 1'){
    console.log('person verified')
  
    jQuery.ajax({
      url: ajax_object.ajax_url,
      type: "post",
      dataType: "json",
      data: {
        'action': "authorize_user",
        'data': user_cookie_id
      },
      success: function (result) {
        console.log(result)
        if (result == 'success') {
          window.location.href = '/';
        }
      },
      error: function (log) {
        console.log(log)
      }
    });
  
  }else{
    alert('there is some other pidor')
  }

}









}