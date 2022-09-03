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
                <CardFormComponent>
                    <div class="container mb-3 text-center">
                        <h3>Сформировать группу</h3>
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
                                                ref="studentDataAll"
                                                v-for="(i, idx) in this.user_list"
                                                v-bind:key="i"
                                                class="list-group-item"
                                                v-on:click="this.item_active(idx, 'studentDataAll', i)"
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
                                                ref="studentData"
                                                v-for="(i, idx) in this.list_belongs"
                                                v-bind:key="i"
                                                class="list-group-item"
                                                v-on:click="this.item_active(idx, 'studentData', i)"
                                            >{{i.last_name}} {{i.first_name}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mb-2">
                        <!-- Компонент кнопки -->
                        <ButtonComponent text="Сохранить" v-on:click="this.group_update()" css_class="btn mt-2 right"/>
                    </div>
                </CardFormComponent>
            </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
// import CardFormComponent from '@/components/cards/CardFormComponent.vue'
import LoaderComponent from '@/components/LoaderComponent.vue'
import ButtonComponent from '@/components/ButtonComponent.vue'
import CardFormComponent from '@/components/cards/CardFormComponent.vue'

export default {
  data () {
    return {
      active: null,
      user_id: null,
      data: false,
      data_all: false,
      id: null,
      group_id: this.$route.query.group_id,
      alert: null,
      user_info: null,
      user_list: null,
      list_belongs: null
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    // CardFormComponent,
    LoaderComponent,
    ButtonComponent,
    AlertComponent,
    CardFormComponent
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
            this.show_group(this.user_info.organization_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    show_group (organizationId) {
      axios.get('http://localhost:5000/api/group/show-group?group_id=' + this.group_id + '&&organization_id=' + organizationId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        })
        .then((response) => {
          this.list_belongs = response.data[0].message.list_belongs
          this.user_list = response.data[0].message.user_list
        })
    },
    item_active (index, block, item) {
      // Студенты состоящие в группе
      if (block === 'studentData') {
        // Если есть активный элемент то убираем
        for (var x = 0; x < this.$refs.studentData.length; x++) {
          this.$refs.studentData[x].classList.remove('active')
        }
        // Так же убираем из другой колонки
        try {
          for (var i = 0; i < this.$refs.studentDataAll.length; i++) {
            this.$refs.studentDataAll[i].classList.remove('active')
          }
        } catch (TypeError) {}
        // Ставим активный
        this.$refs.studentData[index].classList.add('active')
        this.user_id = item.user_id
        this.data = true
        this.data_all = false
        this.id = index
      }
      // Студенты не состоящие в группе
      if (block === 'studentDataAll') {
        // Если есть активный элемент то убираем
        try {
          for (var y = 0; x < this.$refs.studentDataAll.length; x++) {
            this.$refs.studentDataAll[y].classList.remove('active')
          }
        } catch (TypeError) {}
        // Так же убираем из другой колонки
        for (var z = 0; z < this.$refs.studentData.length; z++) {
          this.$refs.studentData[z].classList.remove('active')
        }
        // Ставим активный
        this.$refs.studentDataAll[index].classList.add('active')
        this.user_id = item.user_id
        this.data = false
        this.data_all = true
        this.id = index
      }
    },
    add () {
      if (this.data_all) {
        // Отправка данных
        axios.post('http://localhost:5000/api/group/add-user',
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            organization_id: this.user_info.organization_id,
            user_id: this.user_id,
            group_id: this.group_id
          })
          .then((response) => {
            this.alert = 'Данные группы успешно обновлены'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            this.$router.go(0)
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
      }
    },
    remove () {
      if (this.data) {
        // Отправка данных
        axios.delete('http://localhost:5000/api/group/remove-user?user_id=' + this.user_id,
          {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*'
            }
          })
          .then((response) => {
            this.alert = 'Пользователь исключён из группы'
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1
            // Деактивация лоадера
            document.getElementById('loader-bg').style.display = 'none'
            this.$router.go(0)
          })
          .catch(function (error) {
            if (error.response) {
              // Деактивация лоадера
              document.getElementById('loader-bg').style.display = 'none'
              self.alert = 'Ошибка исключения, возможно пользователь не состоит в этой группе!'
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1
            }
          })
        // END
      }
    },
    group_update () {}
  },
  mounted () {
    this.user()
  }
}
</script>
