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
                <div class="cirkle-round">
                    <p class="text-center">
                    <strong id="step">1</strong>
                    </p>
                </div>
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
                <div class="mb-3">
                  <label class="form-label">
                    <b>Тип учебного заведения</b>
                  </label>
                  <select class="form-select" v-model="destination" aria-label="Default select example">
                    <option value="Школа">Школа</option>
                    <option value="Колледж">Колледж</option>
                    <option value="Спортивная секция">Спортивная секция</option>
                  </select>
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
                <!-- Компонент кнопки -->
                <ButtonComponent text="Продолжить" v-on:click="this.stepsRegistration(2)" css_class="btn mt-2 right"/>
                <!-- END -->
            </div>
            <div id="step_free">
                <div class="mb-3">
                  <label class="form-label">
                    <b>Логотип организации</b>
                  </label>
                  <input type="file" ref="fileInput" name="file" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">
                    <b>Тип оценочной единицы</b>
                  </label>
                  <select class="form-select" v-model="valueType" aria-label="Default select example">
                    <option value="true">Числовая</option>
                    <option value="false">Строковая</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">
                    <b>Расширения <span>(Не обязательно)</span></b>
                  </label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="onlineLesson" id="onlineLesson">
                    <label class="form-check-label" for="onlineLesson">
                        Сервис онлайн занятий
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="sistemChat" id="sistemChat">
                    <label class="form-check-label" for="sistemChat">
                        Система чатов
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="testConstruct" id="testConstruct">
                    <label class="form-check-label" for="testConstruct">
                        Конструктор чатов
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="isGameTematic" id="isGameTematic">
                    <label class="form-check-label" for="isGameTematic">
                        Тематически игровая платформа
                    </label>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">
                    <b>Права администратора <span>(Не обязательно)</span></b>
                  </label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="userAccess" id="userAccess">
                    <label class="form-check-label" for="userAccess">
                      Администратор может заходить под студентом
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="userEmail" id="userEmail">
                    <label class="form-check-label" for="userEmail">
                      Администратор может рассылать E-mail уведомления
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="isEnvaluation" id="isEnvaluation">
                    <label class="form-check-label" for="isEnvaluation">
                      Администратор может изменять или выставлять оценки
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="addUser" id="addUser">
                    <label class="form-check-label" for="addUser">
                      Администратор может добавлять пользователей в систему
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="uploadFile" id="uploadFile">
                    <label class="form-check-label" for="uploadFile">
                      Администратор может загружать файлы в хранилище организации
                    </label>
                  </div>
                </div>
                <!-- Компонент кнопки -->
                <ButtonComponent text="Продолжить" v-on:click="this.stepsRegistration(3)" css_class="btn mt-2 right"/>
                <!-- END -->
            </div>
            <div id="step_foo">
              <div class="mb-3">
                <label class="form-label">
                  <b>Выберите тариф</b>
                </label>
                <div class="form-check">
                  <div class="row">
                    <div class="col-lg-9 col-7 tariff">
                      <p>Ежемесячный <span>4160 т.р/мес</span></p>
                    </div>
                    <div class="col-lg-3 col-5">
                      <input type="radio" class="btn-check" name="options" v-on:click="tariffFrom('Ежемесячный')" id="option1" autocomplete="off">
                      <label class="btn w-100" for="option1"><span ref="monthTariff"></span> Выбрать</label>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <div class="row">
                    <div class="col-lg-9 col-7 tariff">
                      <p>Полугодовой <span>8000 т.р/мес</span></p>
                    </div>
                    <div class="col-lg-3 col-5">
                      <input type="radio" class="btn-check" name="options" v-on:click="tariffFrom('Полугодовой')" id="option2" autocomplete="off">
                      <label class="btn w-100" for="option2"><span ref="semiYearTariff"></span> Выбрать</label>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <div class="row">
                    <div class="col-lg-9 col-7 tariff">
                      <p>Годовой <span>3750 т.р/мес</span></p>
                    </div>
                    <div class="col-lg-3 col-5">
                      <input type="radio" class="btn-check" name="options" v-on:click="tariffFrom('Годовой')" id="option3" autocomplete="off">
                      <label class="btn w-100" for="option3"><span ref="yearTariff"></span> Выбрать</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>При выборе тарифа даётся тестовый период в 14 дней.</p>
                </div>
                <div class="col-6">
                  <!-- Компонент кнопки -->
                <ButtonComponent text="Отправить" v-on:click="this.stepsRegistration(4)" css_class="btn mt-2 right"/>
                <!-- END -->
                </div>
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
      password: '',
      logotype: null,
      valueType: '',
      destination: null,
      onlineLesson: false,
      sistemChat: false,
      testConstruct: false,
      isGameTematic: false,
      userAccess: false,
      userEmail: false,
      isEnvaluation: false,
      addUser: false,
      uploadFile: false,
      tariff: '',
      isVideoPlatform: null,
      isChatPlatform: null,
      isTestPlatform: null,
      isGamePlatform: null,
    }
  },
  components: {
    CardComponent,
    ButtonComponent,
    AlertComponent,
    LoaderComponent
  },
  props: {
    server: String
  },
  methods: {
    tariffFrom (value) {
      if (value === 'Ежемесячный') {
        this.$refs.semiYearTariff.innerHTML = ''
        this.$refs.yearTariff.innerHTML = ''
        this.$refs.monthTariff.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(255 255 255);width: 1.4em;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>'
        this.tariff = value
      } else if (value === 'Полугодовой') {
        this.$refs.monthTariff.innerHTML = ''
        this.$refs.yearTariff.innerHTML = ''
        this.$refs.semiYearTariff.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(255 255 255);width: 1.4em;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>'
        this.tariff = value
      } else if (value === 'Годовой') {
        this.$refs.monthTariff.innerHTML = ''
        this.$refs.semiYearTariff.innerHTML = ''
        this.$refs.yearTariff.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(255 255 255);width: 1.4em;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>'
        this.tariff = value
      }
    },
    uploadToFile () {
      var formData = new FormData()
      var imagefile = this.$refs.fileInput
      formData.append("image", imagefile.files[0])

      // Отправка данных
      axios.post(this.server + '/api/upload/save', formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        })
        .then(function (response) {
          // this.logotype = response.data.message
          console.log(response.data.message)
        })
        .catch(function (error) {
          console.log(error)
          // this.alert = 'Не удалось сохранить файл!'
          // // Активация всплывающего сообщения
          // document.getElementById('toast').style.opacity = 1
        })
        console.log(this.logotype)
        return this.logotype
    },
    stepsRegistration: function (ids) {
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
          // Генерация пароля
          let generate = ''
          const possible = 'abcdefghijk12346lmnopqrsWERTYUIH09875FJKLZMNBVCtuvwxyz'
          for (let i = 0; i < 10; i++) {
            generate += possible.charAt(Math.floor(Math.random() * possible.length))
          }
          this.password = generate
        }
      } else if (ids === 2) {
        if (document.getElementById('user_name').value !== '' && document.getElementById('user_surname').value !== '') {
          if (document.getElementById('user_email').value.includes('@') && document.getElementById('user_email').value.includes('.')) {
            // Увеличение шага
            document.getElementById('step').innerText = String(ids + 1)
            document.getElementById('step_two').style.display = 'none'
            document.getElementById('step_free').style.display = 'block'
            // END
          } else {
            this.alert = 'Поля заполнены не правильно!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        } else {
          this.alert = 'Заполните все поля!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        }
      } else if (ids === 3) {
        // formDataFile
        if (this.valueType != '') {
          // Увеличение шага
          document.getElementById('step').innerText = String(ids + 1)
          document.getElementById('step_free').style.display = 'none'
          document.getElementById('step_foo').style.display = 'block'
        } else {
          this.alert = 'Заполните все поля!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        }
      } else if (ids === 4) {
        if (this.tariff) {
          // Увеличение шага
          document.getElementById('step').innerText = String(ids + 1)
          document.getElementById('step_foo').style.display = 'none'
          // Активация лоадера
          document.getElementById('loader-bg').style.display = 'block'
          // END
          // Загрузка файла
          this.logotype = this.uploadToFile()
          // END
          // Отправка данных
          axios.post(this.server + '/api/organization/create',
            {
              headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
              },
              user_access: this.userAccess,
              user_email: this.userEmail,
              is_envaluation: this.isEnvaluation,
              add_user: this.addUser,
              upload_file: this.uploadFile,
              logo: this.logotype,
              tariff_from: this.tariff,
              is_video_platform: this.isVideoPlatform,
              is_chat_platform: this.isChatPlatform,
              is_test_platform: this.isTestPlatform,
              is_game_platform: this.isGamePlatform,
              is_evaluation_type: this.valueType,
              destination: this.destination,
              name: this.organization_name,
              role: this.role,
              first_name: this.first_name,
              last_name: this.last_name,
              username: this.email,
              email: this.email,
              password: 'user_' + this.password
            })
            .then(function (response) {
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
                self.alert = 'Проверьте почту, туда выслано сообщение для активации аккаунта.'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
                document.getElementById('step_two').style.display = 'none'
                document.getElementById('step_free').style.display = 'none'
                // window.location.href = '/'
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
          this.alert = 'Выберите тариф!'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        }
      }
    }
  }
}
</script>