function start_app() {
    fade_in();
    window.addEventListener("scroll", fade_in);
    populateTable();
}

function fade_in() {
    var ele = document.getElementsByClassName("fade_me_in");

    if (ele.length <= 0) { return }

    for (i = 0; i < ele.length; i++) {

        let bottom_of_object = ele[i].getBoundingClientRect().bottom
        let bottom_of_window = window.innerHeight + window.scrollY / 5

        if (bottom_of_window > bottom_of_object) {
            ele[i].classList.add('faded_in');
            ele[i].classList.remove('fade_me_in');
        }
    }
}