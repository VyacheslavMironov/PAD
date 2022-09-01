<template>
<main class="container-fluid">
        <!-- Компонент загрузки -->
        <LoaderComponent />
        <!-- End -->
        <!-- Сообщение о процессе -->
        <AlertComponent css_class="toast align-items-cente right" v-bind:mess="this.alert" />
        <!-- END -->
        <div class="mx-auto">
            <div class="container">
                <!-- Компонент кнопки -->
                <ButtonComponent
                    text="Создать группу"
                    css_class="btn mt-2 right"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#addGroupBottom"
                    aria-controls="offcanvasBottom"
                />
                <!-- END -->
                <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" tabindex="-1" id="addGroupBottom" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small">
                        <form class="col-6 mx-auto">
                            <div class="mb-3">
                                <label class="form-label">
                                <b>Введите название группы</b>
                                </label>
                                <input type="text" v-model="group_name" class="form-control">
                            </div>
                            <!-- Компонент кнопки -->
                            <ButtonComponent
                                text="Создать группу"
                                v-on:click="this.create_group()"
                                css_class="btn mt-2 right"
                            />
                            <!-- END -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="col-6 mx-auto"><!-- Примерно так --></div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios'
import AlertComponent from '@/components/AlertComponent.vue'
// import CardFormComponent from '@/components/cards/CardFormComponent.vue'
import LoaderComponent from '@/components/LoaderComponent.vue'
import ButtonComponent from '@/components/ButtonComponent.vue'

export default {
  data () {
    return {
      user_info: null,
      group_name: null
    }
  },
  props: {
    is_auth: Number
  },
  components: {
    // CardFormComponent,
    LoaderComponent,
    ButtonComponent,
    AlertComponent
  },
  methods: {
    user: function () {
      if (this.is_auth > 0) {
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + document.cookie.split(';')[1].split('=')[1].split(' ')[1],
          {
            headers: {
              'Content-Type': 'application/json'
            }
          })
          .then((response) => {
            this.user_info = response.data[0].message
            // Вызывать методы использующие пользовательские данные ниже
            this.lesson_show(this.user_info.organization_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },

    create_group () {},
    all_group () {}
  },
  mounted () {
    this.user()
  }
}
</script>
