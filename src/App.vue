<template>
  <section>
    <HeaderComponent />
    <MenuComponent />
    <ContentComponent>
      <router-view />
    </ContentComponent>
    <FooterComponent />
  </section>
</template>

<script>
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
  components: {
    HeaderComponent,
    MenuComponent,
    ContentComponent,
    FooterComponent
  }
}
</script>
