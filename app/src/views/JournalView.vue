<template>
    <main class="container-fluid">
      <!-- Компонент загрузки -->
      <LoaderComponent />
      <!-- End -->
      <!-- Сообщение о процессе -->
      <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
      <!-- END -->
      <div class="mx-auto">
        <CardFormComponent class="mt-3 mb-5 w-90">
          <div class="row">
            <div class="col-3">
              <div class="row">
                <nav id="journal">
                  <ul id="month-menu" class="d-flex">
                    <li>
                      <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                        <path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path>
                        <path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path>
                      </svg>
                    </li>
                    <li>
                      <span ref="monthTitle">Сентябрь</span>
                    </li>
                    <li>
                      <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                        <path d="M11.999 1.993c-5.514.001-10 4.487-10 10.001s4.486 10 10.001 10c5.513 0 9.999-4.486 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8s3.589-8 8-8.001C16.411 3.994 20 7.583 20 11.994c-.001 4.411-3.59 8-8 8z"></path>
                        <path d="M12 10.994H8v2h4V16l4.005-4.005L12 7.991z"></path>
                      </svg>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-9">
              <div class="row">
                <!-- Компонент кнопки -->
                <ButtonComponent
                  text="Оценки"
                  wrapper_css_class="col-3"
                  css_class="btn mt-2 w-100 mx-auto"
                />
                <!-- END -->
                <!-- Компонент кнопки -->
                <ButtonComponent
                  text="Дмашние задания"
                  wrapper_css_class="col-3"
                  css_class="btn mt-2 w-100 mx-auto"
                />
                <!-- END -->
                <!-- Компонент кнопки -->
                <ButtonComponent
                  text="Оценки за семестр"
                  wrapper_css_class="col-3"
                  css_class="btn mt-2 w-100 mx-auto"
                />
                <!-- END -->
                <!-- Компонент кнопки -->
                <ButtonComponent
                  text="Годовые оценки"
                  wrapper_css_class="col-3"
                  css_class="btn mt-2 w-100 mx-auto"
                />
                <!-- END -->
              </div>
            </div>
          </div>
        </CardFormComponent>
        <table id="journal-table" class="table table-info table-bordered table-hover">
          <thead>
            <tr>
              <th class="delimetr"></th>
              <th ref="tableDays" v-for="i in this.max_day" v-bind:key="i">
                <p class="w-find-journal">ПН</p>
                <p class="text-center w-find-journal">{{ i }}</p>
                <br>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
                v-for="(value, key, index) in Object(this.value_lesson_list)"
            >
                <td>{{ key }}</td>
                <td
                    v-for="(i, idx) in this.max_day"
                    v-bind:key="i"
                    v-bind:class="Number(this.number_day) === (idx + 1) ? 'active-day' : ''"
                >
                    <span
                        v-for="j in value.values"
                        v-bind:key="j"
                    >
                        <span
                            v-if="j.day == i"
                        >
                            {{ j.value }}
                        </span>
                    </span>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </template>
  
  <script>
  import axios from 'axios'
  import AlertComponent from '../components/AlertComponent.vue'
  import CardFormComponent from '../components/CardComponent.vue'
  import LoaderComponent from '../components/LoaderComponent.vue'
  import ButtonComponent from '../components/ButtonComponent.vue'
  
  export default {
    data () {
      return {
        
        alert: '',
        number_day: new Date().getDate(),
        get_day: new Date().getDay(),
        max_day: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate(),
        value_lesson_list: null,
        show_month: this.user_info.month ? this.user_info.month :  new Date().getMonth() + 1,
        show_year: this.user_info.year ? this.user_info.year :  new Date().getFullYear(),
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
      CardFormComponent,
      LoaderComponent,
      ButtonComponent,
      AlertComponent
    },
    methods: {
      async get_lesson () {
        var userId = this.user_info.role == 'Родитель' ? this.user_info.relation_id : this.user_info.id 
        // Запрос на выборку данных юзера по ролям
        await axios.get(this.server_journal + '/api/user-value/show?organization_id=' + this.user_info.organization_id + '&&user_id=' + userId+ '&&month=' + this.show_month + '&&year=' + this.show_year,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            this.value_lesson_list = response.data[0]
            console.log(response.data[0])
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
          })
          .catch((error) => {
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            this.alert = 'Ошибка получения данных!!!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
        // END
      },
      tr_active (element) {
      for (var i = 0; i < element.length; i++) {
        var day = element[i].innerHTML.split('><')[1].split('>')[1].split('</')[0]
        if (Number(day) === Number(this.number_day)) {
          element[i].classList.add('active-day')
        }
      }
    },
    },
    mounted () {
      this.get_lesson()
      this.tr_active(this.$refs.tableDays)
    }
  }
  </script>