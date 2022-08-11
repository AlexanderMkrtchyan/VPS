window.onload = function () {
  const video = document.getElementById("video");
  let user_ip = ''
  let user_long = ''
  let user_lat = ''

  fetch('https://hutils.loxal.net/whois')
    .then(res => res.json())
    .then(out => {
      user_ip = out.ip
      user_lat = out.latitude
      user_long = out.longitude
      console.log(out)
    })
    .catch(err => {
      throw err
    });





  Promise.all([
    // faceapi.nets.tinyFaceDetector.loadFromUri(ajax_object.file_uri + '/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri(ajax_object.file_uri + '/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri(ajax_object.file_uri + '/models'),
    faceapi.nets.faceExpressionNet.loadFromUri(ajax_object.file_uri + '/models'),
    faceapi.nets.ageGenderNet.loadFromUri(ajax_object.file_uri + '/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri(ajax_object.file_uri + '/models')
  ]).then(startVideo);



  function startVideo() {
    document.getElementsByClassName('loader')[0].style.display = 'none'
    document.getElementsByClassName('qs-reg--quest-display')[0].style.background = 'transparent'
    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false
      })
      .then(
        (mediaStream) => {
          video.srcObject = mediaStream;
        }
      )
  }

  video.addEventListener('play', () => {

    ////// end of fusking///////////

    //login via FR//
    // async function loginuser(){
    // //   const imgUrl = '<?php
    // //                     if(isset(jQuery_COOKIE['fr_att_id'])){
    // //                       echo get_fr_image_from_cookie();
    // //                     }else{
    // //                       echo display_images_from_media_library();
    // //                     }  
    // //                   ?>'
    //   console.log(imgUrl)
    //   const labels = ['<?php echo jQueryusername; ?>']

    //   const img = await faceapi.fetchImage(imgUrl)

    //   let faceFromServer = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

    //   let fullFaceDescription = await faceapi.detectSingleFace(video).withFaceLandmarks().withFaceDescriptor()
    //   console.log(fullFaceDescription, ' =face descriptor')
    //   const faceMatcher = new faceapi.FaceMatcher(faceFromServer)
    //   const bestMatch = faceMatcher.findBestMatch(fullFaceDescription.descriptor)
    //   console.log(bestMatch.toString());
    //   if(bestMatch._distance < 0.6){
    //     alert('you can login, dude')
    //   }else{
    //     alert('fuck off this site, bitch')
    //   }
    //   }
    //end of login via FR//

    // jQuery('.compare_image').on('click', ()=>{
    //   jQuery('.compare_image').css('color', 'green')
    //   loginuser();
    // })

    // jQuery('.get_scores').on('click', ()=>{
    //   jQuery('.get_scores').css('color', 'green')
    //   gandon()
    // })



  })


  function decidions() {
    return new Promise(resolve => {
      document.getElementById('redo').addEventListener('click', () => {
        resolve('redo')
      })
      document.getElementById('keep').addEventListener('click', () => {
        resolve('keep');
      })
    });
  }
  let kip = 0;
  const final_score = [];
  let capture = document.getElementById('capture')
  document.getElementById('capture').addEventListener('click', () => {
    upload_image_to_server(video);
    console.log('capture');
    capture.style.display = 'none'
  })

  /// CREATING A BLOB FILE AND UPLOADING TO SERVER //////


  async function upload_image_to_server(img) {



    document.getElementsByClassName('qs-reg--quest-face')[kip].children[0].style.width = '100%'


    const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor().withAgeAndGender().withFaceExpressions()

    if (!detections || detections.score < 0.8) {
      alert('please make your video quality beter')
      capture.style.display = 'block'
      upload_image_to_server()
      return;
    }







    let width = img.videoWidth
    let height = img.videoHeight

    let canvas = document.getElementById('image_' + kip);
    let context = canvas.getContext('2d');
    let data = canvas.toDataURL('image/png');
    canvas.setAttribute('width', width);
    canvas.setAttribute('height', height);
    context.drawImage(img, 0, 0, width, height);
    // let current_face  = await faceapi.detectSingleFace(canvas).withFaceLandmarks().withFaceDescriptor().withAgeAndGender()
    // console.log(current_face)
    const decidion = await decidions()

    if (decidion == 'redo') {

      context.clearRect(0, 0, canvas.width, canvas.height);
      upload_image_to_server(video)
      return;
    }
    console.log(detections)
    let score = detections.detection.score
    let age = detections.age
    let gender = detections.gender
    let genProb = detections.genderProbability
    console.log(score, age, gender, genProb)



    if (decidion == 'keep') {
      console.log('keep')
      // comparing the image with celebrities


      console.log(detections)


      console.log(user_ip, user_long, user_lat, user_id)




      function cel_names() {
        return new Promise(resolve => {

          jQuery.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            cache: false,
            datatype: "JSON",
            data: {
              'action': 'get_folder_context',
              'data': {
                'gender': gender,
                'descriptors': JSON.stringify(detections),
                'user_ip': user_ip,
                'user_id': user_id,
                'user_lat': user_lat,
                'user_long': user_long
              }
            },
            success: function (data) {
              let dt = JSON.parse(data);
              let adt = dt.slice(2)
              resolve(adt)
              console.log('push')
            },
            error: function (er) {
              console.log(er)
            }
          });
        });
      }
      let labels = await cel_names()
      // console.log(labels)



      function labeled_descriptors() {
        return new Promise(resolve => {
          jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "post",
            cache: false,
            datatype: 'json',
            data: {
              'action': "predefined_celebrities",
              'gender': gender
            },
            success: function (result) {
              console.log(result)
              let data = JSON.parse(result)
              let male = data[gender].split('\\')
              let klir = JSON.parse(male[0])
              resolve(klir)
            },
            error: function (log) {
              console.log(log)
            }
          });

        })
      }
      const labeledFaceDescriptors = await labeled_descriptors();
      console.log(labeledFaceDescriptors)

      labeledFaceDescriptors.map(function (dist) {
        let comp_descriptor = dist.descriptors[0];
        let serv_descriptor = detections.descriptor;
        let label = dist.label
        const distance = faceapi.euclideanDistance(serv_descriptor, comp_descriptor)
        final_score.push({
          'name': label,
          'distance': distance
        })

      })





      // end of comparing image with celebrities

      capture.style.display = 'block'

      // Creating blob file for image in PNG(jpeg)
      canvas.toBlob(function (blob) {
        var newImg = document.createElement('img');
        var url = (window.URL || window.webkitURL).createObjectURL(blob);
        newImg.onload = function () {
          // no longer need to read the blob so it's revoked
          URL.revokeObjectURL(url);
        };
        var formdata = new FormData();

        // blob.name = 'compare_image' + kip + '.jpeg' 
        blob.lastModified = new Date();
        formdata.append('file', blob)
        formdata.append('action', 'ai_to_server')


        // data.append('file', blob);
        jQuery.ajax({
          url: ajax_object.ajax_url,
          type: 'POST',
          cache: false,
          processData: false,
          contentType: false,
          data: formdata,
          success: function (data) {
            console.log(data)
          },
          error: function (er) {
            console.log(er)
          }
        });
      }, 'image/jpeg', 0.95);
      kip++;



      if (kip == 3) {
        capture.style.display = 'none'
        document.getElementById('keep').style.display = 'none'
        document.getElementById('redo').style.display = 'none'
        const gelendjik = Object.keys(final_score.reduce((r, {
          name
        }) => (r[name] = '', r), {}))
        const klri_cayr = []
        for (let i = 0; i < gelendjik.length; i++) {
          let sum_score = 0;
          for (let j = 0; j < final_score.length; j++) {
            if (gelendjik[i] == final_score[j].name) {
              sum_score += final_score[j].distance
            }
          }
          sum_score = sum_score / 3
          klri_cayr.push({
            'name': gelendjik[i],
            'distance': sum_score
          })
        }


        function getCookie(cname) {
          let name = cname + "=";
          let decodedCookie = decodeURIComponent(document.cookie);
          let ca = decodedCookie.split(';');
          for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
        }
        let u_id = parseInt(getCookie('user_id'));
        jQuery.ajax({
          url: ajax_object.ajax_url,
          type: "post",
          dataType: 'json',
          data: {
            'action': "celebrities_similarity",
            'user_scores': klri_cayr,
            'user_id': u_id
          },
          success: function (result) {
            console.log(result)
          },
          error: function (log) {
            console.log(log)
          }
        });
      }
    }
  }












}