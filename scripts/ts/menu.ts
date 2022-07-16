// Меню изначально закрытое
document.getElementById('menu').style.display = "none";


class UserMenu{
    // Логика открытия и закрытия меню
    control(){
        var el = document.getElementById('menu');
        switch(el.style.display){
            case "none":
                el.style.display = "block";
                break;

            case "block":
                el.style.display = "none";
                break;
        }
    }

    public scrolling(): void {
        window.addEventListener('scroll', function(e){
            if (window.pageYOffset > 18){
                document.getElementById('menu').classList.remove('sandarted');
                document.getElementById('menu').classList.add('scroll_top');
            } else if (window.pageYOffset < 18){
                document.getElementById('menu').classList.remove('scroll_top');
                document.getElementById('menu').classList.add('sandarted');
            }
        });
    }
};

var menu = new UserMenu();
var scrolling = menu;
scrolling.scrolling();
