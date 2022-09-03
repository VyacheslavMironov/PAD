<template>
  <section>
    <HeaderComponent v-bind:is_auth=this.is_auth />
    <MenuComponent v-bind:user_info=this.user_info  />
    <ContentComponent>
      <router-view
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
import HeaderComponent from '@/components/HeaderComponent.vue'
import ContentComponent from '@/components/ContentComponent.vue'
import FooterComponent from '@/components/FooterComponent.vue'
import MenuComponent from '@/components/MenuComponent.vue'

export default {
  name: 'HomeView',
  data () {
    return {
      token: null,
      is_auth: document.cookie.search('user'),
      user_info: null
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
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + this.token,
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
    }
  },
  beforeMount () {
    this.user()
  }
}
</script>
