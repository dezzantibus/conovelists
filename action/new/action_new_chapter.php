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
			
			$chapterData = new data_chapter( $this->data );
			$chapterData = model_chapter::create( $chapterData );
						
			header( 'Location: ' . $chapterData->getLink() );
			
		}

    }

	private function validate()
	{
		
		if( empty( $this->data['title'] ) )
		{
			message::addError( 'The title is a required field' );
		}
				
		if( empty( $this->data['body'] ) )
		{
			message::addError( 'The Body is a required field' );
		}
		elseif( strlen( $this->data['body'] ) < 1000 )
		{
			message::addError( 'The Body must be at least 1000 characters' );
		}
		elseif( strlen( $this->data['body'] ) > 64000 )
		{
			message::addError( 'The Body is over 64000 characters' );
		}		
		
	}
	
	private function returnToForm()
	{
		
		/** @var data_array $categories */
        $categories = model_category::getList();
		
		/** @var data_statistics $footerStats */
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

		$chapterData = new data_chapter( $this->data );

        $page = new layout_new_chapter( $categories, $bookmarks, $footerStats, $this->data['story_id'], $this->data['parent_id'], $this->data['level'], $chapterData );
        $page->render();
		
	}
	
}

