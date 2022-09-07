<template>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">Меню</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div v-if="this.user_info" class="list-group mt-2">
        <a
          v-if="this.user_info.role === 'Директор' || this.user_info.role === 'Администратор'"
          href="/group-all"
          class="list-group-item btn"
        >Группы</a>
      </div>
      <div v-if="this.user_info" class="list-group mt-2">
        <a
          v-if="this.user_info.role === 'Администратор'"
          href="/timetable-create"
          class="list-group-item btn"
        >Расписание</a>
      </div>
      <div v-if="this.user_info" class="list-group mt-2">
        <a
          v-if="this.user_info.role === 'Директор' || this.user_info.role === 'Администратор'"
          href="/journal-settings"
          class="list-group-item btn"
        >Настройки журнала</a>
      </div>
      <div class="list-group mt-5">
        <button
          type="button"
          v-on:click="this.logout()"
          class="list-group-item btn"
        >Выход</button>
      </div>
    </div>
</div>
</template>

<script>
export default {
  props: {
    user_info: Object
  },
  methods: {
    logout () {
      const cookies = document.cookie.split(/;/)
      for (var i = 0, len = cookies.length; i < len; i++) {
        var cookie = cookies[i].split(/=/)

        if (cookie[0] === 'user' || cookie[0] === ' user') {
          document.cookie = cookie[0] + '=;max-age=-1'
          window.location.href = '/'
        }
      }
    }
  }
}
</script>
