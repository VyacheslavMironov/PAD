<template>
    <main class="container_fluid">
         <!-- Компонент сообщения -->
         <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
         <!-- END -->
         <!-- Вынести в компонет -->
         <div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить группу</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3 col-12">
                                <label class="form-label">
                                <b>Введите наименование группы</b>
                                </label>
                                <input type="text" id="group_name" v-model="group_name" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- Компонент кнопки -->
                        <ButtonComponent
                            type="button"
                            text="Создать группу"
                            data-bs-dismiss="modal"
                            css_class="btn col-12 mx-auto d-block"
                            v-on:click="this.create_group()"
                        />
                        <!-- END -->
                    </div>
                </div>
            </div>
        </div>
         <!-- END -->
         <div class="container">
             <div class="row">
                <CardComponent class="_card card col-lg-10 col-12 p-5 mx-auto">
                    <div class="mt-2">
                        <p class="filial_name text-center">
                            <svg xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 10V7c0-1.103-.897-2-2-2h-3c0-1.654-1.346-3-3-3S8 3.346 8 5H5c-1.103 0-2 .897-2 2v4h1a2 2 0 0 1 0 4H3v4c0 1.103.897 2 2 2h4v-1a2 2 0 0 1 4 0v1h4c1.103 0 2-.897 2-2v-3c1.654 0 3-1.346 3-3s-1.346-3-3-3z"></path>
                            </svg>
                            <strong>Настройки филиала КИД</strong>
                        </p>
                    </div>
                    <div class="row">
                        <div class="mb-5 p-2 col-10 mx-auto">
                            <p>
                                <b>
                                    <svg xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm1.5 1H8c-3.309 0-6 2.691-6 6v1h15v-1c0-3.309-2.691-6-6-6z"></path>
                                        <path d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z"></path>
                                    </svg> Группы
                                </b>
                            </p>
                            <div class="container">
                                <nav class="col-1" aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a
                                            class="page-link text-center pointer"
                                            v-on:click="this.pagination_back()"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(255 255 255);">
                                                    <path d="m8.121 12 4.94-4.939-2.122-2.122L3.879 12l7.06 7.061 2.122-2.122z"></path>
                                                    <path d="M17.939 4.939 10.879 12l7.06 7.061 2.122-2.122L15.121 12l4.94-4.939z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a
                                                class="page-link text-center pointer"
                                                v-on:click="this.pagination_next()"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgb(255 255 255);">
                                                    <path d="m13.061 4.939-2.122 2.122L15.879 12l-4.94 4.939 2.122 2.122L20.121 12z"></path>
                                                    <path d="M6.061 19.061 13.121 12l-7.06-7.061-2.122 2.122L8.879 12l-4.94 4.939z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Список групп -->
                            <div class="col">
                                <ul class="list-group mb-3">
                                    <li
                                        class="list-group-item justify-content-between align-items-center mt-1"
                                        v-for="(i, idx) in this.groups"
                                        v-bind:key="i"
                                        ref="GroupPagination"
                                        v-bind:style="idx > 4 ? 'display: none;' : ''"
                                    >
                                        <a v-bind:href="(this.server + '/filial/specific/group-create?organization_id=' + this.$route.query.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + i.id)">
                                            {{ i.name }}
                                        </a>
                                        <div class="row">
                                            <div class="col">
                                                <!-- <span class="m-1" v-on:click="this.update_group()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="fill: #3580dc;" class="pointer">
                                                        <path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                                                    </svg>
                                                </span> -->
                                                <span class="m-1" v-on:click="this.drop_group(i.id)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="fill: #dc3545;" class="pointer">
                                                        <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END -->
                             <!-- Компонент кнопки -->
                             <ButtonComponent
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#addGroupModal"
                                text="Добавить группу"
                                css_class="btn col-6 mx-auto d-block"
                            />
                            <!-- END -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-5 p-2 col-10 mx-auto">
                            <p>
                                <b>
                                    <svg xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z"></path>
                                    </svg> Пользователи
                                </b>
                            </p>
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
                                <select
                                    class="form-select"
                                    v-model="role"
                                    v-on:change="this.in_role()"
                                    aria-label="Default select example"
                                >
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
                                        v-for="i in this.users"
                                        v-bind:key="i"
                                        v-bind:value="i.id"
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
                                <ButtonComponent text="Сохранить" v-on:click="this.create_user(this.$route.query.filial_id, this.student_id)" css_class="btn mt-2 right"/>
                                <!-- END -->
                            </div>
                        </div>
                    </div>
                </CardComponent>
             </div>
         </div>
    </main>
 </template>
   
 <script>
 import axios from 'axios'
 import AlertComponent from '../components/AlertComponent.vue'
 import ButtonComponent from '../components/ButtonComponent.vue'
 import CardComponent from '../components/CardComponent.vue'
 export default {
    name: 'FilialView',
    data () {
        return {
            group_view: 5,
            p_back: 0,
            p_next: 5,
            alert: null,
            lesson_list: null,
            first_name: null,
            last_name: null,
            student_id: null,
            role: null,
            email: null,
            lessonUp: '',
            users: null,
            group_name: null,
            groups: null
        }
    },
    props: {
        user_info: Object,
        settings_info: Object,
        server: String,
        server_journal: String,
        is_auth: Number,
        token: String
    },
    components: {
        AlertComponent,
        ButtonComponent,
        CardComponent
    },
    methods: {
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
        create_user (filialId, studentId) {
            axios.post(this.server + '/api/user/create',
            {
                headers: {
                    'Content-Type': 'application/json',
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
                },
                organization_id: this.user_info.organization_id,
                filial_id: filialId,
                relation_id: studentId,
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
                window.location.reload()
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
        in_role () {
            if (this.role == 'Родитель') {
                this.all_show_user(this.user_info.organization_id, 'Студент')
            }
            if (this.role == 'Преподаватель') {
                this.lessons()
            }
        },
        async show_list () {
            await axios.get(this.server_journal + '/api/group/list?organization_id=' + this.user_info.organization_id + '&&filial_id=' + this.$route.query.filial_id,
                {
                    headers: {
                    'Content-Type': 'application/json',
                    }
                })
                .then((response) => {
                    this.groups = response.data[0]
                })
                .catch((error) => {
                    this.alert = 'Ошибка загрузки списка групп на стороне сервера, обратитесь в тех-поддержку.'
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                })
        },
        create_group () {
            axios.post(this.server_journal + '/api/group/create',
                {
                    headers: {
                        'Content-Type': 'application/json',
                        'Access-Control-Allow-Origin': '*',
                        'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
                    },
                    organization_id: this.user_info.organization_id,
                    filial_id: this.$route.query.filial_id,
                    name: this.group_name
                })
                .then((response) => {
                    
                    this.alert = 'Группа успешно создана!'
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                    // Очистка полей
                    this.group_name = ''
                    window.location.reload()
                })
                .catch((error) => {
                    this.alert = 'Ошибка, невозможно добавить новую группу!'
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                })
        },
        // update_group () {
        //     // ...
        // },
        drop_group (groupId) {
            axios.get(this.server_journal + '/api/group/delete?organization_id=' + this.user_info.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&id=' + groupId,
                {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then((response) => {
                    this.alert = 'Группа успешно удалена.'
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                    window.location.reload()
                })
                .catch((error) => {
                    this.alert = 'Ошибка удаления группы!'
                    // Активация всплывающего сообщения
                    document.getElementById('toast').style.opacity = 1
                })
        },
        pagination_next () {
            // this.p_next = (this.p_next + this.group_view) < this.$refs.GroupPagination.length ? this.$refs.GroupPagination.length : this.p_next + this.group_view;
            // this.p_back += this.p_back >= this.group_view ? this.p_back - this.group_view : this.p_back + this.group_view;
            if (this.p_next <= this.$refs.GroupPagination.length) {
                this.p_next += this.group_view;
                this.p_back += this.group_view;
            }
            

            for (var i = 0; i < this.$refs.GroupPagination.length; i++) {
                if (i < this.p_back) {
                    this.$refs.GroupPagination[i].style.display = 'none'
                } else if (i >= this.p_next) {
                    this.$refs.GroupPagination[i].style.display = 'none'
                } else {
                    this.$refs.GroupPagination[i].style.display = 'flex'
                }
            }
        },
        pagination_back () {
            // this.p_next = (this.p_next - this.group_view) < 10 ? 10 : this.p_next - this.group_view;
            // this.p_back = (this.p_back - this.group_view) < 0 ? 0 : this.p_back - this.group_view;
            if (this.p_back > 0) {
                this.p_next -= this.group_view;
                this.p_back -= this.group_view;
            }
            
            for (var i = 0; i < this.$refs.GroupPagination.length; i++) {
                if (i >= this.p_back && i < this.p_next) {
                    this.$refs.GroupPagination[i].style.display = 'flex'
                } else if (i <= this.p_next) {
                    this.$refs.GroupPagination[i].style.display = 'none'
                } else {
                    this.$refs.GroupPagination[i].style.display = 'none'
                }
            }
        }
    },
    mounted () {
        this.show_list()
    }
 }
 </script>