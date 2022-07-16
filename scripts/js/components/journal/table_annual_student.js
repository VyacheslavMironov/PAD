//  Компонент хрен его знает чего
let table_annual_student = Vue.createApp({});
table_annual_student.component('table-annual-student', {
    data() {
        return {
            estimatesArray: [],
            lessonArray: ["История", "Английский язык", "Информатика", "Проектная деятельность", "Литература"],
        }
    },
    template:`
    <table class="table_days">
        <tbody>
            <tr>
                <th id="lesson-list" class="lessons_form">
                    <slot></slot>
                </th>
            </tr>
        </tbody>
        <tbody class="data">
            <tr id="trData" v-for="lesson in this.lessonArray" v-bind:title="lesson">
                <td class="table_data-lesson_name">{{ lesson }}</td>
                <td style="width: 2em;"></td>
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
table_annual_student.mount('#jounal-app');