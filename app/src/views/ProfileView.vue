<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="row">
            <div class="col-8 mx-auto mb-3">
              <img class="img-fluid round" src="https://avatars.githubusercontent.com/u/99366996?v=4" alt="{{ this.user_info.first_name }} {{ this.user_info.last_name }} Avatar">
            </div>
          </div>
          <div class="row">
            <p class="text-center">
              <b>{{ this.user_info.first_name }} {{ this.user_info.last_name }}</b>
            </p>
          </div>
        </div>
        <div class="col-9">
          <h5 class="mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(220, 53, 69, 1); width: 2%;">
              <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2z"></path>
            </svg>Статистика</h5>
          <hr>
          <p><b>Успеваемость</b></p>
          <div id="chart" class="mb-5"></div>
          <p><b>Общая успеваемость</b></p>
          <div id="chart2" class="mb-5"></div>
          <div class="mb-3 col-10">
            <h5 class="mb-3">Сменить пароль</h5>
            <form>
              <div class="mb-3">
                <label class="form-label">
                  <b>Введите пароль</b>
                </label>
                <input type="password" id="user_password"  v-model="old_password" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">
                  <b>Введите новый пароль</b>
                </label>
                <input type="password" id="user_new_password" v-model="new_password" class="form-control">
              </div>
              <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                  <!-- Компонент кнопки -->
                  <ButtonComponent text="Отправить" v-on:click="update_password" css_class="btn mt-2 right"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
import { BarChart, LineChart } from 'chartist';
import AlertComponent from '../components/AlertComponent.vue'
import ButtonComponent from '../components/ButtonComponent.vue'

export default {
  data () {
    return {
      alert: null,
      old_password: null,
      new_password: null
    }
  },
  components: {
    AlertComponent,
    ButtonComponent
  },
  props: {
    server: String,
    is_auth: Number,
    token: String,
    user_info: Object
  },
  methods: {
    chartist_loads: () => {
      return document.querySelector('head').insertAdjacentHTML('beforeend', '<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">')
      // document.querySelector('body').insertAdjacentHTML('beforeend', '<script src="bower_components/chartist/dist/chartist.min.js">')
    },
    statistic: function() {
      new BarChart('#chart', {
        labels: ['Русский язык', 'Математика', 'Основы программирования на Go', 'История', 'Литература', 'Информатика', 'Изобразительное исскуство', 'Труды', 'Философия', 'Физическая культура'],
        series: [
          [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
        ]}, {
        high: 10,
        low: -10,
        axisX: {
          labelInterpolationFnc: (value, index) => (index % 2 === 0 ? value : null)
        }
      })
      new LineChart(
        '#chart2',
        {
          labels: [1, 2, 3, 4, 5, 6, 7, 8],
          series: [[5, 9, 7, 8, 5, 3, 5, 4]]
        },
        {
          low: 0,
          showArea: true
        }
      )
    },
    update_password: function() {
      if (this.old_password.length > 0) {
        if (this.new_password.length >= 8) {
          axios.put(this.server + '/api/reset/password',
            {
              headers: {
                'Content-Type': 'application/json',
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
              },
              token: this.token,
              old_password: this.old_password,
              new_password: this.new_password
            })
            .then((response) => {
              if (response.data[0].response) {
                this.alert = 'Пароль успешно обновлён.'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
              } else {
                this.alert = 'Вы ввели не верный пароль!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
              }
            })
            .catch(function (error) {
              this.alert = 'Ошибка смены пароля!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            })
        } else {
          this.alert = 'Новый пароль не должен быть меньше 8-ми символов!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        }
      } else {
        this.alert = 'Введите старый пароль!'
        // Активация всплывающего сообщения
        document.getElementById('toast').style.opacity = 1
      }
    }
  },
  mounted () {
    this.chartist_loads()
    this.statistic()
  }
}
</script>