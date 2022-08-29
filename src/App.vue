<template>
  <section>
    <HeaderComponent v-bind:is_auth=this.is_auth />
    <MenuComponent v-bind:user_info=this.user_info  />
    <ContentComponent>
      <router-view v-bind:is_auth=this.is_auth />
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
    }
  },
  beforeMount () {
    this.user()
  }
}
</script>
