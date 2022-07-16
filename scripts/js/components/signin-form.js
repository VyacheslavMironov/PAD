//  Компонент самой формы для карточки описанной выше.
let component_login = Vue.createApp({});
component_login.component('form-login-component', {
    template:`
    <form method="POST">
        <div class="form">
        <div class="form_step">
                <div class="form_input">
                    <label>E-mail</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form_input">
                    <label>Фамилия</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="btn">
                    <button type="submit" class="btn_link">Войти</button>
                </div>
            </div>
        </div>
    </form>   
    `
});
component_login.mount('#signin');