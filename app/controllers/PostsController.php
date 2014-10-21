<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			
			$content=e(Input::get('content'));

            $http = substr($content,0,4);

            if($http=='http'){

                $a = substr($content,6,17);
                $content = substr($content,32,12);
                $xxx = '//www.youtube.com/v/'.$content;
                $yyy = '<object width="420" height="315"><param name="movie" value="'.$xxx;
                $zzz = $yyy.'?hl=en_US&amp;version=3&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="';
                $aaa = $zzz.$xxx;
                $bbb = $aaa.'?hl=en_US&amp;version=3&amp;rel=0" type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>';
                $content = $bbb;
            }


			$post_muro = new Post;
			$post_muro->user_id = Auth::id();
            $post_muro->muro_id = e(Input::get('id'));
			$post_muro->title = e(Input::get('title'));
			$post_muro->content = $content;
			$post_muro->save();//guardamos un modelo comment
			$posts_user = Post::where('muro_id', '=', e(Input::get('id')))->orderBy('created_at','desc')->get();
			

			return Redirect::back()->with('id_user', $posts_user);
	


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $post = Post::find($id);
		 $post->delete();
		 return Redirect::back();
	}


}
