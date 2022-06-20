const { createApp } = Vue

//  Компонент самой формы для карточки описанной выше.
var step_one = Vue.createApp({});
step_one.component('form-registration-step_one', {
    template:`
    <div class="form_step-1">
        <div class="form_input">
            <label>Наименование организации</label>
            <input type="text" id="organization_name">
        </div>
        <!-- Автоподгрузка элементов -->
        <div class="form_input" id="organizations"></div>
        <!-- END -->
        <div class="form_button">
            <!-- <button_link-component class="center right" text="Далее"></button_link-component> -->
            <div class="btn right center">
                <a onclick="formSteps.twoSteps()" class="btn_link">Далее</a>
            </div>
        </div>
    </div>      
    `
});
step_one.mount('#one_form');


// Обрабатывает элемент с идентификатором #organizations
createApp({
    data(){
        return {
            step: 1,
            type_array: ['Колледж', 'Школа', 'Спортивная секция']
        }
    },
    
    template: `
        <section>
            <label>Тип Организации</label>
            <select id="organization_type">
                <option v-for="item in type_array" v-bind:value="item">{{item}}</option>
            </select>
        </section>
    `,
    mounted() {
        function getTypeOrganizations(){
            /*
            Тут будет запрос к серверу на получение данных
            и заполнение списка - type_array. Пока это будет статично.
            */
        }
    }
    }).mount('#organizations')