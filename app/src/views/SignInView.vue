<template>
    <main class="container_fluid">
      <!-- Компонент сообщения -->
      <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
      <!-- END -->
      <div class="container">
        <CardComponent>
          <div class="container mb-3 text-center">
            <h3>Войти</h3>
          </div>
          <form>
            <div class="mb-3">
              <label class="form-label">
                <b>Введите E-mail</b>
              </label>
              <input type="email" id="user_email" v-model="username" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">
                <b>Введите пароль</b>
              </label>
              <input type="password" id="user_password" v-model="password" class="form-control">
            </div>
            <div class="row">
              <div class="col-6">
                <p>Нет аккаунта? <a v-bind:href="this.link_signup">Регистрация</a></p>
                <a v-bind:href="this.link_reset_password">Забыли пароль?</a>
              </div>
              <div class="col-6">
                <!-- Компонент кнопки -->
                <ButtonComponent text="Войти" v-on:click="this.loginUser()" css_class="btn mt-2 right"/>
              </div>
            </div>
          </form>
          <hr>
          <div class="col-12">
            <p class="text-center">
              <a style="cursor:pointer;">Войти по E-mail коду</a>
            </p>
          </div>
        </CardComponent>
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
        alert: 'Такого пользователя не существует!',
        link_signup: '/signup',
        link_reset_password: '/password-reset',
        username: '',
        password: ''
      }
    },
    components: {
      CardComponent,
      ButtonComponent,
      AlertComponent
    },
    props: {
      server: String
    },
    methods: {
      loginUser () {
        if (String(this.username).length > 0 && String(this.password).length > 0) {
            axios.post(this.server + '/api/authorization/auth',
              {
                headers: {
                  'Content-Type': 'application/json'
                },
                email: this.username,
                password: this.password
              }
            )
              .then(function (response) {
                if (response.status === 200) {
                  console.log(response)
                  // Токен сохраняется в куки браузера
                  document.cookie = 'user=Bearer ' + response.data[0].message.token
                  // window.location.href = '/'
                } else {
                  self.alert = 'Логин или пароль введены не правильно.'
                  // Активация всплывающего сообщения
                  document.getElementById('toast').style.opacity = 1
                }
              })
              .catch(function (error) {
                console.log('Это плёха!')
                self.alert = 'Такого пользователя не существует!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
              })
           
        } else {
          this.alert = 'Заполните все поля!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        }
      }
    }
  }
  </script>