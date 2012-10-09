<?php
/*
 * RSS parser
 *
*/
class SimplepieComponent extends Object
{
    var $sp_cache_location = null;            //Folder used to cache feeds
    var $sp_cache_active = null;              //To turn caching on/off use true/false
    var $sp_feed_url;                         //Can be used to set default fedd

    var $sp_feed;
    var $error_msg;

    function __construct()
    {
        if($this->sp_cache_location === null)$this->sp_cache_location = CACHE . 'simplepie' . DS;
        if($this->sp_cache_active === null)$this->sp_cache_active = true;
    }

    function feed($feed_url=null, $force=false)
    {
        if(!$feed_url)$feed_url = $this->sp_feed_url;   //Replace null url will default
        else $this->sp_feed_url = $feed_url;            //Replace default url with latest url

        //Make sure the feed url is not empty
        if(!$feed_url)
        {
            $this->error_msg = 'Feed URL not present';
            return false;
        }

        //Create the cache dir if it doesn't exist
        if (!file_exists($this->sp_cache_location))
        {
            $folder = new Folder();
            $folder->mkdir($this->sp_cache_location);
        }

        //Import the vendor file
        App::import('vendor','simplepie',array('file'=> 'simplepie' .DS. 'simplepie.php'));

        //Create a SimplePie instance
        $this->sp_feed = new SimplePie();
        if($force) $this->sp_feed->force_feed(true);
        $this->sp_feed->set_feed_url($feed_url);
        $this->sp_feed->set_cache_location($this->sp_cache_location);
        $this->sp_feed->enable_cache($this->sp_cache_active);

        //Retrieve the feed
        $this->sp_feed->init();

        //Get the feed items
        $items = $this->sp_feed->get_items();

        //Return result
        if ($items)
        {
            return $items;
        }
        else
        {
            $this->error_msg = $this->sp_feed->error();
            return $this->error_msg;
        }
    }
}
?>
