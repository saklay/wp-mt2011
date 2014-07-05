<?php
	$current_title = get_the_title($post->post_parent);
	
	/*** Get the depth value of the page **/
	global $wp_query;
	$object = $wp_query->get_queried_object();
	$parent_id  = $object->post_parent;
	$depth = 0;
	while ($parent_id > 0) {
	    $page = get_page($parent_id);
	    $parent_id = $page->post_parent;
	    $depth++;
	}
	
	if(!$post->post_parent){
		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	} else {
	    
	    if ($depth < 2) {
	        
	        $pages = get_pages('child_of='.$post->ID.'&sort_column=post_title');
	        $pagecount = 0;
	        
	        foreach($pages as $page) {
	            $pagecount++;
	        }
	        
	        if ($pagecount > 0) {
	            $depthvalue = 2;
	        } else {
	            $depthvalue = 1;
	        }
	        
	    } else {
	        $depthvalue = 2;
	    }
	    
		if($post->ancestors) {
			$ancestors = end($post->ancestors);
			$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
		}
	}
	
	if ($post->post_parent === 0){
		$siblingPosts = get_pages(array(
			'child_of' => $post->ID
		));
	} else if ($children) {
		$siblingPosts = get_pages(array(
			'child_of' => $post->post_parent
		));
	}
?>

<?php 
/*
 *
 */ 
if (!$_GET['ajax']) {
	get_header();
} ?>

<?php if (is_page(array('Press Releases','Blog','In The News'))) { ?>
    <?php include( TEMPLATEPATH . '/blog.php' ); ?>
<?php } else { ?>

	<?php if(!$_GET['ajax']): ?>
	<script type="text/javascript">var host = (("https:" == document.location.protocol) ? "https://secure." : "http://");document.write(unescape("%3Cscript src='" + host + "wufoo.com/scripts/embed/form.js' type='text/javascript'%3E%3C/script%3E"));</script>
	<div id="container">
		<div id="pagecontent">
			<div id="pagecontentslider">
	<?php endif; ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post" id="post_<?php the_ID(); ?>">
						<div class="entry">
						    <h2><?php the_title(); ?></h2>
				            <?php the_content('<span>...</span>'); ?>
							<div class="clearboth"></div>
						</div>
					</div>
				<?php endwhile; else : ?>
					<div class="post">
						<div class="entry">
							<h2>Not Found!</h2>
							<h3>Sorry for you are looking for something that isn't here.</h3>
						</div>
					</div>
				<?php endif; ?>
	<?php if(!$_GET['ajax']): ?>
			</div>
		</div>
		<div id="leftsidebar">
			<ul>
				<li>
					<h4><?php if ($children) echo $current_title; ?></h4>
					<ul>
                    <?php if ($children) echo $children; ?>
					</ul>
				</li>
			</li>
		</div>
		<div class="clearboth"></div>
	<?php endif; ?>
<?php } ?>

<?php if (!$_GET['ajax']) {
	get_footer(); 
} ?>
