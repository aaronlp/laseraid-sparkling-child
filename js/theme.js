jQuery(document).ready(function($) {
    // replace the enquiry modal dropdown with the generated stuff

    $('[id^="wpcf7-f99"]').find('.HowYouHear > select').prepend('<option value="" selected>How did you hear about us?*</option>');
    $('[id^="wpcf7-f99"]').find('.TypeofEnquiry > select').html($('#equipment-list').html());
    $('[id^="wpcf7-f99"]').find('.TypeofEnquiry > select').prepend('<option value="" selected>Type of Enquiry*</option>');

    $('#wds-tweets').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
        }
    });

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    // product cat tabs
    if ($(".productCatTab").length > 0) {
        var hash = window.location.hash;
        var $el;
        if (hash !== '') {
            $el = $(".productCatTabToggle[href='"+ hash + "']");
        } else {
            $el = $(".productCatTabToggle").first();
        }
        toggleProductCatTab($el);
    }

    $(".productCatTabToggle").click(function () {
        toggleProductCatTab($(this));
    });

    $("#acymailing_module_formAcymailing79101").click(function() {
        $("#acymailing_fulldiv_formAcymailing79101").slideToggle("fast");
    });

    $("a.eqBtn").prettyPhoto();

    $('.navbar ul li.menu-item-25').hover(function() {
        if ($('.navigations .pull-right > .navbar-ex1-collapse').css('margin-top') != '175px') {
            $('#masthead').toggleClass('hover-menu');
        }
    });

    $('.equipment-contact').click(function (e) {
        var $formEl = $('[id^="wpcf7-f99"]');
        var $typeEl = $formEl.find('.TypeofEnquiry');
        var $howEl = $formEl.find('.HowYouHear');
        var $postcodeEl = $formEl.find('.post_code');
        $formEl.find('.rightCol').append($typeEl.prop('outerHTML'));
        $formEl.find('.rightCol').append($howEl.prop('outerHTML'));
        $formEl.find('.rightCol').append($postcodeEl.prop('outerHTML'));

        $formEl.find('.TypeofEnquiry > select').css('display', 'none');
        $formEl.find('.TypeofEnquiry > select').html('<option value="' + $(this).data('equipment-name') + '" selected></option>');
        $formEl.find('.HowYouHear > select').css('display', 'none');
        $formEl.find('.HowYouHear > select').html('<option value="Equipment Enquiry" selected></option>');
        $formEl.find('.post_code > input').css('display', 'none');
        $formEl.find('.post_code > input').val('-');

        var $nameEl = $formEl.find('.full_name');
        var $emailEl = $formEl.find('.email');
        var $phoneEl = $formEl.find('.phone');

        $formEl.find('.leftCol').html('');
        $formEl.find('.leftCol').append($nameEl.prop('outerHTML'));
        $formEl.find('.leftCol').append($emailEl.prop('outerHTML'));
        $formEl.find('.rightCol').prepend($phoneEl.prop('outerHTML'));

        $formEl.find('.message > textarea').css('display', 'none');
        $formEl.find('.message > textarea').val('-');
    });

    $('.navbar ul li.menu-item-577').hover(function() {
        if ($('.navigations .pull-right > .navbar-ex1-collapse').css('margin-top') != '175px') {
            $('#masthead').toggleClass('hover-img');
        }
    });

    $('#menu-item-25').click(function(e) {
        if ($('.navigations .pull-right > .navbar-ex1-collapse').css('margin-top') == '175px') {
            e.preventDefault();
            $(this).children('a').toggleClass('toggle-menu');
            $(this).find('.dropdown-menu').toggleClass('dropdown-visible');
        }
    });

    $('.dropdown-menu a').click(function(e) {
        e.stopPropagation();
    });

    $('#menu-item-577').click(function(e) {
        console.log('clicked');
        if ($('.navigations .pull-right > .navbar-ex1-collapse').css('margin-top') == '175px') {
            e.preventDefault();
            $(this).children('a').toggleClass('toggle-menu');
            $(this).find('.dropdown-menu').toggleClass('dropdown-visible');
        }
    });

    function toggleProductCatTab($tabLink)
    {
        $('.productCatTabToggle').removeClass('active');
        $tabLink.addClass('active');
        $(".productCatTab").hide();
        $($tabLink.attr("href") + '-tab').fadeIn();
    }
});