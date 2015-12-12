<div class="col-sm-4">
	<h2 class="text-center">

		<?php $user = Auth::user(); ?>
		@if( $user->image )
		<img
			class="img-responsive img-circle img-bordered img-centered"
			src="/uploads/images/thumbs/{{ $user->image}}"
		>
		@endif
		<small>{{ ucwords( $user->name ) }}</small>
	</h2>
	<hr>

	<ul class="list-group">
	  	<li class="list-group-item disabled">
	  		<span class="glyphicon glyphicon-stats"></span>
	    	Aktivite Mizik
	  	</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-eye-open"></span>
			Total Afichaj
			<span class="pull-right badge">{{ $mp3ViewsCount }}</span>
		</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-facetime-video"></span>
			Total Mizik
			<span class="pull-right badge">{{ $mp3count }}</span>
		</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-headphones"></span>
			Total Ekout
			<span class="pull-right badge">{{ $mp3playcount }}</span>
		</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-download-alt"></span>
			Total Telechajman
			<span class="pull-right badge">{{ $mp3downloadcount }}</span>
		</li>


		<li class="list-group-item disabled">
			<span class="glyphicon glyphicon-stats"></span>
	    	Aktivite Videyo
	  	</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-eye-open"></span>
			Total Afichaj
			<span class="pull-right badge">{{ $mp4ViewsCount }}</span>
		</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-facetime-video"></span>
			Total Videyo
			<span class="pull-right badge">{{ $mp4count }}</span>
		</li>
		<li class="list-group-item">
			<span class="glyphicon glyphicon-download-alt"></span>
			Total Telechajman
			<span class="pull-right badge">{{ $mp4downloadcount }}</span>
		</li>
	</ul>

	<p class="text-center">
		<a href="/mp3/up" class="btn btn-primary btn-lg">
			<span class="glyphicon glyphicon-music"></span>
			Mete Yon Mizik
		</a>
	</p>
	<p class="text-center">
		<a href="/mp4/up" class="btn btn-danger btn-lg">
			<span class="glyphicon glyphicon-facetime-video"></span>
			Mete Yon Videyo
		</a>
	</p>
</div>