"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["app_src_views_SignUpView_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/AlertComponent.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/AlertComponent.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
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
    close: function close() {
      document.getElementById('toast').style.opacity = 0;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/CardComponent.vue?vue&type=script&lang=js":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/CardComponent.vue?vue&type=script&lang=js ***!
  \**************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    css_class: {
      type: String,
      required: false
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/views/SignUpView.vue?vue&type=script&lang=js":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/views/SignUpView.vue?vue&type=script&lang=js ***!
  \******************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_AlertComponent_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/AlertComponent.vue */ "./app/src/components/AlertComponent.vue");
/* harmony import */ var _components_LoaderComponent_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/LoaderComponent.vue */ "./app/src/components/LoaderComponent.vue");
/* harmony import */ var _components_CardComponent_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/CardComponent.vue */ "./app/src/components/CardComponent.vue");
/* harmony import */ var _components_ButtonComponent_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/ButtonComponent.vue */ "./app/src/components/ButtonComponent.vue");





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      alert: '',
      message: '',
      organization_name: '',
      role: 'Директор',
      first_name: '',
      last_name: '',
      email: '',
      logotype: null,
      valueType: '',
      destination: null,
      onlineLesson: false,
      sistemChat: false,
      testConstruct: false,
      isGameTematic: false,
      userAccess: false,
      userEmail: false,
      isEnvaluation: false,
      addUser: false,
      uploadFile: false,
      tariff: '',
      isVideoPlatform: null,
      isChatPlatform: null,
      isTestPlatform: null,
      isGamePlatform: null
    };
  },
  components: {
    CardComponent: _components_CardComponent_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    ButtonComponent: _components_ButtonComponent_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    AlertComponent: _components_AlertComponent_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    LoaderComponent: _components_LoaderComponent_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  props: {
    server: String
  },
  methods: {
    tariffFrom: function tariffFrom(value) {
      if (value === 'Ежемесячный') {
        this.$refs.semiYearTariff.innerHTML = '';
        this.$refs.yearTariff.innerHTML = '';
        this.$refs.monthTariff.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(255 255 255);width: 1.4em;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>';
        this.tariff = value;
      } else if (value === 'Полугодовой') {
        this.$refs.monthTariff.innerHTML = '';
        this.$refs.yearTariff.innerHTML = '';
        this.$refs.semiYearTariff.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(255 255 255);width: 1.4em;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>';
        this.tariff = value;
      } else if (value === 'Годовой') {
        this.$refs.monthTariff.innerHTML = '';
        this.$refs.semiYearTariff.innerHTML = '';
        this.$refs.yearTariff.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(255 255 255);width: 1.4em;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>';
        this.tariff = value;
      }
    },
    uploadToFile: function uploadToFile() {
      var formData = new FormData();
      var imagefile = this.$refs.fileInput;
      formData.append("image", imagefile.files[0]);

      // Отправка данных
      axios__WEBPACK_IMPORTED_MODULE_0___default().post(this.server + '/api/upload/save', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (response) {
        this.logotype = response.data[0];
      })["catch"](function (error) {
        this.alert = 'Не удалось сохранить файл!';
        // Активация всплывающего сообщения
        document.getElementById('toast').style.opacity = 1;
      });
      return this.logotype;
    },
    stepsRegistration: function stepsRegistration(ids) {
      var self = this;
      if (ids === 1) {
        if (document.getElementById('organization_name').value === '') {
          this.alert = 'Заполните все поля!';
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1;
        } else {
          document.getElementById('step_one').style.display = 'none';
          document.getElementById('step_two').style.display = 'block';
          // Увеличение шага
          document.getElementById('step').innerText = String(ids + 1);
        }
      } else if (ids === 2) {
        if (document.getElementById('user_name').value !== '' && document.getElementById('user_surname').value !== '') {
          if (document.getElementById('user_email').value.includes('@') && document.getElementById('user_email').value.includes('.')) {
            // Увеличение шага
            document.getElementById('step').innerText = String(ids + 1);
            document.getElementById('step_two').style.display = 'none';
            document.getElementById('step_free').style.display = 'block';
            // END
          } else {
            this.alert = 'Поля заполнены не правильно!';
            // Активация всплывающего сообщения
            document.getElementById('toast').style.opacity = 1;
          }
        } else {
          this.alert = 'Заполните все поля!';
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1;
        }
      } else if (ids === 3) {
        // formDataFile
        if (this.valueType != '') {
          // Увеличение шага
          document.getElementById('step').innerText = String(ids + 1);
          document.getElementById('step_free').style.display = 'none';
          document.getElementById('step_foo').style.display = 'block';
        } else {
          this.alert = 'Заполните все поля!';
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1;
        }
      } else if (ids === 4) {
        if (this.tariff) {
          // Увеличение шага
          document.getElementById('step').innerText = String(ids + 1);
          document.getElementById('step_foo').style.display = 'none';
          // Активация лоадера
          document.getElementById('loader-bg').style.display = 'block';
          // END
          // Загрузка файла
          this.logotype = this.uploadToFile();
          // END
          // Отправка данных
          axios__WEBPACK_IMPORTED_MODULE_0___default().post(this.server + '/api/organization/create', {
            headers: {
              'Content-Type': 'application/json',
              'Access-Control-Allow-Origin': '*',
              'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'
            },
            user_access: this.userAccess,
            user_email: this.userEmail,
            is_envaluation: this.isEnvaluation,
            add_user: this.addUser,
            upload_file: this.uploadFile,
            logo: this.logotype,
            tariff_from: this.tariff,
            is_video_platform: this.isVideoPlatform,
            is_chat_platform: this.isChatPlatform,
            is_test_platform: this.isTestPlatform,
            is_game_platform: this.isGamePlatform,
            is_evaluation_type: this.valueType,
            destination: this.destination,
            name: this.organization_name,
            role: this.role,
            first_name: this.first_name,
            last_name: this.last_name,
            username: this.email,
            email: this.email
          }).then(function (response) {
            if (response.data[0].length == 4) {
              // Деактивация лоадера
              document.getElementById('loader-bg').style.display = 'none';
              self.alert = 'Проверьте почту, туда выслано сообщение для активации аккаунта.';
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1;
              document.getElementById('step_two').style.display = 'none';
              document.getElementById('step_free').style.display = 'none';
              // window.location.href = '/'
            }
          })["catch"](function (error) {
            if (error.response.status === 500) {
              // Деактивация лоадера
              document.getElementById('loader-bg').style.display = 'none';
              self.alert = 'Данная организация уже существует!';
              // Активация всплывающего сообщения
              document.getElementById('toast').style.opacity = 1;
              document.getElementById('step_two').style.display = 'none';
              document.getElementById('step_one').style.display = 'block';
              // Уменьшение шага
              document.getElementById('step').innerText = '1';
            }
          });
          // END
        } else {
          this.alert = 'Выберите тариф!';
          // Активация всплывающего сообщения
          document.getElementById('toast').style.opacity = 1;
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/AlertComponent.vue?vue&type=template&id=a952417a":
/*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/AlertComponent.vue?vue&type=template&id=a952417a ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "d-flex"
};
var _hoisted_2 = {
  "class": "toast-body"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _this = this;
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    id: "toast",
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(this.css_class),
    role: "alert",
    "aria-live": "assertive",
    "aria-atomic": "true"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(this.mess), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    type: "button",
    "class": "btn-close me-2 m-auto",
    onClick: _cache[0] || (_cache[0] = function () {
      return _this.close && _this.close.apply(_this, arguments);
    }),
    "data-bs-dismiss": "toast",
    "aria-label": "Close"
  })])], 2 /* CLASS */);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/CardComponent.vue?vue&type=template&id=9e1f9f0a":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/CardComponent.vue?vue&type=template&id=9e1f9f0a ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)($props.css_class == null ? '_card card col-lg-7 col-12 p-5 mx-auto' : $props.css_class)
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")], 2 /* CLASS */);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/LoaderComponent.vue?vue&type=template&id=1dd52ad8":
/*!********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/LoaderComponent.vue?vue&type=template&id=1dd52ad8 ***!
  \********************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  id: "loader-bg"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card col-lg-5 col-10 mx-auto loader"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "text-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "spinner-border",
  role: "status"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "visually-hidden"
}, "Loading...")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-center"
}, "Выполняется настройка рабочего окружения")], -1 /* HOISTED */);
var _hoisted_3 = [_hoisted_2];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, _hoisted_3);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/views/SignUpView.vue?vue&type=template&id=47713f36":
/*!**********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/views/SignUpView.vue?vue&type=template&id=47713f36 ***!
  \**********************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "container_fluid"
};
var _hoisted_2 = {
  "class": "container"
};
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "container mb-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-1"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "cirkle-round"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", {
  id: "step"
}, "1")])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-11"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", {
  "class": "text-center"
}, "Регистрация")])])], -1 /* HOISTED */);
var _hoisted_4 = {
  id: "step_one"
};
var _hoisted_5 = {
  "class": "mb-3"
};
var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Название вашей организации")], -1 /* HOISTED */);
var _hoisted_7 = {
  "class": "mb-3"
};
var _hoisted_8 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Тип учебного заведения")], -1 /* HOISTED */);
var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Школа"
}, "Школа", -1 /* HOISTED */);
var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Колледж"
}, "Колледж", -1 /* HOISTED */);
var _hoisted_11 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "Спортивная секция"
}, "Спортивная секция", -1 /* HOISTED */);
var _hoisted_12 = [_hoisted_9, _hoisted_10, _hoisted_11];
var _hoisted_13 = {
  id: "step_two"
};
var _hoisted_14 = {
  "class": "row"
};
var _hoisted_15 = {
  "class": "mb-3 col-6"
};
var _hoisted_16 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Ваше имя")], -1 /* HOISTED */);
var _hoisted_17 = {
  "class": "mb-3 col-6"
};
var _hoisted_18 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Ваша фамилия")], -1 /* HOISTED */);
var _hoisted_19 = {
  "class": "mb-3"
};
var _hoisted_20 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Электронная почта")], -1 /* HOISTED */);
var _hoisted_21 = {
  id: "step_free"
};
var _hoisted_22 = {
  "class": "mb-3"
};
var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Логотип организации")], -1 /* HOISTED */);
var _hoisted_24 = {
  type: "file",
  ref: "fileInput",
  name: "file",
  "class": "form-control"
};
var _hoisted_25 = {
  "class": "mb-3"
};
var _hoisted_26 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Тип оценочной единицы")], -1 /* HOISTED */);
var _hoisted_27 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "true"
}, "Числовая", -1 /* HOISTED */);
var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", {
  value: "false"
}, "Строковая", -1 /* HOISTED */);
var _hoisted_29 = [_hoisted_27, _hoisted_28];
var _hoisted_30 = {
  "class": "mb-3"
};
var _hoisted_31 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Расширения "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "(Не обязательно)")])], -1 /* HOISTED */);
var _hoisted_32 = {
  "class": "form-check"
};
var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "onlineLesson"
}, " Сервис онлайн занятий ", -1 /* HOISTED */);
var _hoisted_34 = {
  "class": "form-check"
};
var _hoisted_35 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "sistemChat"
}, " Система чатов ", -1 /* HOISTED */);
var _hoisted_36 = {
  "class": "form-check"
};
var _hoisted_37 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "testConstruct"
}, " Сервис тестирования ", -1 /* HOISTED */);
var _hoisted_38 = {
  "class": "form-check"
};
var _hoisted_39 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "isGameTematic"
}, " Тематически игровая платформа ", -1 /* HOISTED */);
var _hoisted_40 = {
  "class": "mb-3"
};
var _hoisted_41 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Права администратора "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "(Не обязательно)")])], -1 /* HOISTED */);
var _hoisted_42 = {
  "class": "form-check"
};
var _hoisted_43 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "userAccess"
}, " Администратор может заходить под студентом ", -1 /* HOISTED */);
var _hoisted_44 = {
  "class": "form-check"
};
var _hoisted_45 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "userEmail"
}, " Администратор может рассылать E-mail уведомления ", -1 /* HOISTED */);
var _hoisted_46 = {
  "class": "form-check"
};
var _hoisted_47 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "isEnvaluation"
}, " Администратор может изменять или выставлять оценки ", -1 /* HOISTED */);
var _hoisted_48 = {
  "class": "form-check"
};
var _hoisted_49 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "addUser"
}, " Администратор может добавлять пользователей в систему ", -1 /* HOISTED */);
var _hoisted_50 = {
  "class": "form-check"
};
var _hoisted_51 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-check-label",
  "for": "uploadFile"
}, " Администратор может загружать файлы в хранилище организации ", -1 /* HOISTED */);
var _hoisted_52 = {
  id: "step_foo"
};
var _hoisted_53 = {
  "class": "mb-3"
};
var _hoisted_54 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "form-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "Выберите тариф")], -1 /* HOISTED */);
var _hoisted_55 = {
  "class": "form-check"
};
var _hoisted_56 = {
  "class": "row"
};
var _hoisted_57 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-lg-9 col-7 tariff"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Ежемесячный "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "4160 т.р/мес")])], -1 /* HOISTED */);
var _hoisted_58 = {
  "class": "col-lg-3 col-5"
};
var _hoisted_59 = {
  "class": "btn w-100",
  "for": "option1"
};
var _hoisted_60 = {
  ref: "monthTariff"
};
var _hoisted_61 = {
  "class": "form-check"
};
var _hoisted_62 = {
  "class": "row"
};
var _hoisted_63 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-lg-9 col-7 tariff"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Полугодовой "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "8000 т.р/мес")])], -1 /* HOISTED */);
var _hoisted_64 = {
  "class": "col-lg-3 col-5"
};
var _hoisted_65 = {
  "class": "btn w-100",
  "for": "option2"
};
var _hoisted_66 = {
  ref: "semiYearTariff"
};
var _hoisted_67 = {
  "class": "form-check"
};
var _hoisted_68 = {
  "class": "row"
};
var _hoisted_69 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-lg-9 col-7 tariff"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Годовой "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "3750 т.р/мес")])], -1 /* HOISTED */);
var _hoisted_70 = {
  "class": "col-lg-3 col-5"
};
var _hoisted_71 = {
  "class": "btn w-100",
  "for": "option3"
};
var _hoisted_72 = {
  ref: "yearTariff"
};
var _hoisted_73 = {
  "class": "row"
};
var _hoisted_74 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-6"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "При выборе тарифа даётся тестовый период в 14 дней.")], -1 /* HOISTED */);
var _hoisted_75 = {
  "class": "col-6"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _this = this;
  var _component_LoaderComponent = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("LoaderComponent");
  var _component_AlertComponent = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("AlertComponent");
  var _component_ButtonComponent = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("ButtonComponent");
  var _component_CardComponent = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("CardComponent");
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("main", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Компонент загрузки "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_LoaderComponent), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" End "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Компонент сообщения "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_AlertComponent, {
    css_class: "toast align-items-cente right",
    mess: this.alert
  }, null, 8 /* PROPS */, ["mess"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_CardComponent, null, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "text",
        id: "organization_name",
        "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
          return $data.organization_name = $event;
        }),
        "class": "form-control"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $data.organization_name]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [_hoisted_8, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
        "class": "form-select",
        "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
          return $data.destination = $event;
        }),
        "aria-label": "Default select example"
      }, _hoisted_12, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $data.destination]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Компонент кнопки "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_ButtonComponent, {
        text: "Далее",
        onClick: _cache[2] || (_cache[2] = function ($event) {
          return _this.stepsRegistration(1);
        }),
        css_class: "btn mt-2 right"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END ")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [_hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "text",
        id: "user_name",
        "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
          return $data.first_name = $event;
        }),
        "class": "form-control"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $data.first_name]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [_hoisted_18, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "text",
        id: "user_surname",
        "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
          return $data.last_name = $event;
        }),
        "class": "form-control"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $data.last_name]])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [_hoisted_20, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "email",
        id: "user_email",
        "onUpdate:modelValue": _cache[5] || (_cache[5] = function ($event) {
          return $data.email = $event;
        }),
        "class": "form-control"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $data.email]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Компонент кнопки "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_ButtonComponent, {
        text: "Продолжить",
        onClick: _cache[6] || (_cache[6] = function ($event) {
          return _this.stepsRegistration(2);
        }),
        css_class: "btn mt-2 right"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END ")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_22, [_hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", _hoisted_24, null, 512 /* NEED_PATCH */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [_hoisted_26, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
        "class": "form-select",
        "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
          return $data.valueType = $event;
        }),
        "aria-label": "Default select example"
      }, _hoisted_29, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $data.valueType]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_30, [_hoisted_31, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
          return $data.onlineLesson = $event;
        }),
        id: "onlineLesson"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.onlineLesson]]), _hoisted_33]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_34, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[9] || (_cache[9] = function ($event) {
          return $data.sistemChat = $event;
        }),
        id: "sistemChat"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.sistemChat]]), _hoisted_35]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[10] || (_cache[10] = function ($event) {
          return $data.testConstruct = $event;
        }),
        id: "testConstruct"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.testConstruct]]), _hoisted_37]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_38, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[11] || (_cache[11] = function ($event) {
          return $data.isGameTematic = $event;
        }),
        id: "isGameTematic"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.isGameTematic]]), _hoisted_39])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_40, [_hoisted_41, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_42, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[12] || (_cache[12] = function ($event) {
          return $data.userAccess = $event;
        }),
        id: "userAccess"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.userAccess]]), _hoisted_43]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_44, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[13] || (_cache[13] = function ($event) {
          return $data.userEmail = $event;
        }),
        id: "userEmail"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.userEmail]]), _hoisted_45]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_46, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[14] || (_cache[14] = function ($event) {
          return $data.isEnvaluation = $event;
        }),
        id: "isEnvaluation"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.isEnvaluation]]), _hoisted_47]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_48, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[15] || (_cache[15] = function ($event) {
          return $data.addUser = $event;
        }),
        id: "addUser"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.addUser]]), _hoisted_49]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_50, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        "class": "form-check-input",
        type: "checkbox",
        "onUpdate:modelValue": _cache[16] || (_cache[16] = function ($event) {
          return $data.uploadFile = $event;
        }),
        id: "uploadFile"
      }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.uploadFile]]), _hoisted_51])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Компонент кнопки "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_ButtonComponent, {
        text: "Продолжить",
        onClick: _cache[17] || (_cache[17] = function ($event) {
          return _this.stepsRegistration(3);
        }),
        css_class: "btn mt-2 right"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END ")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_52, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_53, [_hoisted_54, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_55, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_56, [_hoisted_57, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_58, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "radio",
        "class": "btn-check",
        name: "options",
        onClick: _cache[18] || (_cache[18] = function ($event) {
          return $options.tariffFrom('Ежемесячный');
        }),
        id: "option1",
        autocomplete: "off"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", _hoisted_59, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_60, null, 512 /* NEED_PATCH */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Выбрать")])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_61, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_62, [_hoisted_63, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_64, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "radio",
        "class": "btn-check",
        name: "options",
        onClick: _cache[19] || (_cache[19] = function ($event) {
          return $options.tariffFrom('Полугодовой');
        }),
        id: "option2",
        autocomplete: "off"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", _hoisted_65, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_66, null, 512 /* NEED_PATCH */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Выбрать")])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_67, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_68, [_hoisted_69, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_70, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "radio",
        "class": "btn-check",
        name: "options",
        onClick: _cache[20] || (_cache[20] = function ($event) {
          return $options.tariffFrom('Годовой');
        }),
        id: "option3",
        autocomplete: "off"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", _hoisted_71, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_72, null, 512 /* NEED_PATCH */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Выбрать")])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_73, [_hoisted_74, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_75, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Компонент кнопки "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_ButtonComponent, {
        text: "Отправить",
        onClick: _cache[21] || (_cache[21] = function ($event) {
          return _this.stepsRegistration(4);
        }),
        css_class: "btn mt-2 right"
      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END ")])])])])];
    }),
    _: 1 /* STABLE */
  })])]);
}

/***/ }),

/***/ "./app/src/components/AlertComponent.vue":
/*!***********************************************!*\
  !*** ./app/src/components/AlertComponent.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _AlertComponent_vue_vue_type_template_id_a952417a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AlertComponent.vue?vue&type=template&id=a952417a */ "./app/src/components/AlertComponent.vue?vue&type=template&id=a952417a");
/* harmony import */ var _AlertComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AlertComponent.vue?vue&type=script&lang=js */ "./app/src/components/AlertComponent.vue?vue&type=script&lang=js");
/* harmony import */ var _var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_AlertComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_AlertComponent_vue_vue_type_template_id_a952417a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"app/src/components/AlertComponent.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./app/src/components/CardComponent.vue":
/*!**********************************************!*\
  !*** ./app/src/components/CardComponent.vue ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CardComponent_vue_vue_type_template_id_9e1f9f0a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CardComponent.vue?vue&type=template&id=9e1f9f0a */ "./app/src/components/CardComponent.vue?vue&type=template&id=9e1f9f0a");
/* harmony import */ var _CardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CardComponent.vue?vue&type=script&lang=js */ "./app/src/components/CardComponent.vue?vue&type=script&lang=js");
/* harmony import */ var _var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_CardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_CardComponent_vue_vue_type_template_id_9e1f9f0a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"app/src/components/CardComponent.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./app/src/components/LoaderComponent.vue":
/*!************************************************!*\
  !*** ./app/src/components/LoaderComponent.vue ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _LoaderComponent_vue_vue_type_template_id_1dd52ad8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LoaderComponent.vue?vue&type=template&id=1dd52ad8 */ "./app/src/components/LoaderComponent.vue?vue&type=template&id=1dd52ad8");
/* harmony import */ var _var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,_var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_LoaderComponent_vue_vue_type_template_id_1dd52ad8__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"app/src/components/LoaderComponent.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./app/src/views/SignUpView.vue":
/*!**************************************!*\
  !*** ./app/src/views/SignUpView.vue ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _SignUpView_vue_vue_type_template_id_47713f36__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SignUpView.vue?vue&type=template&id=47713f36 */ "./app/src/views/SignUpView.vue?vue&type=template&id=47713f36");
/* harmony import */ var _SignUpView_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SignUpView.vue?vue&type=script&lang=js */ "./app/src/views/SignUpView.vue?vue&type=script&lang=js");
/* harmony import */ var _var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_var_www_PAD_SettingIdentificationService_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_SignUpView_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_SignUpView_vue_vue_type_template_id_47713f36__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"app/src/views/SignUpView.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./app/src/components/AlertComponent.vue?vue&type=script&lang=js":
/*!***********************************************************************!*\
  !*** ./app/src/components/AlertComponent.vue?vue&type=script&lang=js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_AlertComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_AlertComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./AlertComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/AlertComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./app/src/components/CardComponent.vue?vue&type=script&lang=js":
/*!**********************************************************************!*\
  !*** ./app/src/components/CardComponent.vue?vue&type=script&lang=js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./CardComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/CardComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./app/src/views/SignUpView.vue?vue&type=script&lang=js":
/*!**************************************************************!*\
  !*** ./app/src/views/SignUpView.vue?vue&type=script&lang=js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SignUpView_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SignUpView_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./SignUpView.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/views/SignUpView.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./app/src/components/AlertComponent.vue?vue&type=template&id=a952417a":
/*!*****************************************************************************!*\
  !*** ./app/src/components/AlertComponent.vue?vue&type=template&id=a952417a ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_AlertComponent_vue_vue_type_template_id_a952417a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_AlertComponent_vue_vue_type_template_id_a952417a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./AlertComponent.vue?vue&type=template&id=a952417a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/AlertComponent.vue?vue&type=template&id=a952417a");


/***/ }),

/***/ "./app/src/components/CardComponent.vue?vue&type=template&id=9e1f9f0a":
/*!****************************************************************************!*\
  !*** ./app/src/components/CardComponent.vue?vue&type=template&id=9e1f9f0a ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CardComponent_vue_vue_type_template_id_9e1f9f0a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_CardComponent_vue_vue_type_template_id_9e1f9f0a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./CardComponent.vue?vue&type=template&id=9e1f9f0a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/CardComponent.vue?vue&type=template&id=9e1f9f0a");


/***/ }),

/***/ "./app/src/components/LoaderComponent.vue?vue&type=template&id=1dd52ad8":
/*!******************************************************************************!*\
  !*** ./app/src/components/LoaderComponent.vue?vue&type=template&id=1dd52ad8 ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_LoaderComponent_vue_vue_type_template_id_1dd52ad8__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_LoaderComponent_vue_vue_type_template_id_1dd52ad8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./LoaderComponent.vue?vue&type=template&id=1dd52ad8 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/components/LoaderComponent.vue?vue&type=template&id=1dd52ad8");


/***/ }),

/***/ "./app/src/views/SignUpView.vue?vue&type=template&id=47713f36":
/*!********************************************************************!*\
  !*** ./app/src/views/SignUpView.vue?vue&type=template&id=47713f36 ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SignUpView_vue_vue_type_template_id_47713f36__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SignUpView_vue_vue_type_template_id_47713f36__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./SignUpView.vue?vue&type=template&id=47713f36 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./app/src/views/SignUpView.vue?vue&type=template&id=47713f36");


/***/ })

}]);