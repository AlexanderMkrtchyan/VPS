function getcookie(name = '') {
	let cookies = document.cookie;
	let cookiestore = {};

	cookies = cookies.split(";");

	if (cookies[0] == "" && cookies[0][0] == undefined) {
		return undefined;
	}

	cookies.forEach(function (cookie) {
		cookie = cookie.split(/=(.+)/);
		if (cookie[0].substr(0, 1) == ' ') {
			cookie[0] = cookie[0].substr(1);
		}
		cookiestore[cookie[0]] = cookie[1];
	});

	return (name !== '' ? cookiestore[name] : cookiestore);
}


let user_data = {}
let submit = document.getElementsByClassName('submit')[0];



jQuery(submit).on('click', (e) => {
	e.preventDefault();
	let user_id_cookie = getcookie('user_id')
	
	let question_1 = document.getElementsByClassName("question-1")[0].value;
	let question_2 = document.getElementsByClassName("question-2")[0].value;
	let answer_1 = document.getElementsByClassName("answer-1")[0].value;
	let answer_2 = document.getElementsByClassName("answer-2")[0].value;
    let attentions = document.querySelectorAll('.qs-input-attention')
	
    // don't showing any attentions before input
    for (let att of attentions) {
        att.style.display = 'none'
    }
    let all_fields = document.querySelectorAll('.qs-input')
    for (let i of all_fields) {
        i.style.borderColor = "#c1a700"
        i.style.borderWidth = "1px"
    }


	if (question_1.value == '') {
        question_1.style.borderBlockStartWidth = '10px'
        question_1.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('q1-attention')[0].style.display = 'block'
        return;
    }else if (answer_1.value == '') {
        answer_1.style.borderBlockStartWidth = '10px'
        answer_1.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('q1-ans-attention')[0].style.display = 'block'
        return;
    }else if (question_2.value == '') {
        question_2.style.borderBlockStartWidth = '10px'
        question_2.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('q2-attention')[0].style.display = 'block'
        return;
    }else if (answer_2.value == '') {
        answer_2.style.borderBlockStartWidth = '10px'
        answer_2.style.borderBlockStartColor = 'red'
        document.getElementsByClassName('q2-ans-attention')[0].style.display = 'block'
        return;
    }else{
		user_data['user_id_cookie'] = user_id_cookie;
		user_data['question_1'] = question_1;
		user_data['question_2'] = question_2;
		user_data['answer_1'] = answer_1;
		user_data['answer_2'] = answer_2;
		console.group(user_data);
		
		jQuery.ajax({
			url: ajax_object.ajax_url,
			type: "post",
			dataType: "json",
			data: { 
				'action': "questions_and_answers",
				'data': user_data
			},
			success: function (result) {
				if (result == 'success') {
				window.location.href = '/join-step-3/';
				}else if( result == 'fail'){
					alert("Please correct all entry 1");
				}
			},
			error: function (log) {
				console.log(log);				
			}
		});
	}
	
	
})
