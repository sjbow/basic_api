<?php

namespace Api\Transformers;

/**
 * Class Transformer DESCRIPTION
 * @added on the 28/01/2016
 * @author <sbow>
 * @package admin . megatransfert . ws . youpass . com . net . fr
 * @subpackage common.classes controllers
 * @copyright Youpass
 */
abstract class Transformer
{

	/**
	 * 
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $items
	 * @return mixed
	 */
	public function transformCollection($items){
		return array_map([$this, 'transform'], $items);
	}

	/**
	 * 
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $item
	 * @return mixed
	 */
	public abstract function transform($item);
}