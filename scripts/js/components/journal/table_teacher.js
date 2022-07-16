//  Компонент хрен его знает чего
let table_teacher = Vue.createApp({});
table_teacher.component('table-teacher', {
    data() {
        return {
            studentsArray: [],
            estimatesArray: [],
            lessonArray: ["История", "Английский язык", "Информатика", "Проектная деятельность", "Литература"],
            mounth: new Date().getMonth(),
            year: new Date().getFullYear(),
            dayWeekArray: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
            dateArray: (count) => {
                return new Date().setDate(count)
            },
            daysArray: () => {
                let start = 1;
                let end = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
                return [...Array(end - start + 1).keys()].map(x => x + start);
            }
        }
    },
    template:`
    <table class="table_days" title="teacher">
        <tbody>
            <tr>
                <th id="lesson-list" class="lessons_form">
                    <slot></slot>
                </th>

                <th v-for="cell in daysArray()">
                    {{ cell }}
                    <br>
                    {{
                        this.dayWeekArray[
                            new Date(this.year, this.mounth-1, cell+1).getDay()
                        ] 
                    }}
                </th>
            </tr>
        </tbody>
        <tbody v-for="lesson in this.lessonArray" class="data disabled" v-bind:title="lesson">
            <tr id="trData" v-for="student,idx in this.studentsArray" v-bind:title="student">
                <td class="table_data-lesson_name">{{ student }}</td>
                <td v-for="cell,id_cell in daysArray()" style="width: 2em;" id="input-">
                    <div id="data_detail" class="data_detail">
                        <span>Н <input type="checkbox"></span>
                        <span>Б <input type="checkbox"></span>
                        <svg id="not_data" v-bind:data-id="idx" v-bind:data-day="id_cell" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(241 4 4);">
                        <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                        </svg>
                    </div>
                    <input type="text" class="teacher-value" id="input_data" v-bind:data-id="idx" v-bind:data-day="id_cell" placeholder="">
                </td>
            </tr>
        </tbody>
    </table>
    `,
    expose: ['getDataForStudent', 'postData'],
    methods: {
        getDataForStudent: function (){
            this.studentsArray = [
                "Акбаров Дилмудор", 
                "Куваталиев Давранбек", 
                "Алиев Али", 
                "Абдулоев Бехруз", 
                "Бобомиршоев Хайём", 
                "Тезекбаев Сайдалим", 
                "Гозиев Шамсулло", 
                "Курбанов Шахверди", 
                "Джубабаев Машраб", 
                "Кулуев Нурбек"
            ]
            return this.studentsArray;
        },
        postData: function (){}
    },
    mounted(){
        this.getDataForStudent();
    }
});
table_teacher.mount('#jounal-app');