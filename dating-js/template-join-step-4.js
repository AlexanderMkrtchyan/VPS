function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
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


// Public images uploading/saving/deleting
let u_id = parseInt(getCookie('user_id'));
let public_upload = document.getElementById('public_images')
let klir = document.getElementsByClassName('public_images')
let sup = 0
let img_src = document.getElementById('hidden_no_image').src
var yoz = []
public_upload.addEventListener('change', () =>{ 
  j = 0
  let file = public_upload.files
  for(let i=0; i<klir.length; i++){
      if(klir[i].getAttribute('src') == img_src){
          if(file[j]){
          klir[i].setAttribute('name', file[j].name)
          yoz.push(file[j])
          klir[i].src = URL.createObjectURL(file[j])
          URL.revokeObjectURL(file[j])
          klir[i].style.filter = 'blur(0px)'
          sup++;
          j++;
          }
      }
      if(sup > 4){
          alert('You are able to upload only 5 public images')
          document.getElementById('upl_img').style.display = 'none';
          return;
      }
  };
  public_upload.value = ''
})

let delete_image = document.getElementById('del_img')
let checkbox = document.querySelectorAll('.public_checkbox')


delete_image.addEventListener('click', ()=>{
  checkbox.forEach(el=>{
    if(el.checked ){
    sup--;
    let img = el.nextElementSibling.nextElementSibling
    yoz.splice(yoz.findIndex(el => el.name === img.name), 1);
    console.log(yoz)
    document.getElementById('upl_img').style.display = 'block'
    img.src = img_src
    img.style.filter = 'blur(2px)'
    el.checked = false
    
    if(img.hasAttribute("image-id")){
      jQuery.ajax({
        url :  ajax_object.ajax_url,
        type: 'POST',
        data:{
          'image-id': img.getAttribute('image-id'),
          'action': 'delete_image'
        },
        success: function(data) {
          console.log(data)
          },    
        error: function(er) {
          console.log(er)
        }
      });
    }
    }
  })
})



let save_img = document.getElementById('save_img')
save_img.addEventListener('click', ev=>{
  (async () => {
    for(let file of yoz ){
      if(file){
        let image = document.getElementsByName(file['name'])[0]
      let animation = document.getElementsByName(file['name'])[0].previousElementSibling.previousElementSibling.previousElementSibling;
      animation.style.display = 'block'
      console.log(file)
      var formdata = new FormData();
      formdata.append('file', file)
      formdata.append('privacy', 'public_image')
      formdata.append('user_id', u_id)
      formdata.append('action', 'profile_upload')

      await jQuery.ajax({
        url :  ajax_object.ajax_url,
        type: 'POST',
        cache: false,
        processData: false,
        contentType: false,
        data: formdata,
        success: function(data) {
          animation.style.display = 'none';

          console.log(data)
          let image = document.getElementsByName(file['name'])[0]
          image.setAttribute('image-id', data)
          // let reason = JSON.parse(data)
          // console.log(reason)
          // if(reason.summary.action == 'reject'){
          //   alert("your image will not be accepted, cos: " + reason.summary.reject_reason[0].text)
          //   let img_name = [yoz][j].name
          //   document.querySelectorAll('[name="'+ img_name +'"]').src = "";
          //   // let img = document.getAttribute('name')
          //   // img.src = img_src
          //   // img.style.filter = 'blur(2px)'
          //   // el.checked = false
          // }
          // console.log(yoz[j])
          },    
        error: function(er) {
          console.log(er)
        }
      });
      }
  
}; 
  })()
     
})


// Public video upload/save/delete

const upload_video = document.getElementById('public_input_video')
const delete_video = document.getElementById('public_delete_video')
const save_video = document.getElementById('public_save_video')
const public_video = document.getElementById('public_video')
let file_to_upload = []
upload_video.addEventListener('change', ()=>{
  let file = upload_video.files
  public_video.src = URL.createObjectURL(file[0])
          URL.revokeObjectURL(file[0])
          file_to_upload = file[0]
          upload_video.value = ''
})
delete_video.addEventListener('click', ()=>{
  if(public_video.hasAttribute("data-id")){
    jQuery.ajax({
      url :  ajax_object.ajax_url,
      type: 'POST',
      data:{
        'image-id': public_video.getAttribute('data-id'),
        'action': 'delete_image'
      },
      success: function(data) {
        console.log(data)
        },    
      error: function(er) {
        console.log(er)
      }
    });
  }
  file_to_upload = []
  public_video.src = ''
})

save_video.addEventListener('click', e=>{
          var formdata = new FormData();
          formdata.append('file', file_to_upload)
          formdata.append('privacy', 'public_video')
          formdata.append('user_id', u_id)
          formdata.append('action', 'profile_upload')
          let animation = public_video.parentNode.previousElementSibling;
          animation.style.display = 'block';
          jQuery.ajax({
            url :  ajax_object.ajax_url,
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: formdata,
            success: function(data) {
              console.log(data)
              animation.style.display = 'none';

              // let reason = JSON.parse(data)
              // console.log(reason)
              // if(reason.summary.action == 'reject'){
              //   alert("your image will not be accepted, cos: " + reason.summary.reject_reason[0].text)
              //   let img_name = [yoz][j].name
              //   document.querySelectorAll('[name="'+ img_name +'"]').src = "";
              //   // let img = document.getAttribute('name')
              //   // img.src = img_src
              //   // img.style.filter = 'blur(2px)'
              //   // el.checked = false
              // }
              // console.log(yoz[j])
              },    
            error: function(er) {
              console.log(er)
            }
          });
})

// Private images upload/delete/save

const private_upload = document.getElementById('private_upload')
const private_delete = document.getElementById('private_delete')
const private_save   = document.getElementById('private_save')
const private_checkbox = document.querySelectorAll('.private_checkbox')
let pudz = document.getElementsByClassName('private_images')
let min = 0
let priv_img_src = document.getElementById('hidden_no_image').src
var pyoz = []

private_upload.addEventListener('change', () =>{
  j = 0
  let file = private_upload.files
 
  for(let i=0; i<pudz.length; i++){
      if(pudz[i].getAttribute('src') == priv_img_src){
          if(file[j]){
          pudz[i].setAttribute('name', file[j].name)
          pyoz.push(file[j])
          pudz[i].src = URL.createObjectURL(file[j])
          URL.revokeObjectURL(file[j])
          pudz[i].style.filter = 'blur(0px)'
          min++;
          j++;
          }
      }
      if(min > 24){
          alert('You are able to upload only 25 private images')
          document.getElementById('upl_img').style.display = 'none';
          return;
      }
  };
  private_upload.value = ''
})

private_delete.addEventListener('click', ()=>{
  private_checkbox.forEach(el=>{
    if(el.checked){
    min--;
    let img = el.nextElementSibling.nextElementSibling
    pyoz.splice(pyoz.findIndex(el => el.name === img.name), 1);
    
    console.log(pyoz)
    if(img.hasAttribute("image-id")){
      jQuery.ajax({
        url :  ajax_object.ajax_url,
        type: 'POST',
        data:{
          'image-id': img.getAttribute('image-id'),
          'action': 'delete_image'
        },
        success: function(data) {
          console.log(data)
          },    
        error: function(er) {
          console.log(er)
        }
      });
    }

    document.getElementById('upl_img').style.display = 'block'
    img.src = img_src
    img.style.filter = 'blur(2px)'
    el.checked = false
    }
  })
})

private_save.addEventListener('click', ev=>{
  (async () => { 
    for(let file of pyoz){
      let image = document.getElementsByName(file['name'])[0]
      let animation = document.getElementsByName(file['name'])[0].previousElementSibling.previousElementSibling.previousElementSibling;
      animation.style.display = 'block'
      var formdata = new FormData();
          formdata.append('file', file)
          formdata.append('privacy', 'private_image')
          formdata.append('user_id', u_id)
          formdata.append('action', 'profile_upload')
        await jQuery.ajax({
        url :  ajax_object.ajax_url,
        type: 'POST',
        cache: false,
        processData: false,
        contentType: false,
        data: formdata, 
        success: function(data) {
          console.log(data)
          animation.style.display = 'none';
          if(data == 'klri glox 25'){
            image.src = 'https://previews.123rf.com/images/makslab/makslab2009/makslab200900575/155676154-limit-word-made-with-building-blocks-limit-on-wooden-cubes-on-gray-notepad-business-concept.jpg'
          }else{
            image.setAttribute('image-id', data)
          }
          // let reason = JSON.parse(data)
          // console.log(reason)
          // if(reason.summary.action == 'reject'){
          //   alert("your image will not be accepted, cos: " + reason.summary.reject_reason[0].text)
          //   let img_name = [pyoz][j].name
          //   document.querySelectorAll('[name="'+ img_name +'"]').src = "";
          //   // let img = document.getAttribute('name')
          //   // img.src = img_src
          //   // img.style.filter = 'blur(2px)'
          //   // el.checked = false
          // }
          },    
        error: function(er) {
          console.log(er)
        }
        
      });
   };
  })()
})

// Private videos upload/delete/save

const private_video_upload = document.getElementById('private_video_upload')
const private_video_delete = document.getElementById('private_video_delete')
const private_video_save   = document.getElementById('private_video_save')
const private_video_checkbox = document.querySelectorAll('.private_video_checkbox')
const private_videos = document.getElementsByClassName('private_video')
let video_min = 0
let priv_vid_img_src = document.getElementById('hidden_no_video').src
var vdyoz = []

private_video_upload.addEventListener('change', () =>{
  j = 0
  let file = private_video_upload.files
 
  for(let i=0; i<private_videos.length; i++){
      if(private_videos[i].getAttribute('src') == priv_vid_img_src){
          if(file[j]){
          private_videos[i].setAttribute('name', file[j].name)
          vdyoz.push(file[j])
          private_videos[i].src = URL.createObjectURL(file[j])
          URL.revokeObjectURL(file[j])
          private_videos[i].style.filter = 'blur(0px)'
          video_min++;
          j++;
          }
      }
      if(video_min > 2){
          alert('You are able to upload only 3 public images')
          document.getElementById('upl_img').style.display = 'none';
          return;
      }
  };
  private_video_upload.value = ''
})

private_video_delete.addEventListener('click', ()=>{
  private_video_checkbox.forEach(el=>{
    if(el.checked){
    video_min--;
    let img = el.nextElementSibling.nextElementSibling
    vdyoz.splice(vdyoz.findIndex(el => el.name === img.name), 1);
    
    console.log(vdyoz)
    if(img.hasAttribute("data-id")){
      jQuery.ajax({
        url :  ajax_object.ajax_url,
        type: 'POST',
        data:{
          'image-id': img.getAttribute('data-id'),
          'action': 'delete_image'
        },
        success: function(data) {
          console.log(data)
          },    
        error: function(er) {
          console.log(er)
        }
      });
    }

    document.getElementById('upl_img').style.display = 'block'
    img.src = priv_vid_img_src
    img.style.filter = 'blur(2px)'
    el.checked = false
    }
  })
})

private_video_save.addEventListener('click', ev=>{
  j = 0

  for(let file of vdyoz){
    (async ()=>{
      if(file){
        var formdata = new FormData();
        formdata.append('file', file)
        formdata.append('privacy', 'private_video')
        formdata.append('user_id', u_id)
        formdata.append('action', 'profile_upload')
        let animation = public_video.parentNode.previousElementSibling;
        animation.style.display = 'block';
        jQuery.ajax({
          url :  ajax_object.ajax_url,
          type: 'POST',
          cache: false,
          processData: false,
          contentType: false,
          data: formdata,
          success: function(data) {
            console.log(data)
            animation.style.display = 'none';
            // let reason = JSON.parse(data)
            // console.log(reason)
            // if(reason.summary.action == 'reject'){
            //   alert("your image will not be accepted, cos: " + reason.summary.reject_reason[0].text)
            //   let img_name = [vdyoz][j].name
            //   document.querySelectorAll('[name="'+ img_name +'"]').src = "";
            //   // let img = document.getAttribute('name')
            //   // img.src = img_src
            //   // img.style.filter = 'blur(2px)'
            //   // el.checked = false
            // }
            },    
          error: function(er) {
            console.log(er)
          }
        });
        }
    })()

      
  };   
  private_video_upload.value = ''   
})



///////////// Getting VK images


// //oauth.vk.com/blank.html#access_token=0dd6795b907de43f4106198d9971ca0156c37434bbe82eef3d0af082b7aea8afcceae369d76ca50edf492&expires_in=86400&user_id=4101673&email=alexander88m@gmail.com
// let access_token='9bbe6afefbccf8a165bdb20e490b593c38018b8ded79796c3d9450d7b0f7471259538007616a37c896248'
// let new_token = 'https://oauth.vk.com/blank.html#access_token=9b86b15e3e1e4c22cb4ad7386bc35eddc5a23107d5c339588f55ed89c22d68420b901133143c0ee9aea45&expires_in=86400&user_id=4101673'
// let  vk_api = 'https://api.vk.com/method/users.search'
// let end_api = '&v=5.81&access_token=' + access_token
// var script = document.createElement('SCRIPT');
// // var script0 = document.createElement('SCRIPT');
// // var script1 = document.createElement('SCRIPT');
// // var script2 = document.createElement('SCRIPT');

// let photos = 'https://api.vk.com/method/photos.getAll?count=50&owner_id=118185059';

// // users.search?count=200&country=9&sex=1&age_from=25&age_to=35&has_photo=1


// // INITIATION SCRIPT ///////

// // script.src = "https://api.vk.com/method/users.search?count=200&country=9&sex=1&age_from=25&age_to=35&has_photo=1" + end_api +"&callback=callbackFunc";
// document.getElementsByTagName("head")[0].appendChild(script);


// // https://pp.userapi.com/Cn4IMkmrkiYIx6kOuD9tA6A1j3TAWx7_c2awtw/k5iRKS-axM8.jpg
// // https://sun9-12.userapi.com/impg/Cn4IMkmrkiYIx6kOuD9tA6A1j3TAWx7_c2awtw/k5iRKS-axM8.jpg?size=775x1078&quality=96&sign=9a53e1ccc6b61708c828fc451b9b05d1&c_uniq_tag=nbPP-DuKai4B75rLPNS4kf5ec77-Cmp6GIO8D5aD2Co&type=album


//  async function callbackFunc(result) {
//   let users =  result['response']['items'];

//   users.forEach(  (element, i) => {



//     setTimeout(() => {
//     var yodr = document.createElement('SCRIPT');

//   let user_id =  element['id']
//   yodr.src = 'https://api.vk.com/method/photos.getAll?count=5&photo_sizes=1&owner_id='+ user_id + end_api +"&callback=fetch_users";
//   document.getElementsByTagName("head")[0].appendChild(yodr);    
//     }, i * 1000);

     

    
//   });
// }



// // https://oauth.vk.com/blank.html#access_token=ffbf4d6370fa1f2b6468401198af53c883e0ba89688314b81c89bafa0dcb4eff9e1476471a4fde95e724e&expires_in=86400&user_id=4101673
// // https://oauth.vk.com/authorize?client_id=7440595&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=photos&response_type=token&v=5.131
// let i = 0

// // console.log(female_user_ids)







// var j = 250

//  function fetch_users(result){
//     let images = result['response']['items'];
//         let i = 0
//         j--;
//         images.forEach(el=>{
//           let sizes = el['sizes']

//           sizes.forEach(img=>{
//             if(img['type'] == 'x' && i<3){
            
              
//               let res_img = img['url']
//               res_img = res_img.substring(res_img.indexOf("imp") + 4);
//               res_img = res_img.substring(0, res_img.indexOf('?size'));
//               let result_url = 'https://pp.userapi.com' + res_img
//               i++
//               jQuery.ajax({
//                 url :  ajax_object.ajax_url,
//                 type: 'POST',
//                 cache: false,
//                 data: {
//                   'action': 'upload_dummy_pudz',
//                   'url': result_url,
//                   'user_id': female_user_ids[j],
//                   'privacy': 'public_image'
//                 },
//                 success: function(data) {
//                   console.log(data)
//                   },    
//                 error: function(er) {
//                   console.log(er)
//                 }
//               });
//             }else if(img['type'] == 'x' ){
//               i++
//               let res_img = img['url']
//               res_img = res_img.substring(res_img.indexOf("imp") + 4);
//               res_img = res_img.substring(0, res_img.indexOf('?size'));
//               let result_url = 'https://pp.userapi.com' + res_img

//               jQuery.ajax({
//                 url :  ajax_object.ajax_url,
//                 type: 'POST',
//                 cache: false,
//                 data: {
//                   'action': 'upload_dummy_pudz',
//                   'url': result_url,
//                   'user_id': female_user_ids[j],
//                   'privacy': 'private_image'
//                 },
//                 success: function(data) {
//                   console.log(data)
//                   },    
//                 error: function(er) {
//                   console.log(er)
//                 }
//               });
//             }
//           })
          
//         })
        



        




 


 
// }

// let gen_user = document.getElementById('generate_user');
// gen_user.addEventListener('click', el=>{
//   jQuery.ajax({
//     url :  ajax_object.ajax_url,
//     type: 'POST',
//     data: {
//       'action': 'register_dummy_users',
//     },
//     success: function(data) {
//       console.log(data)
//       },    
//     error: function(er) {
//       console.log(er)
//     }
//   });
// })








