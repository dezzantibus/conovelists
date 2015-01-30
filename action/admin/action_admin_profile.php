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

    }

    private function saveAvatar()
    {

    }

    private function saveUserData()
    {

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