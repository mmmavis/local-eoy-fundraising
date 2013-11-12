<?php get_header(); ?>

    <div id="content-main" class="main" role="main">
    	<div class="row">
    		<section class="white-bg two-columns">
				<h3>Total so far: $750,000</h3>
				<img src="http://localhost:8888/wordpress/wp-content/uploads/2013/11/placeholder_1.png" />
			</section>

			<section class="white-bg two-columns">
				<h3>Income by Source</h3>
				<img src="http://localhost:8888/wordpress/wp-content/uploads/2013/11/placeholder_2.png" />
			</section>
    	</div>

    	<div class="row">
    		<section class="white-bg two-columns">
				<h3>View Source Fundraising Blog</h3>
				<?php if ( dynamic_sidebar('rss-feed-widget') ) : else : endif; ?>
			</section>

			<section class="white-bg two-columns">
				<h3>You Be the Fundraiser Poll</h3>
				<?php if ( dynamic_sidebar('polls-widget') ) : else : endif; ?>
			</section>
    	</div>

    	<div class="row">
    		<section id="older-blog-post" class="white-bg three-columns">
				<h3>Older Blog Post</h3>
				<div>
					<a href="" target="">Why people give</a><br/>
					<a href="" target="">Money and the Mission</a><br/>
					<a href="" target="">Cash is king</a><br/>
					<a href="" target="">Why people give</a><br/>
					<a href="" target="">Money and the Mission</a>
				</div>
			</section>

			<section id="twitter-feeds" class="white-bg three-columns">
				<h3>Twitter Feeds</h3>
				<?php if ( dynamic_sidebar('twitter-feed-widget') ) : else : endif; ?>
			</section>

			<section id="links" class="white-bg three-columns">
				<h3>Links</h3>
				<h4>Donate Today</h4>
				<a href="" target="">Campaign Overview</a><br/>
				<a href="" target="">What donating fund</a><br/>
				<a href="" target="">Mozilla Manifesto</a><br/>
				<a href="" target="">What is our fundraising</a>
			</section>
    	</div>

    </div><!-- #content-main -->

<?php get_footer(); ?>