<template>
  <main class="container-fluid">
    <!-- Компонент загрузки -->
    <LoaderComponent />
    <!-- End -->
    <!-- Сообщение о процессе -->
    <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
    <!-- END -->
    <div class="mx-auto">
      <div class="row">
        <!-- Секция левого меню -->
        <section class="col-lg-5">
          <CardFormComponent id="settings-journal-menu">
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
              <a
                class="list_items"
                data-bs-toggle="collapse"
                href="#staff"
                role="button"
                aria-expanded="false"
                aria-controls="collapseExample"
              >
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
                    <a href="#user_update">Редактировать</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="mt-1">
              <a
                class="list_items"
                data-bs-toggle="collapse"
                href="#lesson"
                role="button"
                aria-expanded="false"
                aria-controls="collapseExample"
              >
                <svg xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-1 4v2h-5V7h5zm-5 4h5v2h-5v-2zM4 19V5h7v14H4z"></path>
                </svg>Предметы
              </a>
              <div class="collapse" id="lesson">
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="#add_lesson">Добавить</a>
                  </li>
                  <li class="list-group-item">
                    <a href="#update_lesson">Редактировать</a>
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
            <div class="mb-5">
              <h5>Общие настройки</h5>
              <br>
              <div class="row"><!-- Пока ток заглушка --></div>
            </div>
            <!-- Настройка персонала -->
            <div class="mt-10">
              <div id="user_add"><!-- Якорь на создание юзера --></div>
              <h5>Регистрация персонала</h5>
              <br>
              <div class="row">
                <div class="mb-3 col-6">
                  <label class="form-label">
                    <b>Введите имя</b>
                  </label>
                  <input type="text" id="user_name" v-model="first_name" class="form-control">
                </div>
                <div class="mb-3 col-6">
                  <label class="form-label">
                    <b>Введите фамилию</b>
                  </label>
                  <input type="text" id="user_surname" v-model="last_name" class="form-control">
                </div>
              </div>
              <div class="mb-4">
                <label class="form-label">
                  <b>Должность</b>
                </label>
                <select class="form-select" v-model="role" aria-label="Default select example">
                  <option v-if="this.user_type === 'Директор'" value="Администратор" selected>Администратор</option>
                  <option v-if="this.user_type === 'Директор' || this.user_type === 'Администратор'" value="Преподаватель">Преподаватель</option>
                  <option v-if="this.user_type === 'Администратор'" value="Студент">Студент</option>
                  <option v-if="this.user_type === 'Администратор'" value="Родитель">Родитель</option>
                </select>
              </div>
              <div v-if="this.role === 'Преподаватель'" class="mb-4">
                <label class="form-label">
                  <b>Выберите предметы которые будет вести преподаватель</b>
                </label>
                <div class="row">
                  <div
                  v-for="i in this.lesson_list"
                  v-bind:key="i"
                  class="col-4"
                  >
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-on:click="lesson_for(i.id)" v-bind:id="i.id">
                    <label class="form-check-label" v-bind:for="i.id">
                      {{ i.lesson }}
                    </label>
                  </div>
                </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">
                  <b>Электронная почта</b>
                </label>
                <input type="email" id="user_email" v-model="email" class="form-control">
              </div>
              <div v-if="this.user_type === 'Администратор'" class="col-6">
                <div v-if="this.role && this.role === 'Студент'" class="mb-3">
                  <label class="form-label">
                    <b>Группа</b> <smail>(Не обязательно)</smail>
                  </label>
                  <form>
                    <select class="form-select" v-model="group" aria-label="Default select example">
                      <option
                        v-for="i in this.group_list"
                        v-bind:key="i"
                        v-bind:value="i.id"
                      >{{ i.name }}</option>
                    </select>
                  </form>
                </div>
              </div>
              <!-- Компонент кнопки -->
              <ButtonComponent text="Сохранить" v-on:click="this.create_user()" css_class="btn mt-2 right"/>
              <!-- END -->
            </div>
            <div class="mt-10">
              <div id="user_update"><!-- Якорь на обновление юзера --></div>
              <h5>Редактирование персонала</h5>
              <br>
              <p>Выберите должность</p>
              <div v-if="this.user_type === 'Директор'" class="form-check">
                <input
                  class="form-check-input"
                  v-on:click="all_show_user('Администратор')"
                  type="radio"
                  name="flexRadioDefault"
                  id="admin"
                >
                <label class="form-check-label" for="admin">
                  Администратор
                </label>
              </div>
              <div v-if="this.user_type === 'Директор' || this.user_type === 'Администратор'" class="form-check">
                <input
                  class="form-check-input"
                  v-on:click="all_show_user('Преподаватель')"
                  type="radio"
                  name="flexRadioDefault"
                  id="teacher"
                >
                <label class="form-check-label" for="teacher">
                  Преподаватель
                </label>
              </div>
              <div v-if="this.user_type === 'Администратор'" class="form-check">
                <input
                  class="form-check-input"
                  v-on:click="all_show_user('Студент')"
                  type="radio"
                  name="flexRadioDefault"
                  id="teacher"
                >
                <label class="form-check-label" for="teacher">
                  Студент
                </label>
              </div>
              <div v-if="this.user_type === 'Администратор'" class="form-check">
                <input
                  class="form-check-input"
                  v-on:click="all_show_user('Родитель')"
                  type="radio"
                  name="flexRadioDefault"
                  id="teacher"
                >
                <label class="form-check-label" for="teacher">
                  Родитель
                </label>
              </div>
              <section id="personal-info" class="d-none">
                <div class="mb-3">
                  <label class="form-label">
                    <b id="select-text-personal"></b>
                  </label>
                  <select
                    v-on:change="user_change()"
                    class="form-select"
                    v-model="first_and_last_name"
                    aria-label="Default select example"
                  >
                    <option
                      v-for="(user, index) in users"
                      v-bind:key="user"
                      v-bind:value="index"
                    >
                      {{ user.last_name }} {{ user.first_name }}
                    </option>
                  </select>
                </div>
                <div class="row">
                  <div class="mb-3 col-6">
                    <label class="form-label">
                      <b>Введите имя</b>
                    </label>
                    <input type="text" id="user_name" v-model="update_first_name" class="form-control">
                  </div>
                  <div class="mb-3 col-6">
                    <label class="form-label">
                      <b>Ваша фамилия</b>
                    </label>
                    <input type="text" id="user_surname" v-model="update_last_name" class="form-control">
                  </div>
                </div>
                <input hidden v-model="update_user_id">
                <div class="mb-3">
                  <label class="form-label">
                    <b>Должность</b>
                  </label>
                  <select class="form-select" v-model="update_role" aria-label="Default select example">
                    <option v-if="this.user_type === 'Директор'" value="Администратор" selected>Администратор</option>
                    <option v-if="this.user_type === 'Директор' || this.user_type === 'Администратор'" value="Преподаватель">Преподаватель</option>
                    <option v-if="this.user_type === 'Администратор'" value="Студент">Студент</option>
                    <option v-if="this.user_type === 'Администратор'" value="Родитель">Родитель</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">
                    <b>Электронная почта</b>
                  </label>
                  <input type="email" id="user_email" v-model="update_email" class="form-control">
                </div>
                <div v-if="this.update_role === 'Преподаватель'" class="mb-4">
                <label class="form-label">
                  <b>Выберите предметы которые будет вести преподаватель</b>
                </label>
                <div class="row">
                  <div
                    v-for="i in this.lesson_list"
                    v-bind:key="i"
                    class="col-4"
                  >
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-on:click="lesson_for(i.id)" v-bind:id="i.id">
                    <label class="form-check-label" v-bind:for="i.id">
                      {{ i.lesson }}
                    </label>
                  </div>
                  </div>
                </div>
              </div>
                <!-- Компонент кнопки -->
                <ButtonComponent text="Обновить данные" v-on:click="this.update_user()" css_class="btn mt-2 right"/>
                <!-- END -->
              </section>
            </div>
            <!-- Настройка предметов -->
            <div class="mt-10">
              <div id="add_lesson"><!-- Якорь на добавление предмета --></div>
              <h5>Добавить предмет</h5>
              <br>
              <div class="mb-3">
                <label class="form-label">
                  <b>Наименование предмета</b>
                </label>
                <input type="text" v-model="lesson" class="form-control">
              </div>
              <!-- Компонент кнопки -->
              <ButtonComponent text="Добавить" v-on:click="this.create_lesson()" css_class="btn mt-2 right"/>
              <!-- END -->
            </div>
            <div class="mt-10">
              <div id="update_lesson"><!-- Якорь на редактирование предмета --></div>
              <h5>Редактировать предметы</h5>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Действие</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(i, idx) in this.lesson_list" v-bind:key="i">
                    <td>
                      <p ref="lessonText" class="d-block">{{i.lesson}}</p>
                      <div ref="lessonUpdate"  class="d-none">
                        <div class="input-group mb-1">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Recipient's username"
                            aria-label="Recipient's username"
                            ref="inputLessonText"
                            v-bind:aria-describedby="idx"
                            v-bind:value="i.lesson"
                          >
                          <button v-on:click="this.update_lessons(idx, i.id, this.user_info.organization_id)" class="btn" type="button" v-bind:id="idx">Ок</button>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span ref="editLesson" class="btn p-1 m-1 bg-blue" v-on:click="this.update_lesson_open(idx)">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                          <path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path>
                        </svg>
                      </span>
                      <span ref="closeEditLesson" style="display: none;" class="btn p-1 m-1" v-on:click="this.update_lesson_close(idx)">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                          <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path>
                          <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path>
                        </svg>
                      </span>
                      <span class="btn p-1 m-1" v-on:click="this.drop_lesson(i.id, this.user_info.organization_id)">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                          <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                        </svg>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
    {{this.lessonUp}}
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
      group: null,
      group_list: null,
      user_info: null,
      user_type: null,
      users: null,
      alert: '',
      organization_id: null,
      first_name: null,
      last_name: null,
      role: null,
      email: null,
      first_and_last_name: null,
      update_user_id: null,
      update_first_name: null,
      update_last_name: null,
      update_role: null,
      update_email: null,
      lesson: null,
      update_lesson: null,
      lesson_list: null,
      update_lesson_list: [],
      lessonUp: ''
    }
  },
  props: {
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
    user: function () {
      if (this.is_auth >= 0) {
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + this.token,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          }
        )
          .then((response) => {
            this.user_info = response.data[0].message
            // Вызывать методы использующие пользовательские данные ниже
            this.lesson_show(this.user_info.organization_id)
            this.all_group(this.user_info.organization_id)
            this.user_type = this.user_info.role
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    all_group (organizationId) {
      axios.get('http://localhost:5000/api/group/all-group?organization_id=' + organizationId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        })
        .then((response) => {
          this.group_list = response.data[0].message.list
        })
    },
    lesson_for (lessonId) {
      if (this.lessonUp.includes('' + lessonId)) {
        var text = ''
        var arr = this.lessonUp.split(',')
        // Вырезка совпадений
        for (var i = 0; i < arr.length; i++) {
          if (String(arr[i]) !== String(lessonId)) {
            text += arr[i] + ','
          }
        }
        var s = []
        var arrText = text.split(',')
        for (var j = 0; j < arrText.length; j++) {
          if (arrText[j] === '' || arrText[j] === ' ' || arrText[j] === ',') {
            // Тут ничего не происходит
          } else {
            s.push(arrText[j])
          }
        }
        this.lessonUp = s.join() + ','
      } else {
        this.lessonUp += '' + lessonId + ','
      }
      console.log(this.lessonUp)
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
          email: this.email,
          password: 'user' + generate,
          group: this.group,
          lesson_up: this.lessonUp
        }
      )
        .then((response) => {
          this.alert = 'Данные успешно сохранены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          // Очистка полей
          this.first_name = ''
          this.last_name = ''
          this.email = ''
          this.role = ''
        })
        .catch(function (error) {
          if (error.response) {
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            self.alert = 'Ошибка сохранения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
    },
    all_show_user (role) {
      // Активация лоадера
      document.getElementById('loader-bg').style.display = 'block'
      // Запрос на выборку данных юзера по ролям
      axios.get('http://localhost:5000/api/user/all-user?organization_id=' + this.user_info.organization_id + '&&role=' + role,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        }
      )
        .then((response) => {
          this.users = response.data[0].message.users
          document.getElementById('personal-info').classList.remove('d-none')
          document.getElementById('personal-info').classList.add('d-block')
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
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
    user_change () {
      this.update_user_id = this.users[this.first_and_last_name].user_id
      this.update_first_name = this.users[this.first_and_last_name].first_name
      this.update_last_name = this.users[this.first_and_last_name].last_name
      this.update_role = this.users[this.first_and_last_name].role
      this.update_email = this.users[this.first_and_last_name].email
    },
    update_user () {
      // Активация лоадера
      document.getElementById('loader-bg').style.display = 'block'
      // Запрос на выборку данных юзера по ролям
      axios.put('http://localhost:5000/api/user/update-user',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          user_id: this.update_user_id,
          first_name: this.update_first_name,
          last_name: this.update_last_name,
          role: this.update_role,
          email: this.update_email
        }
      )
        .then((response) => {
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          this.alert = 'Данные обновлены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
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
    create_lesson () {
      // Активация лоадера
      document.getElementById('loader-bg').style.display = 'block'
      // END
      // Отправка данных
      axios.post('http://localhost:5000/api/lesson/create-lesson',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          lesson: this.lesson,
          organization_id: this.user_info.organization_id
        }
      )
        .then((response) => {
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          this.alert = 'Данные успешно сохранены!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        })
        .catch((error) => {
          if (error.response) {
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            this.alert = 'Такой предмет уже добавлен!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
      this.$router.go(0)
    },
    lesson_show (id) {
      // Запрос на выборку данных юзера по ролям
      axios.get('http://localhost:5000/api/lesson/lesson-all?organization_id=' + id,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        }
      )
        .then((response) => {
          this.lesson_list = response.data[0].message.list
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
    update_lesson_open (id) {
      const data = this.$refs.lessonUpdate
      data[id].classList.remove('d-none')
      data[id].classList.add('d-block')

      const text = this.$refs.lessonText
      text[id].classList.remove('d-block')
      text[id].classList.add('d-none')

      this.$refs.editLesson[id].style.display = 'none'
      this.$refs.closeEditLesson[id].style.display = 'inline-block'
    },
    update_lesson_close (id) {
      this.$refs.closeEditLesson[id].style.display = 'none'
      this.$refs.editLesson[id].style.display = 'inline-block'

      const data = this.$refs.lessonUpdate
      data[id].classList.remove('d-block')
      data[id].classList.add('d-none')

      const text = this.$refs.lessonText
      text[id].classList.remove('d-none')
      text[id].classList.add('d-block')
    },
    update_lessons (item, id, organizationId) {
      var data = this.$refs.inputLessonText[item].value
      // Запрос на выборку данных юзера по ролям
      axios.put('http://localhost:5000/api/lesson/update-lesson',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          id: id,
          organization_id: organizationId,
          lesson: data
        }
      )
        .then((response) => {
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          this.alert = 'Данные обновлены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
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
      this.$refs.closeEditLesson[item].style.display = 'none'
      this.$refs.editLesson[item].style.display = 'inline-block'
      const element = this.$refs.lessonUpdate
      element[item].classList.remove('d-block')
      element[item].classList.add('d-none')

      const text = this.$refs.lessonText
      text[item].classList.remove('d-none')
      text[item].classList.add('d-block')
      location.reload()
    },
    drop_lesson (id, organizationId) {
      // Запрос на выборку данных юзера по ролям
      axios.delete('http://localhost:5000/api/lesson/drop-lesson?id=' + (id) + '&&organization_id=' + organizationId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          }
        }
      )
        .then((response) => {
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          this.alert = 'Данные удалены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        })
        .catch(function (error) {
          if (error.error) {
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            self.alert = 'Ошибка удаления данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      location.reload()
    }
  },
  mounted () {
    this.user()
  }
}
</script>
