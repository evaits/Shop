// Check inputs context
function check_inputs(){
    const inp_arr = ['nick', 'email', 'password']
    for(let i = 0; i<inp_arr.length; i++){
        let input = document.getElementById(inp_arr[i]).value
        if(input == ''){
            const modal = `<div class="modal_error_bg">
            <div class="modal_error_header">
                An error occurred
            </div>
            <hr>
            <div class="modal_error_context">
                A data problem was detected
            </div>
            <hr>
            <button class="modal_error_btn" onclick="close_error_modal()">
                Ok
            </button>
        </div>`
            document.querySelector('.container').style.pointerEvents = 'none'
            let modal_error = document.querySelector('.modal_error')
            modal_error.innerHTML = modal
            modal_error.style.display = 'block'
            return false;
        }
    }
}

// Close Error Modal
function close_error_modal() {
    document.querySelector('.container').style.pointerEvents = 'auto'
    let modal_error = document.querySelector('.modal_error')
    modal_error.innerHTML = ''
    modal_error.style.display = 'none'
}