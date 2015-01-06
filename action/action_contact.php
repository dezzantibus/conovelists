<?php


class action_contact extends action
{

	public function run()
    {

		$this->validate();
	
		if( message::containsErrors() )
		{
			$this->returnToContacts();
		}
		else
		{
			model_contact::create(
                new data_contact( $this->data )
            );

            $this->success();

		}

    }
	
	private function validate()
	{
		
		if( empty( $this->data['name'] ) )
		{
			message::addError( 'The name is a required field' );
		}

		if( empty( $this->data['email'] ) )
		{
			message::addError( 'The E-Mail is a required field' );
		}

		if( empty( $this->data['message'] ) )
		{
			message::addError( 'The Message is a required field' );
		}

	}

    private function returnToContacts()
    {

        $categories = model_category::getList();

        $footerStats = model_statistics::footer();

        if( $_SESSION['user'] instanceof data_user )
        {
            /* data for logged in users */
            $bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
        }
        else
        {
            /* data for non-logged in users */
            $bookmarks = new data_array();
        }

        $contactData = new data_contact( $this->data );

        $tags = array(
            'FAQ'         => 1,
            'questions'   => 1,
            'stories'     => 1,
            'answers'     => 1,
            'frequent'    => 1,
            'conovelists' => 1,
            'asking'      => 1,
            'literature'  => 1,
            'context'     => 1,
            'listed'      => 1,
        );
        $tags = new data_array( $tags );

        /* display data */
        $page = new layout_contacts( $categories, $bookmarks, $footerStats, $tags, $contactData );
        $page->render();

    }

    private function success()
    {

        $categories = model_category::getList();

        $footerStats = model_statistics::footer();

        if( $_SESSION['user'] instanceof data_user )
        {
            /* data for logged in users */
            $bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
        }
        else
        {
            /* data for non-logged in users */
            $bookmarks = new data_array();
        }

        message::addSuccess( 'Message successfully sent' );

        $contactData = new data_contact();

        $tags = array(
            'FAQ'         => 1,
            'questions'   => 1,
            'stories'     => 1,
            'answers'     => 1,
            'frequent'    => 1,
            'conovelists' => 1,
            'asking'      => 1,
            'literature'  => 1,
            'context'     => 1,
            'listed'      => 1,
        );
        $tags = new data_array( $tags );

        /* display data */
        $page = new layout_contacts( $categories, $bookmarks, $footerStats, $tags, $contactData );
        $page->render();

    }


}