if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }

function checkbox_checked() {
    let check = document.querySelector('#checkbox-toggle')
    if(check.checked){
        check.checked = false
        document.querySelector('.nav_bar').style.width = '52px'

        document.querySelector('.main_link > p').style.display = 'none'



        document.querySelector('.bag_link > p').style.display = 'none'

        document.querySelector('.exit').style.padding = '10px 15px'
    }
    else {
        check.checked = true

        document.querySelector('.nav_bar').style.width = '100px'

        setTimeout(() => document.querySelector('.main_link > p').style.display = 'block', 190)
             
        
        setTimeout(() => document.querySelector('.bag_link > p').style.display = 'block', 190)
        
        document.querySelector('.exit').style.padding = '14px 39px'
        
    }
}


// Bag hover
function bag_hover(elem) {
    elem.classList.add('bag_product_preview_hover')
}

function bag_unhover(elem) {
    elem.classList.remove('bag_product_preview_hover')
}

// Search
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

let search = getCookie('search')
if(search != undefined){
    document.querySelector('#search_input').value = search
}