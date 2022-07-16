//  Компонент 
let week_lists = Vue.createApp({});
week_lists.component('week-list', {
    data() {
        return {
            weekArray: [
                [2, "Вторник"],
                [3, "Среда"],
                [4, "Четверг"],
                [5, "Пятница"],
                [6, "Суббота"],
                [7, "Восскресенье"],
            ],
            index_mounth: new Date().getMonth(),
            index_start: 0,
            index_next: 11
        }
    },
    template:`
    <div class="week">
        <ul class="week_list">
            <li id="week" class="week_item" title="1">Понедельник</li>
            <!-- // -->
            <li id="week" v-for="item in this.weekArray" class="week_item" v-bind:title="item[0]">{{ item[1] }}</li>
        </ul>
    </div>
    `,
    methods: {},
    mounted(){
        // Установка первого активного элемента, по умолчанию это Понедельник
        document.querySelector('#x-dn').style.display = "none";
    }
});
week_lists.mount('#jounal_week-app');