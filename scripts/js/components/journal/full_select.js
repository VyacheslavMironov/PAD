//  Компонент 
let full_select = Vue.createApp({});
full_select.component('full-select', {
    props: {
        arr: {
            type: Array,
            required: true
        },
        type_select: {
            type: String,
            required: true,
            default: "text"
        }
    },
    template:`
    <select id="organization_type" class="br-0">
        <option v-for="x in this.arr.split(',')" v-bind:value="x">
            {{ x }} <span v-if="this.type_select == 'time'">минут</span>
        </option>
    </select>
    `,
    expose: [''],
    methods: {},
    mounted() {}
});
full_select.mount('#table');