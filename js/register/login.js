if(document.cookie.split('error=')[1] == 1) {
    const modal = 
    `<div class="modal_error_bg">
        <div class="modal_error_header">
            User not found
        </div>
        <hr>
        <div class="modal_error_context">
            Check the data and try again
        </div>
        <hr>
        <button class="modal_error_btn"onclick="close_error_modal()">
            Ok
        </button>
    </div>`
    document.querySelector('.container').style.pointerEvents = 'none'
    let modal_error = document.querySelector('.modal_error')
    modal_error.innerHTML = modal
    modal_error.style.display = 'block'
}

// Close Error Modal
function close_error_modal() {
    document.querySelector('.container').style.pointerEvents = 'auto'
    let modal_error = document.querySelector('.modal_error')
    modal_error.innerHTML = ''
    modal_error.style.display = 'none'
}