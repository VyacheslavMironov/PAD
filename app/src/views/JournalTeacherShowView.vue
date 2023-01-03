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
          <!-- <div class="col-3">
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
          </div> -->
          <div class="col-4">
            <select
              class="form-select"
              v-model="lesson_name"
              v-on:change="load_value()"
              aria-label="Default select example"
            >
              <option
                v-for="i in this.lesson_list"
                v-bind:key="i"
                v-bind:value="i.name"
              >
                {{ i.name }}
              </option>
            </select>
          </div>
          <div class="col-2 check-journal-header">
            <div class="form-check form-check-inline">
              <input
                ref="valueN"
                v-on:click="specific_value_add(this.user_info.organization_id, this.lesson_name, this.position[0], 'Н')"
                class="form-check-input"
                type="checkbox"
                id="inlineCheckbox1"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="Поставить болел"
              >
              <label class="form-check-label" for="inlineCheckbox1">Н</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                ref="valueB"
                v-on:click="specific_value_add(this.user_info.organization_id, this.lesson_name, this.position[0], 'Б')"
                class="form-check-input"
                type="checkbox"
                id="inlineCheckbox2"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="Поставить прогул"
              >
              <label class="form-check-label" for="inlineCheckbox2">Б</label>
            </div>
          </div>
          <div class="col-6">
            <div class="row">
              <!-- Компонент кнопки -->
              <ButtonComponent
                text="Оценки"
                wrapper_css_class="col-3"
                css_class="btn mt-2 mx-auto"
              />
              <!-- END -->
              <!-- Компонент кнопки -->
              <ButtonComponent
                text="Оценки за семестр"
                wrapper_css_class="col-5"
                css_class="btn mt-2 mx-auto"
              />
              <!-- END -->
              <!-- Компонент кнопки -->
              <ButtonComponent
                text="Годовые оценки"
                wrapper_css_class="col-4"
                css_class="btn mt-2 mx-auto"
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
        <tbody v-if="this.users">
          <!-- Вывод студентов -->
          <tr
            v-for="(user, idx) in this.users"
            v-bind:key="user"
          >
            <td id="user">{{ user.first_name }}<br>{{ user.last_name }}</td>
            <td
              ref="tableItems"
              v-for="(itemValue, index) in this.max_day"
              v-bind:key="itemValue"
              v-bind:class="Number(this.number_day) === (index + 1) ? 'active-day' : ''"
            >
            <span
              v-for="x in user.values"
              v-bind:key="x"
            >
              <input
                v-if="x.day == index + 1 && user.values.length > 0"
                id="data"
                ref="inputValue"
                v-on:click="click_input(
                  user.id,
                  index + 1,
                  idx
                )"
                v-on:input="add_value(
                  this.lesson_name,
                  user.id,
                  index + 1,
                  idx
                )"
                type="text"
                class="form-control w-find-journal"
                v-bind:value="x.value.trim()"
              >
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
      users: null,
      number_day: new Date().getDate(),
      get_day: new Date().getDay(),
      max_day: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate(),
      lesson_list: null,
      lesson_name: null,
      item_active: null,
      position: null,
      show_month: this.user_info.month ? this.user_info.month :  new Date().getMonth() + 1,
      show_year: this.user_info.year ? this.user_info.year :  new Date().getFullYear(),
      data_value: [],
      arr: []
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
    async is_user_show () {
      await axios.get(this.server_journal + '/api/user-group/show?organization_id=' + this.user_info.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.$route.query.group_id,
      {
          headers: {
              'Content-Type': 'application/json'
          },
      })
      .then((response) => {
          this.users = response.data[0]
      })
      .catch((error) => {
          this.alert = 'Ошибка. Загрузки информации участников группы!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
      })
    },
    async get_lesson () {
      // Запрос на выборку данных юзера по ролям
      await axios.get(this.server + '/api/lesson/list?organization_id=' + this.$route.query.organization_id + '&&teacher_id=' + this.user_info.id,
        {
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then((response) => {
          var arr = []
          for (var i = 0; i < response.data.length; i++)
          {
            try{
              var data = response.data[i].teacher_id.trim()
              for (var x = 0; x < data.split(',').length; x++)
              {
                Number(data.split(',')[x]) == Number(this.user_info.id) ? arr.push(response.data[i]) : null
              }
            } catch (Exception){ console.log(Exception)}
            
          }
          this.lesson_list = arr
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          this.load_value()
        })
        // .catch((error) => {
        //   // Деактивация лоадера
        //   document.getElementById('loader-bg').style.display = 'none'
        //   this.alert = 'Ошибка получения данных!!!'
        //   // Активация всплывающего сообщения
        //   document.getElementById('toast').style.opacity = 1
        // })
      // END
    },
    all_show_user (userId, lessonId) {
      // // Активация лоадера
      // document.getElementById('loader-bg').style.display = 'block'
      // Запрос на выборку данных юзера по ролям
      axios.get(this.server_journal + '/api/statement/list?user_id=' + userId + '&&lesson_id=' + lessonId + '&&month=' + this.show_month + '&&year=' + this.show_year,
        {
          headers: {
            'Content-Type': 'application/json',
          }
        }
      )
        .then((response) => {
          this.arr.push(response.data)
          for (var i = 0; i < this.users.length; i++)
          {
            this.users[i]['values'] = []
            for (let s = 1; s < this.max_day + 1; s++) {
              this.users[i].values.push({day: s, value: ''})
            }
          }
          
          for (var j = 0; j < this.arr.length; j++)
          {
            for (var y = 0; y < this.arr[j][0].length; y++)
            {
              for (var x = 0; x < this.users.length; x++)
              {
                if (this.users[x].id == this.arr[j][0][y].user_id)
                {
                  for (var t = 0; t < this.users[x].values.length; t++)
                  {
                    if (this.users[x].values[t].day == this.arr[j][0][y].day)
                    {
                      this.users[x].values[t] = this.arr[j][0][y]
                    }
                  }
                }
              }
            }
          }


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
    tr_active (element) {
      for (var i = 0; i < element.length; i++) {
        var day = element[i].innerHTML.split('><')[1].split('>')[1].split('</')[0]
        if (Number(day) === Number(this.number_day)) {
          element[i].classList.add('active-day')
        }
      }
    },
    load_value () {
      this.arr = []
      // Для записи айдишника предмета
      var lessonId = null
      for (var i = 0; i < this.lesson_list.length; i++) {
        if (this.lesson_list[i].name == this.lesson_name) {
          lessonId = this.lesson_list[i].id
          // Выгрузка данных
          for (var x = 0; x < this.users.length; x++)
          {
            // console.log(this.users[x])
            this.all_show_user(this.users[x].id, lessonId)
          }
        }
      }
      // END
    },
    click_input (userId, xPosition, yPosition) {
      // Определение позиционирования ввода
      if (yPosition > 0) {
        this.item_active = yPosition === 1 ? this.max_day + xPosition : (this.max_day * yPosition) + xPosition
      } else {
        this.item_active = xPosition
      }
      // Запись позиций
      this.position = [userId, this.item_active, yPosition, xPosition]
      // Очистка галочки если нет или другое значение
      var specificValue = this.$refs.inputValue[this.position[1] - 1].value
      if (specificValue !== 'Н') {
        this.$refs.valueN.checked = false
      } else {
        this.$refs.valueN.checked = true
      }
      if (specificValue !== 'Б') {
        this.$refs.valueB.checked = false
      } else {
        this.$refs.valueB.checked = true
      }
    },
    specific_value_add (organizationId, lessonName, userId, value) {
      var specificValue = null
      if (value === 'Н' || value === 'н') {
        specificValue = this.$refs.inputValue[this.position[1] - 1].value === 'Н' ? '' : 'Н'
      } else if (value === 'Б' || value === 'б') {
        specificValue = this.$refs.inputValue[this.position[1] - 1].value === 'Б' ? '' : 'Б'
      }
      //  Отобразить спц. оценку в ячейке по позиции
      this.$refs.inputValue[this.position[1] - 1].value = specificValue
      this.add_value(this.lesson_name, userId, this.position[3], this.position[2], value = specificValue)
      // Очистка полей
      if (specificValue === '') {
        if (value === 'Б') {
          this.$refs.valueB.checked = false
        }
        if (value === 'Н') {
          this.$refs.valueN.checked = false
        }
      }
    },
    add_value: function (lessonName, userId, xPosition, yPosition, value = null) {
      // Определение позиционирования ввода
      if (yPosition > 0) {
        this.item_active = yPosition === 1 ? this.max_day + xPosition : (this.max_day * yPosition) + xPosition
      } else {
        this.item_active = xPosition
      }
      // Определение предмета
      var lessonId = null
      for (var i = 0; i < this.lesson_list.length; i++) {
        if (this.lesson_list[i].name == lessonName) {
          lessonId = this.lesson_list[i].id
        }
      }
      // Добавление оценки ученику
      axios.post(this.server_journal + '/api/statement/create',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          // organization_id: this.$route.query.organization_id,
          // filial_id: this.$route.query.filial_id,
          // group_id: this.$route.query.group_id,
          user_id: userId,
          lesson_id: lessonId,
          user_from: this.user_info.id,
          evaluation_type: this.$route.query.evaluation_type ? this.$route.query.evaluation_type : 'Ежедневная',
          value: value === null ? document.querySelectorAll('#data')[this.item_active - 1].value : value,
          day: String(xPosition),
          month: this.$route.query.month ? this.$route.query.month : new Date().getMonth() + 1,
          year: this.$route.query.year ? this.$route.query.year : new Date().getFullYear()
          
        })
        .then((response) => {
          this.alert = 'Данные сохранены!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        })
        .catch((error) => {
          if (error.error) {
            this.alert = 'Ошибка сохранения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    }
  },
  mounted () {
    this.is_user_show()
    this.tr_active(this.$refs.tableDays)
    this.get_lesson()
  }
}
</script>