//  Компонент хрен его знает чего
let table_student = Vue.createApp({});
table_student.component('table-student', {
    data() {
        return {
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
    <table class="table_days">
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
        <tbody class="data">
            <tr id="trData" v-for="lesson in this.lessonArray" v-bind:title="lesson">
                <td class="table_data-lesson_name">{{ lesson }}</td>
                <td v-for="cell in daysArray()" style="width: 2em;"></td>
            </tr>
        </tbody>
    </table>
    `,
    expose: ['getData', 'postData'],
    methods: {
        getData: function (){},
        postData: function (){}
    }
});
table_student.mount('#jounal-app');