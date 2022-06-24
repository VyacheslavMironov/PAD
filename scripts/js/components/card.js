//  Компонент самой формы для карточки описанной выше.
let card = Vue.createApp({});
card.component('card-component', {
    props: {
        title: String,
        form: Boolean,
        component: {
            type: Object
        },
    },
    template:`
    <div class="card">
        <div class="card_header">
            <div v-if="component == 'signup'" class="card_header-step">
                <p id="step_count" class="center">1</p>
            </div> 
            <div class="card_header-text">
                <h3 class="center">{{ title }}</h3>
            </div>
            <div v-if="form" class="card_header-bottom">
                <div class="card_header-bottom__max"></div>
                <div class="card_header-bottom__min"></div>
            </div>
        </div>
        <div class="card_body" id="form-registration">
            <!-- 
                Компонент передаваемый в компонент, 
                а что ты думал? Меченому тоже не посебе было, 
                узнав что он Стрелок 
            -->
            <div id="signup">
                <slot></slot>
            </div>
            
        </div>
    </div>     
    `
});
card.mount('#card');