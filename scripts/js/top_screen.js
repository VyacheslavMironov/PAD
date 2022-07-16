window.addEventListener('scroll', function (e) {
    var el = document.getElementById('button_top');
    var position_scroll = window.pageYOffset;
    var height_global = window.outerHeight;
    if ((window.outerHeight - window.pageYOffset) >= 600) {
        el.style.display = "flex";
    }
    else {
        el.style.display = "none";
    }
});
function eventClickButtonTop() {
    return window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}
