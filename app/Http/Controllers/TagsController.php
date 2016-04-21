<?php

namespace App\Http\Controllers;

use Api\Transformers\TagTransformer;
use App\Lesson;
use App\Tag;
use App\Http\Requests;

class TagsController extends ApiController
{

	protected $tagTransformer;

	public function __construct(TagTransformer $tagTransformer){
		$this->tagTransformer = $tagTransformer;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lessonId = null)
    {
		$tags = $this->getTags($lessonId);

		return $this->respond($this->tagTransformer->transformCollection($tags->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$tag = Tag::findOrFail($id);

		return $tag;
    }

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $lessonId
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	private function getTags($lessonId)
	{
		$tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
		return $tags;
	}
}
