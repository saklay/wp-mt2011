<?php
    $invisiblelinks = array(
		'What is Moontoast?',
		'Blog',
		'Distributed Commerce',
		'Products'
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
 ?>
 
	</div>
 		<div id="footer">
			<ul>
				<li>
					Social Activation
					<ul class="children">
						<li><a href="http://www.moontoast.com/social-marketing-apps" title="Social Marketing Apps">Social Marketing Apps</a></li>
						<li><a href="http://www.moontoast.com/social-analytics-suite" title="Social Analytics Suite">Social Analytics Suite</a></li>
					</ul>
				</li>
                <li class="page_item page-item-1992"><a title="About the Toast" href="https://www.moontoast.com/about-the-toast">About the Toast</a>
                    <ul class="children">
                        <li class="page_item page-item-1248"><a title="Partners" href="https://www.moontoast.com/about-the-toast/partners">Partners</a></li>
                        <li class="page_item page-item-1350"><a title="Webinars" href="https://www.moontoast.com/about-the-toast/webinars">Webinars</a></li>
                        <li class="page_item page-item-1120"><a title="Partial Client List" href="https://www.moontoast.com/about-the-toast/client-list">Partial Client List</a></li>
                    </ul>
                </li>
				<?php
					$clean_page_list = wp_list_pages('title_li=&depth=2&exclude='.$excludepages); 
					$clean_page_list = preg_replace('/title=\"(.*?)\"/','',$clean_page_list);
					echo $clean_page_list;
				?>
				<li>
				    <a href="#">Follow the Toast</a>
				    <ul class="children">
				        <li><a href="http://www.moontoast.com/blog" title="Blog">Blog</a></li>
				        <li><a href="http://www.youtube.com/MoontoastTV" title="Moontoast TV" target="_blank">Moontoast TV</a></li>
				        <li><a href="http://www.twitter.com/Moontoast" title="Twitter: @Moontoast" target="_blank">Twitter: @Moontoast</a></li>
				        <li><a href="http://www.twitter.com/Fanimpulse" title="Twitter: @FanImpulse" target="_blank">Twitter: @FanImpulse</a></li>
				        <li><a href="http://www.facebook.com/Moontoast" title="Facebook/Moontoast" target="_blank">Facebook/Moontoast</a></li>
				        <li><a href="http://www.facebook.com/Fanimpulse" title="Facebook/FanImpulse" target="_blank">Facebook/FanImpulse</a></li>
				    </ul>
				</li>
			</ul>
			<div class="contact">
				<div class="content">
				    <div>1.888.223.7724</div>
				    <div>Send Us an <a href="/contact" title="Send Us an Email">Email</a></div>
				    <div>Request a <a href="/contact/request-a-demo" title="Request a Demo">Demo</a></div>
				</div>
				<div class="signup">Sign Up For Our Newsletter</div>
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Moontoast-all', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			        <input type="hidden" value="Moontoast-all" name="uri"/>
			        <input type="hidden" name="loc" value="en_US"/>
			        <input type="text" onblur="if(this.value==''){this.value='name@address.com'}" onfocus="if(this.value=='name@address.com'){this.value=''}" value="name@address.com" name="email" id="newstext" /><input type="submit" id="newslettersubmit" value="Submit" />
			    </form>
				<div class="follow">
					<div class="left margin_right_3"><a href="http://www.twitter.com/Moontoast" class="icon_twitter" target="_blank" title="Follow us on Twitter">Follow us on Twitter</a></div>
					<div class="left"><a href="http://www.facebook.com/Moontoast" class="icon_facebook" target="_blank" title="Follow us on Facebook">Follow us on Facebook</a></div>
					<div class="clearAll"></div>
				</div>
				<div class="copyright">
				    <div><span><a href="http://www.moontoast.com/legal/Terms" title="Terms of Use">Terms of Use</a></span> | <span><a href="http://www.moontoast.com/legal/PrivacyPolicy" title="Privacy Policy">Privacy Policy</a></span></div>
				    <div>&copy; <?php echo date('Y'); ?> Moontoast, LLC. All Rights Reserved.</div>
				</div>
			</div>
			<div class="clearboth"></div>
		</div>
<script type="text/javascript">

var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8973162-10']);
  _gaq.push(['_trackPageview']);
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Begin Salesforce tracking code, Place immediately before closing </BODY> tag -->
<SCRIPT type="text/javascript" src="https://lct.salesforce.com/sfga.js"></SCRIPT> 
<SCRIPT type="text/javascript">__sfga();</SCRIPT>
<!-- End Salesforce tracking code, Place immediately before closing </BODY> tag -->
</body>
</html>
