//  Компонент 
let button_add = Vue.createApp({});
button_add.component('button-add', {
    template:`
    <div  class="btn w-20 center right-78 mb-2">
        <a  onclick='appClick.addStringTable()'
            class='btn_link'>
            Добавить строку
        </a>
    </div>
    `,
    expose: [],
    methods: {}
});
button_add.mount('#add');