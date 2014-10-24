<?

class cache
{

    private $available;

    private $memcache;

    const HOST = '127.0.0.1';

    const PORT = 11211;

    const COMPRESS = MEMCACHE_COMPRESSED;

    public function __construct()
    {

        $this->memcache = new Memcache();

        $this->memcache->connect( self::HOST, self::PORT );

        $stats = $this->memcache->getExtendedStats();

        $this->available = false;
        foreach( $stats as $server )
        {
            if( $server )
            {
                $this->available = true;
            }
        }

    }

    public function save( $index, $data, $duration=600 )
    {

        if( ! $this->available )
        {
            return false;
        }

        return $this->memcache->set( $index, $data, self::COMPRESS, $duration);

    }

    public function retrieve( $index )
    {

        if( ! $this->available )
        {
            return false;
        }

        return $this->memcache->get( $index, self::COMPRESS );

    }

    public function clear( $index )
    {

        if( ! $this->available )
        {
            return false;
        }

        return $this->memcache->delete( $index );

    }

    public function flush()
    {
        $this->memcache->flush();
    }

}