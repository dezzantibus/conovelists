<?php

class layout_form extends layout
{

    private $action;

    private $class;

    private $id;

    private $submit_message;

    private $error_message;

    private $ok_message;

    private $submit_label;
	
    function __construct( $action, $class, $id, $success_url, $error_url, $submit_message='Sending...', $error_message='Error', $ok_message='Success', $submit_label='Submit' )
    {

        $this->action         = $action;
        $this->class          = $class;
        $this->id             = $id;
        $this->success_url    = $success_url;
        $this->error_url      = $error_url;
        $this->submit_message = $submit_message;
        $this->error_message  = $error_message;
        $this->ok_message     = $ok_message;
        $this->submit_label   = $submit_label;

    }

    protected function renderTop()
    {

        echo
		'<div id="start" class="container content">',
			'<div class="row">',
				'<div class="col-md-10 col-md-offset-1">',
		'<form action="', $this->action, '" class="myform ', $this->class, '" method="post" novalidate id="', $this->id, '">',
			'<input type="hidden" name="success_url" value="', $this->success_url, '">',
			'<input type="hidden" name="error_url" value="', $this->error_url, '">',
			'<div class="row clearfix">',
				'<div class="col-xs-12 col-sm-6 col-md-6">';

    }

    protected function renderBottom()
    {
					echo
					'<p>',
		
						'<button name="submit" type="submit" class="btn btn-store btn-block" ',
						'data-error-message="', $this->error_message ,'" ',
						'data-sending-message="', $this->submit_message, '" ',
						'data-ok-message="', $this->ok_message,'">', $this->submit_label,'</button>',
		
					'</p>',
					'<input type="hidden" name="submitted" id="submitted3" value="true">',
				'</div>',
				'<div class="col-xs-12 col-sm-6 col-md-6">',
					'<ul>';
				
						foreach( message::getMessages() as $message )
						{
							echo
							'<li class="message error">', $message['message'], '</li>';
						}
					
					echo
					'</ul>',
				'</div>',
			'</div>',
		'</form>',
				'</div>',	
			'</div>', //end row -->
		'</div>';		
    }

}

