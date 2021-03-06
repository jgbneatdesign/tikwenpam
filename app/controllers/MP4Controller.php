<?php

class MP4Controller extends BaseController
{
	public function index()
	{
		$data = [
			'mp4s' => MP4::remember(120)->latest()->paginate(10),
			'title'=> 'Navige Tout Videyo Yo'
		];

		return View::make('mp4.index', $data);
	}

	public function getCreate()
	{
		$data = [
			'categories' => Category::remember(999, 'categories')->orderBy('name')->get(),
			'title' 	 => 'Mete Yon Videyo YouTube'
		];

		return View::make('mp4.up', $data);
	}

	public function store()
	{
		// return Input::all();

		$emailRule = Auth::guest() ? 'required' : '';

		$rules = [
			'name' 	=> 'required|min:6',
			'url' 	=> 'required|url|min:11',
			'email'	=> $emailRule
		];

		$messages = [
			'name.required' 	=> Config::get('site.validate.name.required'),
			'name.min'			=> Config::get('site.validate.name.min'),
			'url.required'		=> Config::get('site.validate.url.required'),
			'url.url'			=> Config::get('site.validate.url.url'),
			'url.min'			=> Config::get('site.validate.url.min'),
			'email.required' 	=> Config::get('site.validate.email.required')
		];

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ( $validator->fails() )
		{
			return Redirect::back()
							->withErrors($validator)
							->withInput();
		}

		// Extracts the YouTube ID from various URL structures
		$name = Input::get('name');
		$url = Input::get('url');

		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
		{
	    	$id 		=	$match[1];
	    	$image_url 	=	"http://img.youtube.com/vi/$id/hqdefault.jpg";
		} else
		{
			return Redirect::back()
							->withMessage( Config::get('site.message.youtube-failed'));
		}

		$storedMP4 = MP4::whereName(Input::get('name'))->first();

		if ($storedMP4)
		{
			if ( Request::ajax() )
	        {
	        	$response = [];

	        	$response['success']  = true;
	        	$response['url'] = "/mp4/{$storedMP3->id}";

	        	return $response;
	        }

			return Redirect::to("mp4/{$storedMP4->id}");
		}

		// Check if there's a user logged in. If not, use the admin ID.
		$admin_id = User::whereAdmin(1)->first()->id;
		$user_id = ( Auth::check() ) ? Auth::user()->id : $admin_id;

		// Insert the infos in the database
		$mp4 				= new MP4;
		$mp4->name 			= Input::get('name');
		$mp4->youtube_id  	= $id;
		$mp4->image 		= $image_url;
		$mp4->user_id 		= $user_id;
		$mp4->category_id 	= Input::get('cat');
		$mp4->description 	= Input::get('description');
		$mp4->save();

		if (App::environment() == 'production')
		{
			TKPM::tweet($mp4, 'mp4');
		}

		if ( Auth::guest() && Input::has('email') )
		{
			$mp4->userEmail = Input::get('email');

			$data = [
				'mp4' 		=> $mp4,
				'subject' 	=> 'Felisitasyon!!! Ou fèk mete yon nouvo mizik'
			];

			TKPM::sendMail('emails.user.guest4', $data, 'guest4');
		}

		else
		{
			// Send a  email to the new user letting them know their video has been uploaded
			$data = [
				'mp4' 		=> $mp4,
				'subject' 	=> 'Felisitasyon!!! Ou fèk mete yon nouvo videyo'
			];

			TKPM::sendMail('emails.user.mp4', $data, 'mp4');
		}


		Cache::flush();

		return Redirect::to('mp4/' . $mp4->id );
	}

	public function show($id)
	{
		$key = '_mp4_show_' . $id;

		if (Cache::has($key))
		{
			$data = Cache::get($key);
			return View::make('mp4.show', $data);
		}

		$mp4 = MP4::with('user', 'category')->findOrFail($id);

		// $mp4->views += 1;
		// $mp4->save();

		$related = MP4::related($mp4)
						->get(['id', 'name', 'image', 'download', 'views']);
		// return $related;

		$author = $mp4->user->username ? '@' . $mp4->user->username . ' &mdash;' : $mp4->user->name . ' &mdash; ';

		$data = [
			'mp4' => $mp4,
			'title' => $mp4->name,
			'related' => $related,
			'author' => $author
		];

		Cache::put($key, $data, 120);

		return View::make('mp4.show', $data);
	}

	public function edit($id)
	{
		$mp4 = MP4::whereId($id)->first();
		$cats = Category::orderBy('name')->get();

		if ( Auth::check() )
		{
			$user = Auth::user();

			if ( $user->id == $mp4->user_id || $user->is_admin() )
			{
				$data = [
				    'mp4' => $mp4,
				    'title' => "Modifye $mp4->name",
				    'cats' => $cats
				];

				return View::make('mp4.put', $data);
			} else
			{
				return Redirect::to('/mp4')
								->withMessage('Ou pa gen dwa pou w modifye videyo a.');
			}
		}

		return Redirect::to('/mp4')
				->with('message', 'Fòk ou konekte w pou w ka aksede ak paj ou vle a.');
	}

	public function update($id)
	{
		$rules = [
			'name' 		=> 'min:6',
			'image'		=> 'image'
		];

		$messages = [
			'name.min'			=> Config::get('site.validate.name.min'),
			'image.image'		=> Config::get('site.validate.image.image')
		];

		$validator = Validator::make( Input::all(), $rules );

		if ( $validator->fails() ) {
			return Redirect::to( Request::url() )
				->withErrors( $validator );
		}

		$name = Input::get('name');
		$description = Input::get('description');
		$category = Input::get('cat');

		$mp4 = MP4::find( $id );

		if (! empty($name))
		{
			$mp4->name = $name;
		}

		if (! empty($description))
		{
			$mp4->description = $description;
		}

		if (! empty($image))
		{
			$mp4->image = $imagename;
		}

		if (! empty($category))
		{
			$mp4->category_id = $category;
		}

		$mp4->save();

		Cache::flush();

		return Redirect::to('/mp4/' . $mp4->id )
			->with('message', Config::get('site.message.update-success'));
	}

	public function destroy($id)
	{
		if ( Auth::check() ) {

			$mp4 = MP4::find($id);

			if ( Auth::user()->id == $mp4->user_id || User::is_admin() )
			{
				if ($mp4)
				{
					$mp4->delete();

					Cache::flush();

					if ( Auth::user()->is_admin() ) return Redirect::to('/admin/mp4');

					return Redirect::to('/mp4');
				} else
				{
					return Redirect::to('/mp4')
									->withMessage(Config::get('site.message.delete-mp4-failed'));
				}
			}
		}

		return Redirect::to('/mp4')
			->with('message', 'Ou pa gen dwa pou efase videyo a.');

	}

	public function getMP4($id)
	{
		$mp4 = MP4::find($id);

		$mp4->download += 1;
		$mp4->save();

		if ($mp4)
		{
			$youtube_url = 'http://savefrom.net/#url=' . urlencode('https://www.youtube.com/watch?v=' . $mp4->youtube_id);
			return Redirect::to($youtube_url);
		}
		else
		{
			return Redirect::to('/mp4')
							->withMessage('Nou regrèt, men ou pa ka telechaje videyo ou vle a.');
		}
	}

}