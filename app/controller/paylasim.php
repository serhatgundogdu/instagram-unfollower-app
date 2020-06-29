<?

$rankToken = \InstagramAPI\Signatures::generateUUID();
$feed = json_decode($ig->timeline->getSelfUserFeed($rankToken),true);
$count_feed = $feed['num_results'];

require view('paylasim');