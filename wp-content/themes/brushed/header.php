<?php the_tags();
get_avatar(3);
if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>
<?php
comments_template();

$defaults = array(
	'before'           => '<p>' . __( 'Pages:' ,'brushed'),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => __( 'Next page','brushed' ),
	'previouspagelink' => __( 'Previous page','brushed' ),
	'pagelink'         => '%',
	'echo'             => 1
);
wp_link_pages( $defaults );
$com = 9;
if ($com==10){
	comment_form();

	language_attributes();
}

$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);



?>
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title><?php if (vp_option('vpt_option.title')){echo vp_option('vpt_option.title');}else {echo "Brushed | Responsive One Page Template";}?></title>


    <meta name="description" content="Insert Your Site Description" />

    <!-- Mobile Specifics -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>

    <!-- Mobile Internet Explorer ClearType Technology -->
    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->
<script type="text/javascript">

    var BRUSHED = window.BRUSHED || {};
</script>



    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

    <!-- Fav Icon -->
    <?php
    if (vp_option('vpt_option.favicon')){
        echo "<link rel='icon' href='".vp_option('vpt_option.favicon')."'>";
    }
    ?>

    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="144x144" href="#">
	<?php
	if (vp_option('vpt_option.body_font_preview')){
		$body_pos = strpos(vp_option('vpt_option.body_font_preview'),'>');
		$body_link = substr(vp_option('vpt_option.body_font_preview'),0,$body_pos+1);
		echo $body_link;
	}?>
	<?php
	if (vp_option('vpt_option.body_font_face')){
		echo "<style type='text/css'>

		body{
	font-family: ".vp_option('vpt_option.body_font_face').";
	font-style: ".vp_option('vpt_option.body_font_style').";
	font-weight: ".vp_option('vpt_option.body_font_weight').";
	font-size: ".vp_option('vpt_option.body_font_size').";
	line-height: ".vp_option('vpt_option.body_line_height').";
	color: ".vp_option('vpt_option.body_color').";

	}
	.type-work {
	color: ".vp_option('vpt_option.body_color').";
	}
		</style>";
	}

	if (vp_option('vpt_option.menu_font_preview')){
		$menu_pos = strpos(vp_option('vpt_option.menu_font_preview'),'>');
		$menu_link = substr(vp_option('vpt_option.menu_font_preview'),0,$menu_pos+1);
		echo $menu_link;
	}?>
	<?php
	if (vp_option('vpt_option.menu_font_face')){
		echo "<style type='text/css'>

		#menu-nav{
	font-family: ".vp_option('vpt_option.menu_font_face').";
	font-style: ".vp_option('vpt_option.menu_font_style').";
	font-weight: ".vp_option('vpt_option.menu_font_weight').";
	font-size: ".vp_option('vpt_option.menu_font_size').";
	line-height: ".vp_option('vpt_option.menu_line_height').";

	}
	nav#menu #menu-nav li a {
color: ".vp_option('vpt_option.menu_color').";
		</style>";
	}
	?>

    <?php
    if (vp_option('vpt_option.h2_font_preview')){
	    $h2_pos = strpos(vp_option('vpt_option.h2_font_preview'),'>');
	    $h2_link = substr(vp_option('vpt_option.h2_font_preview'),0,$h2_pos+1);
	    echo $h2_link;
    }?>
    <?php
    if (vp_option('vpt_option.h2_font_face')){
	    echo "<style type='text/css'>

		h2{
	font-family: ".vp_option('vpt_option.h2_font_face').";
	font-style: ".vp_option('vpt_option.h2_font_style').";
	font-weight: ".vp_option('vpt_option.h2_font_weight').";
	font-size: ".vp_option('vpt_option.h2_font_size').";
	line-height: ".vp_option('vpt_option.h2_line_height').";
	color: ".vp_option('vpt_option.h2_color').";
	}
		</style>";
    }?>

	<?php
	if (vp_option('vpt_option.h3_font_preview')){
		$h3_pos = strpos(vp_option('vpt_option.h3_font_preview'),'>');
		$h3_link = substr(vp_option('vpt_option.h3_font_preview'),0,$h3_pos+1);
		echo $h3_link;
	}?>
	<?php
	if (vp_option('vpt_option.h3_font_face')){
		echo "<style type='text/css'>

		h3{
	font-family: ".vp_option('vpt_option.h3_font_face').";
	font-style: ".vp_option('vpt_option.h3_font_style').";
	font-weight: ".vp_option('vpt_option.h3_font_weight').";
	font-size: ".vp_option('vpt_option.h3_font_size').";
	line-height: ".vp_option('vpt_option.h3_line_height').";
	color: ".vp_option('vpt_option.h3_color')."!important;
	}
		</style>";
	}?>




<!--	Analytics-->
		<?php
if (vp_option('vpt_option.analytics')){
	echo "<script type='text/javascript'>". vp_option('vpt_option.analytics')."</script>";}
?>

    <!-- End Analytics -->

<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<!-- This section is for Splash Screen -->
<div class="ole">
    <section id="jSplash">
        <div id="circle"></div>
    </section>
</div>
<style type="text/css">
	<?php
	if (vp_option('vpt_option.preloader_background')){
	echo "#jpreOverlay,#jSplash
	{
		background-color:".vp_option('vpt_option.preloader_background').";

	}";
	}
	?>
	<?php
	if (vp_option('vpt_option.circle_background')){
	echo "#circle
	{
		background-color:".vp_option('vpt_option.circle_background').";

	}";
	}
	?>
	<?php
	if (vp_option('vpt_option.menu_type')){
	echo "header .sticky-nav.stuck {
	position: static;}";
	}

	?>


</style>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider">
    <div class="overlay"></div>

    <div class="slider-text">
        <div id="slidecaption"></div>
    </div>

    <div class="control-nav">
        <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
        <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
        <ul id="slide-list"></ul>

        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
        <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

        <div id="logo">
            <a id="goUp" href="#home-slider" title="Brushed | Responsive One Page Template">Brushed Template</a>
        </div>

        <nav id="menu">
            <ul id="menu-nav">
                <li class="current"><a href="#home-slider">Home</a></li>
                <li><a href="#work">Our Work</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>

    </div>
</header>
<!-- End Header -->