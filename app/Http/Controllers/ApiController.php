<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;


/**
 * Class ApiController DESCRIPTION
 * @added on the 28/01/2016
 * @author <sbow>
 * @package admin . megatransfert . ws . youpass . com . net . fr
 * @subpackage common.classes controllers
 * @copyright Youpass
 */
class ApiController extends Controller
{
	/**
	 * @var int $statusCode DESCRIPTION
	 */
	protected $statusCode = 200;

	/**
	 * @return mixed
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param string $message
	 * @return mixed
	 */
	public function responseNotFound($message = "Not Found"){

		return $this->setStatusCode(404)->respondWithError($message);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param string $message
	 * @return mixed
	 */
	public function responseUnauthorized($message = "Unauthorized"){

		return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError($message);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $message
	 * @return mixed
	 */
	public function respondCreated($message)
	{
		return $this->setStatusCode(Response::HTTP_CREATED)
			->respond([
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @return mixed
	 */
	public function responseUnprocessable($message)
	{
		return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
			->respondWithError($message);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param string $message
	 * @return mixed
	 */
	public function responseInternalError($message = "Internal Error"){

		return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $data
	 * @param array $headers
	 * @return mixed
	 */
	public function respond($data, $headers = []){
		return response()->json($data,$this->getStatusCode(), $headers);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $message
	 * @return mixed
	 */
	public function respondWithError($message){

		return response()->json([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}


}