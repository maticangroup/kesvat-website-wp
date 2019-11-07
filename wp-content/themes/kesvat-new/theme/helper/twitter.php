<?php
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

//$consumerKey = "iMdtsufrx3MXxiW13YRAnXGBx";
//$consumerSecret = "1sDRi20AoIQ02CWjBCkoprY5iA5ef1nCAUxpKMgj9V9GtCP0XB";
//$access_token = "880730515611017217-Woq7xJdN8rgXyr6rMtREt7zUTpAPQJX";
//$access_secret_token = "tBeMqUndODetrm4EVu4azbAQvP4uPpWDwE1bQCgP0fVCH";

function getBugloosStatuses(){
    $consumerKey = pll__('twitter_consumer_key');
    $consumerSecret = pll__('twitter_consumer_secret');
    $access_token = pll__('twitter_access_token');
    $access_secret_token = pll__('twitter_access_secret_token');
    $connection = new TwitterOAuth($consumerKey, $consumerSecret, $access_token, $access_secret_token);
    //$content = $connection->get("account/verify_credentials");
    $statuses = $connection->get("statuses/user_timeline", ["count" => 25, "exclude_replies" => true,"screen_name"=>"bugloos"]);
    return $statuses;
}