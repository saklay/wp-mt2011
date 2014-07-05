<?php 
/**
 * 
 * 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title('&#124;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta name="copyright" content="&#169; 2009-<?php echo date('Y'); ?> Moontoast, LLC" /> 
<meta name="rating" content="general" /> 
<meta name="robots" content="all, index, follow" /> 
<meta name="google-site-verification" content="ICuVr_tNluU4yEOu_4Wzu7QxFqfvBR6_nuzIBilePhM" /> 
<meta name="google-site-verification" content="hp4zBqneAaciXdQZnbGAcQxv4CTiK6C5DqxvpfEUzGc" />
<meta name="google-site-verification" content="bnA0biCTyVGut7PeUvkIPimehdFt2oqY2IjcRD_TonE" />
<script type="text/javascript" src="/js/main.js.php"></script>		

<link rel="alternate" type="application/rss+xml" title="Moontoast Global Feed (All Content)" href="http://feeds.feedburner.com/Moontoast-all" />
<link rel="alternate" type="application/rss+xml" title="Moontoast Blog" href="http://feeds.feedburner.com/Moontoast-blog" />
<link rel="alternate" type="application/rss+xml" title="Moontoast Press Releases" href="http://feeds.feedburner.com/Moontoast-press" />
<link rel="alternate" type="application/rss+xml" title="Moontoast in the News" href="http://feeds.feedburner.com/Moontoast-news" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
<script type="text/javascript" src="/js/library/jquery/jquery.js"></script>
<script type="text/javascript" src="/js/library/jquery-touchwipe/jquery-touchwipe.js?v=1"></script>
<script tyoe="text/javascript" src="/js/marketing_site/navdropdown.js?v=1"></script>
<script type="text/javascript" src="/js/marketing_site/paging.js?v=1"></script>
<?php if (is_home()) { ?>
<!-- JQuery Rotator -->
<script type="text/javascript" src="/js/marketing_site/jquery-flow.js?v=1"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('ul.children').css('childrenlist');
    var slides = $("ul#controller").jFlow({
	    slides: "#slides",
	    selectedWrapper: "jFlowSelected",
		duration: 400,
		interval: 8000,
		width: "960px",
		height: "375px"
	});
    $("#jFlowSlide").touchwipe({
        wipeLeft: slides.next,
        wipeRight: slides.prev,
        min_move_x: 20,
        min_move_y: 20,
        preventDefaultEvents: true
   });
   $('#jFlowSlide').hover(slides.stop, slides.start);
});
</script>
<!-- JQuery Homepage Quotes -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/nivo-slider.css" />
<script type="text/javascript" src="/js/marketing_site/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#quotesslider').nivoSlider({
		effect: 'random',
		animSpeed: 500,
		pauseTime: 3000
	});
});
</script>
<!-- JQuery Client Carousel -->
<script type="text/javascript" src="/js/marketing_site/jcarousellite.js"></script>
<script type="text/javascript">
$(function() {
	$(".client_container").jCarouselLite({
		btnNext: ".client_next",
		btnPrev: ".client_prev",
		visible: 6
	});
});
</script>
<?php } ?>

</head>
<!--[if IE 8]><body class="ie8"><![endif]-->
<!--[if lte IE 7]><body class="ie7"><![endif]-->
<!--[if lte IE 6]><body class="ie6"><![endif]-->
<!--[if !IE]><!--><body><!--<![endif]-->

<?php
	/****** 
		Primary Pages that are published but is not part of the navigation links on header and footer
		Values of the array should be Page Titles
	******/
	$invisiblelinks = array(
		'What is Moontoast?',
		'Company',
		'Distributed Commerce',
		'Products',
		'About The Toast'
	);
	
	$excludepages = '';
	$result = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'page'");
	
	if ($result){
		foreach ($result as $row) {
			if (in_array($row->post_title, $invisiblelinks)) {
				$excludepages .= $row->ID.',';
			}
		}
		substr_replace($excludepages ,'',-1);
	}
	
	$blogpage = false;
	$category = get_the_category();
	if ($category[0]->cat_name) {
	    $blogpage = true;
		switch ($category[0]->cat_name) {
			case "In The News":
				$the_id = "13";
				break;
			case "Press":
				$the_id = "13";
				break;
			case "Blog":
				$the_id = "70";
				break;
		}
		
		/*******
		Force wp_list_pages to highlight "Company" or "Blog" as current page item
		because this section is not under Pages but falls under Posts
		*******/
		$temp_query = clone $wp_query;
		$wp_query->is_page = 1;
		$wp_query->queried_object_id = $the_id;
	}
	
	$current_page = get_the_title($post->ID);
	switch ($current_page) {
	    case "In The News":
	        $blogpage = true;
	        break;
	    case "Press Releases":
	        $blogpage = true;
	        break;
	    case "Blog":
	        $blogpage = true;
	        break;
	}
?>

	<div id="header<?php if (!is_home()) { echo 'page'; }?>">
		<div class="header">
			<div class="logo">
				<a href="<?php echo home_url( '/' ); ?>" title="Moontoast"><img src="<?php bloginfo('template_url'); ?>/images/logo-moontoast.png" title="Moontoast" /></a>
			</div>
			<div class="topnav">
				<ul>
                    <li><a href="http://www.moontoast.com/social-marketing-apps" title="Social Marketing Apps">Social Marketing Apps</a></li>
                    <li><a href="http://www.moontoast.com/social-analytics-suite" title="Social Analytics Suite">Social Analytics Suite</a></li>
				    <?php
					    $clean_page_list = wp_list_pages( 'title_li=&depth=2&exclude='.$excludepages); // removed &depth=1 to display children
					    $clean_page_list = preg_replace('/title=\"(.*?)\"/','',$clean_page_list);
					    $clean_page_list = str_replace('current', 'on', $clean_page_list);
					    echo $clean_page_list;
				    ?>
				    <li><a href="/contact" title="Contact">Contact</a></li>
				</ul>
			</div>
			<div class="clearboth"></div>
		</div>
		<div class="carouselcontainer">
			<?php if (is_home() ) { ?>
			    <?php
	                /* Fetch content for Rotator Slides */
	                $rotator_slide1 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 1' AND post_status = 'publish';"));
	                $rotator_slide2 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 2' AND post_status = 'publish';"));
	                $rotator_slide3 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 3' AND post_status = 'publish';"));
	                $rotator_slide4 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 4' AND post_status = 'publish';"));
	                $rotator_slide5 = $wpdb->get_var($wpdb->prepare("SELECT post_content FROM $wpdb->posts WHERE post_title='Rotator Slide 5' AND post_status = 'publish';"));
                ?>
				<div class="panel_rework">
                    <div style="display: none">
                    	<button class="jFlowPrev">previous</button>
    					<button class="jFlowNext">next</button>
                    </div>
                    <div id="slides">
                        <?php if ($rotator_slide1) { ?><div><?php echo $rotator_slide1; ?></div><?php } ?>
                        <?php if ($rotator_slide2) { ?><div><?php echo $rotator_slide2; ?></div><?php } ?>
                        <?php if ($rotator_slide3) { ?><div><?php echo $rotator_slide3; ?></div><?php } ?>
                        <?php if ($rotator_slide4) { ?><div><?php echo $rotator_slide4; ?></div><?php } ?>
                        <?php if ($rotator_slide5) { ?><div><?php echo $rotator_slide5; ?></div><?php } ?>
				    </div>
				</div>
			<?php } else { ?>
				<div class="panel">
				    <?php if ($blogpage) { ?>
				        <div class="header_left">
				            <a href="/blog">
				                <img class="rotator_blog_img" src="<?php bloginfo('template_url'); ?>/images/blog_bubble.png"/>
				            </a>
				        </div>
				    <?php } else { ?>
					    <div class="header_left">
						    <h1>Product to the People</h1>
						    Moontoast provides the first socially distributable commerce platform, which facilitates engagement and monetization of consumers via social media networks, distributed affiliate sites, and advertising networks.
					    </div>
					    <div class="header_right"><img src="<?php bloginfo('template_url'); ?>/images/page_header.png" /></div>
					<?php } ?>
					<div class="clearboth"></div>
				</div>
			<?php } ?>
		</div>
		
		<?php if (is_home() ) { ?>
		<div class="navigation">
			<ul id="controller">
				<?php if ($rotator_slide1) { ?><li class="jFlowControl"><img src="<?php bloginfo('template_url'); ?>/images/pixel.gif" width=20 height=20 border=0></li><?php } ?>
				<?php if ($rotator_slide2) { ?><li class="jFlowControl"><img src="<?php bloginfo('template_url'); ?>/images/pixel.gif" width=20 height=20 border=0></li><?php } ?>
				<?php if ($rotator_slide3) { ?><li class="jFlowControl"><img src="<?php bloginfo('template_url'); ?>/images/pixel.gif" width=20 height=20 border=0></li><?php } ?>
				<?php if ($rotator_slide4) { ?><li class="jFlowControl"><img src="<?php bloginfo('template_url'); ?>/images/pixel.gif" width=20 height=20 border=0></li><?php } ?>
				<?php if ($rotator_slide5) { ?><li class="jFlowControl"><img src="<?php bloginfo('template_url'); ?>/images/pixel.gif" width=20 height=20 border=0></li><?php } ?>
			</ul>
			<div class="clearboth"></div>
		</div>
		<?php } ?>
	</div>
