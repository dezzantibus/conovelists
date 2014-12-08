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
			
			$storyData = new data_story( $this->data );
			$storyData = model_story::create( $storyData );
			
			$chapterData 			= new data_chapter( $this->data );
			$chapterData->story_id  = $storyData->id;
			$chapterData->parent_id = 0;
			$chapterData 			= model_chapter::create( $chapterData );
			
			$storyData->first_chapter_id = $chapterData->id;
			$storyData 					 = model_story::update( $storyData );
			$storyData->category		 = model_category::getById( $storyData->category_id );
			
			header( 'Location: ' . $storyData->getLink() );
			
		}

    }

	private function validate()
	{
		
		if( empty( $this->data['title'] ) )
		{
			message::addError( 'The title is a required field' );
		}
		
		if( empty( $this->data['brief'] ) )
		{
			message::addError( 'The Brief is a required field' );
		}
		elseif( strlen( $this->data['brief'] < 150 ) )
		{
			message::addError( 'The Brief must be at least 150 characters' );
		}
		
		if( empty( $this->data['body'] ) )
		{
			message::addError( 'The Body is a required field' );
		}
		elseif( strlen( $this->data['body'] < 1000 ) )
		{
			message::addError( 'The Body must be at least 1000 characters' );
		}
		elseif( strlen( $this->data['body'] > 64000 ) )
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

		$storyData   = new data_story( $this->data );
		$chapterData = new data_chapter( $this->data );

        $page = new layout_new_story( $categories, $bookmarks, $footerStats, $storyData, $chapterData );
        $page->render();

		
	}
	
}

