<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 29.01.2018
 * Time: 22:09
 */

class BT_HitCounter {

    const UNDEF_VALUE = 'none';

    // Show "unique" visits only ?
    public $unique_visits = false;

    // Number of hours a visitor is considered as "unique"
    public $unique_hours = 24;

    // Directory to write to (without any trailing slashes)
    public $hit_count_dir = 'hitcount';

    // File to write to
    public $hit_count_file = 'hitcount.txt';

    // Cookie Name
    public $cookie_name = 'bt_hit_count';

    private $format = "\n%d|%s|%s|%s|%s|%s|%s|%s";
    private $count;


    private function setLastCountVal() {
        ini_set("auto_detect_line_endings", true);
        $fp = fopen($this->hit_count_file, 'r');
        while(! feof($fp)) {
            $line = fgets($fp);
        }
        echo $line. "<br />";
        /*
        $pos = -1; $line = ''; $c = '';
        do {
            $line = $c . $line;
            fseek($fp, $pos--, SEEK_END);
//            $c = fgetc($fp);
            $c = fgets($fp);
        }
        while ($c != PHP_EOL);
//        while ($c != feof($fp));
        */
        fclose($fp);
        $this->count = (int) trim($line);
        echo "<h4> COUNTER: ".$this->count."</h4>";
    }

//    private function getLastCountVal() { return $this->count; }

    public function recordHit() {
        if ( !$this->unique_visits || !isset($_COOKIE[$this->cookie_name]) ) {
            $this->writeFile();
            if( $this->unique_visits ) {
                // Send a cookie to the visitor (to track him) along with the P3P compact privacy policy
                header('P3P: CP="NOI NID"');
                setcookie($this->cookie_name, 1, time() + 60 * 60 * $this->unique_hours);
            }

        }
    } // End of Method

    private function writeFile() {
        $this->setLastCountVal();
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : 'unknown';
        $ref   = isset($_SERVER['HTTP_REFERER'])    ? urldecode($_SERVER['HTTP_REFERER']) : 'none' ;
        $uri   = $this->v($_SERVER['REQUEST_URI']);
        $user  = $this->v($_SERVER['PHP_AUTH_USER']);
        $query = $this->v($_SERVER['QUERY_STRING']);

        // ID              |time|         ip|      url|  agent|refer|query|user
        //17|29.01.2018 15:35:05|10.94.3.102|/form.php|mozilla| none|     |
        date_default_timezone_set('CET');
        $entry_line = sprintf($this->format,
            ++$this->count,
            date("d.m.Y H:i:s"),
            $this->getIp(),
            $uri, $agent, $ref, $query, $user
        );
        $fp = fopen($this->hit_count_file, 'a+', LOCK_EX)
        or die("ERROR: Can't write to [".$this->hit_count_file."], please make sure that your path is correct and you have appropriate permissions on the target directory and/or file!");
        fputs($fp, $entry_line);
        fclose($fp);
    }

    private function getIp() {
        if( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) return $_SERVER['HTTP_CLIENT_IP'];
        if( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getHitCount() { $this->setLastCountVal(); return $this->count; }
    private function v(&$var) { return !empty($var) ? $var : $this::UNDEF_VALUE; }

} // End of Class

