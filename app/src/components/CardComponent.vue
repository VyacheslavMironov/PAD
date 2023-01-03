<template>
    <div v-bind:class="css_class == null ? '_card card col-lg-7 col-12 p-5 mx-auto' : css_class">
      <slot></slot>
    </div>
</template>

<script>
export default {
  props: {
    css_class: {
        type: String,
        required: false
    }
  }
}
</script>