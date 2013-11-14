<?php
/*
Template Name: Campaign Overview Page
*/
?>
<?php get_header('pages'); ?>

<style>
	body{
		font-family: "Open Sans Light", "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, sans-serif;
		font-size: 15px;
		overflow-x: hidden;
	}

	#brochure{
		overflow: hidden;
		/*background: #000;*/
		padding: 100px 0;
	}

	#brochure header{
		font-size: 36px;
		margin-bottom: 50px;
	}

	#brochure section{
		float: left;
		width: 50%;
	}

	#chart{
		padding-left: 120px;
		padding-right: 60px;
	}

	#explanation{
		padding-left: 60px;
		padding-right: 120px;
	}	

	#letter{
		overflow: hidden;
		background: #4e9dd5;
		color: #fff;
		padding: 100px 0;
	}

	#letter header{
		font-size: 35px;
		margin-bottom: 15px;
	}

	#letter section{
		float: left;
		width: 50%;
	}

	#letter-content{
		padding-left: 120px;
		padding-right: 60px;
	}


	#letter-content .col{
		width: 48%;
		float: left;
	}

	#letter-content .col:first-of-type{
		margin-right: 2%;
	}

	#letter-content .col:last-of-type{
		margin-left: 2%;
	}

	#letter-cover{
		padding-left: 60px;
		padding-right: 120px;
	}

	#letter-cover #title{
		font-size: 85px;
		line-height: 150%;
		padding: 100px;
	}

	.all-cap{
		text-transform: uppercase;
	}




	
	@media only screen and (min-width: 480px) and (max-width: 1850px) {

	  	#letter-cover #title{
			font-size: 50px;
			line-height: 150%;
		}

	}


</style>

<div id="brochure">
	<section>
		<div id="chart">
			<img src="http://localhost:8888/wordpress/wp-content/uploads/2013/11/Mozilla-EOY-Campaign-Final-big.png" />
		</div>
	</section>
	<section>
		<div id="explanation">
			<header><b>End of Year Fundraising Campaign</b></header>
			<p>
				2013 will see Mozilla launch its first large-scale, end of year fundraising campaign. Our design builds from the community conversations - in person, on the phone, and through surveys - we've held over the past year.
			</p>
			<ul>
				<li>
					Each month will focus on one of hte themes behind our mission: flight, make, and empower.
				</li>
				<li>
					A blog post by a senior executive will set the tone and provide language for the proceeding outreach across our channels.
				</li>
				<li>
					The frequency of communication will ramp up as we near the end of December, culminating on the 30th, the biggest day of the year for campaign fundraising.
				</li>
			</ul>
			<p>
				We're fortunate to have new leadership behind this year's efforts, including a senior executive joining us from Change.or.  We have also engaged M+R Strategic Services, who advise Wikimedia's fundraising.
			</p>
			<p>
				We're commited to making the 2013 campaign a success and hope that you'll join us in making it the biggest and best yet.
			</p>
		</div>
	</section>
</div>


<div id="letter">
	<section>
		<div id="letter-content">
			<header class="all-cap">Why this matters</header>
			<div class="col">
				<p>
					<b>I love Mozilla.</b> I've made the web my life's work and I came here because I saw my values reflected in the Manifesto.
				</p>
				<p>
					That's why we're all here: to keep the web open. To take on new challenges and grow Mozilla's legacy.
				</p>
				<p>
					We're in a fight to decide who gets to build the future of the web. And we're up against people with orders of magnitude more time, money, and resources than we have.
				</p>
				<p>
					The beauty of our project has always been that we can do more with less.  When we win, it's because of the people who contribute to the mission.
				</p>
				<p>
					But as the importance of our mission grows - as the web faces new threats - we need to seize every advantage we have, build our resource base, and create new wyas to contribute.
				</p>
			</div>
			<div class="col">
				<p>
					We're going to need millions more people who not only care about the web, but contribute to keep it open - educators, coders, webmakers, and activists.
				</p>
				<p>
					We also need more people to contribute money. Donations increase our chance of success, fund programs that teach and advocate for the web, and show that we're different.  They show we're proudly non-profit.
				</p>
				<p>
					A community of Mozillians is already working to make this year's end of year campaign the best yet. The inside of this brochure provides an overview of our plans.  We'll need your support to make it successful. Let's keep making the web open and awesome for everyone.
				</p>
				<p>
					<b>Mark Surman</b><br/>
					Executive Director<br/>
					Mozilla
				</p>
			</div>
		</div>
	</section>
	<section>
		<div id="letter-cover">
			<div id="title" class="all-cap">
				<b>2013</b> <br/>
				END OF YEAR <br/>
				FUNDRAISING <br/>
				CAMPAIGN <br/>
			</div>
		</div>
	</section>
</div>

<?php get_footer('pages'); ?>
