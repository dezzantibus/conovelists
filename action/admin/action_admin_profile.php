<?php


class action_admin_profile extends action
{

	public function run()
    {
        $this->validate();

        if( ! message::containsErrors() )
        {
            $this->returnToForm();
        }
        else
        {

            $this->saveAvatar();

            $this->saveUserData();

            $this->returnToProfile();

        }

    }

    private function validate()
    {

        if( empty( $this->data['email'] ) )
        {
            message::addError( 'The E-Mail is a required field' );
        }
        elseif( model_user::uniqueEntityExists( $this->data['email'], 'email' ) )
        {
            message::addError( 'The E-Mail is already in the database' );
        }

        $passwordsEmpty = empty( $this->data['password'] ) && empty( $this->data['confirm_password'] );

        if( !$passwordsEmpty )
        {
            if( empty( $this->data['confirm_password'] ) )
            {
                message::addError( 'The Password must be confirmed' );
            }
            elseif( $this->data['password'] != $this->data['confirm_password'] )
            {
                message::addError( 'The two Passwords don\'t match' );
            }
        }

    }

    private function saveAvatar()
    {

        if( !isset( $_FILES['avatar'] ) )
        {
            return false;
        }

        /** @var data_user $user */
        $user = $_SESSION['user'];

        $dir  = $user->uploadFolder();

        $filename = explode( '.', $_FILES['avatar']['name'] );

        $filename = $user->id . '.' . array_pop( $filename );

        move_uploaded_file( $_FILES['userfile']['tmp_name'], $dir . $filename );


    }

    private function saveUserData()
    {

        /** @var data_user $user */
        $user = $_SESSION['user'];

        $user->first_name    = $this->data['first_name'];
        $user->last_name     = $this->data['last_name'];
        $user->email         = $this->data['email'];
        $user->pass          = $this->data['pass'];
        $user->date_of_birth = $this->data['date_of_birth'];
        $user->gender        = $this->data['gender'];
        $user->facebook      = $this->data['facebook'];
        $user->twitter       = $this->data['twitter'];
        $user->google        = $this->data['google'];

        $_SESSION['user'] = model_user::update( $user );

    }

    private function returnToProfile()
    {
        $page = new handler_user_profile();
        $page->run();
    }

    private function returnToForm()
    {
        $page = new handler_user_profile();
        $page->run();
    }

}