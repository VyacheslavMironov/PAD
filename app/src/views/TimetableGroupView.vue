<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
      <div class="row">
        <div class="container mb-5 text-center">
            <h3>Редактировать рассписание для группы <b>IT6</b></h3>
        </div>
        <div class="col-5">
          <CardComponent class="_card card col-lg-12 col-12 p-5 mx-auto">
            <form>
                <div class="mb-3">
                    <label class="form-label">
                        <b>Выберите день недели</b>
                    </label>
                    <div id="week-day" class="col">
                      <!-- Понедельник -->
                      <input
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_mon"
                        v-on:click="this.on_week('WeekDayMon')"
                        id="btn-check-day_mon" 
                        autocomplete="off"
                      >
                      <label 
                        id="WeekDayMon"
                        class="btn disable" 
                        for="btn-check-day_mon">ПН</label>

                      <!-- Вторник -->
                      <input 
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_tue"
                        v-on:click="this.on_week('WeekDayTue')"
                        id="btn-check-day_tue" 
                        autocomplete="off"
                      >
                      <label 
                        id="WeekDayTue"
                        class="btn disable" 
                        for="btn-check-day_tue">ВТ</label>

                      <!-- Среда -->
                      <input 
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_cf"
                        v-on:click="this.on_week('WeekDayCf')"
                        id="btn-check-day_cf"
                        autocomplete="off"
                      >
                      <label 
                        id="WeekDayCf"
                        class="btn disable" 
                        for="btn-check-day_cf">СР</label>

                      <!-- Четверг -->
                      <input 
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_thu"
                        v-on:click="this.on_week('WeekDayThu')"
                        id="btn-check-day_thu" 
                        autocomplete="off"
                      >
                      <label 
                        id="WeekDayThu"
                        class="btn disable" 
                        for="btn-check-day_thu">ЧТ</label>

                      <!-- Пятница -->
                      <input
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_fri"
                        v-on:click="this.on_week('WeekDayFri')"
                        id="btn-check-day_fri" 
                        autocomplete="off"
                      >
                      <label 
                        id="WeekDayFri"
                        class="btn disable" 
                        for="btn-check-day_fri">ПТ</label>

                      <!-- Суббота -->
                      <input 
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_sat"
                        v-on:click="this.on_week('WeekDaySat')"
                        id="btn-check-day_sat" 
                        autocomplete="off"
                      >
                      <label 
                        id="WeekDaySat"
                        class="btn disable" 
                        for="btn-check-day_sat">СБ</label>

                      <!-- Восскресенье -->
                      <input 
                        type="checkbox" 
                        class="btn-check" 
                        v-model="day_sun"
                        v-on:click="this.on_week('WeekDaySut')"
                        id="btn-check-day_sun" 
                        autocomplete="off"
                      >
                      <label
                        id="WeekDaySut"
                        class="btn disable"
                        for="btn-check-day_sun">ВС</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <b>Выберите предмет</b>
                    </label>
                    <select
                      class="form-select"
                      v-model="lesson_id"
                      v-on:change="this.all_show_user(this.$route.query.organization_id, 'Преподаватель', this.lesson_id)"
                      aria-label="Default select example"
                    >
                      <option
                        v-for="x in lesson_list"
                        v-bind:value="x.id"
                      >{{ x.name }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <b>Выберите время проведения</b>
                    </label>
                    <div class="row">
                      <div class="col-1">
                        <p class="time">С</p>
                      </div>
                      <div class="col-5">
                        <input
                          type="time"
                          id="user_email"
                          v-model="time_to"
                          class="form-control"
                        >
                      </div>
                      <div class="col-1">
                        <p class="time">ДО</p>
                      </div>
                      <div class="col-5">
                        <input
                          type="time"
                          id="user_email"
                          v-model="time_end"
                          class="form-control"
                        >
                      </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <b>Выбрать преподавателя</b>
                    </label>
                    <select class="form-select" v-model="teacher_id" aria-label="Default select example">
                      <option
                        v-for="x in users"
                        v-bind:value="x.id"
                      >{{ x.last_name }} {{ x.first_name }}</option>
                    </select>
                </div>
                <!-- Компонент кнопки -->
                <ButtonComponent
                  text="Добавить"
                  v-on:click="this.create_timetable()"
                  css_class="btn mt-2 right"
                />
                <!-- END -->
            </form>
          </CardComponent>
        </div>
        <div class="col-1"></div>
        <div class="col-6">
          <table class="table table-info table-striped table-bordered mx-auto">
            <thead>
              <tr class="text-center">
                <th scope="col">Предмет</th>
                <th scope="col">Время проведения</th>
                <th scope="col">Преподаватель</th>
              </tr>
            </thead>
            <tbody>
              <tr><td colspan="3" class="text-center">Понедельник</td></tr>
              <tr>
                <td>Литература</td>
                <td>09:00 - 10:30</td>
                <td>Виктор Экран</td>
              </tr>
              <tr>
                <td>Русский язык</td>
                <td>09:00 - 10:30</td>
                <td>Виктор Экран</td>
              </tr>
              <tr>
                <td>Математика</td>
                <td>09:00 - 10:30</td>
                <td>Семён Ковш</td>
              </tr>
              <tr>
                <td>История</td>
                <td>09:00 - 10:30</td>
                <td>Ольга Труба</td>
              </tr>
            </tbody>
            <tbody>
              <tr><td colspan="3" class="text-center">Вторник</td></tr>
              <tr>
                <td>Информатика</td>
                <td>09:00 - 10:30</td>
                <td>Светлана Холод</td>
              </tr>
              <tr>
                <td>История</td>
                <td>09:00 - 10:30</td>
                <td>Ольга Труба</td>
              </tr>
              <tr>
                <td>Математика</td>
                <td>09:00 - 10:30</td>
                <td>Семён Ковш</td>
              </tr>
            </tbody>
          </table>
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
      // Дни
      day: null,
      day_mon: false,
      day_tue: false,
      day_cf: false,
      day_thu: false,
      day_fri: false,
      day_sat: false,
      day_sun: false,
      // END
      users: null,
      lesson_list: null,
      lesson_id: null,
      teacher_id: null,
      time_to: null,
      time_end: null
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
    all_show_user (organization_id, role, lessonId) {
      axios.get(this.server + '/api/user/show?organization_id=' + organization_id + '&role=' + role + '&is_lesson_id=' + lessonId,
        {
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then((response) => {
          this.users = response.data[0]
          document.getElementById('personal-info').classList.remove('d-none')
          document.getElementById('personal-info').classList.add('d-block')
        })
    },
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
    day_week (exclude=null) {
      if (exclude == null) {
        document.querySelector('#WeekDayMon').classList.add('disable')
        document.querySelector('#WeekDayTue').classList.add('disable')
        document.querySelector('#WeekDayCf').classList.add('disable')
        document.querySelector('#WeekDayThu').classList.add('disable')
        document.querySelector('#WeekDayFri').classList.add('disable')
        document.querySelector('#WeekDaySat').classList.add('disable')
        document.querySelector('#WeekDaySut').classList.add('disable')
      } else {
        this.day_week()
        if (exclude == 'WeekDayMon') {
          document.querySelector('#WeekDayMon').classList.remove('disable')
          this.day = 'ПН'
        }
        if (exclude == 'WeekDayTue') {
          document.querySelector('#WeekDayTue').classList.remove('disable')
          this.day = 'ВТ'
        }
        if (exclude == 'WeekDayCf') {
          document.querySelector('#WeekDayCf').classList.remove('disable')
          this.day = 'СР'
        }
        if (exclude == 'WeekDayThu') {
          document.querySelector('#WeekDayThu').classList.remove('disable')
          this.day = 'ЧТ'
        }
        if (exclude == 'WeekDayFri') {
          document.querySelector('#WeekDayFri').classList.remove('disable')
          this.day = 'ПТ'
        }
        if (exclude == 'WeekDaySat') {
          document.querySelector('#WeekDaySat').classList.remove('disable')
          this.day = 'СБ'
        }
        if (exclude == 'WeekDaySut') {
          document.querySelector('#WeekDaySut').classList.remove('disable')
          this.day = 'ВС'
        }
      }
    },
    on_week (data) {
      this.day_week(data)
    },
    create_timetable () {
      axios.post(this.server_journal + '/api/timetable/create',
          {
            headers: {
              'Content-Type': 'application/json'
            },
            organization_id: this.$route.query.organization_id,
            filial_id: this.$route.query.filial_id,
            group_id: this.$route.query.group_id,
            lesson_id: this.lesson_id,
            day_in: this.day,
            time_to: this.time_to,
            time_end: this.time_end,
          })
          .then((response) => {
            this.alert = 'Изменения сохранены.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            window.location.reload()
          })
          .catch((error) => {
            this.alert = 'Ошибка при формировании рассписания!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
    }
  },
  mounted () {
    this.lessons()
  }
}
</script>