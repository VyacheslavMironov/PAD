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
        <table id="journal-table" class="table table-success table-bordered">
          <thead>
            <tr>
              <th class="delimetr"></th>
              <th ref="tableDays" v-for="i in this.max_day" v-bind:key="i">
                <p class="w-find-journal w-x2">ПН</p>
                <p class="text-center w-find-journal w-text-table">{{ i }}</p>
                <br>
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- Вывод студентов -->
            <tr
              v-for="(lesson, idx) in this.lesson_data"
              v-bind:key="lesson"
              class="text-center"
            >
              <td>{{ lesson.lesson }}</td>
              <td
                id="data"
                v-for="(itemValue, index) in this.max_day"
                v-bind:key="itemValue"
                v-bind:class="Number(this.number_day) === (index + 1) ? 'active-day' : ''"
              >
              <span
                v-for="(item, ids) in lesson.data"
                v-bind:key="item"
              >
                 <b v-if="this.lesson_data[idx].data[ids].day === (1 + index)">
                  {{ this.lesson_data[idx].data[ids].value }}
                </b>
              </span>
              </td>
            </tr>
          </tbody>
        </table>
      </CardFormComponent>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
import CardFormComponent from '@/components/cards/CardFormComponent.vue'
import LoaderComponent from '@/components/LoaderComponent.vue'

export default {
  data () {
    return {
      alert: '',
      user_info: null,
      lesson_data: null,
      url_get_group: this.$route.query,
      number_day: new Date().getDate(),
      get_day: new Date().getDay(),
      max_day: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate()
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    CardFormComponent,
    LoaderComponent,
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
          })
          .then((response) => {
            this.user_info = response.data[0].message
            // Вызывать методы использующие пользовательские данные ниже
            this.load_lesson(
              this.user_info.organization_id,
              this.user_info.user_id,
              this.user_info.group_id,
              this.user_info.role
            )
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    load_lesson (organizationId, userId, groupId, role) {
      // Выгрузка данных
      axios.get('http://localhost:5000/api/journal/show?organization_id=' + organizationId + '&&user_id=' + userId + '&&group_id=' + groupId + '&&role=' + role,
        {
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then((response) => {
          console.log(response.data[0].message)
          var list = []
          for (var i = 0; i < response.data[0].message.list.length; i++) {
            if (list.length === 0) {
              list.push({
                id: response.data[0].message.list[i].lesson_id,
                lesson: response.data[0].message.list[i].lesson_name,
                data: []
              })
            } else {
              // Проверка на наличие объекта в массиве
              var xCount = 0
              for (var x = 0; x < list.length; x++) {
                if (response.data[0].message.list[i].lesson_name === list[x].lesson) {
                  xCount = 1
                }
              }
              // Если нет совпадений то записываем
              if (xCount === 0) {
                list.push({
                  id: response.data[0].message.list[i].lesson_id,
                  lesson: response.data[0].message.list[i].lesson_name,
                  data: []
                })
              }
            }
          }
          // Мне кажется это костыль но иначе не все значения будут записаны в list
          for (var y = 0; y < response.data[0].message.list.length; y++) {
            var count = 0
            while (count <= list.length) {
              if (list[count].id === response.data[0].message.list[y].lesson_id) {
                list[count].data.push({
                  day: Number(response.data[0].message.list[y].day),
                  month: response.data[0].message.list[y].month,
                  year: response.data[0].message.list[y].year,
                  value: response.data[0].message.list[y].value
                })
                break
              }
              list[count].data.sort((a, b) => Number(a.day) > Number(b.day) ? 1 : -1)
              count++
            }
          }
          this.lesson_data = list
        })
        .catch(function (error) {
          console.log(error)
        })
      // END
    }
  },
  mounted () {
    this.user()
  }
}
</script>
