<template>
  <header class="container_fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid container">
        <div class="flex">
          <div class="d-lg-none d-block">
            <button
              id="mobile_menu"
              type="button"
              class=" btn"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasLeft"
              aria-controls="offcanvasLeft"
            >
              <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
              </svg>
            </button>
          </div>
          <a class="navbar-brand" href="/">
            <img
              v-if="this.settings_info.logo != 'default' && this.is_auth >= 0"
              v-bind:src="this.server + '/img/' + this.settings_info.logo" 
              class="img-fluid logo-organization"
              alt="Логотип организации"
            >
            <h2
              v-else
              class="text-center"
            >
              <b>PAD</b>
            </h2>
            
          </a>
        </div>
        <div class="collapse navbar-collapse d-flex d-lg-block d-none" id="navbarSupportedContent">
          <ul v-if="this.is_auth >= 0" class="navbar-nav view-menu mb-2 mb-lg-0">
            <li class="nav-item">
              <a 
                v-bind:href="this.user_info.role == 'Администратор' || this.user_info.role == 'Преподаватель' ? this.server + '/journal/list' : this.server + '/journal'"
              >Журнал</a>
            </li>
            <li
              v-if="this.user_info.role == 'Студент' || this.user_info.role == 'Родитель'" 
              class="nav-item"
            >
              <a
                v-bind:href="this.server + '/timetable/all/teacher?organization_id=' + this.user_info.organization_id"
              >Преподаватели</a>
            </li>
            <li
              v-if="this.user_info.role == 'Родитель'" 
              class="nav-item"
            >
              <a
                href="#"
              >Статистика успеваемости</a>
            </li>
            <li
              v-if="this.user_info.role == 'Администратор' || this.user_info.role == 'Директор'"
              class="nav-item dropdown"
            >
              <a
                class="dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                v-on:click="group_list(this.user_info.organization_id, this.user_info.id)"
              >
                Расписние
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a
                    v-bind:href="this.server + '/timetable/all/teacher?organization_id=' + this.user_info.organization_id"
                  >Преподаватели</a>
                </li>
                <li
                  v-for="i in this.groups"
                  v-bind:key="i"
                >
                  <a 
                    v-bind:href="this.server + '/timetable/all/group?organization_id=' + this.user_info.organization_id + '&&filial_id=' + i[1]"
                  >{{ i[0].name }}</a>
                </li>
              </ul>
            </li>

            <li
              v-if="this.user_info.role == 'Директор' || this.user_info.role == 'Администратор'"
              class="nav-item"
            >
              <a 
                v-bind:href="this.server + '/filial/all/student?organization_id=' + this.user_info.organization_id"
              >Студенты</a>
            </li>
            <li
            v-if="this.user_info.role == 'Директор' || this.user_info.role == 'Администратор'"
              class="nav-item"
            >
              <a
              href="#"
              class="header_btn"
              data-bs-toggle="modal"
              data-bs-target="#loginToStudentModal"
              >Войти под студентом</a>
            </li>
            <li
              v-if="this.user_info.role == 'Студент'"
              class="nav-item"
            >
              <a href="/journal-show">Домашние задания</a>
            </li>
          </ul>
          <ul
            v-if="this.is_auth >= 0"
            v-bind:class="this.settings_info.logo == 'default' ? 'navbar-nav me-auto mb-2 l-60 w-50 mb-lg-0' : 'navbar-nav me-auto mb-2 w-50 mb-lg-0'"
          >
            
            <li class="nav-item">
              <a class="nav-link position-relative" aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                  <path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z"></path>
                  <circle cx="8" cy="8" r="1.5"></circle>
                  <circle cx="12" cy="12" r="1.5"></circle>
                  <circle cx="16" cy="16" r="1.5"></circle>
                </svg>
                <span id="new_game" class="badge bg-danger">new</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link position-relative" aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                  <path d="m13.293 2.707.818.818L3.318 14.318C2.468 15.168 2 16.298 2 17.5s.468 2.332 1.318 3.183C4.169 21.532 5.299 22 6.5 22s2.331-.468 3.182-1.318L20.475 9.889l.818.818 1.414-1.414-8-8-1.414 1.414zm3.182 8.354-2.403-2.404-1.414 1.414 2.403 2.404-1.414 1.415-.99-.99-1.414 1.414.99.99-1.415 1.415-2.403-2.404L7 15.728l2.403 2.404-1.136 1.136c-.945.944-2.59.944-3.535 0C4.26 18.795 4 18.168 4 17.5s.26-1.295.732-1.768L15.525 4.939l3.535 3.535-2.585 2.587z"></path>
                </svg>
                <span class="position-absolute bottom-0 start-50 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link position-relative" aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                  <path d="M12 2C6.486 2 2 5.589 2 10c0 2.908 1.898 5.516 5 6.934V22l5.34-4.005C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.67 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z"></path>
                </svg>
                <span class="position-absolute bottom-0 start-50 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link position-relative" aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);">
                  <path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.998 10H4V7h12l.001 4.999L16 12l.001.001.001 4.999z"></path>
                </svg>
                <span class="position-absolute bottom-0 l-30 translate-middle p-1 bg-danger border border-light rounded-circle">
                  <span class="visually-hidden">New alerts</span>
                </span>
              </a>
            </li>
          </ul>
          
          <ButtonComponent
            v-if="this.is_auth == -1"
            id="login_desktop"
            text="Войти"
            v-bind:link=this.link_signin
            css_class="btn right"
            wrapper_css_class="w-100"
          />
          
          <div class="w-100">
            <button
              v-if="this.is_auth >= 0"
              id="btn_menu"
              type="button"
              class="right btn"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasRight"
              aria-controls="offcanvasRight"
            >
              <svg xmlns="http://www.w3.org/2000/svg" style="fill: rgba(0, 0, 0, 1);">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="loginToStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <ButtonComponent
                text="Войти"
                css_class="btn"
                wrapper_css_class="w-100"
              />
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
  
<script>
import axios from 'axios'
import ButtonComponent from './ButtonComponent.vue'

export default {
  data () {
    return {
      count_dropdown: 0,
      alert: null,
      groups: [],
      filial_list: null,
      link_signin: '/signin',
      link_signout: '/signout'
    }
  },
  props: {
    is_auth: Number,
    user_info: Object,
    settings_info: Object,
    server: String,
    server_journal: String
  },
  components: {
    ButtonComponent
  },
  methods: {
     show_filial (organizationId, userId) {
       axios.get(this.server + '/api/filial/show?organization_id=' + organizationId,
      {
        headers: {
          'Content-Type': 'application/json',
        }
      })
      .then((response) => {
        for (var i = 0; i < response.data[0].length; i++) {
          if (userId == response.data[0][i].admin_id) {
            this.show_list(organizationId, response.data[0][i].id)
          } else {
            this.show_list(organizationId, response.data[0][i].id)
          }
        }
      })
      .catch((error) => {
        this.alert = 'Ошибка загрузки списка филиалов!'
        // Активация всплывающего сообщения
        document.getElementById('toast').style.opacity = 1
      })
    },
    async show_list (organizationId, filialId) {
      if (this.user_info.role == 'Администратор' || this.user_info.role == 'Директор') {
        await axios.get(this.server_journal + '/api/group/list?organization_id=' + organizationId + '&&filial_id=' + filialId,
        {
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then((response) => {
          for (var i = 0; i < response.data[0].length; i++) {
            this.groups.push([response.data[0][i], filialId])
          }
          this.count_dropdown = 1
        })
        .catch((error) => {
          this.alert = 'Ошибка загрузки списка групп на стороне сервера, обратитесь в тех-поддержку.'
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1
        })
      }
    },
    group_list (organizationId, userId) {
      if (this.count_dropdown == 0) {
        this.show_filial(organizationId, userId)
      }
    }
  }
}
</script>