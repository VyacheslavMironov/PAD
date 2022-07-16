//  Компонент 
let group_options = Vue.createApp({});
group_options.component('group-select', {
    data() {
        return {
            groupArray: ['IT1', 'IT2']
        }
    },
    template:`
    <select id="organization_type">
        <option v-for="x in this.groupArray" v-bind:value="x">{{ x }}</option>
    </select>
    `,
    expose: [''],
    methods: {},
    mounted() {}
});
group_options.mount('#groups');