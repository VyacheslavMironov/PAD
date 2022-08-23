<template>
  <header class="container_fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid container">
        <a class="navbar-brand" href="#">
          <h2 class="text-center">
            <b>PAD</b>
          </h2>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- <ul class="navbar-nav me-auto mb-2 w-100 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul> -->
          <!-- Компонент кнопки для перехода на представление авторизации -->
          <ButtonComponent
            text="Войти"
            v-bind:link=this.link_signin
            css_class="btn right"
            wrapper_css_class="w-100"
          />
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import ButtonComponent from '@/components/ButtonComponent.vue'

export default {
  data () {
    return {
      link_signin: '/signin',
      link_signout: '/signout'
    }
  },
  components: {
    ButtonComponent
  }
}
</script>
