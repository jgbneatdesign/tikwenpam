@if ( $related->count() > 0 )
	<div class="row bg-black">
		<h3 class="text-center">
			<i class="fa fa-music"></i>
			Mizik nan menm kategori {{ $mp3->category->name }}
			<i class="fa fa-th-list"></i>
		</h3>
	</div>
	<hr>
	@foreach ( $related as $rel )
	@include('mp3.related-grid-12')
	@endforeach
@endif