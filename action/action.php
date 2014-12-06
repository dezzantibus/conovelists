<?php

/**
 * Class action
 *
 * Each action class will always refer to a form and contain the code
 * to process the data coming from the form with models. Action classes
 * will run a predefined handler once the form has been processed depending
 * on whether the form was processed successfully or not
 */
abstract class action
{

	protected $data;
	
	function __construct()
	{
		
		$this->data = $_POST;
		
	}

}