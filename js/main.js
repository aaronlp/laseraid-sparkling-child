jQuery( document ).ready( function( $ ) {
    /*$('.small-img').hover(function(){
       $(this).siblings('.hover-img').fadeIn();
    }
    ,function(){
            $(this).siblings('.hover-img').fadeOut();
        });*/



    var windowWidth = jQuery(window).width();
    //Bulk add to cart ajax
    window.productid = new Array();
    window.productqt = new Array();
    $('.bulk-add-to-cart button').click(function () {
        $('.product .quantity.hide-add-btn').each(function(){
            var qty = $(this).find('input.qty').val();
            var pid = $(this).find('input[type="hidden"]').val();
            if(qty > 0){
                window.productid.push(pid);
                window.productqt.push(qty);
            }
        });
        if(window.productid.length > 0) {
            $.post(
                AJAX.ajaxurl,
                {
                    // wp ajax action
                    action: 'bulk_add_to_cart',
                    // vars
                    product_id: window.productid,
                    product_quantity: window.productqt,
                    // send the nonce along with the request
                    nextNonce: AJAX.nextNonce
                },
                function (response) {
                    $('.popup-wrapper.add-to-cart-response .popup-container').html(response);
                    $('.popup-overlay, .popup-wrapper.add-to-cart-response').show();
                    window.productid = [];
                    window.productqt = [];
                }
            );
        }else{
            $('.popup-wrapper.add-to-cart-response .popup-container').html("<p class='warning'><span><i class='fa fa-exclamation-triangle'></i></span>You have not selected any products. Please select at least one product to add to your cart.</p>");
            $('.popup-overlay, .popup-wrapper.add-to-cart-response').show();
            $('.popup-wrapper.add-to-cart-response .close').addClass('error');
        }
        return false;
    });
    $('.popup-wrapper .close').click(function(){
        $('.popup-overlay, .popup-wrapper').hide();
    });
    $('.popup-wrapper.add-to-cart-response .close').click(function(){
        if(!$(this).hasClass('error')){
            location.reload();
        }
    });
    //remove add to cart button on shop page
    $('.hide-add-btn button').remove();
    //product list add clear
    if (windowWidth > 600) {
    var i = 1
    $('.product-page .products li').each(function(){
        if(i%3 == 0){
            $(this).addClass("third-item");
            $( "<div class='clear'></div>" ).insertAfter( this );
        }
        i++;
    });
    }//1150
    //top menu cart dropdown
    var items = $('#widget_shopping_mini_cart-2 .product_list_widget li.mini_cart_item').length;
    if( items > 3 ){
        $('#widget_shopping_mini_cart-2 .product_list_widget').addClass('over');
    }
    $('#widget_shopping_mini_cart-2 .widget-title').html('<a>My Cart ('+items+')</a>');
    $('#widget_shopping_mini_cart-2').hover(function(){
        $('#widget_shopping_mini_cart-2 .dropdown').show();
    }, function(){
        $('#widget_shopping_mini_cart-2 .dropdown').hide();
    });
    //hide the original update cart button and continue same action on click of new button
    $('table.cart .actions').hide();
    $('.update-cart').click(function (event) {
        event.preventDefault();
        $('.actions input[name="update_cart"]').click();
    });

    /*$( document ).on( 'change', '.quantity .qty', function() {
        $( this ).parent( '.quantity' ).next( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).val() );
    });*/


    if (windowWidth > 1150) {
        var headerHeight = $('header#branding').height();
        $('#page').css({'padding-top' : headerHeight});
    }//1150
    /*adding padding inss asdf body*/


    /*login page height script*/
    if (windowWidth > 768) {
        var signup = jQuery('.register-block').outerHeight();
        jQuery('.login-block').css({'height' : signup});
    }//1150
    /*Navigation button script*/
    $('.menu-toggle').click(function () {
        $('.menu-toggle').toggleClass('open');
        $('.navigation').slideToggle();
    });

    if (windowWidth > 1150) {
        jQuery('.navigation ul li.item-115').hover(function(){
            jQuery('#branding').toggleClass('hover');
        });
        jQuery('.navigation ul li.item-116').hover(function(){
            jQuery('#branding').toggleClass('hover-img');
        });

        //tabs
        jQuery('ul.tabLinks').each(function () {
            // For each set of tabs, we want to keep track of
            // which tab is active and it's associated content
            var jQueryactive, jQuerycontent, jQuerylinks = jQuery(this).find('a');

            // If the location.hash matches one of the links, use that as the active tab.
            // If no match is found, use the first link as the initial active tab.
            jQueryactive = jQuery(jQuerylinks.filter('[href="' + location.hash + '"]')[0] || jQuerylinks[0]);
            jQueryactive.addClass('active');

            jQuerycontent = jQuery(jQueryactive[0].hash);

            // Hide the remaining content
            jQuerylinks.not(jQueryactive).each(function () {
                jQuery(this.hash).hide();
            });

            // Bind the click event handler
            jQuery(this).on('click', 'a', function (e) {
                // Make the old tab inactive.
                jQueryactive.removeClass('active');
                jQuerycontent.hide();

                // Update the variables with the new link and content
                jQueryactive = jQuery(this);
                jQuerycontent = jQuery(this.hash);

                // Make the tab active.
                jQueryactive.addClass('active');
                jQuerycontent.show();

                // Prevent the anchor's default click action
                e.preventDefault();
            });
        });//tabs
        //var toptxtht = jQuery('.pageTexts').outerHeight();
        //
        //jQuery('.pageTop .topImg').height(toptxtht);
    }//1150

    $("<select />").appendTo(".widget_product_categories");

// Create default option "Go to..."
    $("<option />", {
        "selected": "selected",
        "value"   : "",
        "text"    : "Select Categories..."
    }).appendTo(".widget_product_categories select");

// Populate dropdown with menu items
    $(".widget_product_categories a").each(function() {
        var el = $(this);
        $("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo(".widget_product_categories select");
    });
    $(".widget_product_categories select").change(function() {
        window.location = $(this).find("option:selected").val();
    });
});