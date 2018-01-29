@if(isset($articles))

				        
				        <!-- START CONTENT -->
				        <div id="content-blog" class="content group">
				            @foreach($articles as $article)
				            <div class="sticky hentry hentry-post blog-big group">
				                <!-- post featured & title -->
				                <div class="thumbnail">
				                    <!-- post title -->
				                    <h2 class="post-title"><a href="{{route('articles.show',['alias'=>$article->alias])}}">{{$article->title}}</a></h2>
				                    <!-- post featured -->
				                    <div class="image-wrap">
				                        <img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->max}}" alt="001" title="001" />        
				                    </div>
				                    <p class="date">
				                        <span class="month">{{$article->created_at->format('M')}}</span>
				                        <span class="day">{{$article->created_at->format('d')}}</span>
				                    </p>
				                </div>
				                <!-- post meta -->
				                <div class="meta group">
				                    <p class="author"><span>by <a href="#" title="Posts by {{$article->user->name}}" rel="{{$article->user->name}}">{{$article->user->name}}</a></span></p>
				                    <p class="categories"><span>In: <a href="{{route('articlesCat',['cat_alias'=>$article->category->alias])}}" title="{{$article->category->title}}" rel="category tag">{{$article->category->title}}</a></span></p>
				                    <p class="comments"><span><a href="#respond" title="Comment on Section shortcodes &amp; sticky posts!"></a></span></p>
				                </div>
				                <!-- post content -->
				                <div class="the-content group">
										{!! $article->desc!!}
				                    <p><a href="article.html" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ {{Lang::get('translate.read_more')}}</a></p>
				                </div>
				                <div class="clear"></div>
				            </div>

				            @endforeach


				              	{{$articles->links()}}

				            
				            <!--<div class="general-pagination group"><a href="#" class="selected">1</a><a href="#">2</a><a href="#">&rsaquo;</a></div>-->
				            
				        </div>
 @endif