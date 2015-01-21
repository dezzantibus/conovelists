<?php

class layout_profile_content extends layout
{

	function __construct( data_profile $profile )
	{
		
		while( $story = $profile->latest->first()  )
		{

            if( $profile->latest->isEmpty() )
            {
                $this->addChild( new layout_story_cell( $story, true ) );
            }
            else
            {
                $this->addChild( new layout_story_cell( $story ) );
            }

		}

        $this->addChild( new layout_popular( $profile->viewed ) );

	}
	
	protected function renderTop()
    {
		echo 
//		'<div class="archives container content">',
//			'<div class="row">',
//				'<div class="col-md-10 col-md-offset-1">';
        '<div id="start" class="container content">',
            '<div class="row">',
					'<div class="col-md-10 col-md-offset-1">';

    }

    protected function renderBottom()
    {
                echo
				'</div>',
			'</div>',
		'</div>';		
    }

}
