@extends('layout.nosidebar')

@section('content')

@section('title')
	{{ $title }}
@stop

@include('user.profile-stats')

<div class="col-sm-8">

	@if ( Session::has('message') )
		<div class="alert alert-info fade in" role="alert">
      		<button type="button" class="close" data-dismiss="alert">
      			<span aria-hidden="true">×</span>
      			<span class="sr-only">Fèmen</span>
      		</button>
      		<h1>{{ Session::get('message') }}</h1>
    	</div>
	@endif

	<div class="bg-danger">

		@if( $errors )
			<ul class="list-unstyled">
				@foreach ( $errors->all('<li>:message</li>') as $error )
					{{ $error }}
				@endforeach
			</ul>
		@endif

	</div>
	<hr class="visible-xs">
	<div class="row bg-black">
		<h3 class="text-center"><i class="fa fa-music"></i> {{ $title }}</h3>
	</div>
	<hr>

	@if( $mp3count > 0 )

	@include('mp3.grid-12')

	<div class="text-center">
		{{ $mp3s->links() }}
	</div>

	@else

	<h3 class="text-center">Nou regrèt, men ou poko gen mizik.</h3>
	<p class="text-center">
		<a
			href="/mp3/up"
			class="btn btn-primary btn-lg">
			<span class="glyphicon glyphicon-music"></span>
			Mete Yon Mizik
		</a>
	</p>

	@endif
</div>

@stop