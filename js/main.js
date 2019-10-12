$(document).ready(function () {
    $(document).scroll(function () {
        var $nav = $(".ziad-navbar-homepage.sticky-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > 60);
    });

    $('#navbarNavDropdown .navbar-nav li a[href^="#"]').click(function(event) {
        event.preventDefault();
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -60);
    });

    $('#navi .navbar-nav li a[href^="#"]').click(function (event) {
        event.preventDefault();
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -100);
    });

    $("div#pop").on("click", function() {
        var imgUrl = $(this).css('background-image').replace('url("','').replace('")','');
        $('#imagepreview').attr('src', imgUrl);
        $('#imagemodal').modal('show');
    });
});




