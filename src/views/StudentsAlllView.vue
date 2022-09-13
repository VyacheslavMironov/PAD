<template>
    <main class="container-fluid">
        <!-- Компонент загрузки -->
        <LoaderComponent />
        <!-- End -->
        <!-- Сообщение о процессе -->
        <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
        <!-- END -->
        <div class="mx-auto">
            <div class="row p-5">
                <h2 class="col">
                    <b>Все студенты</b>
                </h2>
                <div class="container mt-5">
                    <div class="row">
                        <div
                          v-bind:class="item.users.length > 0 ? 'col-3' : 'd-none'"
                          v-for="item in this.user_list"
                          v-bind:key="item"
                        >
                            <div class="mb-5">
                              <h3>{{ item.sumbol }}</h3>
                              <ol>
                                  <li
                                    v-for="user in item.users"
                                    v-bind:key="user"
                                  ><a
                                    v-bind:href="'/journal-show?user_id=' + user.user_id + '&&group_id=' + user.group_id"
                                  >{{ user.last_name }} {{ user.first_name }}</a></li>
                              </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
import LoaderComponent from '@/components/LoaderComponent.vue'

export default {
  data () {
    return {
      alert: null,
      user_info: null,
      user_list: null
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    LoaderComponent,
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
            this.all_group(this.user_info.organization_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    all_group (organizationId) {
      axios.get('http://localhost:5000/api/group/show-group?group_id=-1' + '&&organization_id=' + organizationId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        })
        .then((response) => {
          response.data[0].message.list_belongs.sort((a, b) => a.last_name > b.last_name ? 1 : -1)
          var users = response.data[0].message.list_belongs
          var list = [
            { sumbol: 'А', users: [] },
            { sumbol: 'Б', users: [] },
            { sumbol: 'В', users: [] },
            { sumbol: 'Г', users: [] },
            { sumbol: 'Д', users: [] },
            { sumbol: 'Е', users: [] },
            { sumbol: 'Ё', users: [] },
            { sumbol: 'Ж', users: [] },
            { sumbol: 'З', users: [] },
            { sumbol: 'И', users: [] },
            { sumbol: 'Й', users: [] },
            { sumbol: 'К', users: [] },
            { sumbol: 'Л', users: [] },
            { sumbol: 'М', users: [] },
            { sumbol: 'Н', users: [] },
            { sumbol: 'О', users: [] },
            { sumbol: 'П', users: [] },
            { sumbol: 'Р', users: [] },
            { sumbol: 'С', users: [] },
            { sumbol: 'Т', users: [] },
            { sumbol: 'У', users: [] },
            { sumbol: 'Ф', users: [] },
            { sumbol: 'Х', users: [] },
            { sumbol: 'Ц', users: [] },
            { sumbol: 'Ч', users: [] },
            { sumbol: 'Ш', users: [] },
            { sumbol: 'Щ', users: [] },
            { sumbol: 'ъ', users: [] },
            { sumbol: 'Ы', users: [] },
            { sumbol: 'Ь', users: [] },
            { sumbol: 'Э', users: [] },
            { sumbol: 'Ю', users: [] },
            { sumbol: 'Я', users: [] }
          ]
          for (var count = 0; count < users.length; count++) {
            for (var i = 0; i < list.length; i++) {
              if (list[i].sumbol === users[count].last_name[0]) {
                list[i].users.push({
                  user_id: users[count].user_id,
                  last_name: users[count].last_name,
                  first_name: users[count].first_name,
                  group_id: users[count].group_id
                })
              }
            }
          }
          this.user_list = list
        })
    }
  },
  mounted () {
    this.user()
  }
}
</script>
