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
          

          <div class="col-12 mb-5">
            <div class="col-12 alert alert-primary align-items-center" role="alert">
              <div class="row">
                <div class="col-9">
                  <span>Вы так же можете посмотреть расписание преподавателей.</span>
                </div>
                <div class="col-3">
                  <!-- Компонент кнопки -->
                  <a 
                    v-bind:href="this.server + '/timetable/all/teacher?organization_id=' + this.$route.query.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.$route.query.group_id" 
                    class="btn"
                  >Расписание преподавателей</a>
                  <!-- END -->
                </div>
              </div>
            </div>
          </div>

          <table class="table table-success table-striped table-hover table-bordered border-success">
            <thead>
              <tr class="text-center">
                <th scope="col">
                  <div class="mt-2"></div>
                  Понедельник
                  <div class="mt-2"></div>
                </th>
                <th scope="col">
                  <div class="mt-2"></div>
                  Вторник
                  <div class="mt-2"></div>
                </th>
                <th scope="col">
                  <div class="mt-2"></div>
                  Среда
                  <div class="mt-2"></div>
                </th>
                <th scope="col">
                  <div class="mt-2"></div>
                  Четверг
                  <div class="mt-2"></div>
                </th>
                <th scope="col">
                  <div class="mt-2"></div>
                  Пятница
                  <div class="mt-2"></div>
                </th>
                <th scope="col">
                  <div class="mt-2"></div>
                  Суббота
                  <div class="mt-2"></div>
                </th>
                <th scope="col">
                  <div class="mt-2"></div>
                  Восскресенье
                  <div class="mt-2"></div>
                </th>
              </tr>
            </thead>

            <tbody class="text-center">
              <tr>
                <!-- ПН -->
                <td
                  class="table-active"
                  v-if="Object(Object(this.timetable)['ПН']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['ПН']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        v-bind:key="x"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="d-inline-block" 
                            tabindex="0" 
                            data-bs-toggle="popover" 
                            data-bs-trigger="hover focus" 
                            v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                          >
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                    <!--  -->
                    <li>
                      <span>
                        <strong>
                          Пример
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="d-inline-block" 
                            tabindex="0" 
                            data-bs-toggle="popover" 
                            data-bs-trigger="hover focus" 
                            data-bs-content="09:30 - 11:00"
                          >
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                    <!--  -->
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->

                <!-- ВТ -->
                <td
                  v-if="Object(Object(this.timetable)['ВТ']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['ВТ']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg xmlns="http://www.w3.org/2000/svg">
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->

                <!-- СР -->
                <td
                  class="table-active"
                  v-if="Object(Object(this.timetable)['СР']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['СР']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg xmlns="http://www.w3.org/2000/svg">
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->

                <!-- ЧТ -->
                <td
                v-if="Object(Object(this.timetable)['ЧТ']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['ЧТ']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg xmlns="http://www.w3.org/2000/svg">
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->

                <!-- ПТ -->
                <td 
                  class="table-active"
                  v-if="Object(Object(this.timetable)['ПТ']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['ПТ']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg xmlns="http://www.w3.org/2000/svg">
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->

                <!-- СБ -->
                <td
                v-if="Object(Object(this.timetable)['СБ']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['СБ']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg xmlns="http://www.w3.org/2000/svg">
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->

                <!-- ВС -->
                <td
                class="table-active"
                v-if="Object(Object(this.timetable)['ВС']).length > 0"
                >
                  <ul>
                    <li
                      v-for="i in Object(this.timetable)['ВС']"
                      v-bind:key="i"
                    >
                      <span
                        v-for="x in this.lesson_list"
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        v-bind:data-bs-content="i.time_to + ' - ' + i.time_end"
                      >
                        <strong
                          v-if="x.id == i.lesson_id"
                        >
                          {{ x.name }} 
                          <svg xmlns="http://www.w3.org/2000/svg">
                            <path d="m20.145 8.27 1.563-1.563-1.414-1.414L18.586 7c-1.05-.63-2.274-1-3.586-1-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7a6.966 6.966 0 0 0-1.855-4.73zM15 18c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            <path d="M14 10h2v4h-2zm-1-7h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2z"></path>
                          </svg>
                        </strong>
                      </span>
                    </li>
                  </ul>
                </td>
                <td v-else>Данных нет</td>
                <!-- END -->
              </tr>
            </tbody>
          </table>
          
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
        timetable: null,
        lesson_list: null
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
      async lessons () {
        await axios.get(this.server + '/api/lesson/list?organization_id=' + this.user_info.organization_id,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            this.lesson_list = response.data
          })
          .catch((error) => {
            this.alert = 'Ошибка загрузки списка предметов на стороне сервера, обратитесь в тех-поддержку.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      async show_timetable () {
        await axios.post(this.server_journal + '/api/timetable/show?organization_id=' + this.$route.query.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.$route.query.group_id,
            {
              headers: {
                'Content-Type': 'application/json'
              },
            })
            .then((response) => {
              this.timetable = response.data[0]
            })
            .catch((error) => {
              this.alert = 'Ошибка при формировании рассписания!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            })
      },
      popper_event () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
          return new bootstrap.Popover(popoverTriggerEl)
        })
        // var popover = new bootstrap.Popover(document.querySelector('.example-popover'), {
        //   container: 'body'
        // })
      }
    },
    mounted () {
      this.lessons()
      this.show_timetable()
      this.popper_event()
    }
  }
  </script>