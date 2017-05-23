$(function() {
    $(".tabToggle").click(function(e) {
        console.log('clicked');
        var $tab = $($(this).attr('href'));
        $(".productCatTab").removeClass('visible');
        $tab.addClass('visible');
    });
});