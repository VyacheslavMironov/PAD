<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
        <div class="row">
          <div class="col-12 mb-5">
            <div class="col-12 alert alert-primary align-items-center" role="alert">
              <div class="row">
                <div class="col-9">
                  <span>Вы так же можете посмотреть расписание преподавателей.</span>
                </div>
                <div class="col-3">
                  <!-- Компонент кнопки -->
                  <a href="/timetable-teacher" class="btn">Расписание преподавателей</a>
                  <!-- END -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div
                  v-if="this.timedata_list && this.timedata_list.mon.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Понедельник</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.mon"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
                <div
                  v-if="this.timedata_list && this.timedata_list.tue.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Вторник</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.tue"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
                <div
                  v-if="this.timedata_list && this.timedata_list.wed.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Среда</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.wed"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
                <div
                  v-if="this.timedata_list && this.timedata_list.thu.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Четверг</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.thu"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
                <div
                  v-if="this.timedata_list && this.timedata_list.fri.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Пятница</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.fri"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
                <div
                  v-if="this.timedata_list && this.timedata_list.sat.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Суббота</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.sat"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
                <div
                  v-if="this.timedata_list && this.timedata_list.sun.length > 0"
                  class="col-6 mb-5"
                >
                  <CardFormComponent class="col-12 mx-auto" >
                    <strong class="text-center">Восскресенье</strong>
                      <div class="mt-3"></div>
                      <CardFormComponent
                        v-for="i in this.timedata_list.sun"
                        v-bind:key="i"
                        class="col-10 mb-3 mx-auto"
                      >
                        <span class="text-center">{{i.lesson}}</span>
                        <br>
                        <div class="row">
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">С {{ i.time_start }}</span>
                          </div>
                          <div class="col-6">
                            <span class="text-center d-block p-2 time-timetable">До {{ i.time_end }}</span>
                          </div>
                        </div>
                      </CardFormComponent>
                  </CardFormComponent>
                </div>
            </div>
          </div>
        </div>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
import CardFormComponent from '@/components/cards/CardFormComponent.vue'

export default {
  data () {
    return {
      user_info: null,
      alert: '',
      timedata_list: null
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    CardFormComponent,
    AlertComponent
  },
  methods: {
    user: function () {
      if (this.is_auth >= 0) {
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + this.token,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          }
        )
          .then((response) => {
            this.user_info = response.data[0].message
            // Вызывать методы использующие пользовательские данные ниже
            this.show_timetable_on_group(this.user_info.organization_id, this.user_info.group_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    days (arr) {
      var days = {
        mon: [],
        tue: [],
        wed: [],
        thu: [],
        fri: [],
        sat: [],
        sun: []
      }
      for (var i = 0; i < arr.length; i++) {
        switch (arr[i].day) {
          case 1:
            days.mon.push(arr[i])
            break
          case 2:
            days.tue.push(arr[i])
            break
          case 3:
            days.wed.push(arr[i])
            break
          case 4:
            days.thu.push(arr[i])
            break
          case 5:
            days.fri.push(arr[i])
            break
          case 6:
            days.sat.push(arr[i])
            break
          case 7:
            days.sun.push(arr[i])
            break
          default:
            break
        }
      }
      return {
        mon: this.sort_time(days.mon),
        tue: this.sort_time(days.tue),
        wed: this.sort_time(days.wed),
        thu: this.sort_time(days.thu),
        fri: this.sort_time(days.fri),
        sat: this.sort_time(days.sat),
        sun: this.sort_time(days.sun)
      }
    },
    sort_time (arr) {
      arr.sort((a, b) => a.time_start > b.time_start ? 1 : -1)
      return arr
    },
    show_timetable_on_group (organizationId, groupId) {
      // Запрос на выборку данных юзера по ролям
      axios.get('http://localhost:5000/api/timetable/show-timetable?organization_id=' + organizationId + '&&groups_id=' + groupId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        }
      )
        .then((response) => {
          this.timedata_list = this.days(response.data[0].message.list)
          console.log(this.timedata_list)
        })
        .catch(function (error) {
          if (error.error) {
            self.alert = 'Ошибка получения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    }
  },
  mounted () {
    this.user()
  }
}
</script>
