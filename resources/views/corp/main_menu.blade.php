@foreach($items as $item)
<li>
	<a href="{{$item->url()}}">{{$item->title}}</a>
	@if($item->hasChildren())
		<ul class="sub-menu" style="z-index: 2;">
			@include(env('THEME').'.main_menu',['items'=>$item->children()])
		</ul>
	@endif
</li>
@endforeach