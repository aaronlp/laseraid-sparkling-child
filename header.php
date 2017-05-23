<?php



/* *



 * The Header for our theme.



 *



 * Displays all of the <head> section and everything up till <div id="content">



 *



 * @package sparkling



 */







if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>



<!doctype html>



<!--[if !IE]>



<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->



<!--[if IE 7 ]>



<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->



<!--[if IE 8 ]>



<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->



<!--[if IE 9 ]>



<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->



<!--[if gt IE 9]><!-->



<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->



<head>



<meta charset="<?php bloginfo( 'charset' ); ?>">



<meta name="viewport" content="width=device-width, initial-scale=1">



<meta name="theme-color" content="<?php echo of_get_option( 'nav_bg_color' ); ?>">



<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="<?php echo get_stylesheet_directory_uri();?>/css/owl.carousel.css" rel="stylesheet" type="text/css" />

<link href="<?php echo get_stylesheet_directory_uri();?>/css/prettyPhoto.css" rel="stylesheet" type="text/css" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400" rel="stylesheet">





<?php wp_head(); ?>



<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-11676638-2', 'auto');

  ga('send', 'pageview');



</script>



</head>



<body <?php body_class(); ?>>

<?php createEnquirySelectElement(); ?>



<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>



<div id="page" class="hfeed site">







	<header id="masthead" class="site-header" role="banner">



		<nav class="navbar navbar-default <?php if( of_get_option( 'sticky_header' ) ) echo 'navbar-fixed-top'; ?>" role="navigation">



			<div class="container">



				<div class="row">



					<div class="site-navigation-inner col-sm-12">



						<div class="navbar-header">



							<button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">



								<span class="sr-only">Toggle navigation</span>



								<span class="icon-bar"></span>



								<span class="icon-bar"></span>



								<span class="icon-bar"></span>



							</button>



							<div class="top-section">



								<?php if( get_header_image() != '' ) : ?>



    



                                <div id="logo">



                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>



                                </div><!-- end of #logo -->



    



                                <?php endif; // header image was removed ?>



    



                                <?php if( !get_header_image() ) : ?>



    



                                <div id="logo" class="pull-left">



                                    <?php echo is_home() ?  '<h1 class="site-name">' : '<p class="site-name">'; ?>



                                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>



                                    <?php echo is_home() ?  '</h1>' : '</p>'; ?>



                                </div><!-- end of #logo -->



    



                                <?php endif; // header image was removed (again) ?>



                                



                                <div class="pull-right hidden-xs">



                            		<?php dynamic_sidebar( 'top-1' ); ?>



                            	</div>



                            </div>







						</div>





                       <div class="navigations">



                       		<div class="pull-left hidden-xs">



                            	<?php dynamic_sidebar( 'top-social-links1' ); ?>



                             </div>



                        <div class="pull-right">



							<?php sparkling_header_menu(); // main navigation ?>



                         </div>



                         <div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">



                         <div class="visible-xs">



                         	<?php dynamic_sidebar( 'top-1' ); ?>



                            <?php dynamic_sidebar( 'top-social-links' ); ?>



                           </div>



                         </div>



                        </div>



					</div>



				</div>



			</div>



		</nav><!-- .site-navigation -->

<div class="hoverbox"></div>

	</header><!-- #masthead -->







	<div id="content" class="site-content">







		<div class="top-section slider">



			<?php // sparkling_featured_slider(); ?>



			<?php // sparkling_call_for_action(); ?>



            <?php if( is_front_page() ) : ?>



            <?php /*?><img src="<?php echo get_stylesheet_directory_uri();?>/images/banner.jpg"><?php */?>



			<?php echo do_shortcode('[crellyslider alias="home_slider"]') ?>

			<div class="sliderBottom">

    			<div class="wrapper clearfix">

                    <aside class="">

                        <h3>

                            <a href="<?php bloginfo(url); ?>/info-pack/">Click here</a> to Receive Your Info Pack.

                        </h3>

                    </aside>

        <!-- <div class="link floatRight">



        </div> -->

        </div>

    </div>

             <?php endif; // banner image ?>



		</div>

<nav class="breadcrumb <?php if(!is_shop() or !is_product() or !is_checkout() or !is_account_page()){ ?>breadcrumb-shop <?php } ?>">

    <div class="container">

       <?php custom_breadcrumbs(); ?>

    </div>

</nav>





		<?php if(!is_shop() or !is_product() or !is_checkout() or !is_account_page()){ ?>
<div class="main-content-area content-area-shop">
        <?php }else{ ?>
<div class="container main-content-area">
           <?php } ?>



            <?php $layout_class = get_layout_class(); ?>



			<div class="row <?php echo $layout_class; ?>">


            <?php if(!is_shop() or !is_product() or !is_checkout() or !is_account_page()){ ?> <?php } ?>
				<div class="main-content-inner <?php echo sparkling_main_content_bootstrap_classes(); ?>">
            



