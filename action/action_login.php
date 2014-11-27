<?php


class action_login extends action
{

	public function run()
    {

		$user = model_user::login( $_POST['email'], $_POST['pass'] );
		
		if( $user instanceof data_user )
		{
			$_SESSION['user'] = $user;
			$bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
		}
		else
		{
			/* data for non-logged in users */
			$bookmarks = new data_array();
		}
		
		$this->returnToPage( $_POST['return'] );

    }


}