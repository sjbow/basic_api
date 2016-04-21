<?php

namespace Api\Transformers;

/**
 * Class LessonTransformers DESCRIPTION
 * @added on the 28/01/2016
 * @author <sbow>
 * @package admin . megatransfert . ws . youpass . com . net . fr
 * @subpackage common.classes controllers
 * @copyright Youpass
 */
class LessonTransformer extends Transformer
{
	/**
	 *
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $lesson
	 * @return array
	 */
	public function transform($lesson)
	{
		return [
			'title' => $lesson['title'],
			'body' => $lesson['body'],
			'active' => $lesson['some_bool']
		];
	}
}