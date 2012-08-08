/**
 * @author @danyjavierb
 * twitterApp module, almost all the twitter interaction than the site NEEDS.
 * sorry i dont have much time, make a pull request, thanks.
 */

var twitterApp = (function($) {

	var twitter_username_re = '@([A-Za-z0-9_]+)';
	var regularQuerys = ["danyjavierb","p2pu_es","p2pu"];

	var tweetElements = [];

	//return JSON.results from search.twitter...
	var tweets;
	var getTweetsQuery = function(query) {

		var jqxhr = $.getJSON("http://search.twitter.com/search.json?callback=?", {
			q : query

		});

		return jqxhr;
	};
	//consumable module

	return {

		/*receive an array with this format, although i think implement some template system
<article class="tweet">
<header><img class = "tweet_img" src="image.img" />
<p class="tweet-header"><a href="#">Dany Bautista</a><span>@danyjavierb</span></p>
</header>
<p class="tweet-text">tweet text</p>
</article>
 */

		getTweetElements : function(El) {
			
			var random=Math.floor(Math.random()*3);
			
			var req = getTweetsQuery(regularQuerys[random]);
		
			req.complete(function(){

				$("#loader").fadeOut(1000,function animationComplete (){
						$("#loader").remove();

				});
			});
			req.success(function(tweets) {

				

				tweets.results.forEach(function(tweetDetail) {

					var tweet = $("<article class= 'tweet'></article>");
					var header = $("<header></header>");
					var image_author;
					var tweet_text;
					var tweet_header_p;
					var tweet_header_a;
					var tweet_header_span;
					var tweet_header_str;
					image_author = $("<img class =tweet_img src= " + tweetDetail.profile_image_url + " />");
					
					tweet_header_p= $('<p class="tweet-header"></p>');
					tweet_header_a=$("<a target='_blank' href='https://twitter.com/account/redirect_by_id?id=" + tweetDetail.from_user_id + "'>" + tweetDetail.from_user_name + '</a>');
					tweet_header_span=$("<span>@" + tweetDetail.from_user + "</span></p>");

					
					
					tweet_header = $(tweet_header_str);
					
					tweet_text = $('<p class="tweet-text">' + tweetDetail.text + '</p>');

					tweet_header_p.append(tweet_header_a,tweet_header_span);
					header.append(tweet_header_p);
					header.append(image_author);
					header.append(tweet_header);
					tweet.append(header, tweet_text);
					tweetElements.push(tweet);

				});
					
				

				if(tweetElements.length===0){
					El.append($("<span>No tweets yet..</span>").slideUp("slow"));
				}
				if(tweetElements.length>=1 && tweetElements.length<=4){
					
					tweetElements.forEach(function(tweetDetail) {

					El.append(tweetDetail.slideDown("slow"));
					
				});

				}
		
				if(tweetElements.length>4){
					var interval1 = setInterval(function(){
						
						var elFirst= tweetElements.shift();
						
						
						if(El.children().length>3){
							El.children("article:first").fadeOut("slow").remove();
							
						}

						El.append(elFirst.slideDown("slow"));
						tweetElements.push(elFirst);
						
					}, 10000);

				}
				
				});
					
				}
			};
		
	

})(jQuery);
