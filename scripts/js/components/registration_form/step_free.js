//  Компонент самой формы для карточки описанной выше.
let step_free = Vue.createApp({});
step_free.component('form-registration-step_free', {
    template:`
    <div class="form_step-3">
        <br>
        <p class="text-form mt-3 mb-2">
            Подождите немного...<br>
            Проводится настройка рабочего окружения
        </p>
        <div class="process mb-2">
            <div class="process_item"></div>
        </div>
    </div>      
    `
});
step_free.mount('#free_form');