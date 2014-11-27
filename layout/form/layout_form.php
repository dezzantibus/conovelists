<?php

abstract class layout_form extends layout
{

    protected $action;

    protected $class;

    protected $id;

    protected $submit_message;

    protected $error_message;

    protected $ok_message;

    protected $submit_label;

    function __construct( $action, $class, $id, $submit_message='Sending...', $error_message='Error', $ok_message='Success', $submit_label='Submit' )
    {

        $this->action         = $action;
        $this->class          = $class;
        $this->id             = $id;
        $this->submit_message = $submit_message;
        $this->error_message  = $error_message;
        $this->ok_message     = $ok_message;
        $this->submit_label   = $submit_label;

    }

    protected function renderTop()
    {

        echo
        '<form action="', $this->action, '" class="myform ', $this->class, '" method="post" novalidate id="', $this->id, '">',
			'<input type="hidden" name="return" value="', json_encode( $_GET ) ,'">',
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
                'data-ok-message="', $this->ok_message,'">Send Message</button>',

            '</p>',
            '<input type="hidden" name="submitted" id="submitted3" value="true">',
        '</form>';
    }

}
