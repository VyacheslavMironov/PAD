let submenu_menu = Vue.createApp({});
submenu_menu.component('submenu-view', {
    props: {
        type_user: {
            type: String,
            required: true
        },
        first_name: {
            type: String,
            required: true
        },
        last_name: {
            type: String,
            required: true
        }
    },
    template:`
    <div class="submenu_container">
        <div class="submenu_container-row w-30">
            <div class="user">
                <div class="user_container">
                    <img class="user_container-avatar b-circle h-6 m-center w-80" src="img/user.jpg" alt="Name Surname">
                    <div class="user_container-text">
                        <h3 class="center mt-1 mb-2">{{ first_name }}<br>{{ last_name }}</h3>
                    </div>
                    <div class="btn center">
                       <slot></slot>
                    </div>
                </div>
            </div>
        </div>
        <div class="submenu_container-row w-69">
            <div class="submenu_container-row_head">
                <svg onclick="menu.control()" xmlns="http://www.w3.org/2000/svg"  style="fill: rgba(0, 0, 0, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
            </div>
            <ul class="submenu_container-row_navigate">
                <a href="#"><li>Профиль</li></a>
                <a href="#"><li>Настройки</li></a>
            </ul>
        </div>
    </div>
    `
});
submenu_menu.mount('#menu');
