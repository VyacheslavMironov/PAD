<template>
  <main class="container-fluid">
    <!-- Компонент загрузки -->
    <LoaderComponent />
    <!-- End -->
    <!-- Сообщение о процессе -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class=" mx-auto">
      <div class="row">
        <!-- Секция левого меню -->
        <section class="col-lg-5">
          <CardFormComponent>
            <p class="text-center">
              <strong>Настройки рабочего окружения</strong>
            </p>
            <hr>
            <div class="mt-3">
              <a class="list_items" role="button">
                <svg xmlns="http://www.w3.org/2000/svg">
                  <path d="M21.546 11.646 19 9.101V5.5a.5.5 0 0 0-.5-.5h-3.601l-2.546-2.546a.5.5 0 0 0-.707 0L9.101 5H5.5a.5.5 0 0 0-.5.5v3.601l-2.546 2.546a.5.5 0 0 0 0 .707L5 14.899V18.5a.5.5 0 0 0 .5.5h3.601l2.546 2.546a.5.5 0 0 0 .707 0L14.899 19H18.5a.5.5 0 0 0 .5-.5v-3.601l2.546-2.546a.5.5 0 0 0 0-.707zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"></path>
                </svg>Общие настройки
              </a>
            </div>
            <div class="mt-1">
              <a class="list_items" data-bs-toggle="collapse" href="#staff" role="button" aria-expanded="false" aria-controls="collapseExample">
                <svg xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path>
                </svg>Персонал
              </a>
              <div class="collapse" id="staff">
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="#user_add">Добавить</a>
                  </li>
                  <li class="list-group-item">
                    <a href="#">Редактировать</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="mt-1">
              <a class="list_items" data-bs-toggle="collapse" href="#lesson" role="button" aria-expanded="false" aria-controls="collapseExample">
                <svg xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-1 4v2h-5V7h5zm-5 4h5v2h-5v-2zM4 19V5h7v14H4z"></path>
                </svg>Предметы
              </a>
              <div class="collapse" id="lesson">
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="#">Добавить</a>
                  </li>
                  <li class="list-group-item">
                    <a href="#">Редактировать</a>
                  </li>
                </ul>
              </div>
            </div>
          </CardFormComponent>
        </section>
        <!-- Секция контента -->
        <section class="col-lg-7 w-50">
          <h4>
            <b>Настройки</b>
          </h4>
          <div class="mt-5">
            <div class="mb-5"></div>
            <!-- Настройка персонала -->
            <div id="user_add"><!-- Якорь на создание юзера --></div>
            <div class="mb-5">
              <h5>Регистрация персонала</h5>
              <br>
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
                  <b>Должность</b>
                </label>
                <select class="form-select" v-model="role" aria-label="Default select example">
                  <option value="Администратор" selected>Администратор</option>
                  <option value="Преподаватель">Преподаватель</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">
                  <b>Электронная почта</b>
                </label>
                <input type="email" id="user_email" v-model="email" class="form-control">
              </div>
              <!-- Компонент кнопки -->
              <ButtonComponent text="Сохранить" v-on:click="this.create_user()" css_class="btn mt-2 right"/>
              <!-- END -->
            </div>
            <div class="mb-5">
              <h5>Редактирование персонала</h5>
            </div>
            <!-- Настройка предметов -->
            <div class="mb-5"></div>
            <div class="mb-5"></div>
          </div>
        </section>
      </div>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
import CardFormComponent from '@/components/cards/CardFormComponent.vue'
import LoaderComponent from '@/components/LoaderComponent.vue'
import ButtonComponent from '@/components/ButtonComponent.vue'

export default {
  data () {
    return {
      user_info: null,
      alert: '',
      organization_id: null,
      first_name: null,
      last_name: null,
      role: null,
      email: null
    }
  },
  props: {
    is_auth: Number
  },
  components: {
    CardFormComponent,
    LoaderComponent,
    ButtonComponent,
    AlertComponent
  },
  methods: {
    user: function () {
      console.log('error')
      if (this.is_auth > 0) {
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + document.cookie.split(';')[1].split('=')[1].split(' ')[1],
          {
            headers: {
              'Content-Type': 'application/json'
            }
          }
        )
          .then((response) => {
            this.user_info = response.data[0].message
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    create_user () {
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
          organization_name: this.user_info.organization_id,
          add_personal: true,
          role: this.role,
          first_name: this.first_name,
          last_name: this.last_name,
          username: this.email,
          email: this.email,
          password: 'user' + generate
        }
      )
        .then((response) => {
          if (response.data.response === false) {
            this.alert = response.data.message
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
          } else {
            // Очистка полей
            this.first_name = ''
            this.last_name = ''
            this.role = ''
            this.email = ''
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            this.message = 'Проверьте почту, туда выслано сообщение для активации аккаунта.'
          }
        })
        .catch(function (error) {
          console.log(error.response)
          if (error.response) {
            console.log(error)
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            self.alert = 'Данная организация уже существует!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    }
  },
  beforeMount () {
    this.user()
  }
}
</script>
