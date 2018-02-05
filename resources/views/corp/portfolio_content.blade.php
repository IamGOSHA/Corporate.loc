@if(isset($portfolios))

<!-- START CONTENT -->
<div id="content-page" class="content group">
    <div class="hentry group">
        <script>
            jQuery(document).ready(function($){
            	$('.sidebar').remove();
            	
            	if( !$('#primary').hasClass('sidebar-no') ) {
            		$('#primary').removeClass().addClass('sidebar-no');
            	}
            	
            });
        </script>
        <div id="portfolio" class="portfolio-big-image">
            @foreach($portfolios as $portfolio)
            <div class="hentry work group">
                <div class="work-thumbnail">
                    <div class="nozoom">
                        <img src="{{asset(env('THEME'))}}/images/projects/{{(Route::currentRouteName() === 'portfolios.show')? $portfolio->img->path : $portfolio->img->max}}" alt="0061" title="0061" />							
                        <div class="overlay">
                            <a class="overlay_img" href="{{asset(env('THEME'))}}/images/projects/{{$portfolio->img->path}}" rel="lightbox" title="{{$portfolio->title}}"></a>
                            <a class="overlay_project" href="{{route('portfolios.show',['alias'=>$portfolio->alias])}}"></a>
                            <span class="overlay_title">{{$portfolio->title}}</span>
                        </div>
                    </div>
                </div>
                <div class="work-description">
                    <h3>{{$portfolio->title}}</h3>
                    <p>{!! str_limit($portfolio->text,400)!!}</p>
                     
                    <div class="clear"></div>
                    <div class="work-skillsdate">
                        <p class="skills"><span class="label">Skills:</span>{{$portfolio->filter_alias}}</p>
                    </div>
                    <a class="read-more" href="{{route('portfolios.show',['alias'=>$portfolio->alias])}}">{{Lang::get('translate.view_project')}}</a>            
                </div>
                <div class="clear"></div>
            </div>
            @endforeach

            <span style="display: inline-block">{{$portfolios->links()}}</span>
        </div>
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>
<!-- END CONTENT -->

@endif