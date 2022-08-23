<template>
  <div id="toast" v-bind:class="this.css_class" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">{{ this.mess }}</div>
      <button type="button" class="btn-close me-2 m-auto" v-on:click="this.close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    mess: {
      type: String,
      required: true
    },
    css_class: {
      type: String,
      required: false
    }
  },
  methods: {
    close () {
      document.getElementById('toast').style.opacity = 0
    }
  }
}
</script>
