<script async src="{{ TKPM::asset('js/app.nice.js') }}"></script>

@unless ( App::isLocal() )

	{{-- Facebook Page Plugin --}}
	@include('inc.fb-script')

	{{-- Google Analytics --}}
	@include('inc.ga')

@endunless

@section('scripts')
@show