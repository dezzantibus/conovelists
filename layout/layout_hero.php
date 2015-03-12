<?php

class layout_hero extends layout
{

	private $h1;

	private $h2;

	private $bg;

	function __construct( $h1, $h2, $bg )
	{
		
		$this->h1 = $h1;
		$this->h2 = $h2;
		$this->bg = $bg;

	}
	
	public function render()
	{

		echo
		'<section id="hero" class="light-typo">',
			'<div id="cover-image" class="', $this->bg , ' animated fadeIn"></div>',
			'<div class="container welcome-content">',
				'<div class="middle-text">',
					'<h1>', $this->h1, '</h1>',
					'<h2><b>', $this->h2,'</b></h2>',
				'</div>',
			'</div>',
		'</section>';
		
	}
	
}


