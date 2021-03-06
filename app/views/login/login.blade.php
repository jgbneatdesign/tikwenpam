@extends('layout.nosidebar')

@section('title')
{{ $title }}
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center"><i class="fa fa-sign-in"></i> {{ $title }}</h1>
	</div>
	<hr>
</div>
<div class="col-sm-8 col-sm-offset-2">

	@if ( Session::has('message') )
		<div class="alert alert-warning fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">×</span>
						<span class="sr-only">Fèmen</span>
					</button>
					<h3>{{ Session::get('message') }}</h3>
			</div>
	@endif


		@if( Session::has('error') )
		<div class="panel panel-default">
			<ul class="list-group bg-danger">
				<li class="list-group-item transparent">
					<b>{{ Session::get('error') }}</b>
				</li>
				</ul>
			</div>
		@endif

	@include('login.form-login')

	<br>
</div>

@stop