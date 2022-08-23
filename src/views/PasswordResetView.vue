<template>
  <main class="container_fluid">
    <!-- Компонент сообщения -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="container">
      <CardFormComponent>
        <div class="container mb-3 text-center">
          <p>
            <strong>Введите адрес электронной почты, на неё мы вышлем вам письмо с новым паролем.</strong>
          </p>
        </div>
        <form>
          <div class="mb-3">
            <label class="form-label">
              <b>Введите E-mail</b>
            </label>
            <input type="email" id="user_email" v-model="email" class="form-control">
          </div>
          <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
              <!-- Компонент кнопки -->
              <ButtonComponent text="Отправить" v-on:click="this.loginUser()" css_class="btn mt-2 right"/>
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
      alert: '',
      email: ''
    }
  },
  components: {
    CardFormComponent,
    ButtonComponent,
    AlertComponent
  },
  methods: {
    loginUser () {
      if (this.email) {
        axios.post('http://127.0.0.1:5000/api/user/reset-password',
          {
            headers: {
              'Content-Type': 'application/json'
            },
            email: this.email
          }
        )
          .then(function (response) {
            // Ответ
          })
          .catch(function (error) {
            if (error.response.status === 500) {
              self.alert = 'Такого пользователя не существует!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            }
          })
      } else {
        this.alert = 'Укажите адрес электронной почты!'
        // Активация всплывающего сообщения
        document.getElementById('toast').style.opacity = 1
      }
    }
  }
}
</script>
