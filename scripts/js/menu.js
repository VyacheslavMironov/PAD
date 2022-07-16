// Меню изначально закрытое
document.getElementById('menu').style.display = "none";
var UserMenu = /** @class */ (function () {
    function UserMenu() {
    }
    // Логика открытия и закрытия меню
    UserMenu.prototype.control = function () {
        var el = document.getElementById('menu');
        switch (el.style.display) {
            case "none":
                el.style.display = "block";
                break;
            case "block":
                el.style.display = "none";
                break;
        }
    };
    UserMenu.prototype.scrolling = function () {
        window.addEventListener('scroll', function (e) {
            if (window.pageYOffset > 18) {
                document.getElementById('menu').classList.remove('sandarted');
                document.getElementById('menu').classList.add('scroll_top');
            }
            else if (window.pageYOffset < 18) {
                document.getElementById('menu').classList.remove('scroll_top');
                document.getElementById('menu').classList.add('sandarted');
            }
        });
    };
    return UserMenu;
}());
;
var menu = new UserMenu();
var scrolling = menu;
scrolling.scrolling();
