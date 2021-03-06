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
                    '<link rel="stylesheet" href="/css/datepicker3.css">',
					'<link rel="shortcut icon" href="/img/ico/32.png" sizes="32x32" type="image/png"/>',
					'<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>',
					'<link rel="apple-touch-icon-precomposed" href="/img/ico/60.png" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/ico/72.png" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/ico/120.png" type="image/png"/>',
					'<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/ico/152.png" type="image/png"/>',
					'<!--[if lt IE 9]>',
						'<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>',
						'<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>',
					'<![endif]-->',
                    '<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>',
                    '<script type="text/javascript" src="/js/bootstrap.min.js"></script>',
                    '<script type="text/javascript" src="/js/placeholders.min.js"></script>',
                    '<script type="text/javascript" src="/js/wow.min.js"></script>',
                    '<script type="text/javascript" src="/js/custom.js"></script>',
                    '<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>',

				'</head>',
			
				'<body id="', $this->page_id, '">';

    }

    protected function renderBottom()
    {

        if( !$_SESSION['user'] instanceof data_user )
        {
            $this->loginForm();
        }
		
		echo

        '<script>',
            "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ ",
            '(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), ',
            'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) ',
            "})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ",

            "ga('create', 'UA-15643626-11', 'auto'); ",
            "ga('send', 'pageview'); ",

        '</script>',

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
							'<form class="myform" method="post" action="/action/admin/login.html" accept-charset="UTF-8">',
								'<input type="hidden" name="success_url" value="', $_SERVER['REQUEST_URI'], '">',
								'<input type="hidden" name="error_url" value="', $_SERVER['REQUEST_URI'], '">',

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
								//'<p class="text-center"><a href="">Forgot password?</a></p>',
								'<input class="btn btn-block" type="submit" value="Login" >',
							'</form>',
						'</div>',
					'</div>',
				'</div>',
				'<div class="modal-footer">',
					'<div class="forgot login-footer">',
						'<span>Looking to ',
							 '<a href="/admin/register.html">create an account</a>',
						'?</span>',
					'</div>',
				'</div>',       
			  '</div>',
		  '</div>',
	  '</div>';
	
	}

}