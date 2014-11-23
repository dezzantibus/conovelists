<?php

abstract class layout_page extends layout
{

    protected $title;

    protected $description;
	
	protected $page_id;

    protected function renderTop()
    {

        echo 
		'<!doctype html>',
			'<html>',
				'<head>',
					'<title>', $this->title, '</title>',
					'<meta charset="utf-8">',
					'<meta name="description" content="', $this->description, '">',
					'<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">',
					'<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Merriweather:400,400italic,700italic" rel="stylesheet" type="text/css">',
					'<link rel="stylesheet" href="/css/bootstrap.min.css">',
					'<link rel="stylesheet" href="/css/style.css">',
					'<link rel="stylesheet" href="/css/icons.css">',
					'<link rel="stylesheet" href="/css/animate.min.css">',
					'<link rel="stylesheet" href="/css/mine.css">',
					'<link rel="shortcut icon" href="/img/ico/32.png" sizes="32x32" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" href="/img/ico/60.png" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/ico/72.png" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/ico/120.png" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/ico/152.png" type="image/png"/>',
					'<!--[if lt IE 9]>',
						'<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>',
						'<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>',
					'<![endif]-->',
				'</head>',
			
				'<body id="', $this->page_id, '">';

    }

    protected function renderBottom()
    {
		$this->loginForm();
		
		echo
			'<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>',
			'<script type="text/javascript" src="/js/bootstrap.min.js"></script>',
			'<script type="text/javascript" src="/js/placeholders.min.js"></script>',
			'<script type="text/javascript" src="/js/wow.min.js"></script>',
			'<script type="text/javascript" src="/js/custom.js"></script>',
        '</body></html>';
    }
	
	private function loginForm()
	{
		
		echo
		'<div class="modal fade login" id="loginModal" aria-hidden="true">',
		  '<div class="modal-dialog login">',
			  '<div class="modal-content">',
				 '<div class="modal-header">',
					'<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>',
					'<h4 class="modal-title">Login with</h4>',
				'</div>',
				'<div class="modal-body"> ', 
					'<div class="box">',
						'<div class="form loginBox">',
							'<form class="myform" method="post" action="/login" accept-charset="UTF-8">',
								'<div class="form-group">',
									'<label class="control-label">Email</label>',
									'<div class="controls">',
										'<input id="email" class="form-control" type="text" placeholder="Email" name="email">',
									'</div>',
								'</div>',
								'<div class="form-group">',
									'<label class="control-label">password</label>',
									'<div class="controls">',
										'<input id="password" class="form-control" type="password" placeholder="Password" name="password">',
									'</div>',
								'</div>',
								'<p class="text-center"><a href="">Forgot password?</a></p>',
								'<input class="btn btn-block" type="button" value="Login" >',
							'</form>',
						'</div>',
					'</div>',
				'</div>',
				'<div class="modal-footer">',
					'<div class="forgot login-footer">',
						'<span>Looking to ',
							 '<a href="#">create an account</a>',
						'?</span>',
					'</div>',
				'</div>',       
			  '</div>',
		  '</div>',
	  '</div>';
	
	}

}