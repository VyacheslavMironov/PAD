<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex">
              <CardFormComponent class="w-100">
                <h5 class="text-center">
                  <b>Группы</b>
                </h5>
                <!-- Список групп -->
                <div class="row mt-4">
                  <ul class="group-list">
                    <li
                    ref="groupList"
                    v-for="(group, index) in this.group_list"
                    v-bind:key="group"
                    v-on:click="group_activate(index, group.id)"
                    class="p-1 pointer"
                    >
                      {{ group.name }}
                    </li>
                  </ul>
                </div>
              </CardFormComponent>
            </div>
            <div class="col-9">
              <CardFormComponent class="w-100">
                <div id="day-list" class="row">
                  <div class="col-5">
                    <p class="mt-3 text-center">
                      <b>Выберите день недели:</b>
                    </p>
                  </div>
                  <div v-for="(i, index) in this.days_list" v-bind:key="i" v-bind:title="i.name" class="col-1">
                    <!-- Компонент кнопки -->
                    <button
                      type="button"
                      ref="dayList"
                      class="btn mt-2 day-no"
                      v-on:click="day_activate(index, i.id)"
                    >{{ i.name }}</button>
                    <!-- END -->
                  </div>
                </div>
                <hr>
                <div class="col-8 mx-auto mt-3">
                  <form>
                    <div class="mb-3">
                      <label class="form-label">
                        <b>Выберите предмет</b>
                      </label>
                      <select class="form-select" v-model="lesson_id" aria-label="Default select example">
                        <option
                          v-for="i in this.lesson_list"
                          v-bind:key="i"
                          v-bind:value="i.id"
                        >{{ i.lesson }}</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="mb-3 col-6">
                        <label class="form-label">
                          <b>Время с:</b>
                        </label>
                        <input type="time" v-model="timeTo" class="form-control">
                      </div>
                      <div class="mb-3 col-6">
                        <label class="form-label">
                          <b>Время до:</b>
                        </label>
                        <input type="time" v-model="timeDo" class="form-control">
                      </div>
                    </div>
                    <div class="mb-3">
                      <!-- Компонент кнопки -->
                      <ButtonComponent
                        text="Сохранить"
                        v-on:click="save()"
                        css_class="btn mt-2 right"
                      />
                      <!-- END -->
                    </div>
                  </form>
                </div>
                <div class="mt-5">
                  <hr>
                  <div class="mb-4">
                    <h5>
                      <strong>Итог:</strong>
                    </h5>
                  </div>
                  <table class="table table-success table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col" class="table-active">Предмет</th>
                        <th scope="col" class="table-active">Начало урока</th>
                        <th scope="col" class="table-active">Завершение</th>
                        <th scope="col" class="table-active"></th>
                      </tr>
                    </thead>
                    <tbody v-if="this.timedata_list">
                      <!-- Первый день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Понедельник</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.mon" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            type="button"
                            v-on:click="drop_timetable(i.id)"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                      <!-- Второй день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Вторник</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.tue" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            type="button"
                            v-on:click="drop_timetable(i.id)"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                      <!-- Третий день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Среда</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.wed" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            type="button"
                            v-on:click="drop_timetable(i.id)"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                      <!-- Четвёртый день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Четверг</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.thu" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            type="button"
                            v-on:click="drop_timetable(i.id)"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                      <!-- Пятый день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Пятница</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.fri" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            type="button"
                            v-on:click="drop_timetable(i.id)"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                      <!-- Шестой день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Суббота</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.sat" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            type="button"
                            v-on:click="drop_timetable(i.id)"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                      <!-- Седьмой день недели -->
                      <tr>
                        <td colspan="4" class="table-primary table-active text-center">Восскресенье</td>
                      </tr>
                      <tr v-for="i in this.timedata_list.sun" v-bind:key="i">
                        <td>{{ i.lesson }}</td>
                        <td>{{ i.time_start }}</td>
                        <td>{{ i.time_end }}</td>
                        <td>
                          <!-- Компонент кнопки -->
                          <button
                            v-on:click="drop_timetable(i.id)"
                            type="button"
                            class="btn mt-2 mx-auto d-block3"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(0, 0, 0);">
                              <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                          </button>
                          <!-- END -->
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </CardFormComponent>
            </div>
        </div>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
import CardFormComponent from '@/components/cards/CardFormComponent.vue'
import ButtonComponent from '@/components/ButtonComponent.vue'

export default {
  data () {
    return {
      days_list: [
        { id: 1, name: 'ПН' },
        { id: 2, name: 'ВТ' },
        { id: 3, name: 'СР' },
        { id: 4, name: 'ЧТ' },
        { id: 5, name: 'ПТ' },
        { id: 6, name: 'СБ' },
        { id: 7, name: 'ВС' }
      ],
      user_info: null,
      alert: '',
      lesson_id: null,
      day_id: null,
      group_id: null,
      timeTo: null,
      timeDo: null,
      lesson_list: null,
      group_list: null,
      timedata_list: null
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    ButtonComponent,
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
            this.lesson_show(this.user_info.organization_id)
            this.all_group(this.user_info.organization_id)
            this.user_type = this.user_info.role
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    all_group (organizationId) {
      axios.get('http://localhost:5000/api/group/all-group?organization_id=' + organizationId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        })
        .then((response) => {
          this.group_list = response.data[0].message.list
        })
    },
    lesson_show (id) {
      // Запрос на выборку данных юзера по ролям
      axios.get('http://localhost:5000/api/lesson/lesson-all?organization_id=' + id,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        }
      )
        .then((response) => {
          this.lesson_list = response.data[0].message.list
        })
        .catch(function (error) {
          if (error.error) {
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            self.alert = 'Ошибка получения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    },
    group_activate (idx, item) {
      for (var element = 0; element < this.$refs.groupList.length; element++) {
        this.$refs.groupList[element].classList.remove('active')
      }
      // Активация кнопки + сохранение выбраного значения
      this.$refs.groupList[idx].classList.add('active')
      this.group_id = item
      // Подгрузка данных группы в таблицу
      this.show_timetable_on_group(this.user_info.organization_id, this.group_id)
    },
    day_activate (idx, item) {
      for (var element = 0; element < this.$refs.dayList.length; element++) {
        this.$refs.dayList[element].classList.add('day-no')
      }
      this.$refs.dayList[idx].classList.remove('day-no')
      this.day_id = item
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
        })
        .catch(function (error) {
          if (error.error) {
            self.alert = 'Ошибка получения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    },
    save () {
      // Отправка данных
      axios.post('http://localhost:5000/api/timetable/create-timetable',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          organization_id: this.user_info.organization_id,
          lesson_id: this.lesson_id,
          groups_id: this.group_id,
          day: this.day_id,
          time_start: this.timeTo,
          time_end: this.timeDo
        }
      )
        .then((response) => {
          this.alert = 'Данные успешно сохранены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          // Очистка полей
          this.lesson_id = ''
          this.group_id = ''
          this.day_id = ''
          this.timeTo = ''
          this.timeDo = ''
        })
        .catch(function (error) {
          if (error.response) {
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            self.alert = 'Ошибка сохранения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    },
    drop_timetable (idx) {
      // Отправка данных
      axios.delete('http://localhost:5000/api/timetable/delete-timetable?id=' + idx,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        }
      )
        .then((response) => {
          this.alert = 'Данные успешно Удалены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        })
        .catch(function (error) {
          if (error.response) {
            self.alert = 'Ошибка удаления данных!'
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
