<template>
    <main class="container_fluid">
      <!-- Компонент сообщения -->
      <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
      <!-- END -->
      <div class="container">
        <div class="row">
          <div class="container mb-5 text-center">
              <h3>Все группы</h3>
          </div>
          <section>
                <div class="mt-3 row">
                    <CardComponent
                        v-for="i in this.filial_list"
                        v-bind:key="i"
                        css_class="_card card col-lg-5 mx-auto col-12 mt-5 p-5"
                    >
                        <div 
                            v-if="i.admin_id == this.user_info.id"
                            id="timetable-min" 
                            class="row"
                        >
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 10V7c0-1.103-.897-2-2-2h-3c0-1.654-1.346-3-3-3S8 3.346 8 5H5c-1.103 0-2 .897-2 2v4h1a2 2 0 0 1 0 4H3v4c0 1.103.897 2 2 2h4v-1a2 2 0 0 1 4 0v1h4c1.103 0 2-.897 2-2v-3c1.654 0 3-1.346 3-3s-1.346-3-3-3z"></path>
                                </svg>
                            </div>
                            <div class="col-11">
                                <strong>
                                    # {{ i.name }}
                                </strong>
                            </div>
                            <div class="row mt-5 text-center">
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['ПН'].length > 0 ? 'btn' : 'btn disable'">ПН</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['ПН'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['ВТ'].length > 0 ? 'btn' : 'btn disable'">ВТ</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['ВТ'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['СР'].length > 0 ? 'btn' : 'btn disable'">СР</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['СР'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['ЧТ'].length > 0 ? 'btn' : 'btn disable'">ЧТ</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['ЧТ'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['ПТ'].length > 0 ? 'btn' : 'btn disable'">ПТ</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['ПТ'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['СБ'].length > 0 ? 'btn' : 'btn disable'">СБ</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['СБ'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div v-bind:class="Object(this.day_list)['ВС'].length > 0 ? 'btn' : 'btn disable'">ВС</div>
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                        + {{ Object(this.day_list)['ВС'].length }}
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <!-- Компонент кнопки -->
                                <ButtonComponent 
                                    v-bind:link="server + '/timetable/group?organization_id=' + i.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + i.id"
                                    text="Смотреть расписание"
                                    css_class="btn w-100"
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
import CardComponent from '../components/CardComponent.vue'
import ButtonComponent from '../components/ButtonComponent.vue'

export default {
    data () {
        return {
            alert: null,
            filial_list: null,
            day_list:null
        }
    },
    components: {
        CardComponent,
        ButtonComponent,
        AlertComponent
    },
    props: {
        user_info: Object,
        settings_info: Object,
        server: String,
        server_journal: String,
        is_auth: Number,
        token: String
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
                this.filial_list = response.data[0]

                var i = 0
                while (i < this.filial_list.length) {
                    axios.get(this.server_journal + '/api/timetable/show?organization_id=' + this.$route.query.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.filial_list[i].id,
                    {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then((response) => {
                        this.day_list = response.data[0]
                    })
                    .catch((error) => {
                        this.alert = 'Ошибка загрузки списка дней!'
                        // Активация всплывающего сообщения
                        document.getElementById('toast').style.opacity = 1
                    })
                    // Прибавка
                    i++
                }                
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
