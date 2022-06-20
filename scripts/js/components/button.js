//  Компонент 
let button = Vue.createApp({});
button.component('button-component', {
    props: {
        text: {
            type: String,
            required: true
        },
        button_type: {
            type: String,
            required: true
        },
    },
    template:`
    <div class="btn">
        <a type="{{ button_type }}" class="btn_link">{{ text }}</a>
    </div>
    `
});
button.mount('#button');