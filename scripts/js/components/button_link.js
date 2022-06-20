//  Компонент 
let button = Vue.createApp({});
button.component('button_link-component', {
    props: {
        text: {
            type: String,
            required: true
        },
        link: {
            type: String,
            required: true
        },
    },
    template:`
    <div class="btn">
        <a href="{{ link }}" class="btn_link">{{ text }}</a>
    </div>
    `
});
button.mount('#app');