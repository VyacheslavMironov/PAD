<template>
    <section>
      <HeaderComponent
        v-bind:is_auth=this.is_auth
        v-bind:server=this.server
        v-bind:user_info=Object(this.user_info)
        v-bind:settings_info=Object(this.settings_info)
      />
      <MenuComponent v-bind:user_info=this.user_info  />
      <ContentComponent>
        <router-view
          v-bind:user_info=Object(this.user_info)
          v-bind:settings_info=Object(this.settings_info)
          v-bind:server=this.server
          v-bind:is_auth=this.is_auth
          v-bind:token=this.token
        />
      </ContentComponent>
      <FooterComponent />
    </section>
</template>
  
<script>
import axios from 'axios'
/*
Хедер и футер являются общими элементами для всех страниц,
по этому эти компоненты подключаются тут.
*/
import HeaderComponent from './src/components/HeaderComponent.vue'
import ContentComponent from './src/components/ContentComponent.vue'
import FooterComponent from './src/components/FooterComponent.vue'
import MenuComponent from './src/components/MenuComponent.vue'

export default {
    name: 'HomeView',
    data () {
      return {
        token: null,
        is_auth: document.cookie.search('user'),
        user_info: null,
        settings_info: null,
        server: 'http://127.0.0.1'
      }
    },
    components: {
      HeaderComponent,
      MenuComponent,
      ContentComponent,
      FooterComponent
    },
    methods: {
      user: function () {
        if (this.is_auth >= 0) {
          var cookies = document.cookie.split(';')
          for (var i in cookies) {
            if (cookies[i].indexOf('user') >= 0) {
              this.token = cookies[i].split('=')[1].split(' ')[1]
            }
          }
          axios.get(this.server + '/api/user/info?token=' + this.token,
            {
              headers: {
                'Content-Type': 'application/json'
              }
            })
            .then((response) => {
              var user = response.data[0][0]
              var new_ = {}
             for (var item in user) {
              if (typeof(user[item]) == "string"){
                new_[item] = user[item].trim()
              } else {
                new_[item] = user[item]
              }
             }
              this.user_info = new_
              this.settings(this.user_info)
            })
        }
      },
      settings: function (user_info) {
        if (this.is_auth >= 0) {
          var cookies = document.cookie.split(';')
          for (var i in cookies) {
            if (cookies[i].indexOf('user') >= 0) {
              this.token = cookies[i].split('=')[1].split(' ')[1]
            }
          }
          var new_ = {}
          axios.get(this.server + '/api/settings/info?id=' + Number(Object(user_info.organization_id)),
            {
              headers: {
                'Content-Type': 'application/json'
              }
            })
            .then((response) => {
              var settings = response.data[0]
             for (var item in settings) {
              if (typeof(settings[item]) == "string"){
                new_[item] = settings[item].trim()
              } else {
                new_[item] = settings[item]
              }
             }
              this.settings_info = new_
            })
        }
      }
    },
    mounted () {
      this.user()
    }
}
</script>