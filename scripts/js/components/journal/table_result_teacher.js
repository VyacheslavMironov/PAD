//  Компонент хрен его знает чего
let table_result_student = Vue.createApp({});
table_result_student.component('table-result-teacher', {
    data() {
        return {
            estimatesArray: [],
            lessonArray: ["История", "Английский язык"],
        }
    },
    template:`
    <table class="table_days">
        <tbody>
            <tr>
                <th id="lesson-list" class="lessons_form">
                    <slot></slot>
                </th>

                <th>I</th>
                <th>II</th>
                <th>III</th>
                <th>IV</th>
            </tr>
        </tbody>
        <tbody class="data">
            <tr id="trData" v-for="lesson in this.lessonArray" v-bind:title="lesson">
                <td class="table_data-lesson_name">{{ lesson }}</td>
                <td style="width: 2em;">
                <div id="data_detail" class="data_detail">
                    <span>Н <input type="checkbox"></span>
                    <span>Б <input type="checkbox"></span>
                    <svg id="not_data" v-bind:data-id="idx" v-bind:data-day="id_cell" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(241 4 4);">
                        <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                    </svg>
                </div>
                <input type="text" class="teacher-value" id="input_data" v-bind:data-id="idx" v-bind:data-day="id_cell" placeholder="">
                </td>
                <td style="width: 2em;">
                <div id="data_detail" class="data_detail">
                    <span>Н <input type="checkbox"></span>
                    <span>Б <input type="checkbox"></span>
                    <svg id="not_data" v-bind:data-id="idx" v-bind:data-day="id_cell" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(241 4 4);">
                        <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                    </svg>
                </div>
                <input type="text" class="teacher-value" id="input_data" v-bind:data-id="idx" v-bind:data-day="id_cell" placeholder="">
                </td>
                <td style="width: 2em;">
                <div id="data_detail" class="data_detail">
                    <span>Н <input type="checkbox"></span>
                    <span>Б <input type="checkbox"></span>
                    <svg id="not_data" v-bind:data-id="idx" v-bind:data-day="id_cell" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(241 4 4);">
                        <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                    </svg>
                </div>
                <input type="text" class="teacher-value" id="input_data" v-bind:data-id="idx" v-bind:data-day="id_cell" placeholder="">
                </td>
                <td style="width: 2em;">
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
    expose: ['getData', 'postData'],
    methods: {
        getData: function (){},
        postData: function (){}
    }
});
table_result_student.mount('#jounal-app');