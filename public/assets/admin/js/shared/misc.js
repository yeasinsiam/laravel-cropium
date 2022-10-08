var ChartColor = ["#5D62B4", "#54C3BE", "#EF726F", "#F9C446", "rgb(93.0, 98.0, 180.0)", "#21B7EC", "#04BCCC"];
var primaryColor = getComputedStyle(document.body).getPropertyValue('--primary');
var secondaryColor = getComputedStyle(document.body).getPropertyValue('--secondary');
var successColor = getComputedStyle(document.body).getPropertyValue('--success');
var warningColor = getComputedStyle(document.body).getPropertyValue('--warning');
var dangerColor = getComputedStyle(document.body).getPropertyValue('--danger');
var infoColor = getComputedStyle(document.body).getPropertyValue('--info');
var darkColor = getComputedStyle(document.body).getPropertyValue('--dark');
var lightColor = getComputedStyle(document.body).getPropertyValue('--light');
(function ($) {
    'use strict';
    $(function () {
        var body = $('body');
        var contentWrapper = $('.content-wrapper');
        var scroller = $('.container-scroller');
        var footer = $('.footer');
        var sidebar = $('#sidebar');

        //Add active class to nav-link based on url dynamically
        //Active class can be hard coded directly in html file also as required
        // if (!$('#sidebar').hasClass("dynamic-active-class-disabled")) {
        //     var current = location.pathname.split("/");
        //     console.log(current)
        //     // $('#sidebar >.nav > li:not(.not-navigation-link) a').each(function () {
        //     //     var $this = $(this);
        //     //     // if (current === "") {
        //     //     //     //for root url
        //     //     //     if ($this.attr('href').indexOf("index.html") !== -1) {
        //     //     //         $(this).parents('.nav-item').last().addClass('active');
        //     //     //         if ($(this).parents('.sub-menu').length) {
        //     //     //             $(this).addClass('active');
        //     //     //         }
        //     //     //     }
        //     //     // } else {


        //     //     //     //for othr location path
        //     //     //     if (!isNaN(location.pathname.split("/").slice(-2)[0].replace(/^\/|\/$/g, ''))) {
        //     //     //         const dir = location.pathname.split('/');
        //     //     //         console.log(dir);
        //     //     //         //For post edit route
        //     //     //         if (dir[2] === "posts" && dir[4] === "edit") {
        //     //     //             $('#all-post-menu').addClass('active')
        //     //     //             $('#ui-post').addClass('show')
        //     //     //         }

        //     //     //         //For category edit route
        //     //     //         if (dir[2] === "post-category" && dir[4] === "edit") {
        //     //     //             $('#category-menu').addClass('active')
        //     //     //             $('#ui-post').addClass('show')
        //     //     //         }
        //     //     //     }
        //     //     //     //for other url
        //     //     //     if ($this.attr('href').indexOf(current) !== -1) {
        //     //     //         $(this).parents('.nav-item').last().addClass('active');
        //     //     //         if ($(this).parents('.sub-menu').length) {
        //     //     //             $(this).addClass('active');
        //     //     //         }
        //     //     //         if (current !== "index.html") {
        //     //     //             $(this).parents('.nav-item').last().find(".nav-link").attr("aria-expanded", "true");
        //     //     //             if ($(this).parents('.sub-menu').length) {
        //     //     //                 $(this).closest('.collapse').addClass('show');
        //     //     //             }
        //     //     //         }
        //     //     //     }
        //     //     // }
        //     // })
        // }

        //Close other submenu in sidebar on opening any
        // $("#sidebar > .nav > .nav-item > a[data-toggle='collapse']").on("click", function () {
        //     $("#sidebar > .nav > .nav-item").find('.collapse.show').removeClass('hide');

        // });


        //checkbox and radios
        $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    });
    $('.dropdown-toggle').dropdown()



    //file upload code
    $(document).on('change', '#image', function (e) {
        $('#thumbnail-text').val(e.target.files[0].name)
    })



})(jQuery);
