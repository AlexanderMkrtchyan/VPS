TeleportAutocomplete.init({
    el: '.city',
    maxItems: 5
}).on('change', data => {
    console.log(data)
    document.getElementsByClassName('state')[0].value = data.admin1Division
    document.getElementsByClassName('city')[0].value = 'data.country'
    console.log(document.getElementsByClassName('city')[0].value)
});

let password = document.getElementsByClassName('password')[0]
let confirm_password = document.getElementsByClassName('password-confirm')[0]
let togglePassword = document.querySelector('#togglePassword');
let toggleConfirmPassword = document.querySelector('#toggleConfirmPassword')
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    let type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
toggleConfirmPassword.addEventListener('click', function (e) {
    // toggle the type attribute
    let type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
    confirm_password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});



let user_data = {};
let submit = document.getElementsByClassName('submit')[0]
let inputs = document.getElementsByClassName('inputs')[0].querySelectorAll('input')
submit.on('click', (e) => {
    e.preventDefault()
    let checkbox = document.querySelector('.checkbox').checked
    let password = document.getElementsByClassName('password')[0]
    let confirm_password = document.getElementsByClassName('password-confirm')[0]
    let email = document.getElementsByClassName('email')[0]
    let confirm_email = document.getElementsByClassName('email-confirm')[0]
    let first_name = document.getElementsByClassName('first-name')[0]
    let last_name = document.getElementsByClassName('last-name')[0]
    let city = document.getElementsByClassName('city')[0]
    let state = document.getElementsByClassName('state')[0]
    let zip = document.getElementsByClassName('zip')[0]
    let date = document.getElementsByClassName('date')[0]
    let username = document.getElementById('username')
    let attentions = document.querySelectorAll('.qs-input-attention')
    let passwordpattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9_])")
    let email_pattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$")
    let email_status = email.value.match(email_pattern)
    let password_status = password.value.match(passwordpattern)
    let user_age = date.value.split('-')
    let current_date = new Date()
    let current_year = current_date.getFullYear()
    let current_month = current_date.getMonth() + 1
    let current_day = current_date.getDate()
    let user_real_age = [current_year - parseInt(user_age[0]), parseInt(user_age[1]) - current_month, parseInt(user_age[2] - current_day)]
    let all_fields = document.querySelectorAll('.qs-input')
    for (let att of attentions) {
        att.style.display = 'none'
    }
    for (let i of all_fields) {
        i.style.borderColor = "#c1a700"
        i.style.borderWidth = "1px"
    }
    if (first_name.value == '') {
        first_name.style.borderBlockStartWidth = '10px'
        first_name.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('first-name-attention')[0].style.display = 'block'
        return;
    } else if (last_name.value == '') {
        last_name.style.borderBlockStartWidth = '10px'
        last_name.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('last-name-attention')[0].style.display = 'block'
        return;
    } else if (city.value == '') {
        city.style.borderBlockStartWidth = '10px'
        city.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('city-attention')[0].style.display = 'block'
        return;
    } else if (state.value == '') {
        state.style.borderBlockStartWidth = '10px'
        state.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('state-attention')[0].style.display = 'block'
        return;
    } else if (zip.value == '' || !zip.value.match(/\b\d{5}\b/g)) {
        zip.style.borderBlockStartWidth = '10px'
        zip.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('zip-attention')[0].style.display = 'block'
        return;
    } else if (email.value == '' || email.value != confirm_email.value || !email_status) {
        email.style.borderBlockStartWidth = '10px'
        email.style.borderBlockStartColor = 'red'
        confirm_email.style.borderBlockStartWidth = '10px'
        confirm_email.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('email-attention')[0].style.display = 'block'
        document.getElementsByClassName('confirm-email-attention')[0].style.display = 'block'

        return;
    } else if (username.value == '' || username.value.match(email_pattern)) {
        username.style.borderBlockStartWidth = '10px'
        username.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('username-attention')[0].style.display = 'block'
        return;
    } else if (date.value == '') {
        date.style.borderBlockStartWidth = '10px'
        date.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('dob-attention')[0].style.display = 'block'
        return;
    } else if (password.value !== confirm_password.value && password.value != '' || !password_status || password.value == '') {
        password.style.borderBlockStartWidth = '10px'
        password.style.borderBlockStartColor = 'red'
        confirm_password.style.borderBlockStartWidth = '10px'
        confirm_password.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('password-attention')[0].style.display = 'block'
        document.getElementsByClassName('confirm-password-attention')[0].style.display = 'block'
        return;
    } else if (!checkbox) {
        alert('no checkbox')
        return;
    } else if (user_real_age[0] == 18 && user_real_age[1] == 0 && user_real_age[2] > 0) {
        alert('come back in ' + user_real_age[2] + ' days')
        return
    } else if (user_real_age[0] == 18 && user_real_age[1] > 0) {
        alert('come back in ' + user_real_age[1] + ' months')
        return
    } else if (user_real_age[0] < 18) {
        alert('user under 18 by years')
        return
    } else {
        console.log('user can register')
    }
    user_data['checkbox'] = checkbox

    for (let item in inputs) {
        user_data[inputs[item].name] = inputs[item].value;
        if (inputs[item].value !== undefined && inputs[item].value != "" && inputs[item].name != "remember") {
            user_data[inputs[item].name] = inputs[item].value;
        }
    }

    console.log(user_data)
    jQuery.ajax({
        url: ajax_object.ajax_url,
        type: "post",
        dataType: "json",
        data: {
            'action': "register_user",
            'data': user_data
        },
        success: function (result) {
            if (result == 'success') {
                localStorage.setItem('skey', result);
                window.location.href = '/join-step-2/';
            } else {
                console.log(result)
            }
        },
        error: function (log) {
            console.log(log)
        }
    });


})

// document.getElementById('send_email').addEventListener('click', e => {
//     jQuery.ajax({
//         url: ajax_object.ajax_url,
//         type: "post",
//         dataType: "json",
//         data: {
//             'action': "email_send",
//         },
//         success: function (result) {
//             console.log(result)
//         },
//         error: function (log) {
//             console.log(log)
//         }
//     });

// })

//checking VPN
// let client_ip = document.getElementById('ip').innerHTML;
// document.getElementById('ip').style.display = "none";
// const settings = {
// 	"async": true,
// 	"crossDomain": true,
// 	"url": "https://ipqualityscore-ipq-proxy-detection-v1.p.rapidapi.com/json/ip/J92aXpeipP8azhqNUKpxpeqq0Rk1CSQt/"+client_ip+"?strictness=2",
// 	"method": "GET",
// 	"headers": {
// 		"x-rapidapi-key": "1cfa132ee1mshfc3a464c5063600p167438jsnd6bf0d6ad618",
// 		"x-rapidapi-host": "ipqualityscore-ipq-proxy-detection-v1.p.rapidapi.com"
// 	}
// };

// jQuery.ajax(settings).done(function (response) {
//     console.log(response)
// 	if(response.vpn || response.tor || response.proxy || response.active_tor || response.active_vpn || response.bot_status || response.recent_abuse || response.fraud_score !== 0){alert('Login from your original IP, please')}
// });