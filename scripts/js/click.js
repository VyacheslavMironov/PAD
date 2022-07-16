var Click = /** @class */ (function () {
    function Click() {
    }
    // На случай если не будет данных для этого дня недели
    Click.prototype.addStringTable = function () {
        var data = document.querySelectorAll('#week').length;
        for (var i = 0; data > i; i++) {
            console.log(i - 1);
            if (document.querySelectorAll('#week')[i].classList.length == 2) {
                // СДЕЛАТЬ СКРЫТОЕ ПОЛЕ ДЛЯ x-copy
                document.querySelectorAll('#data_form')[i].style.display = "contents";
                document.querySelectorAll("#data_form")[i].appendChild(document.querySelector("#x-copy").cloneNode(true));
            }
        }
        document.querySelector('#x-dn').style.display = "contents";
        document.querySelector('#x-dn').style.display = "flex";
        document.querySelector('#error_data').style.display = "none";
        // document.querySelectorAll<HTMLElement>('#data_form')[Number(ids)-1].style.display = "contents";
    };
    /**
     * weekListActivate - это метод реализует возможность выбора
     * дня недели, для определения урока на странице журнала
     * для администратора.
     */
    Click.prototype.weekListActivate = function () {
        document.querySelector('#error_data').style.display = "none";
        // Вывод элементов, но или не вывод
        for (var i = 0; document.querySelectorAll('#week').length > i; i++) {
            document.querySelectorAll('#week')[i].onclick = function (event) {
                document.querySelector('#start_info').style.display = "none";
                var el = event.target;
                var ids = el.title;
                for (var i = 0; document.querySelectorAll('#week').length > i; i++) {
                    var element = document.querySelectorAll('#week')[i];
                    var el_id = element.title;
                    // Закрываем всё ненужное
                    document.querySelectorAll('#data_form')[i].style.display = "none";
                    // Открываем нужный элемент по ids
                    try {
                        if (document.querySelectorAll('#data_form')[Number(ids) - 1].innerHTML == '') {
                            document.querySelector('#x-dn').style.display = "none";
                            document.querySelector('#error_data').style.display = "flex";
                        }
                        else {
                            document.querySelector('#x-dn').style.display = "contents";
                            document.querySelector('#x-dn').style.display = "flex";
                            document.querySelector('#error_data').style.display = "none";
                            document.querySelectorAll('#data_form')[Number(ids) - 1].style.display = "contents";
                        }
                    }
                    catch (TypeError) {
                        document.querySelector('#error_data').style.display = "flex";
                        document.querySelector('#x-dn').style.display = "none";
                    }
                    el_id == ids ? element.classList.add('active') : element.classList.remove('active');
                }
            };
        }
    };
    // Активирует спрятанный блок Энок и Бэнок
    Click.prototype.getStudentsAdditionDataOpen = function () {
        for (var i = 0; document.querySelectorAll('#input_data').length > i; i++) {
            document.querySelectorAll('#input_data')[i].onclick = function (event) {
                var end_month_date = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
                var el = event.target;
                var el_id = ((Number(end_month_date) * Number(el.dataset.id)) + Number(el.dataset.day));
                // Открытие элемента дополнительного ввода
                document.querySelectorAll('#data_detail')[el_id].style.display = "flex";
            };
        }
    };
    // Закрывает дополнительное окно для проставки оценок
    Click.prototype.getStudentsAdditionDataClose = function () {
        for (var i = 0; document.querySelectorAll('#not_data').length > i; i++) {
            document.querySelectorAll('#not_data')[i].onclick = function (event) {
                var end_month_date = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
                var el = event.target;
                var el_id = ((Number(end_month_date) * Number(el.dataset.id)) + Number(el.dataset.day));
                try {
                    // Закрытие элемента дополнительного ввода
                    document.querySelectorAll('#data_detail')[el_id].style.display = "none";
                }
                catch (TypeError) { // А если ошибка то так делаемс, но это не торт
                    for (var x = 0; document.querySelectorAll('#data_detail').length > x; x++) {
                        if (document.querySelectorAll('#data_detail')[x].style.display == "flex") {
                            if ((x - el_id) == 1) {
                                document.querySelectorAll('#data_detail')[el_id - 1].style.display = "none";
                            }
                        }
                    }
                }
                /*
                Есть другая идея как решить проблему, просто не даём открыть больше одного data_detail
                При попытке открыть второй, первый закрываем и открываем второй.
                */
            };
        }
    };
    return Click;
}());
var appClick = new Click();
try {
    appClick.weekListActivate();
}
catch (_a) { }
try {
    appClick.getStudentsAdditionDataOpen();
}
catch (_b) { }
try {
    appClick.getStudentsAdditionDataClose();
}
catch (_c) { }
