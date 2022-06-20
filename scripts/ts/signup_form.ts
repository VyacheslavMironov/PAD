interface FormValidate {
    is_valid(input: string): void;
    passwordValidate(password1: string, password2: string): any;
}

/* Класс валидирующий форму: проверяет правльность заполнения полей */
let employee: FormValidate = {
    is_valid: function(input: string, count?: number): any{
        // Длинна входной строки
        let len: number = input.length;
        if (len > 0){
            return {status: true, output: input}
        } else {
            return {status: false, output: "У вас есть незаполненные поля!"}
        }
    },
    passwordValidate: function(password1: string, password2: string): any{
        // Проверка на совпадение паролей
        if (password1 == password2){
            return {status: true, output: password1}
        } else {
            return {status: false, output: "Пароли не совпадают"}
        }
    }
}


var data: any = {};

/* Обработчик формы */
class FormSteps {
    form_two: HTMLElement;
    form_free: HTMLElement;

    constructor(formTwo: HTMLElement, formFree: HTMLElement) {
        this.form_two = formTwo;
        this.form_free = formFree;
    }

    twoSteps(){
        const organization_name = employee.is_valid(document.querySelector<HTMLInputElement>("#organization_name").value);
        const organization_type = document.querySelector<HTMLInputElement>("#organization_type").value;
        // Запись данных в массив
        console.log(organization_name)
        if (organization_name['status'] == true){
            data['organization_name'] = organization_name['output'];
            data['organization_type'] = organization_type
            // Поведение блоков
            document.querySelector<HTMLElement>('#step_count').innerHTML = "2";
            document.querySelector<HTMLDivElement>('#one_form').style.display = "none";
            return document.querySelector<HTMLDivElement>('#two_form').style.display = "block";
        } else if (organization_name['status'] == false) {
            /* 
                Вывод ошибки но пока нет в макете
            */
        }
    }

    freeSteps(){
        const ferst_name = employee.is_valid(document.querySelector<HTMLInputElement>("#ferst_name").value);
        const last_name = employee.is_valid(document.querySelector<HTMLInputElement>("#last_name").value);
        const email = employee.is_valid(document.querySelector<HTMLInputElement>("#email").value);
        const password1 = employee.is_valid(document.querySelector<HTMLInputElement>("#password1").value);
        const password2 = employee.is_valid(document.querySelector<HTMLInputElement>("#password2").value);

        if (ferst_name['status'] == true || last_name['status'] == true || email['status'] == true){
            if (password1['status'] == true || password2['status'] == true){
                if (employee.passwordValidate(password1['output'], password2['output'])){

                    document.querySelector<HTMLElement>('#step_count').innerHTML = "3";
                    document.querySelector<HTMLDivElement>('#two_form').style.display = "none";
                    return document.querySelector<HTMLDivElement>('#free_form').style.display = "block";
                } else {}
            } else{}
        } else {}
    }
}

var two_form = document.querySelector<HTMLDivElement>('#two_form');
var free_form = document.querySelector<HTMLDivElement>('#free_form');
var formSteps = new FormSteps(two_form, free_form);