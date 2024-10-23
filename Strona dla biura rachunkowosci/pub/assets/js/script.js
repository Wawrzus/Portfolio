let btn = document.getElementById('show-menu-btn');
let btn_mobile = document.getElementById('mobile-menu-id');
btn.addEventListener('click', show_burger_menu);
btn_mobile.addEventListener('click', show_burger_menu);

let counter = 1;

function show_burger_menu() {
    let burger_menu = document.getElementById('mobile-menu');

    if(counter == 0) {
        burger_menu.style.right = '-250px';
        burger_menu.style.transition = 'all 0.1s';
        counter = 1;
    }
    else if(counter == 1) {
        burger_menu.style.right = '250px';
        burger_menu.style.transition = 'all 0.1s';
        counter = 0;
    }

    // console.log(counter);
}