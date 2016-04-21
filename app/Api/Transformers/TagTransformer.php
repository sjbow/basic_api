<?php
/**
 * Created by PhpStorm.
 * User: s.bow
 * Date: 21/04/2016
 * Time: 17:55
 */

namespace Api\Transformers;


class TagTransformer extends Transformer
{

	/**
	 *
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $item
	 * @return mixed
	 */
	public function transform($tag)
	{
		return [
			"name" => $tag['name']
		];
	}
}