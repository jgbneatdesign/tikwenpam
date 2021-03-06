@extends('layout.nosidebar')

@section('title')
	{{ $title }}
@stop

@section('content')

	<div class="col-sm-12">
		<div class="row bg-black">
			<h1 class="text-center">
			<i class="fa fa-video-camera"></i>
			{{ $title }}
		</h1>
		</div>
		<hr>
	</div>

	<div class="col-sm-8 col-sm-offset-2">

			@if( count( $errors ) > 0  )
			<div class="panel panel-default">
				<ul class="list-group bg-danger">
					@foreach ( $errors->all('<li class="list-group-item transparent"><b>:message</b></li>') as $error )
						{{ $error }}
					@endforeach
				</ul>
			</div>
			@endif

		{{ Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data', 'url' => '/mp4', 'class' => 'form-horizontal' ]) }}

			@if ( Auth::guest() )
			<div class="form-group">
				<label for="email" class="col-sm-4 control-label">Ki Imel Ou?</label>
				<div class="col-sm-8">
					<input required
						type="email"
						name="email"
						class="form-control"
						id="name"
						placeholder="Antre Imel Ou"
						value="{{ Input::old('email') }}" >
				</div>
			</div>
			@endif

			<div class="form-group">
				<label for="name" class="col-sm-4 control-label">Mete Non Videyo a</label>
				<div class="col-sm-8">
					<input required type="text" name="name" class="form-control" id="name" placeholder="Antre Non Videyo YouTube la" value="{{ Input::old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="col-sm-4 control-label">Mete Lyen Videyo a</label>
				<div class="col-sm-8">
					<input required type="url" name="url" class="form-control" id="url" placeholder="Antre Lyen Videyo YouTube la" value="{{ Input::old('url') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="category" class="col-sm-4 control-label">Kategori Videyo a</label>
				<div class="col-sm-8">
					<select class="form-control" name="cat">

					@foreach( $categories as $category )
						<option
							value="{{ $category->id }}"
							{{ $category->slug == 'rap' ? 'selected' : '' }}>
							{{ $category->name }}
						</option>
					@endforeach

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-sm-4 control-label">Detay videyo a</label>
				<div class="col-sm-8">
					<textarea
						name="description"
						class="form-control"
						id="description"
						placeholder="Bay kèk enfòmasyon sou videyo a" >{{ Input::old('description') }}</textarea>
				</div>
			</div>

			<div class="col-sm-8 col-sm-offset-4">
				<p>
					<button type="submit" class="btn btn-primary btn-lg">
						<i class="fa fa-cloud-upload"></i>
						Mete Videyo a
					</button>
				</p>
			</div>

		{{ Form::close() }}

		<br>
	</div>

@stop