//  Компонент самой формы для карточки описанной выше.
let card = Vue.createApp({});
card.component('card-component', {
    template:`
    <div class="card">
                <div class="card_header">
                    <div class="card_header-step">
                        <p id="step_count" class="center">1</p>
                    </div>
                    <div class="card_header-text">
                        <h3 class="center">Регистрация</h3>
                    </div>
                    <div class="card_header-bottom">
                        <div class="card_header-bottom__max"></div>
                        <div class="card_header-bottom__min"></div>
                    </div>
                </div>
                <div class="card_body" id="form-registration">
                    <form id="app-registration" class="card_body-steps">
                        <div class="form">
                            <div class="form_step">
                                <div id="one_form">
                                    <form-registration-step_one></form-registration-step_one>
                                </div>
                                <div id="two_form">
                                    <form-registration-step_two></form-registration-step_two>
                                </div>
                                <div id="free_form">
                                    <form-registration-step_free></form-registration-step_free>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>     
    `
});
card.mount('#card');