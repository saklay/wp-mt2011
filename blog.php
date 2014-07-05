<?php
    $blogpage = false;
    if (is_page('Blog')) {
        $categories = "-3,-7";
        $blogpage = true;
        $content_limit = '25';
    } else if (is_page('Press Releases')) {
        $categories = "3";
        $content_limit = '150';
    } else if (is_page('In The News')) {
        $categories = "7";
        $content_limit = '25';
    } else {
        $categories = "";
        $content_limit = '50';
    }
				
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query();
    $wp_query->query('showposts=5&cat='.$categories.'&orderby=date&order=DESC'.'&paged='.$page);
?>


<div id="container">
    <div class="blog_left_container">
        <?php
            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
        ?>
        <div class="left blog_date">
            <div class="blog_date_header"></div>
            <div class="blog_date_container">
                <div><center><?php the_time('M') ?></center></div>
                <div class="blog_date_day"><center><?php the_time('j') ?></center></div>
                <div><center><?php the_time('Y') ?></center></div>
            </div>
            <div class="blog_date_bottom"><div class="blog_date_tail"></div></div>
        </div>
        <div class="right blog_article">
            <h2><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <p class="bold"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></p>
            <p></p>
            <?php
			    if($post->post_excerpt) {
				    the_excerpt();
			?>
					<p class="readmore"><a href="<? the_permalink()?>">Read More</a></p>
			<?php
				} else {
					content($content_limit,false);
				}
			?>
            <p></p>
            <br /><br />
            <div class="clearAll"></div>
        </div>
        <div class="clearAll"></div>
        <hr />
        <?php
                }
            }
				
            if(function_exists('wp_page_numbers')) { wp_page_numbers(); }
            $wp_query = null;
            $wp_query = $temp;
        ?>
    </div>
    <div class="blog_right_container">
        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <input type="hidden" name="cat" value="1,3,7" />
            <div class="left" style="margin-left: 10px;"><input type="text" class="blog_search" name="s" id="s" onblur="if(this.value==''){this.value='Search This Blog'}" onfocus="if(this.value=='Search This Blog'){this.value=''}" value="Search This Blog" /></div>
            <div class="left" style="margin-left: -1px;"><input type="submit" class="blog_search_submit" id="searchsubmit" value="Search" /></div>
            <div class="clearAll"></div>
        </form>
        <br />
        <div><a href="http://www.youtube.com/moontoasttv" target="_blank" class="blog_moontoasttv" title="Moontoast TV">Moontoast TV</a></div>
        <br />
        <div style="margin:10px 10px 0 10px;">
            <ul>
                <?php
                    $blog_categories = wp_list_categories('echo=0&orderby=name&show_count=1&title_li=<h6>Topics</h6>');
                    $blog_categories = str_replace('(','<span class="right">',$blog_categories);
                    $blog_categories = str_replace(')','</span>',$blog_categories);
                    echo $blog_categories;
                ?>
            </ul>
            <br />
            <div style="font-size:14px;">Subscribe via email</div>
        </div>
        <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Moontoast-all', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
            <input type="hidden" value="Moontoast-all" name="uri"/>
            <input type="hidden" name="loc" value="en_US"/>
            <div class="left" style="margin-left: 10px;"><input type="text" class="blog_search" onblur="if(this.value==''){this.value='name@address.com'}" onfocus="if(this.value=='name@address.com'){this.value=''}" value="name@address.com" name="email" id="newstext" /></div>
            <div class="left" style="margin-left: -1px;"><input type="submit" class="blog_search_submit" id="newslettersubmit" value="Submit" /></div>
            <div class="clearAll"></div>
        </form>
        <br /><br />
    </div>
    <div class="clearAll"></div>
</div>
