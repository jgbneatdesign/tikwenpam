@extends('layout.admin')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center">
		<i class="fa fa-file"></i>
		{{ $title }}
	</h1>
	</div>
	<hr>
</div>

<div class="col-sm-8 col-sm-offset-2">
	
	@include('inc.errors')

	{{ Form::open(['method' => 'PUT', 'id' => 'form-page-create']) }}


		<div class="form-group">
			<input
				required type="text"
				name="name"
				class="form-control"
				id="title"
				placeholder="Tit Paj La"
				value="{{ $page->title }}">
		</div>

		<div class="form-group">
			<input
				required type="text"
				name="slug"
				class="form-control"
				id="slug"
				placeholder="Slug Paj La"
				value="{{ $page->slug }}">
		</div>

		<div class="form-group">
			<textarea name="content" id="content" class="form-control" rows="10" required="required" placeholder="Kontni paj la">{{ $page->content }}</textarea>
		</div>

		<div class="form-group">
			<p>
				<button type="submit" class="btn btn-primary btn-lg" id="submitButton">
					<i class="fa fa-file"></i>
					Modifye
				</button>
			</p>
		</div>

	{{ Form::close() }}

</div>

@stop