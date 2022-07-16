let student_menu = Vue.createApp({});
student_menu.component('menu-view', {
    props: {
        type_user: {
            type: String,
            required: true
        }
    },
    template:`
    <ul class="menu_list">
        <a href="#" class="menu_list-item">
            <li>Журнал</li>
        </a>
        <a href="#" class="menu_list-item">
            <li>Растписание</li>
        </a>
        <a href="#" class="menu_list-item">
            <li>Тесты</li>
        </a>
        <a href="#" class="menu_list-item">
            <li>Статистика</li>
        </a>
    </ul>
    `
});
student_menu.mount('#user_menu');