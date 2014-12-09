<?php


class action_admin_logout extends action
{

	public function run()
    {
		unset( $_SESSION['user'] );
		header( 'Location: /' );
    }


}