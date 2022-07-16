//  Компонент 
let table_admin = Vue.createApp({});
table_admin.component('table-admin', {
    data() {
        return {
            teacherArray: [
                'Трубчина Марина Владимировна', 
                'Яронюк Артемий Константинович',
                'Брукс Виталий Максимович'
            ],
            lessonArray: [
                'Математика', 
                'Литература',
                'Русский язык',
                'Информатика'
            ],
            timeArray: [45, 60, 90, 120, 190],
            weekDayArray: [
                [
                    ["Математика", "Трубчина Марина Владимировна", "09:00", "45 минут", "09:45"],
                    ["Литература", "Яронюк Артемий Константинович", "09:50", "45 минут", "10:35"],
                ],
                [
                    ["Литература", "Яронюк Артемий Константинович", "09:00", "45 минут", "09:45"],
                    ["Информатика", "Брукс Виталий Максимович", "09:50", "45 минут", "10:35"],
                ],
                [
                    ["Математика", "Трубчина Марина Владимировна", "09:00", "45 минут", "09:45"],
                    ["Информатика", "Брукс Виталий Максимович", "09:50", "45 минут", "10:35"],
                    ["Литература", "Яронюк Артемий Константинович", "10:40", "45 минут", "11:25"],
                ],
                [
                    ["Математика", "Трубчина Марина Владимировна", "09:00", "45 минут", "09:45"],
                    ["Информатика", "Брукс Виталий Максимович", "09:50", "45 минут", "10:35"],
                ],
                [
                    ["Математика", "Трубчина Марина Владимировна", "09:00", "45 минут", "09:45"],
                ],
                [],
                []
            ]
        }
    },
    template:`
    <table  class="table_days">
        <thead>
            <tr>
                <th>Предмет</th>
                <th>Преподаватель</th>
                <th>Начало занятий</th>
                <th>Общее время</th>
                <th>Конец урока</th>
            </tr>
        </thead>
        <tbody v-for="arrItem in this.weekDayArray" id="data_form" class="data admin">
            <tr v-for="item in arrItem" id="x-copy">
                <td>
                    <div class="form"><!-- Компонент -->
                        <div class="form_input mb-0">
                        <full-select 
                            v-bind:arr="this.lessonArray"
                            type_select="text"     
                        ></full-select>
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form"><!-- Компонент -->
                        <div class="form_input mb-0">
                        <full-select
                            v-bind:arr="this.teacherArray"
                            type_select="text" 
                        ></full-select>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="text" class="teacher-value"  id="start-time1" placeholder="09:00">
                </td>
                <td>
                    <div class="form"><!-- Компонент -->
                        <div class="form_input mb-0">
                        <full-select
                            v-bind:arr="this.timeArray"
                            type_select="time"
                        ></full-select>
                        </div>
                    </div>
                </td>
                <td>09:45</td>
            </tr>
        </tbody>
    </table>
    `,
    expose: [''],
    methods: {},
    mounted(){}
});

table_admin.mount('#table');
