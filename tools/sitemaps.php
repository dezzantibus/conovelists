<?php

	/*
	
	
	THIS HAS TO BE DONE SEPARATELY
	will start by doing one index file per category.
	then we'll get the stories and the chapters for those stories.
	max 50k urls per sitemap
	
	look into zipping the sitemaps
	
	public static function generateGoogleSitemap()
	{
		
		$sql = 'SELECT * FROM `chapter` ORDER BY id';
		
		$query = db::prepare( $sql );
		$query->execute();

		$urls = 0;
		while( $row = $query->fetch() )
		{
			
			$urls++;
			
			if( $urls == 1 )
			{
				$sitemap = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
			}
			
			$chapter = new data_chapter( $row );
			
		}

		
		/* 
		sitemap syntax max 10k per sitemap
	
		<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
  <url>
    <loc>http://www.example.com/foo.html</loc> 	
  </url>
</urlset>




		
		sitemap index file
		
		?xml version="1.0" encoding="UTF-8"?>
   <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <sitemap>
      <loc>http://www.example.com/sitemap1.xml.gz</loc>
      <lastmod>2004-10-01T18:23:17+00:00</lastmod>
   </sitemap>
   <sitemap>
      <loc>http://www.example.com/sitemap2.xml.gz</loc>
      <lastmod>2005-01-01</lastmod>
   </sitemap>
   </sitemapindex>

		
		
		static function salvaFile($file, $testo)
		{
			$fp = fopen(dirname(__FILE__).'/../'.$file, "w");
			fwrite($fp, utf8_encode($testo));
		}

		
		
	}
	
	*/
	