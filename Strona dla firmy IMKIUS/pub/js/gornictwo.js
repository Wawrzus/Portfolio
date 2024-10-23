let menu = document.querySelector('.mobile-menu-swipe');
let hamburger_btn = document.getElementById('burger-button');
let mobile_main = document.querySelector('.mobile_main');

let counter = 0;

function wyswietl_menu() {
    if(counter == 0) {
        mobile_main.style.webkitFilter = 'blur(5px)';
        menu.style.display = 'block';
        menu.style.transition = 'all ease-in-out 2s';
        counter = 1;
    }
    else if(counter == 1) {
        mobile_main.style.webkitFilter = 'blur(0px)';
        menu.style.display = 'none';
        menu.style.transition = 'all ease-in-out 2s';
        counter = 0;
    }
}
hamburger_btn.addEventListener('click', wyswietl_menu);

function getID(clickID) {
    let id = document.getElementById(clickID);
    let parent = id.previousElementSibling;
    if(parent.style.webkitLineClamp == '') {
        parent.style.webkitLineClamp = 'initial';
        id.firstElementChild.setAttribute('src', 'assets/images/expand-button.png');
        id.firstElementChild.setAttribute('id', 'expand_w_mk');
        id.style.backgroundColor = 'white';
    }
    else if(parent.style.webkitLineClamp == 'initial') {
        parent.style.webkitLineClamp = '10';
        id.firstElementChild.setAttribute('src', 'assets/images/expand.png');
        id.firstElementChild.setAttribute('id', 'expand_w_mk');
        id.style.backgroundColor = '#0031DD';
    }
    else if(parent.style.webkitLineClamp == '10') {
        parent.style.webkitLineClamp = 'initial';
        id.firstElementChild.setAttribute('src', 'assets/images/expand-button.png');
        id.firstElementChild.setAttribute('id', 'expand_w_mk');
        id.style.backgroundColor = 'white';
    }
}