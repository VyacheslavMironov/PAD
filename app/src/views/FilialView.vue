<template>
   <main class="container_fluid">
        <!-- Компонент сообщения -->
        <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
        <!-- END -->
        <div class="container">
            <div class="row">
                <div class="mt-2">
                    <h3 class="text-center">Назначеные филиалы</h3>
                </div>
                <section
                    v-for="i in this.filial_list"
                    v-bind:key="i"
                >
                    <div
                        v-if="i.admin_id == this.user_info.id"
                        class="mt-3"
                    >
                        <CardComponent>
                            <div class="row">
                                <div class="col-1">
                                    <svg xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 10V7c0-1.103-.897-2-2-2h-3c0-1.654-1.346-3-3-3S8 3.346 8 5H5c-1.103 0-2 .897-2 2v4h1a2 2 0 0 1 0 4H3v4c0 1.103.897 2 2 2h4v-1a2 2 0 0 1 4 0v1h4c1.103 0 2-.897 2-2v-3c1.654 0 3-1.346 3-3s-1.346-3-3-3z"></path>
                                    </svg>
                                </div>
                                <div class="col-8">
                                    <strong>
                                        # {{ i.name }}
                                    </strong>
                                </div>
                                <div class="col-3">
                                    <!-- Компонент кнопки -->
                                    <ButtonComponent 
                                        v-bind:link="server + '/filial/specific?organization_id=' + i.organization_id + '&&filial_id=' + i.id"
                                        text="Авторизоваться"
                                        css_class="btn right"
                                    />
                                    <!-- END -->
                                </div>
                            </div>
                        </CardComponent>
                    </div>
                </section>
            </div>
        </div>
   </main>
</template>
  
<script>
import axios from 'axios'
import AlertComponent from '../components/AlertComponent.vue'
import ButtonComponent from '../components/ButtonComponent.vue'
import CardComponent from '../components/CardComponent.vue'
export default {
    name: 'FilialView',
    data () {
        return {
            alert: null,
            filial_list: null
        }
    },
    props: {
        user_info: Object,
        settings_info: Object,
        server: String,
        is_auth: Number,
        token: String
    },
    components: {
        AlertComponent,
        ButtonComponent,
        CardComponent
    },
    methods: {
        async show_filial () {
            await axios.get(this.server + '/api/filial/show?organization_id=' + this.user_info.organization_id,
            {
                headers: {
                'Content-Type': 'application/json',
                }
            })
            .then((response) => {
                console.log(response.data[0])
                this.filial_list = response.data[0]
            })
            .catch((error) => {
                this.alert = 'Ошибка загрузки списка филиалов!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
            })
      },
    },
    mounted () {
        this.show_filial()
    }
}
</script>