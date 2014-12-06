<?php


class action_new_story extends action
{

	public function run()
    {

		$this->validate();
		
		if( message::containsErrors() )
		{
			$this->returnToForm();
		}
		else
		{
			//go to published story.
		}

    }

	private function validate()
	{
	}
	
}