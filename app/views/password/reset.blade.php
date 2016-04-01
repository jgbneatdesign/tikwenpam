@extends('layout.admin')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center"><i class="fa fa-key"></i> {{ $title }}</h1>
	</div>
	<hr>

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			@if ( Session::has('status') )
			<div class="alert alert-success fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Fèmen</span>
				</button>
				<h4>{{ Session::get('status') }}</h4>
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

			<form action="{{ action('RemindersController@postReset') }}" method="POST">
			    <input type="hidden" name="token" value="{{ $token }}">
			    <div class="form-group">
			    	<input
			    		type="email"
			    		class="form-control"
			    		name="email"
			    		placeholder="Antre imel ou a"
			    		required>
			    </div>
			    <div class="form-group">
				    <input
				    	type="password"
				    	class="form-control"
				    	name="password"
				    	placeholder="Antre nouvo modpas ou a"
				    	required>
			    </div>
			    <div class="form-group">
				    <input type="password"
				    name="password_confirmation"
				    class="form-control"
				    placeholder="Antre nouvo modpas ou a ankò"
				    required>
			    </div>
			    <div class="form-group">
			    	<button
			    		type="submit"
			    		class="btn btn-primary btn-lg">
			    		<i class="fa fa-key"></i>
			    		Reyinisyalize
			    	</button>
			    </div>
			</form>
		</div>
	</div>

</div>

@stop