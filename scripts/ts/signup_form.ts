interface IUser {
    nameOrganization(text: string): void;
    passwordValidate(password1: string, password2: string): void;
    userData(ferst_name: string, last_name: string, email: string, password: string): void;
}

/* Класс валидирующий форму: проверяет правльность заполнения полей */
let employee: IUser = {
    nameOrganization: function(text): void{},
    passwordValidate: function(password1: string, password2: string): void{},
    userData: function(ferst_name: string, last_name: string, email: string, password: string): void{}
}


/* Обработчик формы */
class FormSteps {
    form_two: HTMLElement;
    form_free: HTMLElement;

    constructor(formTwo: HTMLElement, formFree: HTMLElement) {
        this.form_two = formTwo;
        this.form_free = formFree;
    }

}

new FormSteps(document.getElementById('two_form'), document.getElementById('free_form'))