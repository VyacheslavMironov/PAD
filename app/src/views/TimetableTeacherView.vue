<template>
    <main class="container_fluid">
      <!-- Компонент сообщения -->
      <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
      <!-- END -->
      <div class="container">
        <div class="row">
          <div class="container text-center">
              <h3>Расписание</h3>
              <p class="underline">{{ Object(this.user).first_name }} {{ Object(this.user).last_name }}</p>
          </div>
          <div class="mt-5">
            <div class="row">
              <table class="table-bordered border-primary">
                <thead>
                  <tr class="text-center">
                    <th scope="col">
                      <div class="mt-2"></div>
                      Время
                      <div class="mt-2"></div>
                    </th>
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
                <tbody class="text-center info">
                  <tr 
                    v-for="i in this.time_list"
                    v-bind:key="i"
                  >
                    <!-- Время -->
                    <td class="ht-100 col">
                      <ul>
                        <li>
                          <span>
                            <strong>{{ i }}</strong>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- ПН -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['ПН']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- ВТ -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['ВТ']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- СР -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['СР']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- ЧТ -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['ЧТ']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- ПТ -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['ПТ']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- СБ -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['СБ']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                    <!-- ВС -->
                    <td class="ht-100 col">
                      <ul>
                        <li
                          v-for="x in Object(this.timetable)['ВС']"
                          v-bind:key="x"
                        >
                          <span
                            v-if="x.time_to == i"
                            class="content mb-1"
                          >
                            <p
                              v-for="y in this.lesson_list"
                              v-bind:key="i"
                            >
                              <strong
                                v-if="y.id == x.lesson_id"
                              >
                              (КИД), {{ y.name }}
                              </strong>
                            </p>
                          </span>
                        </li>
                      </ul>
                    </td>
                    <!-- END  -->
                  </tr>
                </tbody>
              </table>
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
        timetable: null,
        lesson_list: null,
        time_list: [],
        user: null
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
        // server_journal: String,
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
      async show_timetable (type_=null) {
        await axios.get(this.server + '/api/timetable/show/teacher?organization_id=' + this.$route.query.organization_id + '&&teacher_id=' + this.$route.query.user_id,
            {
              headers: {
                'Content-Type': 'application/json'
              },
            })
            .then((response) => {
              if (type_ == 'Преподаватель')
              {
                var arr = []
                for (var x in response.data[0])
                {
                  for (var i = 0; i < response.data[0][x].length; i++)
                  {
                    arr.push(response.data[0][x][i].time_to)
                  }
                }
                arr = [...new Set(arr)]
                this.time_list = arr.sort()
                this.timetable = response.data[0]
              } else {
                this.timetable = response.data[0]
              }
            })
            .catch((error) => {
              this.alert = 'Ошибка при формировании рассписания!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            })
      },
      async show_one_user (organizationId, userId, role) {
        await axios.get(this.server + '/api/user/show-one?organization_id=' + organizationId + '&role=' + role + '&&user_id=' + userId,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            this.user = Object(response.data[0])
          })
      }
    },
    mounted () {
      this.show_one_user(this.$route.query.organization_id, this.$route.query.user_id, 'Преподаватель')
      this.lessons()
      this.show_timetable('Преподаватель')
    }
  }
  </script>