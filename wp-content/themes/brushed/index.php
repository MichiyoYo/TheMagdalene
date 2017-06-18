<?php get_header(); ?>

<!-- Our Work Section -->
<div id="work" class="page">
	<div class="container">
    	<!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">	<?php
	                    if (vp_option('vpt_option.portfolio_h2')){
		                    echo vp_option('vpt_option.portfolio_h2');
	                    }else
	                    {
		                    echo "Our Work";
	                    }
	                    ?></h2>
                    <h3 class="title-description">	<?php
	                    if (vp_option('vpt_option.portfolio_h3')){
		                    echo vp_option('vpt_option.portfolio_h3');
	                    }else
	                    {
		                    echo "Check Out Our Projects on <a href='#'>Dribbble</a>.";
	                    }?></h3>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
        <div class="row">
        	<div class="span3">
            	<!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                    	<li class="type-work">	<?php
		                    if (vp_option('vpt_option.portfolio_work_type')){
			                    echo vp_option('vpt_option.portfolio_work_type');
		                    }else
		                    {
			                    echo "Type of Work";
		                    }?></li>

                        <li><a href="#filter" data-option-value="*" class="selected"><?php
		                        if (vp_option('vpt_option.portfolio_all')){
			                        echo vp_option('vpt_option.portfolio_all');
		                        }else
		                        {
			                        echo "All Projects";
		                        }?></a></li>
                        <?php $args = array (
                            'post_type' => 'portfolio', //your custom post type
                            'orderby' => 'name',
                            'exclude' => '1',
                            'order' => 'ASC',
                            'taxonomy' => 'categories',
                            'hide_empty' => 0 //shows empty categories
                        );

                        $categories = get_categories( $args );
                        foreach ($categories as $category): ?>

                        <li><a href="#filter" data-option-value=".<?php echo $category->slug; ?>"><?php echo $category->name ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                </nav>
                <!-- End Filter -->
            </div>
            
            <div class="span9">
            	<div class="row">
                	<section id="projects">
                        <?php
                        if (vp_option('vpt_option.items_per_page')){
	                        $per_page =  vp_option('vpt_option.items_per_page');
                        }else
                        {
	                        $per_page = 3000;
                        }
                        if (vp_option('vpt_option.portfolio_order')){
	                        $orderby =  vp_option('vpt_option.portfolio_order');
                        }else
                        {
	                        $orderby = 'post_date';
                        }
                        if (vp_option('vpt_option.portfolio_type_order')){
	                        $order =  vp_option('vpt_option.portfolio_type_order');
                        }else
                        {
	                        $order = 'DESC';
                        }
                        $args = array(

                            'posts_per_page'   => $per_page,
                            'offset'           => 0,
                            'category'         => '',
                            'orderby'          => $orderby,
                            'order'            => $order,
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => 'portfolio',
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'post_status'      => 'publish',
                            'suppress_filters' => true );
                            $posts = get_posts($args);


                                ?>

                    	<ul id="thumbs">
                            <?php foreach($posts as $post):


                                $meta_values = get_post_meta( $post->ID, 'portfolio_metaboxes',true);

                                //Returns Array of Term Names for "my_term"
                                $term_list = wp_get_post_terms($post->ID, 'categories', array("fields" => "slugs"));

                                $video = false;
                                for ($i=0;$i<count($term_list);$i++)
                                {
                                    if (($term_list[$i] == 'video'))
                                    {
                                        $video = true;
                                        break;
                                    }
                                }

                                $group = 'gallery';
                                $img_alt = $meta_values['portfolio_textarea'];
	                            if ($meta_values['portfolio_upload'] != '')
	                            {
		                            $img_src = $meta_values['portfolio_upload'];
		                            $big_src = $meta_values['portfolio_upload'];
	                            }else{
		                            $img_src = get_template_directory_uri().'/img/photo.jpg';
		                            $big_src = get_template_directory_uri().'/img/photo.jpg';
	                            }


                                $fancybox = '';
	                            $span_height = '182px';
                                if ($video)
                                {
                                    $group = 'video';
                                    $img_alt = 'Video';
                                    $img_src = get_template_directory_uri().'/img/video.png';
                                    $big_src = $meta_values['portfolio_url'];
	                                $span_height = '182px';
	                                if (strrpos($big_src, 'youtube'))
	                                {
		                               $equal = strpos($big_src,'=');

		                                $id = substr($big_src, $equal+1);
		                                $img_url_part1 = 'http://img.youtube.com/vi/';
		                                $img_url_part2 = $id.'/0.jpg';
		                                $img_src = $img_url_part1.$img_url_part2;



	                                }

	                                if (strpos($big_src,'vimeo'))
	                                {
		                                $id = substr($big_src,17);


		                                $hash = wp_remote_get("http://vimeo.com/api/v2/video/$id.php");
		                                $hash = unserialize($hash['body']);


		                                $img_src = $hash[0]['thumbnail_large'];

		                                $width = '';
	                                }

                                    $fancybox = '-media';
                                }

                                ?>
							<!-- Item Project and Filter Name -->
                        	<li  class="item-thumbs span3 <?php for($i=0;$i<count($term_list);$i++){echo $term_list[$i]." ";} ?>">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox<?php echo $fancybox; ?>" data-fancybox-group="<?php echo $group ?>" title="<?php echo $post->post_title; ?>" href="<?php echo $big_src; ?>">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img  src="<?php echo $img_src; ?>"  alt="<?php echo $img_alt; ?>">
                            </li>

                        	<!-- End Item Project -->
                            <?php endforeach; ?>






                        </ul>
                    </section>
                    
            	</div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->

<!-- About Section -->
<div id="about" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title"><?php
	                if (vp_option('vpt_option.team_h2')){
		                echo vp_option('vpt_option.team_h2');
	                }else
	                {
		                echo "About Us";
	                }
	                ?></h2>
                <h3 class="title-description"><?php
	                if (vp_option('vpt_option.team_h3')){
		                echo vp_option('vpt_option.team_h3');
	                }else
	                {
		                echo "Learn About our Team &amp; Culture.";
	                }
	                ?></h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
	<?php

                        if (vp_option('vpt_option.team_items_per_page')){
	                        $member_per_page =  vp_option('vpt_option.team_items_per_page');
                        }else
                        {
	                        $member_per_page = 9;
                        }
                        if (vp_option('vpt_option.team_order')){
	                        $member_orderby =  vp_option('vpt_option.team_order');
                        }else
                        {
	                        $member_orderby = 'post_date';
                        }
                        if (vp_option('vpt_option.team_type_order')){
	                        $member_order =  vp_option('vpt_option.team_type_order');
                        }else
                        {
	                        $member_order = 'ASC';
                        }
	$args = array(
		'posts_per_page'   => $member_per_page,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => $member_orderby,
		'order'            => $member_order,
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'team',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );
	$posts = get_posts($args);


	?>
    <!-- People -->
    <div class="row">
<?php foreach($posts as $post):
	    $meta_values = get_post_meta( $post->ID, 'team_metaboxes',true);
	    //Returns Array of Term Names for "my_term"
	    $term_list = wp_get_post_terms($post->ID, 'functions', array("fields" => "names"));
	$facebook = $meta_values['member_facebook_url'];
	if ($facebook)
	{
		$facebook = '<li><a href="'.$meta_values['member_facebook_url'].'"><i class="font-icon-social-facebook"></i></a></li>';
	}
	$twitter = $meta_values['member_twitter_url'];
	if ($twitter)
	{
		$twitter = '<li><a href="'.$meta_values['member_twitter_url'].'"><i class="font-icon-social-twitter"></i></a></li>';
	}
	$linkedin = $meta_values['member_linkedin'];
	if ($linkedin)
	{
		$linkedin = '<li><a href="'.$meta_values['member_linkedin'].'"><i class="font-icon-social-linkedin"></i></a></li>';
	}
	$googleplus = $meta_values['member_googleplus'];
	if ($googleplus)
	{
		$googleplus = '<li><a href="'.$meta_values['member_googleplus'].'"><i class="font-icon-social-google-plus"></i></a></li>';
	}
	$vimeo = $meta_values['member_vimeo'];
	if ($vimeo)
	{
		$vimeo = '<li><a href="'.$meta_values['member_vimeo'].'"><i class="font-icon-social-vimeo"></i></a></li>';
	}
	?>
        <!-- Start Profile -->
    	<div class="span4 profile">
        	<div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <span class="overlay-text-thumb"><?php echo $term_list[0]; ?></span>
                </div>
                <img  src="<?php echo $meta_values['team_upload']; ?>" alt="<?php echo $meta_values['member_name']; ?>">
            </div>
            <h3 class="profile-name"><?php echo $meta_values['member_name']; ?></h3>
            <p class="profile-description"><?php echo $meta_values['member_description']; ?></p>
            	
            <div class="social">
            	<ul class="social-icons">
<?php echo $facebook.$twitter.$linkedin.$googleplus.$vimeo; ?>
                </ul>
            </div>
        </div>
        <!-- End Profile -->
        <?php endforeach; ?>

        
    </div>
    <!-- End People -->
</div>
</div>
<!-- End About Section -->


<!-- Contact Section -->
<div id="contact" class="page">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title"><?php
	                if (vp_option('vpt_option.contact_h2')){
		                echo vp_option('vpt_option.contact_h2');
	                }else
	                {
		                echo "Get in Touch";
	                }?></h2>
                <h3 class="title-description"><?php
	                if (vp_option('vpt_option.contact_h3')){
		                echo vp_option('vpt_option.contact_h3');
	                }else
	                {
		                echo "We're currently accepting new client projects. We look forward to serving you.";
	                }?></h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->

    <!-- Contact Form -->
    <div class="row" <?php post_class(); ?>>
    	<div class="span9">

        	<form id="contact-form" class="contact-form" action="#">
            	<p class="contact-name">
            		<input id="contact_name" type="text" placeholder="Full Name" value="" name="name" />
                </p>
                <p class="contact-email">
                	<input id="contact_email" type="text" placeholder="Email Address" value="" name="email" />
                </p>
                <p class="contact-message">
                	<textarea id="contact_message" placeholder="Your Message" name="message" rows="15" cols="40"></textarea>
                </p>
		        <input type="hidden" id="url" value="<?php echo get_template_directory_uri();?>">
		        <input type="hidden" id="email" value="<?php
                if (vp_option('vpt_option.email_submit')){
                    echo vp_option('vpt_option.email_submit');
                }else
                {
                    echo "email@domain.com";
                }?>">
		        <input type="hidden" id="subject" value="<?php
                if (vp_option('vpt_option.subject')){
                    echo vp_option('vpt_option.subject');
                }else
                {
                    echo "From my Site";
                }?>">
                <p class="contact-submit">
                	<a id="contact-submit" class="submit"  href="#">Send Your Email</a>
                </p>
                
                <div id="response">
                
                </div>
            </form>
         
        </div>
        
        <div class="span3">
        	<div class="contact-details">
        		<h3><?php
			        if (vp_option('vpt_option.contact_details')){
				        echo vp_option('vpt_option.contact_details');
			        }else
			        {
				        echo "Contact Details";
			        }?></h3>
                <ul>
                    <li><?php if (vp_option('vpt_option.email')){
                            echo vp_option('vpt_option.email');
                            }else
                            {
                            echo "hello@brushed.com";
                            }?></li>
                    <li><?php if (vp_option('vpt_option.telephone')){
                            echo vp_option('vpt_option.telephone');
                        }else
                        {
                            echo "(916) 375-2525";
                        }?></li>
                    <li>
                        <?php if (vp_option('vpt_option.address')){
                            echo vp_option('vpt_option.address');
                        }else
                        {
                            echo "Brushed Studio
                        <br>
                        5240 Vanish Island. 105
                        <br>
                        Unknow";
                        }?>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->

</div>
</div>
<!-- End Contact Section -->


<!-- Socialize -->
<div id="social-area" class="page">
    <div class="container">
        <div class="row">
            <div class="span12">
                <nav id="social">
                    <ul>
                        <?php if (vp_option('vpt_option.twitter')){echo "<li><a href='".vp_option('vpt_option.twitter')."' title='Follow Me on Twitter' target='_blank'><span class='font-icon-social-twitter'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.dribbble')){echo "<li><a href='".vp_option('vpt_option.dribbble')."' title='Follow Me on Dribbble' target='_blank'><span class='font-icon-social-dribbble'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.forrst')){echo "<li><a href='".vp_option('vpt_option.forrst')."' title='Follow Me on Forrst' target='_blank'><span class='font-icon-social-forrst'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.behance')){echo "<li><a href='".vp_option('vpt_option.behance')."' title='Follow Me on Behance' target='_blank'><span class='font-icon-social-behance'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.facebook')){echo "<li><a href='".vp_option('vpt_option.facebook')."' title='Follow Me on Facebook' target='_blank'><span class='font-icon-social-facebook'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.google_plus')){echo "<li><a href='".vp_option('vpt_option.google_plus')."' title='Follow Me on Google Plus' target='_blank'><span class='font-icon-social-google-plus'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.linkedin')){echo "<li><a href='".vp_option('vpt_option.linkedin')."' title='Follow Me on LinkedIn' target='_blank'><span class='font-icon-social-linkedin'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.themeforest')){echo "<li><a href='".vp_option('vpt_option.themeforest')."' title='Follow Me on ThemeForest' target='_blank'><span class='font-icon-social-envato'></span></a></li>";}?>
                        <?php if (vp_option('vpt_option.zerply')){echo "<li><a href='".vp_option('vpt_option.zerply')."' title='Follow Me on Zerply' target='_blank'><span class='font-icon-social-zerply'></span></a></li>";}?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Socialize -->
<?php get_footer(); ?>