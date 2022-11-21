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
              <div class="mt-1">
                <a
                  class="list_items"
                  data-bs-toggle="collapse"
                  href="#filials"
                  role="button"
                  aria-expanded="false"
                  aria-controls="collapseExample"
                >
                <svg xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 10V7c0-1.103-.897-2-2-2h-3c0-1.654-1.346-3-3-3S8 3.346 8 5H5c-1.103 0-2 .897-2 2v4h1a2 2 0 0 1 0 4H3v4c0 1.103.897 2 2 2h4v-1a2 2 0 0 1 4 0v1h4c1.103 0 2-.897 2-2v-3c1.654 0 3-1.346 3-3s-1.346-3-3-3z"></path>
                </svg>Филиалы
                </a>
                <div class="collapse" id="filials">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <a href="#add_filials">Добавить филиал</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#add_filials">Редактировать филиалы</a>
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
              <div class="">
                <!-- <h5>Общие настройки</h5>
                <br> -->
                <div class="row mt-5">
                  <div class="mb-3">
                    <label class="form-label">
                      <h5>Логотип организации</h5>
                    </label>
                    <input type="file" ref="fileInput" name="file" class="form-control">
                    <br>
                    <p
                      v-if="this.settings_info.logo != 'default'"
                    >Сейчас используется:</p>
                    <div
                      v-if="this.settings_info.logo != 'default'"  
                      class="card col-2"
                    >
                      <img v-bind:src="this.server + '/img/' + this.settings_info.logo" class="img-fluid" alt="Логотип организации" />
                      <span
                        v-on:click="delete_logo()"
                        class="delete-img"
                      >
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                          <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path>
                          <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path>
                        </svg>
                      </span>
                    </div>
                    <!-- Компонент кнопки -->
                    <ButtonComponent text="Изменить" v-on:click="update_logo()" css_class="btn mt-2 right"/>
                    <!-- END -->
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="mb-3">
                    <label class="form-label">
                      <h5>Тип оценочной единицы</h5>
                    </label>
                    <select class="form-select" v-model="valueType" aria-label="Default select example">
                      <option value="true">Числовая</option>
                      <option value="false">Строковая</option>
                    </select>
                    <!-- Компонент кнопки -->
                    <ButtonComponent text="Изменить" v-on:click="update_value_type()" css_class="btn mt-2 right"/>
                    <!-- END -->
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="mb-3">
                    <label class="form-label">
                      <h5>Расширения</h5>
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
                          Сервис тестирования
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" v-model="isGameTematic" id="isGameTematic">
                      <label class="form-check-label" for="isGameTematic">
                          Тематически игровая платформа
                      </label>
                    </div>
                  </div>
                  <!-- Компонент кнопки -->
                  <ButtonComponent text="Обновить список сервисов" v-on:click="this.connect_services_update()" css_class="btn mt-3"/>
                  <!-- END -->
                </div>
                <div class="row mt-5">
                  <div class="mb-3">
                    <label class="form-label">
                      <h5>Права администратора</h5>
                    </label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        v-model="userAccess"
                        id="userAccess"
                      >
                      <label class="form-check-label" for="userAccess">
                        Администратор может заходить под студентом
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        v-model="userEmail"
                        id="userEmail"
                      >
                      <label class="form-check-label" for="userEmail">
                        Администратор может рассылать E-mail уведомления
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        v-model="isEnvaluation"
                        id="isEnvaluation"
                      >
                      <label class="form-check-label" for="isEnvaluation">
                        Администратор может изменять или выставлять оценки
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        v-model="addUser"
                        id="addUser"
                      >
                      <label class="form-check-label" for="addUser">
                        Администратор может добавлять пользователей в систему
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        v-model="uploadFile"
                        id="uploadFile"
                      >
                      <label class="form-check-label" for="uploadFile">
                        Администратор может загружать файлы в хранилище организации
                      </label>
                    </div>
                  </div>
                  <!-- Компонент кнопки -->
                  <ButtonComponent text="Обновить права" v-on:click="this.priveleges_admin_update()" css_class="btn mt-3"/>
                  <!-- END -->
                </div>
              </div>
              <!-- Настройка персонала -->
              <div class="mt-5">
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
                    <option v-if="this.user_info.role === 'Директор'" value="Администратор" selected>Администратор</option>
                    <option v-if="this.user_info.role === 'Директор' || this.user_info.role === 'Администратор'" value="Преподаватель">Преподаватель</option>
                    <option v-if="this.user_info.role === 'Администратор'" value="Студент">Студент</option>
                    <option v-if="this.user_info.role === 'Администратор'" value="Родитель">Родитель</option>
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
                        {{ i.name }}
                      </label>
                    </div>
                  </div>
                  </div>
                </div>
                <div v-if="this.role === 'Родитель'" class="mb-4">
                  <label class="form-label">
                    <b>Выберите ребёнка</b>
                  </label>
                  <div class="row">
                    <select
                      class="form-select"
                      aria-label="Default select example"
                      v-model="student_id"
                    >
                      <option
                        v-for="i in this.students_list"
                        v-bind:key="i"
                        v-bind:value="i.user_id"
                      >{{ i.first_name }} {{ i.last_name }}</option>
                    </select>
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
                <div v-if="this.user_info.role === 'Директор'" class="form-check">
                  <input
                    class="form-check-input"
                    v-on:click="all_show_user(this.user_info.organization_id, 'Администратор')"
                    type="radio"
                    name="flexRadioDefault"
                    id="admin"
                  >
                  <label class="form-check-label" for="admin">
                    Администратор
                  </label>
                </div>
                <div v-if="this.user_info.role === 'Директор' || this.user_info.role === 'Администратор'" class="form-check">
                  <input
                    class="form-check-input"
                    v-on:click="all_show_user(this.user_info.organization_id, 'Преподаватель')"
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
                    v-on:click="all_show_user(this.user_info.organization_id, 'Студент')"
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
                    v-on:click="all_show_user(this.user_info.organization_id, 'Родитель')"
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
                      <option v-if="this.user_info.role === 'Директор'" value="Администратор" selected>Администратор</option>
                      <option v-if="this.user_info.role === 'Директор' || this.user_info.role === 'Администратор'" value="Преподаватель">Преподаватель</option>
                      <option v-if="this.user_info.role === 'Администратор'" value="Студент">Студент</option>
                      <option v-if="this.user_info.role === 'Администратор'" value="Родитель">Родитель</option>
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
                  <input type="text" v-model="lesson_name" class="form-control">
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
                        <p ref="lessonText" class="d-block">{{i.name}}</p>
                        <div ref="lessonUpdate"  class="d-none">
                          <div class="input-group mb-1">
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Recipient's username"
                              aria-label="Recipient's username"
                              ref="inputLessonText"
                              v-bind:aria-describedby="idx"
                              v-bind:value="i.name"
                            >
                            <button
                              v-on:click="this.update_lessons(i.id, this.user_info.organization_id, idx)"
                              class="btn"
                              type="button"
                              v-bind:id="idx"
                            >Ок</button>
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
                        <span class="btn p-1 m-1" v-on:click="this.drop_lesson(i.id)">
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
    </main>
</template>
  
<script>
  import axios from 'axios'
  import AlertComponent from '../components/AlertComponent.vue'
  import CardFormComponent from '../components/CardComponent.vue'
  import LoaderComponent from '../components/LoaderComponent.vue'
  import ButtonComponent from '../components/ButtonComponent.vue'
  
  export default {
    data () {
      return {
        // Параметры для добавления юзера
        priveleges_admin_list: null,
        organization_id: null,
        first_name: null,
        last_name: null,
        role: null,
        email: null,
        
        group: null,
        group_list: null,
        user_type: null,
        users: null,
        alert: '',
        student_id: null,
        students_list: null,
        first_and_last_name: null,
        update_user_id: null,
        update_first_name: null,
        update_last_name: null,
        update_role: null,
        update_email: null,
        lesson_name: null,
        update_lesson: null,
        lesson_list: null,
        update_lesson_list: [],
        lessonUp: '',
        valueType: null,
        onlineLesson: false,
        sistemChat: false,
        testConstruct: false,
        isGameTematic: false,
        userAccess: false,
        userEmail: false,
        isEnvaluation: false,
        addUser: false,
        uploadFile: false,
      }
    },
    props: {
      server: String,
      is_auth: Number,
      token: String,
      user_info: Object,
      settings_info: Object
    },
    components: {
      CardFormComponent,
      LoaderComponent,
      ButtonComponent,
      AlertComponent
    },
    methods: {
      update_logo () {
        var formData = new FormData()
        var imagefile = this.$refs.fileInput
        formData.append("image", imagefile.files[0])
        // Отправка данных
        // Отправка данных
        axios.post(this.server + '/api/upload/save', formData,
          {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          })
          .then((response) => {
            var file = response.data[0]
            axios.post(this.server + '/api/settings/logo/update',
              {
                headers: {
                  'Content-Type': 'application/json',
                  'Access-Control-Allow-Origin': '*',
                  'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
                },
                organization_id: this.user_info.organization_id,
                file_name: file
              })
              .then((response) => {
                
                this.alert = 'Логотип успешно изменён!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
                // this.logotype = response.data[0]
              })
              .catch((error) => {
                
                this.alert = 'Не удалось сохранить файл!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
              })
          })
          .catch((error) => {
            this.alert = 'Не удалось сохранить файл!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      delete_logo() {
        axios.delete(this.server + '/api/settings/logo/delete?organization_id=' + this.user_info.organization_id,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            
            this.alert = 'Логотип удалён!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // this.logotype = response.data[0]
          })
          .catch((error) => {
            
            this.alert = 'Не удалось удалить файл!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      update_value_type () {
        axios.put(this.server + '/api/settings/update/value-type',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            organization_id: this.user_info.organization_id,
            value_type: this.valueType
          })
          .then((response) => {
            this.alert = 'Тип оценочной единицы изменён!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // this.logotype = response.data[0]
          })
          .catch((error) => {
            
            this.alert = 'Не удалось изменить оценочной единицы!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      all_group (organizationId) {
        
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

      },
      students_for (organizationId) {
       
      },
      create_user () {
        axios.post(this.server + '/api/user/create',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            organization_id: this.user_info.organization_id,
            first_name: this.first_name,
            last_name: this.last_name,
            email: this.email,
            role: this.role,
            // Доп параметры преподавателя
            lessons: this.lessonUp,
          })
          .then((response) => {
            
            this.alert = 'Пользователь успешно добавлен!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // Очистка полей
            this.first_name = ''
            this.last_name = ''
            this.email = ''
            this.role = ''
            this.lessonUp = ''
          })
          .catch((error) => {
            
            this.alert = 'Ошибка, проверьте что заполнили все поля!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      all_show_user (organization_id, role) {
        axios.get(this.server + '/api/user/show?organization_id=' + organization_id + '&role=' + role,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            this.users = response.data[0]
            document.getElementById('personal-info').classList.remove('d-none')
            document.getElementById('personal-info').classList.add('d-block')
          })
      },
      user_change () {
        this.update_user_id = this.users[this.first_and_last_name].id
        this.update_first_name = this.users[this.first_and_last_name].first_name.trim()
        this.update_last_name = this.users[this.first_and_last_name].last_name.trim()
        this.update_role = this.users[this.first_and_last_name].role.trim()
        this.update_email = this.users[this.first_and_last_name].email.trim()
      },
      update_user () {
        alert(this.update_user_id)
      // Запрос на выборку данных юзера по ролям
      axios.put(this.server + '/api/user/update',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          id: this.update_user_id,
          first_name: this.update_first_name,
          last_name: this.update_last_name,
          role: this.update_role,
          email: this.update_email
        })
        .then((response) => {
          
          this.alert = 'Данные обновлены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        })
        .catch(function (error) {
          if (error.error) {
            self.alert = 'Ошибка получения данных!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          }
        })
      // END
      },
      create_lesson () {
        axios.post(this.server + '/api/lesson/create',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            organization_id: this.user_info.organization_id,
            name: this.lesson_name
          })
          .then((response) => {
            this.alert = 'Предмет успешно добавлен!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // Очистка поля 
            this.lesson_name = ''
          })
          .catch((error) => {
            this.alert = 'Ошибка, проверьте что указали название предмета!\n* Название предмета должно быть не меньше 3-х символов.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      lessons () {
        axios.get(this.server + '/api/lesson/list?organization_id=' + this.user_info.organization_id,
          {
            headers: {
              'Content-Type': 'application/json',
            }
          })
          .then((response) => {
            this.lesson_list = response.data
          })
          .catch((error) => {
            this.alert = 'Ошибка загрузки списка предметов на стороне сервера, обратитесь в тех-поддержку.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
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
      update_lessons (id, organizationId, idx) {
        axios.put(this.server + '/api/lesson/update',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            id: id,
            organization_id: organizationId,
            name: this.$refs.inputLessonText[idx].value
          })
          .then((response) => {
            this.alert = 'Данные предмета обновлены!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // Закрывает активное поле ввода обновления
            this.update_lesson_close(idx)
          })
          .catch((error) => {
            this.alert = 'Ошибка! Не возможно обновить предмет.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      drop_lesson (id) {
        axios.delete(this.server + '/api/lesson/delete?id=' + id,
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            }
          })
          .then((response) => {
            this.alert = 'Данные предмета удалены!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            location.reload()
          })
          .catch((error) => {
            this.alert = 'Ошибка! Не возможно удалить предмет.'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      show_param () {
        axios.get(this.server + '/api/settings/show/priveleges-admin?organization_id=' + this.user_info.organization_id,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          })
          .then((response) => {
            // this.priveleges_admin_list = response.data[0]
            this.userAccess = response.data[0].user_access
            this.userEmail = response.data[0].user_email
            this.isEnvaluation = response.data[0].is_envaluation
            this.addUser = response.data[0].add_user
            this.uploadFile = response.data[0].upload_file

            this.onlineLesson = this.settings_info.is_video_platform
            this.sistemChat = this.settings_info.is_chat_platform
            this.testConstruct = this.settings_info.is_test_platform
            this.isGameTematic = this.settings_info.is_game_platform
          })
          .catch((error) => {
            this.alert = 'Ошибка! Не возможно загрузить привелегии администратора!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      priveleges_admin_update () {
        axios.put(this.server + '/api/settings/update/priveleges-admin',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            organization_id: this.user_info.organization_id,
            user_access: this.userAccess,
            user_email: this.userEmail,
            is_envaluation: this.isEnvaluation,
            add_user: this.addUser,
            upload_file: this.uploadFile
          })
          .then((response) => {
            this.alert = 'Данные изменены!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
          .catch((error) => {
            this.alert = 'Ошибка. Невозможно изменить права!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      },
      connect_services_update () {
        axios.put(this.server + '/api/settings/update/service-connect',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            organization_id: this.user_info.organization_id,
            is_video_platform: this.onlineLesson,
            is_chat_platform: this.sistemChat,
            is_test_platform: this.testConstruct,
            is_game_platform: this.isGameTematic
          })
          .then((response) => {
            this.alert = 'Данные изменены!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
          .catch((error) => {
            this.alert = 'Ошибка. Невозможно изменить список сервисов!'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
          })
      }
    },
    mounted () {
      this.lessons()
      this.show_param()
    }
  }
</script>