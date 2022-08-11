// Getting notifications

socket.on('get notifications', data => {
    let notif_count = 0
    data.forEach(el => {
        switch (el.type) {
            case 'friend_request':
                if (!el.status) {
                    notif_count++
                }
                let not_content = JSON.parse(el.content)
                jQuery.ajax({
                    url: ajax_object.ajax_url,
                    async: false,
                    type: 'POST',
                    dataType: "JSON",
                    data: { 
                        'user_id': not_content.requester_id,
                        'action': 'askForFriend'
                    },
                    success: function (data) {
                        let num = parseInt(not_content.fr_type.slice(-1))
                        let status_class = ""
                        if (el.status == 0) {
                            status_class = 'bgc-gray-light'
                        }
                        let flirts = ['smile', 'wink', 'flower', 'heart'][num - 1]
                        let notification = document.getElementById('klir')

                        let html = '<div onclick="javascript:red_notification(' + el.id + ')" data-id="' + el.id + '" class="qs-notif--item ' + status_class + '">\
                            <div onclick="delete_notifications(' + el.id + ')" class="delete_notification">X</div>\
                            <div class="qs-notif--img" >\
                                <img src="' + data[0] + '" alt="">\
                            </div>\
                            <div class="qs-notif--content">\
                                <div class="qs-notif--part">\
                                    <a href="http://localhost/profile/?id=' + not_content.requester_id + '" target="_blank">' + data[1] + '</a> sent you \
                                    <svg class="' + flirts + '-color" width="30" height="30" role="img">\
                                        <use href="' + ajax_object.directory_uri + '/icons/icons.svg#' + flirts + '"/>\
                                    </svg>\
                                    <div class="qs-notif--btn">\
                                        <a class="qs-btn btn-secondary btn-xsm" href="http://localhost/profile/?id=' + not_content.requester_id + '" target="_blank">See profile</a>\
                                    </div>\
                                </div>\
                                <div class="qs-notif--part">\
                                    <time>3 Nov 11:30</time>\
                                </div>\
                            </div>\
                          </div>'
                        notification.insertAdjacentHTML("beforebegin", html);


                        // accept/deny request

                        const accept = document.getElementById('accept_request')
                        const deny = document.getElementById('deny_request')

                        deny.addEventListener('click', () => {
                            document.getElementById('notificat').style.display = 'none'
                        })
                        accept.addEventListener('click', () => {
                            socket.emit('accepted_request', {
                                'accepter_id': user_id,
                                'requester_id': not_content.requester_id
                            })
                        })
                    },
                    error: function (er) {
                        console.log(er)
                        
                        



                    }
                });
                break;

            case 'dating_time':
                let data = JSON.parse(el.content)
                let sec = Date.parse(data.time)
                let requester_id = data.user1
                let time = new Date(sec)
              

                jQuery.ajax({
                    url: ajax_object.ajax_url,
                    async: false,
                    type: 'POST',
                    dataType: "JSON",
                    data: { 
                        'user_id': requester_id,
                        'action': 'askForFriend'
                    },
                    success: function (el) {

                        let requester_username = el[1]
                        let requeser_image = el[0]

                        let notification = document.getElementById('klir')

                        let html = '<div onclick="javascript:red_notification(' + requester_id + ')" data-id="' + requester_id + '" class="qs-notif--item ' + 0 + '">\
                            <div onclick="delete_notifications(' + el.id + ')" class="delete_notification">X</div>\
                            <div class="qs-notif--img" >\
                                <img src="' + requeser_image + '" alt="">\
                            </div>\
                            <div class="qs-notif--content">\
                                <div class="qs-notif--part">\
                                    <a href="http://localhost/profile/?id=' + requester_id + '" target="_blank">' + requester_username + '</a> sent you  Dating Request\
                                    <div class="qs-notif--btn">\
                                        <a class="qs-btn btn-secondary btn-xsm" href="http://localhost/profile/?id=' + requester_id + '" target="_blank">See profile</a>\
                                    </div>\
                                </div>\
                                <span hidden id="given_time" data-id="'+data.time+'"></span>\
                                <div class="qs-notif--part">\
                                    <time>' + time +'</time>\
                                    <button onclick="javascript:acceptDating(' + requester_id + ')" class="accept_dating" id="'+data.user1+' data-time="'+data.time+'"" >Accept request</button>\
                                    <button onclick="javascript:denyDating(' + requester_id + ')" class="deny_dating" id="'+data.user1+'" data-time="'+data.time+'" >Deny request</button>\
                                </div>\
                            </div>\
                          </div>'
                        notification.insertAdjacentHTML("beforebegin", html);


                    }
                })

                break;
                case 'dating_link':
                    // alert('pidor')
            default:
                break;
            
        }
    });

    let not_count = document.querySelector('.qs-notif--count')
    not_count.innerHTML = notif_count
})

// Delete notification
function delete_notifications(id) {
    let el = document.querySelector('[data-id="' + id + '"]')
    if (el.classList.contains('bgc-gray-light')) {
        let not_count = document.querySelector('.qs-notif--count')
        let num = parseInt(not_count.innerHTML) - 1
        not_count.innerHTML = num
    }
    el.remove()
    jQuery.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: {
            'id': id,
            'action': 'delete_notification'
        },
        success: data => {}
    })


}

// Read/unread notifications
function red_notification(id) {
    let el = document.querySelector('[data-id="' + id + '"]')
    if (!el) {
        return
    }
    let not_count = document.querySelector('.qs-notif--count')
    if (el.classList.contains('bgc-gray-light')) {
        let count = parseInt(not_count.innerHTML) - 1
        not_count.innerHTML = count
        el.classList.remove('bgc-gray-light')
        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                'id': id,
                'action': 'red_notification'
            }
        })
    }

}
