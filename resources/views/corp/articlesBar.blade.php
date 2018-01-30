@if(isset($portfolios))

<div class="widget-first widget recent-posts">
				                <h3>Portfolios</h3>
				                <div class="recent-post group">
				                @foreach($portfolios as $portfolio)
				                    <div class="hentry-post group">
				                        <div class="thumb-img"><img style="width: 80px;" src="{{asset(env('THEME'))}}/images/projects/{{$portfolio->img->mini}}" alt="001" title="001" /></div>
				                        <div class="text" style="margin-left: 100px;" >
				                            <a href="{{route('portfolios.show',['alias'=>$portfolio->alias])}}" title="Section shortcodes &amp; sticky posts!" class="title">{{$portfolio->title}}</a>
				                            <p>{{str_limit($portfolio->text,100)}} </p>
				                            <a class="read-more" href="{{route('portfolios.show',['alias'=>$portfolio->alias])}}">&rarr; Read More</a>
				                        </div>
				                    </div>
				                    @endforeach

				                </div>
				            </div>

 @endif    

				            <div id="last-tweets-2" class="widget last-tweets">
				                <h3>Last Tweets</h3>
				                <div class="list-tweets"></div>
				                <script type="text/javascript">
				                    jQuery(function($){
				                    	$('#last-tweets-2 .list-tweets').tweetable({
				                    		listClass: 'tweets-widget',
				                    		username: 'YIW', 
				                    		time: true, 
				                    		limit: 3, 
				                    		replies: true
				                    	});
				                    });
				                </script>
			            	</div>
@if(isset($comments)) 
	            
<div class="widget-last widget recent-comments">
    <h3>Recent Comments</h3>
    <div class="recent-post recent-comments group">
    @foreach($comments as $comment)
        <div class="the-post group">
        
            <div class="avatar">
            @if(isset($comment->email))
                <img alt="" src="https://www.gravatar.com/avatar/{{md5($comment->email)}}?d=mm&55s" class="avatar" /> 
                @endif
            </div>
            <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">{{$comment->name}}</a></strong> in</span> 
            <a class="title" href="{{route('articles.show',['alias'=>$comment->articles->alias])}}">{{$comment->articles->title}}</a>
            <p class="comment">
              <a class="goto" href="article.html">{{$comment->text}}</a>
            </p>
            
        </div>
       @endforeach

    </div>
</div>
@endif 
