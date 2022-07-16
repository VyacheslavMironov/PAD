class Click{
    // На случай если не будет данных для этого дня недели
    addStringTable(): void{
        var data = document.querySelectorAll<HTMLElement>('#week').length;
        for (var i=0; data > i; i++){
            console.log(i-1)
            
            if (document.querySelectorAll('#week')[i].classList.length == 2){
                // СДЕЛАТЬ СКРЫТОЕ ПОЛЕ ДЛЯ x-copy
                document.querySelectorAll<HTMLElement>('#data_form')[i].style.display = "contents";
                document.querySelectorAll<HTMLElement>("#data_form")[i].appendChild(
                    document.querySelector<HTMLElement>("#x-copy").cloneNode(true)
                );
            }
        }
        document.querySelector<HTMLElement>('#x-dn').style.display = "contents";
        document.querySelector<HTMLElement>('#x-dn').style.display = "flex";
        document.querySelector<HTMLElement>('#error_data').style.display = "none";
        // document.querySelectorAll<HTMLElement>('#data_form')[Number(ids)-1].style.display = "contents";
    }

    /**
     * weekListActivate - это метод реализует возможность выбора
     * дня недели, для определения урока на странице журнала 
     * для администратора.
     */
    public weekListActivate() {
        document.querySelector<HTMLElement>('#error_data').style.display = "none";
        // Вывод элементов, но или не вывод
        for (var i=0; document.querySelectorAll<HTMLElement>('#week').length > i; i++){
            document.querySelectorAll<HTMLElement>('#week')[i].onclick = function(event){
                document.querySelector<HTMLElement>('#start_info').style.display = "none";
                const el: any = event.target;
                let ids: string =  el.title;

                for (var i=0; document.querySelectorAll<HTMLElement>('#week').length > i; i++){
                    let element = document.querySelectorAll<HTMLElement>('#week')[i];
                    let el_id: string = element.title;
                    // Закрываем всё ненужное
                    document.querySelectorAll<HTMLElement>('#data_form')[i].style.display = "none";
                    // Открываем нужный элемент по ids
                    try{
                        if (document.querySelectorAll<HTMLElement>('#data_form')[Number(ids)-1].innerHTML == ''){
                            document.querySelector<HTMLElement>('#x-dn').style.display = "none";
                            document.querySelector<HTMLElement>('#error_data').style.display = "flex";
                        } else {
                            document.querySelector<HTMLElement>('#x-dn').style.display = "contents";
                            document.querySelector<HTMLElement>('#x-dn').style.display = "flex";
                            document.querySelector<HTMLElement>('#error_data').style.display = "none";
                            document.querySelectorAll<HTMLElement>('#data_form')[Number(ids)-1].style.display = "contents";
                        }
                    } catch(TypeError){
                        document.querySelector<HTMLElement>('#error_data').style.display = "flex";
                        document.querySelector<HTMLElement>('#x-dn').style.display = "none";
                    }
                    
                    el_id == ids ? element.classList.add('active') : element.classList.remove('active') ;
                } 
            }
        }
    }

    // Активирует спрятанный блок Энок и Бэнок
    public getStudentsAdditionDataOpen(): void {
        for (var i=0; document.querySelectorAll<HTMLElement>('#input_data').length > i; i++){
            document.querySelectorAll<HTMLElement>('#input_data')[i].onclick = function(event){
                var end_month_date = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
                const el: any = event.target;
                var el_id = ((Number(end_month_date) * Number(el.dataset.id)) + Number(el.dataset.day));
                // Открытие элемента дополнительного ввода
                document.querySelectorAll<HTMLElement>('#data_detail')[el_id].style.display = "flex";
            }
        }
    }

    // Закрывает дополнительное окно для проставки оценок
    public getStudentsAdditionDataClose(): void {
        for (var i=0; document.querySelectorAll<HTMLElement>('#not_data').length > i; i++){
            document.querySelectorAll<HTMLElement>('#not_data')[i].onclick = function(event){
                var end_month_date = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
                const el: any = event.target;
                var el_id = ((Number(end_month_date) * Number(el.dataset.id)) + Number(el.dataset.day));
                try{
                    // Закрытие элемента дополнительного ввода
                    document.querySelectorAll<HTMLElement>('#data_detail')[el_id].style.display = "none";
                } catch(TypeError) {    // А если ошибка то так делаемс, но это не торт
                    for(var x = 0; document.querySelectorAll<HTMLElement>('#data_detail').length > x; x++){
                        if (document.querySelectorAll<HTMLElement>('#data_detail')[x].style.display == "flex"){
                            if ((x - el_id) == 1){
                                document.querySelectorAll<HTMLElement>('#data_detail')[el_id - 1].style.display = "none";
                            }
                                
                        }
                    }
                }
                /* 
                Есть другая идея как решить проблему, просто не даём открыть больше одного data_detail
                При попытке открыть второй, первый закрываем и открываем второй.
                */
                
            }
        }
    }
}

var appClick = new Click();
try{
    appClick.weekListActivate();
} catch {}

try{
    appClick.getStudentsAdditionDataOpen();
} catch {}

try{
    appClick.getStudentsAdditionDataClose();
} catch {}