<template>
    <main class="container-fluid">
      <!-- Компонент загрузки -->
      <LoaderComponent />
      <!-- End -->
      <!-- Сообщение о процессе -->
      <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
      <!-- END -->
      <div class="mx-auto col-10">
        <div
          class="mb-3"
          v-for="i in this.filial_list"
          v-bind:key="i"
        >
            <p>
              <strong>
                # {{ i.name }}
              </strong>
            </p>
                <section
                    v-for="j in this.groups"
                    v-bind:key="j"
                >
                    <div
                      v-if="i.id == j.filial_id"
                      class="mt-3"
                    >
                        <CardComponent
                          css_class="_card card col-lg-10 col-12 p-5"
                        >
                            <div class="row">
                                <div class="col-1">
                                    <svg xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 10V7c0-1.103-.897-2-2-2h-3c0-1.654-1.346-3-3-3S8 3.346 8 5H5c-1.103 0-2 .897-2 2v4h1a2 2 0 0 1 0 4H3v4c0 1.103.897 2 2 2h4v-1a2 2 0 0 1 4 0v1h4c1.103 0 2-.897 2-2v-3c1.654 0 3-1.346 3-3s-1.346-3-3-3z"></path>
                                    </svg>
                                </div>
                                <div class="col-6">
                                    <strong>
                                        # {{ j.name }}
                                    </strong>
                                </div>
                                <div class="col-5">
                                    <!-- Компонент кнопки -->
                                    <ButtonComponent 
                                        v-bind:link="server + '/journal/teacher?organization_id=' + j.organization_id + '&&filial_id=' + j.filial_id + '&&group_id=' + j.id"
                                        text="Перейти в журнал группы"
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
  import LoaderComponent from '../components/LoaderComponent.vue'
  import ButtonComponent from '../components/ButtonComponent.vue'
  
  export default {
    data () {
      return {
        alert: '',
        groups: null,
        filial_list: null
      }
    },
    props: {
      user_info: Object,
      settings_info: Object,
      server: String,
      server_journal: String,
      is_auth: Number,
      token: String
    },
    components: {
      CardComponent,
      LoaderComponent,
      ButtonComponent,
      AlertComponent
    },
    methods: {
      async show_list () {
        await axios.get(this.server_journal + '/api/group/list?organization_id=' + this.user_info.organization_id,
        {
            headers: {
            'Content-Type': 'application/json',
            }
        })
        .then((response) => {
            this.groups = response.data[0]
        })
        .catch((error) => {
            this.alert = 'Ошибка загрузки списка групп на стороне сервера, обратитесь в тех-поддержку.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
        })
      },
      async filial_show() {
        await axios.get(this.server + '/api/filial/show?organization_id=' + this.user_info.organization_id,
            {
                headers: {
                'Content-Type': 'application/json',
                }
            })
            .then((response) => {
                this.filial_list = response.data[0]
            })
            .catch((error) => {
                this.alert = 'Ошибка загрузки списка филиалов!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
            })
      }
    },
    mounted () {
      this.show_list()
      this.filial_show()
    }
  }
  </script>