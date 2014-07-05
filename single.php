<?php 
/*
 *
 */ 
get_header(); ?>

<style>
	iframe.twitter-share-button { display: block; visibility: visible; float: left; margin: 0 0 0 10px; }
</style>

<div id="container">
    <div class="blog_left_container">
        <div class="left blog_date">
            <div class="blog_date_header"></div>
            <div class="blog_date_container">
                <div><center><?php the_time('M') ?></center></div>
                <div class="blog_date_day"><center><?php the_time('j') ?></center></div>
                <div><center><?php the_time('Y') ?></center></div>
                <br />
            </div>
            <div style="padding: 0 3px 0 4px;"><div class="blog_date_tail"></div></div>
        </div>
        <div class="right blog_article">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <p class="bold"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></p>
                <p></p>
                <?php the_content(); ?>
                <div class="linkedin_icon"><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="right"></script></div>
                <div class="clearboth"></div>
                <div><?php comments_template(); ?></div>
                <div class="clearboth"></div>
                <p></p>
            <?php endwhile; endif ?>
        </div>
        <div class="clearAll"></div>
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

<?php get_footer(); ?>
