<template>
    <main class="container_fluid">
        <!-- Компонент сообщения -->
        <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
        <!-- END -->
        <div class="container">
            <div class="row">
              <div class="col-12 mb-5">
                <ul class="d-flex">
                  <li
                    v-for="i in this.alphabet"
                    v-bind:key="i"
                  >
                    <strong
                      v-on:click="inform(i.symbol)"
                      v-bind:class="i.list.length > 0 ? 'list m-07' : 'text-block m-07'"
                    >{{ i.symbol }}</strong>
                  </li>
                </ul>
              </div>
              <div
                v-if="this.info === 1"
                class="col-12">
                  <div class="row">
                    <div
                      v-for="i in this.data_list"
                      v-bind:key="i"
                      class="col-2"
                    >
                      <a
                        class="mt-3 d-block"
                        v-bind:href="'/timetable-teacher-show?user_id=' +i.user_id "
                      >
                        {{ i.last_name }} {{i.first_name }}
                      </a>
                    </div>
                  </div>
              </div>
              <div
                v-else
                class="col-12">
                  <div class="mt-5 mb-5">
                    <h4 class="text-center">
                      <smail>Выберите преподавателя по алфавиту</smail>
                    </h4>
                  </div>
              </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'

export default {
  data () {
    return {
      user_info: null,
      alert: '',
      teacher_list: null,
      alphabet: [
        { symbol: 'А', list: [] },
        { symbol: 'Б', list: [] },
        { symbol: 'В', list: [] },
        { symbol: 'Г', list: [] },
        { symbol: 'Д', list: [] },
        { symbol: 'Е', list: [] },
        { symbol: 'Ё', list: [] },
        { symbol: 'Ж', list: [] },
        { symbol: 'З', list: [] },
        { symbol: 'И', list: [] },
        { symbol: 'Й', list: [] },
        { symbol: 'К', list: [] },
        { symbol: 'Л', list: [] },
        { symbol: 'М', list: [] },
        { symbol: 'Н', list: [] },
        { symbol: 'О', list: [] },
        { symbol: 'П', list: [] },
        { symbol: 'Р', list: [] },
        { symbol: 'С', list: [] },
        { symbol: 'Т', list: [] },
        { symbol: 'У', list: [] },
        { symbol: 'Ф', list: [] },
        { symbol: 'Х', list: [] },
        { symbol: 'Ц', list: [] },
        { symbol: 'Ч', list: [] },
        { symbol: 'Ш', list: [] },
        { symbol: 'Щ', list: [] },
        { symbol: 'Ъ', list: [] },
        { symbol: 'Ы', list: [] },
        { symbol: 'Ь', list: [] },
        { symbol: 'Э', list: [] },
        { symbol: 'Ю', list: [] },
        { symbol: 'Я', list: [] }
      ],
      data_list: null,
      info: 0
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
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
            this.teacher_info(this.user_info.organization_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    symbols (list) {
      var count = 0
      while (list.length > count) {
        for (var i = 0; i < this.alphabet.length; i++) {
          if (this.alphabet[i].symbol === list[count].last_name[0]) {
            this.alphabet[i].list.push({
              user_id: list[count].user_id,
              first_name: list[count].first_name,
              last_name: list[count].last_name
            })
          }
        }
        count++
      }
    },
    teacher_info: function (organizationId) {
      if (this.is_auth >= 0) {
        axios.get('http://localhost:5000/api/user/all-user?role=Преподаватель&&organization_id=' + organizationId,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          })
          .then((response) => {
            this.teacher_list = response.data[0].message.users
            this.symbols(this.teacher_list)
            var i = 0
            while (this.alphabet > i) {
              if (this.alphabet[i].list.length > 0) {
                this.inform(this.alphabet[i].symbol)
                break
              }
              i++
            }
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    inform (symbol) {
      this.info = 1
      var i = 0
      while (i < this.alphabet.length) {
        if (symbol === this.alphabet[i].symbol) {
          this.data_list = this.alphabet[i].list
          break
        }
        i++
      }
    }
  },
  mounted () {
    this.user()
  }
}
</script>
