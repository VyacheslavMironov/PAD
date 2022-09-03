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
                <div ref='bottomMenu' class="offcanvas offcanvas-bottom" data-bs-scroll="true" tabindex="-1" id="addGroupBottom" aria-labelledby="offcanvasBottomLabel">
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
            <div class="row">
              <div class="mt-8"></div>
                <div class="col-6" v-for="i in this.group_list" v-bind:key="i">
                  <a v-bind:href="'group-show?group_id=' + i.id">
                    <CardFormComponent class="mt-2 col-11">
                      <div class="container">
                        <p><b>@</b>_{{ i.name }}</p>
                      </div>
                    </CardFormComponent>
                  </a>
                </div>
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
import CardFormComponent from '@/components/cards/CardFormComponent.vue'

export default {
  data () {
    return {
      alert: null,
      user_info: null,
      group_name: null,
      group_list: null
    }
  },
  props: {
    is_auth: Number,
    token: String
  },
  components: {
    // CardFormComponent,
    LoaderComponent,
    ButtonComponent,
    AlertComponent,
    CardFormComponent
  },
  methods: {
    user: function () {
      if (this.is_auth >= 0) {
        axios.get('http://localhost:5000/api/user/user-info?access_token=' + this.token,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          }
        )
          .then((response) => {
            this.user_info = response.data[0].message
            // Вызывать методы использующие пользовательские данные ниже
            this.all_group(this.user_info.organization_id)
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    create_group () {
      // Активация лоадера
      document.getElementById('loader-bg').style.display = 'block'
      // END
      axios.post('http://localhost:5000/api/group/create-group',
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
          },
          organization_id: this.user_info.organization_id,
          user_id: this.user_info.user_id,
          name: this.group_name
        })
        .then((response) => {
          this.alert = 'Данные сохранены'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
          // Деактивация лоадера
          document.getElementById('loader-bg').style.display = 'none'
          // Сокрытие блока добавления
          this.$refs.bottomMenu.style.visibility = 'hidden'
          document.querySelector('.modal-backdrop').style.opacity = '0'
          this.group_name = ''
        })
    },
    all_group (organizationId) {
      axios.get('http://localhost:5000/api/group/all-group?organization_id=' + organizationId,
        {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          }
        })
        .then((response) => {
          this.group_list = response.data[0].message.list
        })
    }
  },
  mounted () {
    this.user()
  }
}
</script>
