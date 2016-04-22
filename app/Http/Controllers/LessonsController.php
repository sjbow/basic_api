<?php

namespace App\Http\Controllers;
use Api\Transformers\LessonTransformer;
use App\Lesson;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
class LessonsController extends ApiController 
{

    /**
     * @var LessonTransformer
     */
     protected $lessonTransformer;

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param LessonTransformer $lessonTransformer
	 */
	public function __construct (LessonTransformer $lessonTransformer){
		$this->lessonTransformer = $lessonTransformer;
		$this->middleware('auth.basic', ['only' => 'store']);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$limit = $request->get('limit') ?: 5;
        $lessons = Lesson::paginate($limit);
		return $this->respondWithPagination($lessons, [
			'data' => $this->lessonTransformer->transformCollection($lessons->all()),
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if( ! $request->get('title') or ! $request->get('body'))
		{
			return $this->responseUnprocessable('Parameters failed validation for a lesson.');
		}

//		$request['some_bool']
		Lesson::create($request->all());

		return $this->respondCreated('Lesson successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$lesson = Lesson::find($id);

		if( ! $lesson)
		{
			return $this->responseNotFound("Lesson does not exist");
		}

		return $this->respond(['data' => $this->lessonTransformer->transform($lesson)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
