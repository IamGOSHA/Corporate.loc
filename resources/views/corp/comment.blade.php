				                   @foreach($items as $item)
				                    <li id="li-comment-{{$item->id}}" class="comment bypostauthor odd">
				                        <div id="comment-{{$item->id}}" class="comment-container">
				                            <div class="comment-author vcard">
				                                <img alt="" src="https://www.gravatar.com/avatar/?d=monsterid&s=75" class="avatar" height="75" width="75" />
                                                <cite class="fn">{{$item->name}}</cite>                 
				                            </div>
				                            <!-- .comment-author .vcard -->
				                            <div class="comment-meta commentmetadata">
				                                <div class="intro">
				                                    <div class="commentDate">
				                                        <a href="#">
				                                        {{$item->created_at->format('F d, Y \a\t H:i')}}</a>                        
				                                    </div>
				                                    <div class="commentNumber">&nbsp;</div>
				                                </div>
				                                <div class="comment-body">
				                                    <p>{{$item->text}}</p>
				                                </div>
				                                <div class="reply group">
				                                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;, &quot;{{$item->id}}&quot;, &quot;respond&quot;, &quot;{{$item->articles_id}}&quot;)">Reply</a>                    
				                                </div>
				                                <!-- .reply -->
				                            </div>
				                            <!-- .comment-meta .commentmetadata -->
				                        </div>
				                        <!-- #comment-##  -->
				                       @if(isset($comm[$item->id]))
				                       	<ul class="children">
				                       		@include(env('THEME').'.comment',['items' => $comm[$item->id]])

				                       	</ul>
				                       @endif
				                    </li>
				                     @endforeach
