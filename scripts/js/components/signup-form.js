//  Компонент самой формы для карточки описанной выше.
let component_registration = Vue.createApp({});
component_registration.component('form-registration-component', {
    template:`
    <form id="app-registration" class="card_body-steps">
        <div class="form">
            <div class="form_step">
                <slot></slot>
            </div>
        </div>
    </form>   
    `
});
component_registration.mount('#signup');