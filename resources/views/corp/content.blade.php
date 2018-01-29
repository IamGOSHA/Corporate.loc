 @if(isset($portfolios))

 <div id="content-home" class="content group">
				            <div class="hentry group">
				                <div class="section portfolio">
				                   @foreach($portfolios as $k=>$portfolio)

				                   		@if($k===0)
				                   				
				                    <h3 class="title">{{trans('translate.latest_projects')}}</h3>
				                    
				                    <div class="hentry work group portfolio-sticky portfolio-full-description">
				                        <div class="work-thumbnail">
				                            <a class ="thumb"><img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}" alt="0081" title="0081" /></a>
				                            <div class="work-overlay">
				                                <h3><a href="project.html">{{$portfolio->title}}</a></h3>
				                                <p class="work-overlay-categories"><img src="{{asset(env('THEME').'/images/categories.png')}}" alt="Categories" /> in: <a href="category.html">{{$portfolio->filter->title}}</a></p>
				                            </div>
				                        </div>
				                        <div class="work-description">
				                            <h2><a href="project.html">{{$portfolio->title}}</a></h2>
				                            <p class="work-categories">in: <a href="category.html">{{$portfolio->filter->title}}</a></p>
				                            <p>{{str_limit($portfolio->text,200)}} [...]</p>
				                                <a href="project.html" class="read-more">|| Read more</a>
				                        </div>
				                       		@continue
				                        @endif
				                         
				                        @endforeach
				                        
				                    </div>
				                    
				                    <div class="clear"></div>
				                    
				                    <div class="portfolio-projects">
				                        @foreach($portfolios as $k=>$portfolio)
				                       
				                        <div class="related_project {{($k == Config::get('settings.take'-1)) ? 'related_project_last' :''}}"  > 
				                            <div class="overlay_a related_img">
				                                <div class="overlay_wrapper">
				                                    <img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->mini }}" alt="0061" title="0061" />						
				                                    <div class="overlay">
				                                        <a class="overlay_img" href="{{asset(env('THEME'))}}/images/projects/{{$portfolio->img->max}}" rel="lightbox" title=""></a>
				                                        <a class="overlay_project" href="{{route('portfolios.show',['alias'=> $portfolio->alias])}}"></a>
				                                        <span class="overlay_title">Love</span>
				                                    </div>
				                                </div>
				                            </div>
				                            <h4><a href="{{route('portfolios.show',['alias'=> $portfolio->alias])}}">{{$portfolio->title}}</a></h4>
				                            <p>{{str_limit($portfolio->text,200)}} [...]
				                            <a href="{{route('portfolios.show',['alias'=> $portfolio->alias])}}" class="read-more">|| Read more</a></p>

				                        </div>

				                        @endforeach
				                    </div>
				                </div>
				                <div class="clear"></div>
				            </div>

				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>

 @endif