if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }

function checkbox_checked() {
    let check = document.querySelector('#checkbox-toggle')
    if(check.checked){
        check.checked = false
        document.querySelector('.nav_bar').style.width = '52px'

        document.querySelector('.main_link > p').style.display = 'none'

        let bag_link = document.querySelector('.bag_link')

        bag_link.style.paddingRight = ''

        setTimeout(() => bag_link.style.justifyContent = 'center', 178)

        document.querySelector('.bag_link > p').style.display = 'none'

        document.querySelector('.exit').style.padding = '10px 15px'
    }
    else {
        check.checked = true

        document.querySelector('.nav_bar').style.width = '100px'

        setTimeout(() => document.querySelector('.main_link > p').style.display = 'block', 190)

        let bag_link = document.querySelector('.bag_link')
        bag_link.style.justifyContent = 'space-between'
        bag_link.style.paddingRight = '20px'
             
        
        setTimeout(() => document.querySelector('.bag_link > p').style.display = 'block', 190)
        
        document.querySelector('.exit').style.padding = '14px 39px'
        
    }
}

function bag_hover(elem) {
    elem.classList.add('bag_product_preview_hover')
    console.log(elem)
}

function bag_unhover(elem) {
    elem.classList.remove('bag_product_preview_hover')
}