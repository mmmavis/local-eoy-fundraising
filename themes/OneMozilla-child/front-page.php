<?php get_header(); ?>

    <div id="dashboard-main" role="main">
      <div class="row">
        <section class="white-bg two-columns">
        <h3 id="period-graph-title">Total so far: $750,000</h3>
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
        <?php if ( dynamic_sidebar('older-blog-post-widget') ) : else : endif; ?>
        <!-- <div>
          <a href="" target="">Why people give</a><br/>
          <a href="" target="">Money and the Mission</a><br/>
          <a href="" target="">Cash is king</a><br/>
          <a href="" target="">Why people give</a><br/>
          <a href="" target="">Money and the Mission</a>
        </div> -->
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
    <script>
      (function() {
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

        function formatDate (date) {
          return (date.getMonth() + 1) + '/' + date.getDate();
        }

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://s3.amazonaws.com/mozilla-bsd-cache/eoy.json', true);
        xhr.onload = function () {
          var bsdData = JSON.parse(xhr.responseText);
          var periodData = bsdData.period;
          var sourceData = bsdData.source;

          function createPeriodGraph () {
            periodData = periodData.sort(function (a, b) {
              if (a.month === b.month) {
                return a.startDate > b.startDate ? 1 : (a.startDate < b.startDate ? -1 : 0)
              }
              else {
                return a.month > b.month ? 1 : (a.month < b.month ? -1 : 0)
              }
            });

            var graphContainer = document.querySelector('*[data-period-bar-container]');
            var columnTemplate = graphContainer.querySelector('.column');
            columnTemplate.parentNode.removeChild(columnTemplate);

            var totalDollars = periodData.reduce(function(acc, period) { return acc + period.data.amount; }, 0);

            document.querySelector('#period-graph-container .graph-amount-marker.top').innerHTML = '$' + totalDollars;

            var runningTotalDollars = 0;
            var runningTotalContributors = 0;

            periodData.forEach(function (period, index) {
              var column = columnTemplate.cloneNode(true);
              var columnWidth = 100 / periodData.length;
              var bar = column.querySelector('.bar');
              var aboveTitle = column.querySelector('.above-title');
              var belowTitle = column.querySelector('.below-title');

              column.style.width = columnWidth + '%';
              runningTotalDollars += period.data.amount;
              runningTotalContributors += period.data.contributors;

              bar.style.height = 80 * ( period.data.amount > 0 ? runningTotalDollars : 20 ) / totalDollars + '%';
              // bar.style.height = 80 * runningTotalDollars / totalDollars + '%';

              var startPercentage = -100 * index;
              var endPercentage = 100 * (periodData.length - index);

              startPercentage = startPercentage + '%';
              endPercentage = endPercentage + '%';

              bar.style.background = '#43afc7';
              bar.style.background = '-moz-linear-gradient(left,  #43afc7 ' + startPercentage + ', #90cdd1 ' + endPercentage + ')';
              bar.style.background = '-webkit-gradient(linear, left top, right top, color-stop(' + startPercentage + ', #43afc7), color-stop(' + endPercentage + ', #90cdd1))';
              bar.style.background = '-webkit-linear-gradient(left,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';
              bar.style.background = '-o-linear-gradient(left,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';
              bar.style.background = '-ms-linear-gradient(left,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';
              bar.style.background = 'linear-gradient(to right,  #43afc7 ' + startPercentage + ',#90cdd1 ' + endPercentage + ')';

              var startDate = new Date(period.month + '/' + period.startDate + '/' + '2013');
              var endDate = new Date(period.month + '/' + period.endDate + '/' + '2013');

              belowTitle.appendChild(document.createTextNode(formatDate(startDate) + ' - ' + formatDate(endDate)));
              // aboveTitle.appendChild(document.createTextNode('$' + runningTotalDollars + ' (' + runningTotalContributors + ')'));

              graphContainer.appendChild(column);
            });
          }

          function createSourceGraph () {
            var graphContainer = document.querySelector('*[data-source-bar-container]');
            var columnTemplate = graphContainer.querySelector('.column');

            columnTemplate.parentNode.removeChild(columnTemplate);

            var totalContributions = sourceData.reduce(function(acc, source) { return acc + source.data.contributions; }, 0);

            sourceData.forEach(function (source) {
              var column = columnTemplate.cloneNode(true);
              var aboveTitle = column.querySelector('.above-title');
              var belowTitle = column.querySelector('.below-title');
              column.style.width = 100 / sourceData.length + '%';
              column.querySelector('.bar').style.height = 80 * source.data.contributions / totalContributions + '%';
              belowTitle.appendChild(document.createTextNode(source.name[0].toUpperCase() + source.name.substr(1)));
              aboveTitle.appendChild(document.createTextNode('$' + source.data.amount + ' from ' + source.data.contributors + ' contributors'));
              graphContainer.appendChild(column);
            });
          }

          createPeriodGraph();
          createSourceGraph();
        };
        xhr.overrideMimeType('text/json');
        xhr.send();
      })();
    </script>
<?php get_footer(); ?>