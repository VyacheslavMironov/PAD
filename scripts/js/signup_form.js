/* Класс валидирующий форму: проверяет правльность заполнения полей */
var employee = {
    is_valid: function (input, count) {
        // Длинна входной строки
        var len = input.length;
        if (len > 0) {
            return { status: true, output: input };
        }
        else {
            return { status: false, output: "У вас есть незаполненные поля!" };
        }
    },
    passwordValidate: function (password1, password2) {
        // Проверка на совпадение паролей
        if (password1 == password2) {
            return { status: true, output: password1 };
        }
        else {
            return { status: false, output: "Пароли не совпадают" };
        }
    }
};
var data = {};
/* Обработчик формы */
var FormSteps = /** @class */ (function () {
    function FormSteps(formTwo, formFree) {
        this.form_two = formTwo;
        this.form_free = formFree;
    }
    FormSteps.prototype.twoSteps = function () {
        var organization_name = employee.is_valid(document.querySelector("#organization_name").value);
        var organization_type = document.querySelector("#organization_type").value;
        // Запись данных в массив
        console.log(organization_name);
        if (organization_name['status'] == true) {
            data['organization_name'] = organization_name['output'];
            data['organization_type'] = organization_type;
            // Поведение блоков
            document.querySelector('#step_count').innerHTML = "2";
            document.querySelector('#one_form').style.display = "none";
            return document.querySelector('#two_form').style.display = "block";
        }
        else if (organization_name['status'] == false) {
            /*
                Вывод ошибки но пока нет в макете
            */
        }
    };
    FormSteps.prototype.freeSteps = function () {
        var ferst_name = employee.is_valid(document.querySelector("#ferst_name").value);
        var last_name = employee.is_valid(document.querySelector("#last_name").value);
        var email = employee.is_valid(document.querySelector("#email").value);
        var password1 = employee.is_valid(document.querySelector("#password1").value);
        var password2 = employee.is_valid(document.querySelector("#password2").value);
        if (ferst_name['status'] == true || last_name['status'] == true || email['status'] == true) {
            if (password1['status'] == true || password2['status'] == true) {
                if (employee.passwordValidate(password1['output'], password2['output'])) {
                    document.querySelector('#step_count').innerHTML = "3";
                    document.querySelector('#two_form').style.display = "none";
                    return document.querySelector('#free_form').style.display = "block";
                }
                else { }
            }
            else { }
        }
        else { }
    };
    return FormSteps;
}());
var two_form = document.querySelector('#two_form');
var free_form = document.querySelector('#free_form');
var formSteps = new FormSteps(two_form, free_form);
