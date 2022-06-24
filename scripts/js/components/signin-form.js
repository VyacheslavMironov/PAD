//  Компонент самой формы для карточки описанной выше.
let card = Vue.createApp({});
card.component('card-component', {
    template:`
    <div class="card">
        <div class="card_header">
            <div class="card_header-text">
                <h3 class="center">Вход</h3>
            </div>
            <div class="card_header-bottom">
                <div class="card_header-bottom__max"></div>
                <div class="card_header-bottom__min"></div>
            </div>
        </div>
        <div class="card_body" id="form-login">
            <form method="POST">
                <div class="form">
                    <div class="form_input">
                    <label>Фамилия</label>
                    <input type="text" id="last_name">
                </div>
                <div class="form_input">
                    <label>Фамилия</label>
                    <input type="text" id="last_name">
                </div>
                <div class="btn">
                <button type="submit"  class="btn_link">пкупуп</button>
                </div>
            </form>
        </div>
    </div>     
    `
});
card.mount('#card');