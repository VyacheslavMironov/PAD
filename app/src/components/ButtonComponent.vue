<template>
    <div v-bind:class="wrapper_css_class">
      <a
          v-if="link"
          v-bind:href="link"
          v-bind:class="css_class"
      >{{ text }}</a>
      <button
          v-else
          type="button"
          v-bind:class="css_class"
      >{{ text }}</button>
    </div>
</template>
  
<script>
export default {
    props: {
        text: {
        type: String,
        required: true
        },
        link: {
        type: String,
        required: true
        },
        css_class: {
        type: String,
        required: false
        },
        wrapper_css_class: {
        type: String,
        required: false
        }
    }
}
</script>