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
  import AlertComponent from '../components/AlertComponent.vue'
  import CardFormComponent from '../components/CardComponent.vue'
  import ButtonComponent from '../components/ButtonComponent.vue'
  
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
    props: {
      server: String
    },
    methods: {
      loginUser () {
        if (this.email) {
          axios.put(this.server + '/api/reset/password',
            {
              headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
              },
              email: this.email
            }
          )
            .then((response) => {
              this.alert = 'Проверьте почту, туда выслано сообщение с новым паролем.'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            })
            .catch((error) => {
              this.alert = 'Такого пользователя не существует!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
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