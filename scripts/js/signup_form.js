/* Класс валидирующий форму: проверяет правльность заполнения полей */
var employee = {
    nameOrganization: function (text) { },
    passwordValidate: function (password1, password2) { },
    userData: function (ferst_name, last_name, email, password) { }
};
/* Обработчик формы */
var FormSteps = /** @class */ (function () {
    function FormSteps(formTwo, formFree) {
        this.form_two = formTwo;
        this.form_free = formFree;
    }
    return FormSteps;
}());
new FormSteps(document.getElementById('two_form'), document.getElementById('free_form'));
