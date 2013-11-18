<?php get_header(); ?>

    <div id="dashboard-main" role="main">
      <div class="row">
        <section class="white-bg two-columns">
        <h3>Total so far: <span id="period-graph-title"></span></h3>
        <div class="graph-box-container">
	        <div id="period-graph-container">
	          <div class="top graph-amount-marker">$100</div>
	          <div class="bottom graph-amount-marker">$0</div>
	          <div class="spacing-container" data-period-bar-container>
	            <div class="column">
	              <div class="bar"><div class="above-title"></div><div class="below-title"></div></div>
	            </div>
	          </div>
	        </div>
	    </div>
      </section>

      <section class="white-bg two-columns">
        <h3>Income by Source</h3>
        <div class="graph-box-container">
	        <div id="source-graph-container" data-source-bar-container>
	          <div class="column">
	            <div class="bar"><div class="above-title"></div><div class="below-title"></div></div>
	          </div>
	        </div>
	    </div>
      </section>
      </div>

      <div class="row">
        <section class="white-bg two-columns">
        <h3>View Source Fundraising Blog</h3>
        <?php if ( dynamic_sidebar('view-blog-widget') ) : else : endif; ?>
        <div id="latest-blog-summary">
            <?php 
                $args = array(
                    'numberposts' => 1,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'suppress_filters' => true );
                $latest_post = wp_get_recent_posts( $args, ARRAY_A )[0];
                $the_post_date = explode("-", substr($latest_post["post_date"],0,10));
                $the_post_year = $the_post_date[0];
                $the_post_month = substr( date("F",mktime(0,0,0,$the_post_date[1])), 0, 3);
                $the_post_day = $the_post_date[2];
                $the_post_url = get_permalink($latest_post["ID"]); 
                $the_post_title = $latest_post["post_title"];
                $the_author = get_user_by('id',$latest_post["post_author"]);
                $the_author_avatar = get_avatar( $latest_post["post_author"], 20);
                $the_author_page = get_author_posts_url($latest_post["post_author"]);
                $the_author_name = $the_author->display_name;
                $the_num_comments = $latest_post["comment_count"];
                if ( $latest_post["post_excerpt"] ){
                  $the_excerpt = strip_tags( $latest_post["post_excerpt"] );
                }else{
                  $the_excerpt = strip_tags( $latest_post["post_content"] );
                }
                if ( str_word_count($the_excerpt) > 50 ){
                  $continue_reading_tag = "Continue reading";
                }
                // show the first 50 words
                $the_excerpt = explode(" ", $the_excerpt);
                $the_excerpt = implode(" ",array_slice($the_excerpt,0,50));
                // post date
                echo "<div id='blog-post-date'>";
                echo "<div id='month'>" . $the_post_month . "</div>";
                echo "<div id='day'>" . $the_post_day . "</div>";
                echo "<div id='year'>" . $the_post_year . "</div>";
                echo "</div>";
                // post title
                echo "<a id='blog-title' href='" . $the_post_url . "' title='" . esc_attr($the_post_title)."' >" . $the_post_title . "</a> ";
                echo "<div class='clear'></div>";
                // post author
                echo "<div id='author'>" . "<a href='" . $the_author_page . "' title='" . esc_attr($the_author_name)."' >" ;
                echo $the_author_avatar;
                echo $the_author_name . "</a> ";
                echo "</div>";
                // post comments
                echo "<div id='num-comments'><a href='" . $the_post_url . "#comments'>" .  $the_num_comments . "</a></div>";
                echo "<div class='clear'></div>";
                // post excerpt
                echo "<div id='blog-excerpt'>" . $the_excerpt;
                if ( $continue_reading_tag ){
                  echo "... ";
                  echo '<a href="' . $the_post_url . '" >' . $continue_reading_tag .'</a>';
                }
                echo "</div>";
            ?>
        </div>
      </section>

      <section class="white-bg two-columns">
        <h3>You Be the Fundraiser Poll</h3>
        <?php if ( dynamic_sidebar('polls-widget') ) : else : endif; ?>
      </section>
      </div>

      <div class="row">
        <section id="older-blog-post" class="white-bg three-columns">
        <h3>Older Blog Post</h3>
        <?php if ( dynamic_sidebar('older-blog-post-widget') ) : else : endif; ?>
      </section>

      <section id="twitter-feeds" class="white-bg three-columns">
        <h3>Twitter Feeds</h3>
        <?php if ( dynamic_sidebar('twitter-feed-widget') ) : else : endif; ?>
        <a class="twitter-timeline" href="https://twitter.com/search?q=%23lovetheweb+OR+%23protecttheweb" data-widget-id="401474842102202368" data-tweet-limit="1" data-chrome="noheader nofooter transparent noborders">Tweets about "#lovetheweb OR #protecttheweb"</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </section>

      <section id="links" class="white-bg three-columns">
        <h3>Links</h3>
        <a href="https://sendto.mozilla.org/" target="_blank">Donate Today</a><br/>
        <a href=<?php echo get_page_uri('52') ?> target="_blank">Campaign Overview</a><br/>
        <a href="http://www.mozilla.org/en-US/about/manifesto/" target="_blank">Mozilla Manifesto</a><br/>
        <a href="" target="">What is our fundraising</a>
      </section>
      </div>

    </div><!-- #content-main -->
<?php get_footer(); ?>