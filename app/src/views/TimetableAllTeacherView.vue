<template>
    <main class="container_fluid">
      <!-- Компонент сообщения -->
      <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
      <!-- END -->
      <div class="container">
        <div class="row">
          <div class="container mb-5 text-center">
              <h3>Все преподаватели</h3>
          </div>
          <div class="mt-5">
            <div class="row">

              <div
                v-for="x in this.alphobet"
                v-bind:key="x"
                class="col-3 mb-4"
              >
                <div>{{x[0]}}{{x[1]}}</div>
                <div
                  v-for="(i, idx) in this.users"
                  v-bind:key="i"
                >
                  <span
                    v-if="i.last_name[0] == x[0] || i.last_name[0] == x[1]"
                  >
                    <a v-bind:href="this.server + '/timetable/teacher?organization_id=' + this.$route.query.organization_id + '&&user_id=' + i.id + '&&group_id=' + this.$route.query.group_id">
                      {{ i.last_name }} {{ i.first_name }}
                    </a>
                  </span>
                </div>
              </div>

            </div>
          </div>
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
        users: null,
        timetable: null,
        lesson_list: null,
        alphobet: [['А', 'а'], ['Б', 'б'], ['В', 'в'], ['Г', 'г'], ['Д', 'д'], ['Е', 'е'], 
        ['Ё', 'ё'], ['Ж', 'ж'], ['З', 'з'], ['И', 'и'], ['Й', 'й'], ['К', 'к'], ['Л', 'л'], 
        ['М', 'м'], ['Н', 'н'], ['О', 'о'], ['П', 'п'], ['Р', 'р'], ['С', 'с'], ['Т', 'т'], 
        ['У', 'у'], ['Ф', 'ф'], ['Х', 'х'], ['Ц', 'ц'], ['Ч', 'ч'], ['Ш', 'ш'], ['Щ', 'щ'], 
        ['Ь', 'ь'], ['Ы', 'ы'], ['Ъ', 'ъ'], ['Э', 'э'], ['Ю', 'ю'], ['Я', 'я']]
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
      async all_show_user (organization_id, role) {
        await axios.get(this.server + '/api/user/show?organization_id=' + organization_id + '&role=' + role,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            this.users = response.data[0]
          })
      },
    },
    mounted () {
      this.all_show_user(this.$route.query.organization_id, 'Преподаватель')
    }
  }
  </script>