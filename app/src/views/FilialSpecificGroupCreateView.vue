<template>
    <main class="container_fluid">
        <!-- Компонент сообщения -->
        <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
        <!-- END -->
        <div class="container">
            <div class="row">
                <div class="mx-auto">
                    <div class="row">
                        <div class="mb-1">
                            <a v-bind:href="this.server + '/filial/specific?organization_id=' + this.$route.query.organization_id + '&&filial_id=' + this.$route.query.filial_id">
                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: #2c3e50; width: 1.5em;">
                                    <path d="m5 12 7 6v-5h6v-2h-6V6z"></path>
                                </svg> Назад</a>
                        </div>
                        <CardFormComponent>
                            <div class="container mb-5 text-center">
                                <h3>Сформировать группу <b>{{ this.group_name }}</b></h3>
                            </div>
                            <div class="mt-3">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <p>
                                                <strong>Студенты</strong>
                                            </p>
                                            <div class="mt-2 bg-gray">
                                                <ul class="list-group">
                                                    <!-- active -->
                                                    <li
                                                        id="StudentDataAll"
                                                        ref="StudentDataAll"
                                                        v-for="(i, idx) in this.is_not_users"
                                                        v-bind:key="i"
                                                        class="list-group-item"
                                                        v-on:click="this.item_active(idx, 'StudentDataAll', i)"
                                                    >{{i.last_name}} {{i.first_name}}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-2 svg-var">
                                            <svg v-on:click="this.add()" xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);" class="icon-var mx-auto">
                                                <path d="m19 12-7-6v5H6v2h6v5z"></path>
                                            </svg>
                                            <svg v-on:click="this.remove()" xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);" class="icon-var mx-auto">
                                                <path d="m5 12 7 6v-5h6v-2h-6V6z"></path>
                                            </svg>
                                        </div>
                                        <div class="col-5">
                                            <p>
                                                <strong>Участники</strong>
                                            </p>
                                            <div class="mt-2 bg-gray">
                                                <ul class="list-group">
                                                    <li
                                                        id="StudentData"
                                                        ref="StudentData"
                                                        v-for="(i, idx) in this.is_users"
                                                        v-bind:key="i"
                                                        class="list-group-item"
                                                        v-on:click="this.item_active(idx, 'StudentData', i)"
                                                    >{{i.last_name}} {{i.first_name}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </CardFormComponent>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
   
<script>
import axios from 'axios'
import AlertComponent from '../components/AlertComponent.vue'
import CardComponent from '../components/CardComponent.vue'

export default {
    name: 'FilialView',
    data () {
        return {
            alert: null,
            active: null,
            user_id: null,
            data: false,
            data_all: false,

            id: null,
            group_id: this.$route.query.group_id,
            user: null,
            user_list: null,
            list_belongs: null,

            idS: null,
            orgization_id: null,
            filial_id: null,
            group_name: null,
            is_users: null,
            is_not_users: null
        }
    },
    props: {
        user_info: Object,
        settings_info: Object,
        server: String,
        is_auth: Number,
        token: String
    },
    components: {
        AlertComponent,
        CardComponent
    },
    methods: {
        add () {
            if (this.data_all) {
                // Отправка данных
                axios.post(this.server + '/api/user-group/create',
                    {
                        headers: {
                            'Content-Type': 'application/json',
                            'Access-Control-Allow-Origin': '*',
                            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
                        },
                        organization_id: this.$route.query.organization_id,
                        filial_id: this.$route.query.filial_id,
                        user_id: this.user_id,
                        group_id: this.$route.query.group_id
                    })
                    .then((response) => {
                        this.alert = 'Данные группы успешно обновлены'
                        // Активация всплывающего сообщения
                        document.getElementById('toast').style.opacity = 1
                        window.location.reload()
                    })
                    .catch(function (error) {
                        if (error.response) {
                        self.alert = 'Ошибка сохранения данных!'
                        // Активация всплывающего сообщения
                        document.getElementById('toast').style.opacity = 1
                        }
                    })
                    // END
            }
        },
        remove () {
            if (this.data) {
                // Отправка данных
                axios.get(this.server + '/api/user-group/remove?organization_id=' + this.user_info.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.$route.query.group_id + '&&user_id=' + this.user_id,
                    {
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then((response) => {
                        this.alert = 'Пользователь исключён из группы'
                        // Активация всплывающего сообщения
                        document.getElementById('toast').style.opacity = 1
                        window.location.reload()
                    })
                    .catch(function (error) {
                        if (error.response) {
                            self.alert = 'Ошибка исключения, возможно пользователь не состоит в этой группе!'
                            // Активация всплывающего сообщения
                            document.getElementById('toast').style.opacity = 1
                        }
                    })
                    // END
            }
        },
        async group_show () {
            await axios.get(this.server + '/api/group/show?organization_id=' + this.user_info.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&id=' + this.$route.query.group_id,
            {
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then((response) => {
                this.idS = response.data[0].id
                this.orgization_id = response.data[0].orgization_id
                this.filial_id = response.data[0].filial_id
                this.group_name = response.data[0].name
            })
            .catch((error) => {
                this.alert = 'Ошибка. Загрузки информации о группе!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
            })
        },
        async is_user_show () {
            await axios.get(this.server + '/api/user-group/show?organization_id=' + this.user_info.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.$route.query.group_id,
            {
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then((response) => {
                this.is_users = response.data[0]
            })
            .catch((error) => {
                this.alert = 'Ошибка. Загрузки информации участников группы!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
            })
        },
        async is_not_user_show () {
            await axios.get(this.server + '/api/user-group/user/not-group?organization_id=' + this.$route.query.organization_id + '&&filial_id=' + this.$route.query.filial_id + '&&group_id=' + this.$route.query.group_id,
            {
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then((response) => {
                this.is_not_users = response.data[0]
            })
            .catch((error) => {
                console.log(error)
                this.alert = 'Ошибка. Загрузки информации участников группы!'
                // Активация всплывающего сообщения
                document.getElementById('toast').style.opacity = 1
            })
        },
        item_active (index, block, item) {
            // Студенты состоящие в группе
            if (block === 'StudentData') {
                // Если есть активный элемент то убираем
                for (var x = 0; x < this.$refs.StudentData.length; x++) {
                    this.$refs.StudentData[x].classList.remove('active')
                }
                // Так же убираем из другой колонки
                try {
                    for (var i = 0; i < this.$refs.StudentDataAll.length; i++) {
                        this.$refs.StudentDataAll[i].classList.remove('active')
                    }
                } catch (TypeError) {}
                // Ставим активный
                this.$refs.StudentData[index].classList.add('active')
                this.user_id = item.id
                this.data = true
                this.data_all = false
                this.id = index
            }
            // Студенты не состоящие в группе
            if (block === 'StudentDataAll') {
                // Если есть активный элемент то убираем
                try {
                    for (var y = 0; x < this.$refs.StudentDataAll.length; x++) {
                        this.$refs.StudentDataAll[y].classList.remove('active')
                    }
                } catch (TypeError) {}
                // Так же убираем из другой колонки
                try {
                    for (var z = 0; z < this.$refs.StudentData.length; z++) {
                        this.$refs.StudentData[z].classList.remove('active')
                    }
                } catch (TypeError) {}
                
                // Ставим активный
                this.$refs.StudentDataAll[index].classList.add('active')
                this.user_id = item.id
                this.data = false
                this.data_all = true
                this.id = index
            }
        },
    },
    mounted () {
        this.group_show()
        this.is_user_show()
        this.is_not_user_show()
    }
}
</script>