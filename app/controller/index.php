<?
$rankToken = \InstagramAPI\Signatures::generateUUID();
$followers = json_decode($ig->people->getSelfFollowers($rankToken),true);
$count_followers = count($followers['users']);
$followings = json_decode($ig->people->getSelfFollowing($rankToken),true);
$count_followings = count($followings['users']);
$feed = json_decode($ig->timeline->getSelfUserFeed($rankToken),true);
$count_feed = $feed['num_results'];


require view('index');
