<?php

class layout_category_content extends layout
{

	function __construct( data_array $stories )
	{
		
		while( $story = $stories->first()  )
		{

            if( $stories->isEmpty() )
            {
                $this->addChild( new layout_story_cell( $story, true ) );
            }
            else
            {
                $this->addChild( new layout_story_cell( $story ) );
            }

		}
		
	}
	
	protected function renderTop()
    {
		echo 
		'<div class="archives container content">',
			'<div class="row">',
				'<div class="col-md-10 col-md-offset-1">';
    }

    protected function renderBottom()
    {
					echo
					'<div class="paging clearfix">',
						'<a class="btn pull-left" href="#"><i class="icon-arrow-left2 left"></i><span>Older</span></a>',
					'</div>',
				'</div>',
			'</div>',
		'</div>';		
    }

}
