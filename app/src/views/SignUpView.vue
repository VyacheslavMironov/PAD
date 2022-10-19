<template>
    <main class="container_fluid">
        <!-- Компонент загрузки -->
        <LoaderComponent />
        <!-- End -->
        <!-- Компонент сообщения -->
        <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
        <!-- END -->
        <div class="container">
        <CardComponent>
            <div class="container mb-3">
            <div class="row">
                <div class="col-1">
                <dir class="cirkle-round">
                    <p class="text-center">
                    <strong id="step">1</strong>
                    </p>
                </dir>
                </div>
                <div class="col-11">
                <h3 class="text-center">Регистрация</h3>
                </div>
            </div>
            </div>
            <form>
            <div id="step_one">
                <div class="mb-3">
                <label class="form-label">
                    <b>Название вашей организации</b>
                </label>
                <input type="text" id="organization_name" v-model="organization_name" class="form-control">
                </div>
                <!-- Компонент кнопки -->
                <ButtonComponent text="Далее" v-on:click="this.stepsRegistration(1)" css_class="btn mt-2 right"/>
                <!-- END -->
            </div>
            <div id="step_two">
                <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label">
                    <b>Ваше имя</b>
                    </label>
                    <input type="text" id="user_name" v-model="first_name" class="form-control">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">
                    <b>Ваша фамилия</b>
                    </label>
                    <input type="text" id="user_surname" v-model="last_name" class="form-control">
                </div>
                </div>
                <div class="mb-3">
                <label class="form-label">
                    <b>Электронная почта</b>
                </label>
                <input type="email" id="user_email" v-model="email" class="form-control">
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Я ознакомился с правилами
                </label>
                </div>
                <!-- Компонент кнопки -->
                <ButtonComponent text="Далее" v-on:click="this.stepsRegistration(2)" css_class="btn mt-2 right"/>
                <!-- END -->
            </div>
            <div id="step_free">
                <div class="alert alert-success" role="alert">
                <p>{{ this.message }}</p>
                </div>
            </div>
            </form>
        </CardComponent>
        </div>
    </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '../components/AlertComponent.vue'
import LoaderComponent from '../components/LoaderComponent.vue'
import CardComponent from '../components/CardComponent.vue'
import ButtonComponent from '../components/ButtonComponent.vue'
export default {
  data () {
    return {
      alert: '',
      message: '',
      organization_name: '',
      role: 'Директор',
      first_name: '',
      last_name: '',
      email: '',
      password: ''
    }
  },
  components: {
    CardComponent,
    ButtonComponent,
    AlertComponent,
    LoaderComponent
  },
  methods: {
    stepsRegistration (ids) {
      const self = this
      if (ids === 1) {
        if (document.getElementById('organization_name').value === '') {
          this.alert = 'Заполните все поля!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        } else {
          document.getElementById('step_one').style.display = 'none'
          document.getElementById('step_two').style.display = 'block'
          // Увеличение шага
          document.getElementById('step').innerText = String(ids + 1)
        }
      } else if (ids === 2) {
        if (document.getElementById('user_name').value !== '' && document.getElementById('user_surname').value !== '') {
          if (document.getElementById('flexCheckDefault').checked === true) {
            if (document.getElementById('user_email').value.includes('@') && document.getElementById('user_email').value.includes('.')) {
              // Увеличение шага
              document.getElementById('step').innerText = String(ids + 1)
              // Генерация пароля
              let generate = ''
              const possible = 'abcdefghijklmnopqrstuvwxyz'
              for (let i = 0; i < 5; i++) {
                generate += possible.charAt(Math.floor(Math.random() * possible.length))
              }
              // END
              // Активация лоадера
              document.getElementById('loader-bg').style.display = 'block'
              // END
              // Отправка данных
              axios.post('http://localhost:5000/api/user/create-user',
                {
                  headers: {
                    'Content-Type': 'application/json',
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
                  },
                  organization_name: this.organization_name,
                  role: this.role,
                  first_name: this.first_name,
                  last_name: this.last_name,
                  username: this.email,
                  email: this.email,
                  password: 'user' + generate
                }
              )
                .then(function (response) {
                  console.log(response)
                  if (response.data.response === false) {
                    self.alert = response.data.message
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                    // Деактивация лоадера
                    document.getElementById('loader-bg').style.display = 'none'
                    // Уменьшение шага
                    document.getElementById('step').innerText = '2'
                  } else {
                    // Деактивация лоадера
                    document.getElementById('loader-bg').style.display = 'none'
                    self.message = 'Проверьте почту, туда выслано сообщение для активации аккаунта.'
                    document.getElementById('step_two').style.display = 'none'
                    document.getElementById('step_free').style.display = 'block'
                  }
                })
                .catch(function (error) {
                  if (error.response.status === 500) {
                    console.log(error)
                    // Деактивация лоадера
                    document.getElementById('loader-bg').style.display = 'none'
                    self.alert = 'Данная организация уже существует!'
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                    document.getElementById('step_two').style.display = 'none'
                    document.getElementById('step_one').style.display = 'block'
                    // Уменьшение шага
                    document.getElementById('step').innerText = '1'
                  }
                })
              // END
            } else {
              this.alert = 'Поля заполнены не правильно!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            }
          } else {
            this.alert = 'Вы не можете продолжить пока не подтвердите что ознакомились с правилами.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        } else {
          this.alert = 'Заполните все поля!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        }
      }
    }
  }
}
</script>