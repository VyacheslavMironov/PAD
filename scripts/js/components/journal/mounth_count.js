//  Компонент 
let mount_count = Vue.createApp({});
mount_count.component('mount-count', {
    data() {
        return {
            mounthArray: [
                "Янврь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"
            ],
            index_mounth: new Date().getMonth(),
            index_start: 0,
            index_next: 11
        }
    },
    template:`
    <div class="journal_month">
        <div class="card df">
            <div v-on:click="getIndexDecrement" class="card_icon">
                <svg xmlns="http://www.w3.org/2000/svg"  style="fill: rgba(0, 0, 0, 1);">
                    <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                </svg>
            </div>
            <p id="to" class="card_text">{{ this.mounthArray[index_mounth] }}</p>
            <div v-on:click="getIndexIncrement" class="card_icon">
                <svg xmlns="http://www.w3.org/2000/svg"  style="fill: rgba(0, 0, 0, 1);">
                    <path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path>
                </svg>
            </div>
        </div>
    </div>
    `,
    expose: ['getIndexIncrement', 'getIndexDecrement', 'getData'],
    methods: {
        getIndexIncrement: function() {
            if (this.index_mounth != this.index_next){
                this.index_mounth += 1;
            }
        },
        getIndexDecrement: function() {
            if (this.index_mounth != this.index_start){
                this.index_mounth -= 1;
            }
        },
        getData: function(){
            /*
            При помощи getData отправляем запрос на сервер с забором данных.
            И отображаем их в компоненте gournal-table.
            */
        }
    }
});
mount_count.mount('#jounal-app');