let friends = document.querySelector('#friend_request')
if (friends) {
  friends.addEventListener('click', event => {
    var tar
    if (event.target.nodeName == 'use') {
      var tar = event.target.parentElement.parentElement;
    } else if (event.target.nodeName == 'svg') {
      var tar = event.target.parentElement;
    } else if (event.target.nodeName == 'li') {
      var tar = event.target
    } else if (event.target.nodeName == 'ul') {
      return;
    }
    console.log(tar)
    let current_user_id = tar.dataset.id
    tar.style.display = 'none'

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id')
    socket.emit('friend_request', {
      'requester_id': current_user_id,
      'accepter_id': id,
      'fr_type': tar.dataset.fr
    })
  })
}