<?php
get_header();
//error_reporting(E_ALL); ini_set('display_errors', 1);
?>
    <section class="main-content">
        <div class="wrapper">


            <?php
            if (have_posts()) : ?>

            <?php
            /** @var WP_Term[] $brands */
            /** @noinspection PhpInternalEntityUsedInspection */
            $brands = get_terms(['taxonomy' => 'brand', 'hide_empty' => 'true']);
            ?>
            <div id="secondary" class="sidebar">
                <aside class="wid">
                    <div class="links">
                        <h2>Brands</h2>
                    </div>
                    <ul class="product-categories">
                        <?php foreach ($brands as $brand): ?>
                            <li>
                                <a href="#" class="part_brand"
                                   data-term_id="<?php echo $brand->term_id ?>"><?php echo $brand->name ?></a>
                            </li>
                        <?php endforeach ?>
                        <a href="#" id="clear-brand" class="close-btn"><i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </ul>
                </aside>
                <aside class="wid">
                    <div class="links">
                        <h2>Types</h2>
                    </div>
                    <ul class="product-categories">
                        <?php foreach (get_field_object('part_type')['choices'] as $part_type) : ?>
                            <li>
                                <a href="#" class="part_type"><?php echo $part_type ?></a>
                            </li>
                        <?php endforeach ?>
                        <a href="#" id="clear-type" class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </ul>
                </aside>
                <aside class="wid">
                    <form id="parts_search">
                        <input type="text" name="s" value="" placeholder="Search Part">
                        <!--                        <input type="submit" value="Search">-->
                        <button value="Search" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <a href="#" id="clear-search" class="close-btn" style="visibility: visible"><i class="fa fa-times"
                                                                                                       aria-hidden="true"></i></a>
                        <div class="no-result-found">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> No results were found.

                        </div>
                    </form>

                </aside>
                <div class="loading"><img src="<?php echo get_site_url() . '/wp-admin/images/spinner-2x.gif' ?>" style="display: none;"
                                          class="spinner"></div>
            </div>
            <div id="primary" class="content-area archive">
                <main id="main" class="site-main" role="main">


                    <?php rewind_posts(); $i=0 ?>

                    <div id="parts-list-wrapper">
                        <?php while (have_posts()) : the_post(); $i++;
                            get_template_part('template-parts/content', 'parts');
                        if($i==3)$i=0;
                        endwhile; ?>
                    </div>
                    <div class="clear"></div>
                    <div class="loading"><img src="<?php echo get_site_url() . '/wp-admin/images/spinner-2x.gif' ?>" style="display: none;"
                                              class="spinner"></div>

                    <?php else :
                        get_template_part('template-parts/content', 'none');
                    endif; ?>

                </main>
                <!-- #main -->
            </div><!-- #primary -->

            <div class="clear"></div>
        </div>
    </section>
    <script>
        var parts_search_options = {
            'part_brand': '',
            'part_type': '',
            's': '',
            'action': 'ajx_get_parts',
            'paged': 1
        };

        jQuery(function ($) {

            function get_parts() {
                console.log(parts_search_options);
                $('.spinner').show();
                $.post("<?php echo admin_url('admin-ajax.php')?>", parts_search_options, function (res) {
                    if (res == "NOT_FOUND") {
                        $('.no-result-found').show();
                    } else {
                        $('#parts-list-wrapper').empty().append(res);
                        $('.no-result-found').hide();
                    }
                    $('.spinner').hide();
                });
            }/*
            $('.enquire-now-btn').click(function(){
                $('.popup-enquire, .overlay-enquire').fadeIn();
            });*/

            $('.part_brand').click(function(){
                $('#clear-brand').addClass('show');
            });
            $('.part_type').click(function(){
                $('#clear-type').addClass('show');
            });
            $('#clear-brand, #clear-type ').on('click', function () {
                $(this).removeClass('show');
            });
/*
            $('.part:nth-child(3n)').addClass('third');
            $('.part.third').after($('<div class="clear"></div>'));*/
            $('a#clear-brand').on('click', function () {
                parts_search_options.part_brand = '';
                parts_search_options.paged = 1;
                get_parts();
                $('.part_brand').removeClass('active');
            });
            $('a.part_brand').on('click', function (e) {
                e.preventDefault();
                $('.part_brand').removeClass('active');
                $(this).addClass('active');
                parts_search_options.part_brand = $(this).data('term_id');
                parts_search_options.paged = 1;
                get_parts();
            });

            $('a#clear-type').on('click', function () {
                parts_search_options.part_type = '';
                parts_search_options.paged = 1;
                get_parts();
                $('.part_type').removeClass('active');
            });
            $('a.part_type').on('click', function (e) {
                e.preventDefault();
                $('.part_type').removeClass('active');
                $(this).addClass('active');
                parts_search_options.part_type = $(this).text();
                parts_search_options.paged = 1;
                get_parts();

            });

            $('form#parts_search').on('submit', function (e) {
                e.preventDefault();
                parts_search_options.s = $(this).find("input[name=s]").val();
                parts_search_options.paged = 1;
                get_parts();
                $("#parts_search").addClass('active');
            });
            $('a#clear-search').on('click', function (e) {
                $('form#parts_search')[0].reset();
                parts_search_options.s = '';
                parts_search_options.paged = 1;
                get_parts();
                $("#parts_search").removeClass('active');
            });

            $('a.enquiry_continue_browsing').on('click', function (e) {
                //dismiss the popup etc and continue browsing..
            });
		parts = [];
            $('#parts-list-wrapper').on('click', '.part a.enquire-now-btn', function (e) {
                e.preventDefault();
//                var part_number = $(this).data('item_number');
                var part_name = $(this).data('title');
                var part_type = $(this).data('part_type');
                var part_brand = $(this).data('part_brand');
                var to_append = /*"Item#:" + part_number + ", */"Part:" + part_name + ", Brand: " + part_brand + ",Type: " + part_type + "\n";
		$('#enquiry_detail').val('');
		parts.push(to_append);
		parts.forEach(function(ls,i){
			$('#enquiry_detail').val($('#enquiry_detail').val() +ls);
		})
                $('.popup-enquire, .overlay-enquire').fadeIn();
            });
            $('.popup-enquire').on('click', 'a.enquiry_continue_browsing', function (e) {
                $('.popup-enquire, .overlay-enquire').fadeOut();
            });
            $('.popup-enquire').on('click', '.close-pop', function (e) {
                parts.pop();
                $('.popup-enquire, .overlay-enquire').fadeOut();
            });
            $('#parts-list-wrapper').on('click', '.small-img', function(){
                $(this).siblings('.popup-enquire-big, .overlay-enquire-big').fadeIn();
            });
            $('#parts-list-wrapper').on('click', '.popup-enquire-big .close-pop', function () {
                //$('.popup-enquire, .overlay-enquire').fadeOut();
                $('.popup-enquire-big, .overlay-enquire-big').fadeOut();
            });
        });

        jQuery(function ($) {

            var loading = false,
                win = $(window),
                doc = $(document),
            //container = $('.events-list'),
            //containerlist = container.find('#events-list-wrapper');
                containerlist = $('#parts-list-wrapper');

            win.on('scroll', function () {
                if (window.parts_search_options.paged == 1) {
                    window.parts_search_options.paged = 2;
                }
                if (doc.height() - win.height() - $('#footer').height() <= win.scrollTop() && !loading) {
                    $('.spinner').show();
                    loading = true;
                    $('.spinner').show();
                    $.post("<?php echo admin_url('admin-ajax.php')?>", window.parts_search_options, function (res) {

                        if (res == 'NOT_FOUND') {
                            console.log(res);
                            loading = false;
                            $('.spinner').hide();
                        } else {
                            containerlist.append(res);
                            //equalheight('#events-list-wrapper .equal');
                            window.parts_search_options.paged += +1;
                            $('.spinner').hide();
                            setTimeout(function () {
                                loading = false;
                            }, 500);
                        }
                        $('.spinner').hide();
                    }).fail(function (xhr, textStatus, e) {
                        $('.spinner').hide();
                        console.log(xhr.responseText);
                    });

                }
            });
        });
    </script>
<div class="popup-enquire" style="display: none">
    <div class="close-pop">
        <i class="fa fa-times"></i>
    </div>
<?php

echo do_shortcode('[contact-form-7 id="430" title="Parts Enquiry"]');
?>
</div>
<div class="overlay-enquire" style="display:none"></div>
<?php
//get_sidebar();
get_footer();

