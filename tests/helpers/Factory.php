<?php

/**
 * Created by PhpStorm.
 * User: s.bow
 * Date: 22/04/2016
 * Time: 13:23
 */
trait Factory
{

	protected $times = 1;

	/** MAke a new record in the DB
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $type
	 * @param array $fields
	 */
	public function make($type, $fields = [])
	{
		$type = '\\App\\' . $type;

		while ($this->times--) {
			$stub = array_merge($this->getStub(), $fields);
			$type::create($stub);
		}
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $count
	 * @return $this
	 */
	protected function times($count)
	{
		$this->times = $count;
		return $this;
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @return array
	 */
	public function getStub()
	{
		throw new BadMethodCallException('Create your own getStub method to get your fields');
	}
}