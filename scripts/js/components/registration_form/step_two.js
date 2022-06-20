//  Компонент самой формы для карточки описанной выше.
let step_two = Vue.createApp({});
step_two.component('form-registration-step_two', {
    template:`
    <div class="form_step-2">
        <div class="form_input">
            <label>Имя</label>
            <input type="text" id="ferst_name">
        </div>
        <div class="form_input">
            <label>Фамилия</label>
            <input type="text" id="last_name">
        </div>
        <div class="form_input">
            <label>E-mail</label>
            <input type="email" id="email">
        </div>
        <div class="form_input">
            <label>Пароль</label>
            <input type="password" id="password1">
        </div>
        <div class="form_input">
            <label>Пароль ещё раз</label>
            <input type="password" id="password2">
        </div>
        <!-- END -->
        <div class="form_button">
            <div class="btn right center">
                <a onclick="formSteps.freeSteps()" class="btn_link">Далее</a>
            </div>
        </div>
    </div>      
    `
});
step_two.mount('#two_form');