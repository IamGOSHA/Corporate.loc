				                    <li id="li-comment-{{$data['id']}}" class="comment bypostauthor odd">
				                        <div id="comment-{{$data['id']}}" class="comment-container">
				                            <div class="comment-author vcard">
				                                <img alt="" src="https://www.gravatar.com/avatar/?d=monsterid&s=75" class="avatar" height="75" width="75" />
                                                <cite class="fn">{{$data['name']}}</cite>                 
				                            </div>
				                            <!-- .comment-author .vcard -->
				                            <div class="comment-meta commentmetadata">
				                                <div class="intro">

				                                    <div class="commentNumber">&nbsp;</div>
				                                </div>
				                                <div class="comment-body">
				                                    <p>{{$data['text']}}</p>
				                                </div>

				                                <!-- .reply -->
				                            </div>
				                            <!-- .comment-meta .commentmetadata -->
				                        </div>
				                        <!-- #comment-##  -->
				                    </li>