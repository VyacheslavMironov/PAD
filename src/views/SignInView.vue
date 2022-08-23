<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
      <CardFormComponent>
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
      </CardFormComponent>
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
      alert: 'Такого пользователя не существует!',
      link_signup: '/signup',
      link_reset_password: '/password-reset',
      username: '',
      password: ''
    }
  },
  components: {
    CardFormComponent,
    ButtonComponent,
    AlertComponent
  },
  methods: {
    loginUser () {
      if (String(this.username).length > 0 && String(this.password).length > 0) {
        axios.post(this.$route.name === 'activate' ? 'http://127.0.0.1:5000/api/user/auth/activate' : 'http://127.0.0.1:5000/api/user/auth',
          {
            headers: {
              'Content-Type': 'application/json'
            },
            username: this.username,
            password: this.password
          }
        )
          .then(function (response) {
            // Сохрнить токен и перенаправить на страницу профиля
          })
          .catch(function (error) {
            if (error.response.status === 500) {
              self.alert = 'Такого пользователя не существует!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            }
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
