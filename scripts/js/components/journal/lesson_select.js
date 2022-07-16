//  Компонент 
let lesson_list = Vue.createApp({});
lesson_list.component('lesson-select', {
    data() {
        return {
            lessons: ["История", "Английский язык", "Информатика", "Проектная деятельность", "Литература"]

        }
    },
    props: {
        default: {
            type: Boolean,
            required: false,
            default: false
        },
    },
    template:`
    <div class="form">
        <div class="form_input">
            <select id="option" onchange="{
                // Выбор предмета
                let select_in_lesson = () => {
                    const option = document.getElementById('option').value;
                    let tableView = document.querySelectorAll('#trData');

                    for (let x = 0; x < tableView.length; x++)
                    {
                        /* Когда юзер выбирает конкретный предмет, то отображаем только его, остальное скрыть */ 
                        if (document.querySelectorAll('.table_data-lesson_name')[x].textContent == option){
                            document.querySelectorAll('#trData')[x].style.display = 'table-row';
                        } else {
                            document.querySelectorAll('#trData')[x].style.display = 'none';
                        }

                        /* Когда юзер выбирает все предметы, то отображаем всё абсолютно */ 
                        if (option == 'Все предметы'){
                            document.querySelectorAll('#trData')[x].style.display = 'table-row';
                        }
                    }
                }

                // Выбор предмета, но с отображением инфы для всех учеников
                let select_in_lesson_all = () => {
                    var option = document.getElementById('option').value;
                    var data = document.querySelectorAll('.data');

                    for (let j = 0; data.length > j; j++){
                        if (data[j].title == option){
                            data[j].classList.remove('disabled');
                            data[j].classList.add('active');
                        } else {
                            data[j].classList.remove('active');
                            data[j].classList.add('disabled');
                        }
                    }
                }



                if (document.querySelector('.table_days').title == 'student'){
                    select_in_lesson();
                } else if (document.querySelector('.table_days').title == 'teacher') {
                    select_in_lesson_all();
                }
            }">
                <option v-if="this.default == true" value="Все предметы">Все предметы</option>
                <option v-for="item in lessons" is-bind:value="item">{{ item }}</option>
            </select>
        </div>
    </div>
    `,
    expose: ['getData'],
    methods: {
        getData: function(){
            /*
            При помощи getData отправляем запрос на сервер с забором данных.
            И отображаем их в компоненте gournal-table.
            */
        },
        valueHasChanged: function() {},
        viewDataActiveStart: function() {
            /*
                Стартовое отображение данных предмета. Первый заголовок tbody 
                должен быть равен первой активной опции.
            */ 
            const optionDataStart = document.getElementById('option').value;
            const title = document.querySelector('.data').title;

            if (optionDataStart === title){
                document.querySelector('.data').classList.remove('disabled');
                document.querySelector('.data').classList.add('active');
            }
        }
    },
    mounted() {
        if (document.querySelector('.table_days').title == 'teacher'){
            this.viewDataActiveStart();
        }
    }
});
lesson_list.mount('#lesson-list');