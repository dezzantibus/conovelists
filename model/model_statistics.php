<?php

class model_statistics extends model
{

    static public function menu()
    {
    }


    static public function footer()
    {

		$result = new data_statistics();
		
		$result->days	  = 30;
		$result->stories  = self::stories( $result->days );
		$result->chapters = self::chapters( $result->days );
		$result->users    = self::users( $result->days );
		
		return $result;

    }
	
	static private function stories( $days )
	{
		
        $row = cache_statistics::retrieve( 'stories-' . $days );

        if( empty( $row ) )
        {

            $sql = '
				SELECT COUNT(id) AS number
				FROM `story` 
				WHERE created > NOW() - INTERVAL :days DAY
			';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':days', $days )
				->execute();

            $row = $query->fetch();
			$row = $row['number'];

            cache_statistics::save( 'stories-' . $days, $row, self::cache_time() );

        }

        return $row;
		
	}
	
	static private function chapters( $days )
	{
		
        $row = cache_statistics::retrieve( 'chapters-' . $days );

        if( empty( $row ) )
        {

            $sql = '
				SELECT COUNT(id) AS number
				FROM `chapter` 
				WHERE created > NOW() - INTERVAL :days DAY
					AND parent_id > 0
			';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':days', $days )
				->execute();

            $row = $query->fetch();
			$row = $row['number'];

            cache_statistics::save( 'chapters-' . $days, $row, self::cache_time() );

        }

        return $row;
		
	}
	
	static private function users( $days )
	{
		
        $row = cache_statistics::retrieve( 'users-' . $days );

        if( empty( $row ) )
        {

            $sql = '
				SELECT COUNT(id) AS number
				FROM `user` 
				WHERE created > NOW() - INTERVAL :days DAY
			';

            $query = db::prepare( $sql );
            $query
				->bindInt( ':days', $days )
				->execute();

            $row = $query->fetch();
			$row = $row['number'];

            cache_statistics::save( 'users-' . $days, $row, self::cache_time() );

        }

        return $row;
		
	}
	
	static private function cache_time()
	{
		
		$from = 600;  // 10 minutes
		$to   = 3600; // 1 hour
		
		return rand( 600, 3600 );
		
	}

}















