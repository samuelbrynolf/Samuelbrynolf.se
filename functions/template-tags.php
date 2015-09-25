<?php function process_instagram_URL($url){
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function pull_instagram($user_id = '', $client_id = '', $count = '8'){

    if (!is_numeric($user_id) && !is_numeric($client_id)){
        return;
    }

    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?client_id='.$client_id.'&count='.$count;
    $all_result  = process_instagram_URL($url);
    $decoded_results = json_decode($all_result, true);

    foreach($decoded_results['data'] as $item){
        $thumbsize_url = $item['images']['thumbnail']['url'];
        $loressize_url = $item['images']['low_resolution']['url'];
        $standardsize_url = $item['images']['standard_resolution']['url'];
        //$media_page = $item['link'];

        echo '<div class="m-prf ratio-1-1">';
            echo '<img class="a-instagram__img a-prf__img" src="'.$loressize_url.'" srcset="'.$standardsize_url.' 612w,
            '.$loressize_url.' 306w,
            '.$thumbsize_url.' 150w"

            sizes="(min-width: 768px) 50vw,
            100vw"/>';
        echo '</div>';
    }
}


// ---------------------------------------------------------------------------------


 class TweetPHP {
     private $tmhOAuth;
     private $options;
     private $tweet_found = false;
     private $tweet_count = 0;
     private $tweet_list;
     private $tweet_array;
     private $debug_report = array();
     private $cache_file;
     private $cache_file_raw;

     /**
      * Initialize a new TweetPHP object
      */
     public function  __construct ($options = array()) {

         $this->options = array_merge(
             array(
                 'consumer_key'          => '6ubkQKAk9DF5tTuubvOoAl1vy',
                 'consumer_secret'       => '0g6cRem89pObL4iKhqXXSNQgh1vSUQ9XZwwz0bYPnNXr6IQQDF',
                 'access_token'          => '17597132-BoGoLVUyErKSlZyddsUGZLbK7dOLWjwtWu8vWKEa3',
                 'access_token_secret'   => 'AYcPrlZfLd2yItkMtKvgCiPQvABjtJGtg5LWDhQYAkZRn',
                 'twitter_screen_name'   => 'samuelbrynolf',
                 'enable_cache'          => true,
                 'cache_dir'             => dirname(__FILE__) . '/cache/', // Where on the server to save cached tweets
                 'cachetime'             => 60 * 60, // Seconds to cache feed (1 hour).
                 'tweets_to_retrieve'    => 1, // Specifies the number of tweets to try and fetch, up to a maximum of 200
                 'tweets_to_display'     => 1, // Number of tweets to display
                 'ignore_replies'        => true, // Ignore @replies
                 'ignore_retweets'       => false, // Ignore retweets
                 'twitter_style_dates'   => true, // Use twitter style dates e.g. 2 hours ago
                 'twitter_date_text'     => array('sekunder', 'minuter', 'cirkagurka', 'timmar', 'sedan'),
                 'date_format'           => '%I:%M %p %b %e%O', // The defult date format e.g. 12:08 PM Jun 12th. See: http://php.net/manual/en/function.strftime.php
                 'date_lang'             => 'sv_SE', // Language for date e.g. 'fr_FR'. See: http://php.net/manual/en/function.setlocale.php
                 'twitter_template'      => '<div class="m-textbox twitter">{tweets}</div>',
                 'tweet_template'        => '<p class="a-textbox__p a-icon twitter">{tweet}<a class="a-textbox__a" href="{link}">@samuelbrynolf, {date}</a></p>',
                 'error_template'        => '<p class="a-textbox__p">Pang!<br/>Min twitterfeed &auml; nere.</p>',
                 'debug'                 => false
             ),
             $options
         );

         if ($this->options['debug']) {
             error_reporting(E_ALL);
         }

         if ($this->options['date_lang']) {
             setlocale(LC_ALL, $this->options['date_lang']);
         }

         if ($this->options['enable_cache']) {
             if (!file_exists($this->options['cache_dir'])) {
                 mkdir($this->options['cache_dir'], 0755, true);
             }
             $this->cache_file = $this->options['cache_dir'] . 'twitter.txt';
             $this->cache_file_raw = $this->options['cache_dir'] . 'twitter-array.txt';
             $cache_file_timestamp = ((file_exists($this->cache_file))) ? filemtime($this->cache_file) : 0;
             $this->add_debug_item('Cache expiration timestamp: ' . (time() - $this->options['cachetime']));
             $this->add_debug_item('Cache file timestamp: ' . $cache_file_timestamp);

             // Show file from cache if still valid.
             if (time() - $this->options['cachetime'] < $cache_file_timestamp) {
                 $this->tweet_found = true;
                 $this->add_debug_item('Cache file is newer than cachetime.');
                 $this->tweet_list = file_get_contents($this->cache_file);
                 $this->tweet_array = unserialize(file_get_contents($this->cache_file_raw));
             } else {
                 $this->add_debug_item("Cache file doesn't exist or is older than cachetime.");
                 $this->fetch_tweets();
             }
         } else {
             $this->add_debug_item('Caching is disabled.');
             $this->fetch_tweets();
         }


         // In case the feed did not parse or load correctly, show a link to the Twitter account.
         if (!$this->tweet_found) {
             $this->add_debug_item('No tweets were found. error_message will be displayed.');
             $html = str_replace('{link}',  'http://twitter.com/' . $this->options['twitter_screen_name'], $this->options['error_template']);
             $this->tweet_list = str_replace('{tweets}', $html, $this->options['twitter_template']);
             $this->tweet_array = array('Error fetching or loading tweets');
         }
     }

     /**
      * Fetch tweets using Twitter API
      */
     private function fetch_tweets () {
         $this->add_debug_item('Fetching fresh tweets using Twitter API.');

         require_once(dirname(__FILE__) . '/lib/tmhOAuth/tmhOAuth.php');

         // Creates a tmhOAuth object.
         $this->tmhOAuth = new tmhOAuth(array(
             'consumer_key'    => $this->options['consumer_key'],
             'consumer_secret' => $this->options['consumer_secret'],
             'token'           => $this->options['access_token'],
             'secret'          => $this->options['access_token_secret']
         ));

         // Request Twitter timeline.
         $params = array(
             'screen_name' => $this->options['twitter_screen_name'],
             'count' => $this->options['tweets_to_retrieve'],
         );
         if ($this->options['ignore_retweets']) {
             $params['include_rts'] = 'false';
         }
         if ($this->options['ignore_replies']) {
             $params['exclude_replies'] = 'true';
         }
         $response_code = $this->tmhOAuth->request('GET', $this->tmhOAuth->url('1.1/statuses/user_timeline.json'), $params);

         $this->add_debug_item('tmhOAuth response code: ' . $response_code);

         if ($response_code == 200) {
             $data = json_decode($this->tmhOAuth->response['response'], true);

             $tweets_html = '';

             // Iterate over tweets.
             foreach($data as $tweet) {
                 $tweets_html .=  $this->parse_tweet($tweet);
                 // If we have processed enough tweets, stop.
                 if ($this->tweet_count >= $this->options['tweets_to_display']){
                     break;
                 }
             }

             // Close the twitter wrapping element.
             $html = str_replace('{tweets}', $tweets_html, $this->options['twitter_template']);

             if ($this->options['enable_cache']) {
                 // Save the formatted tweet list to a file.
                 $file = fopen($this->cache_file, 'w');
                 fwrite($file, $html);
                 fclose($file);

                 // Save the raw data array to a file.
                 $file = fopen($this->cache_file_raw, 'w');
                 fwrite($file, serialize($data));
                 fclose($file);
             }

             $this->tweet_list = $html;
             $this->tweet_array = $data;
         } else {
             $this->add_debug_item('Bad tmhOAuth response code.');
         }
     }

     /**
      * Parse an individual tweet
      */
     private function parse_tweet ($tweet) {
         $this->tweet_found = true;
         $this->tweet_count++;

         // Format tweet text
         $tweet_text_raw = $tweet['text'];
         $tweet_text = $this->autolink($tweet_text_raw);

         // Tweet date is in GMT. Convert to UNIX timestamp in the local time of the tweeter.
         $utc_offset = $tweet['user']['utc_offset'];
         $tweet_time = strtotime($tweet['created_at']) + $utc_offset;

         if ($this->options['twitter_style_dates']){
             // Convert tweet timestamp into Twitter style date ("About 2 hours ago")
             $current_time = time();
             $time_diff = abs($current_time - $tweet_time);
             switch ($time_diff) {
                 case ($time_diff < 60):
                     $display_time = $time_diff . ' ' . $this->options['twitter_date_text'][0] . ' ' . $this->options['twitter_date_text'][4];
                     break;
                 case ($time_diff >= 60 && $time_diff < 3600):
                     $min = floor($time_diff/60);
                     $display_time = $min . ' ' . $this->options['twitter_date_text'][1] . ' ' . $this->options['twitter_date_text'][4];
                     break;
                 case ($time_diff >= 3600 && $time_diff < 86400):
                     $hour = floor($time_diff/3600);
                     $display_time = $this->options['twitter_date_text'][2] . ' ' . $hour . ' ' . $this->options['twitter_date_text'][3];
                     if ($hour > 1){ $display_time .= 's'; }
                     $display_time .= ' ' . $this->options['twitter_date_text'][4];
                     break;
                 default:
                     $format = str_replace('%O', date('S', $tweet_time), $this->options['date_format']);
                     $display_time = strftime($format, $tweet_time);
                     break;
             }
         } else {
             $format = str_replace('%O', date('S', $tweet_time), $this->options['date_format']);
             $display_time = strftime($format, $tweet_time);
         }

         $href = 'http://twitter.com/' . $tweet['user']['screen_name'] . '/status/' . $tweet['id_str'];
         $output = str_replace('{tweet}', $tweet_text, $this->options['tweet_template']);
         $output = str_replace('{link}', $href, $output);
         $output = str_replace('{date}', $display_time, $output);

         return $output;
     }

     /**
      * Add a debugging item.
      */
     private function add_debug_item ($msg) {
         array_push($this->debug_report, $msg);
     }

     /**
      * Get debugging information as an HTML list.
      */
     public function get_debug_list () {
         $debug_list = '<ul>';
         foreach($this->debug_report as $debug_item) {
             $debug_list .= '<li>' . $debug_item . '</li>';
         }
         $debug_list .= '</ul>';
         return $debug_list;
     }

     /**
      * Get debugging information as an array.
      */
     public function get_debug_array () {
         return $this->debug_report;
     }

     /**
      * Helper function to convert usernames, hashtags and URLs
      * in a tweet to HTML links.
      */
     public function autolink ($tweet) {
         require_once(dirname(__FILE__) . '/lib/twitter-text-php/lib/Twitter/Autolink.php');

         $autolinked_tweet = Twitter_Autolink::create($tweet, false)
             ->setNoFollow(false)->setExternal(false)->setTarget('')
             ->setUsernameClass('')
             ->setHashtagClass('')
             ->setURLClass('')
             ->addLinks();

         return $autolinked_tweet;
     }

     /**
      * Get tweets as HTML list
      */
     public function get_tweet_list () {
         if ($this->options['debug']) {
             return $this->get_debug_list() . $this->tweet_list;
         } else {
             return $this->tweet_list;
         }
     }

     /**
      * Get tweets as an array
      */
     public function get_tweet_array () {
         return $this->tweet_array;
     }

 }


