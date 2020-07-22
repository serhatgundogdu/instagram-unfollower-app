<?
$rankToken = \InstagramAPI\Signatures::generateUUID();
$followers = json_decode($ig->people->getSelfFollowers($rankToken),true);
$count_followers = count($followers['users']);
$followings = json_decode($ig->people->getSelfFollowing($rankToken),true);
$count_followings = count($followings['users']);
$feed = json_decode($ig->timeline->getSelfUserFeed($rankToken),true);
$count_feed = $feed['num_results'];
$count_gt = 0;


$months= array(
    
        0,0,0,0,0,0,0,0,0,0,0,0
    
);

//date("d M Y", strtotime($ayarcek['ayar_tarih']))
$query = $db->from('last_lefters')
->orderby('id', 'DESC')
->all();
foreach ($query as $row): 
    $month = date("m", strtotime($row['user_left_time']));
    $months[$month-1]++;
endforeach;

for($i=0; $i<$count_followings; $i++){
    if(searchMyCoolArray($followers['users'], 'username', $followings['users'][$i]['username'])){
        $count_gt++;
    }
}

$gtpercent = $count_gt/$count_followings*100;


require view('index');
