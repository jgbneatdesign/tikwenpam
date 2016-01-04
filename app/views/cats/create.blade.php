@extends('layout.admin')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h2 class="text-center"><i class="fa fa-th-list"></i> {{ $title }}</h2>
	</div>
	<hr>
</div>

<div class="col-sm-8 col-sm-offset-2">

	@include('inc.errors')

	<div class="row">
		<div class="col-sm-6">
			{{ Form::open(array('url' => '/cat/create', 'method' => 'POST', 'id' => 'form-category-create')) }}

				<div class="form-group">
					<input name="name" type="name" class="form-control" id="name" placeholder="Non kategori a">
				</div>

				<div class="form-group">
					<input name="slug" type="name" class="form-control" id="slug" placeholder="Slug kategori a">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-th-list"></i>
						Kreye
					</button>
				</div>

			{{ Form::close() }}
		</div>

		<div class="col-sm-6">
			@include('admin.modules.categories')
		</div>
	</div>
</div>

@stop