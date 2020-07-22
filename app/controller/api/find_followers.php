<?

if ($data = form_control()){
    $ayarsor=$db->prepare("SELECT * FROM followings where id=:id");
    $ayarsor->execute(array(
        'id' => 0
        ));
    $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
    $rankToken = \InstagramAPI\Signatures::generateUUID();
    $lul = json_decode($ayarcek['followers'],true);
    $followers = json_decode($ig->people->getSelfFollowers($rankToken),true);

          
           //print_r(array_intersect($followers['users'], $lul['users']));
           $html = '<table class="table table-bordered">
           <tbody>
           <tr>
           {@degistir}
           </tr>
           </tbody></table>';
           $notfollowers = "";
           $notfollowername = null;
           //$notfollowers+= "UnFollowers ".count($followers['users'])."<br>";
           $count = count($lul['users']);
           
           for($i=0; $i<$count; $i++){
              if(searchMyCoolArray($followers['users'], 'username', $lul['users'][$i]['username'])){
                //echo $lul['users'][$i]['username']." Takip Ediyor!<br>";
              }else{
            
                $notfollowers.='<td>
                <a target="_BLANK" href="https://www.instagram.com/'.$lul['users'][$i]['username'].'">'.$lul['users'][$i]['username'].' Takip Takipten Çıktı!</a>
                </td>';
                $notfollowername.=$lul['users'][$i]['username'].' ,';
                $reviewekle=$db->prepare("INSERT INTO last_lefters SET
                username=:review_title,
                user_photo=:review_seo,
                userjson=:review_paylasan
                
            ");
                $insert=$reviewekle->execute(array(
                    'review_title' => $lul['users'][$i]['username'],
                    'review_seo' => $lul['users'][$i]['profile_pic_url'],
                    'review_paylasan' => json_encode($lul['users'][$i])
                ));
                
                //$pk = ''.$lul['users'][$i]['pk'];
                
              }
             
          }
          $rankToken = \InstagramAPI\Signatures::generateUUID();
		      $followers = $ig->people->getSelfFollowers($rankToken);
          if(($notfollowers) == ""){
            $notfollowers = '<td>Kimse takipten çıkmamış!</td>';
          }
		  $ayarsor=$db->prepare("UPDATE followings SET followers='".$followers."' WHERE id='0'");
		  $ayarsor->execute();
          $json['html'] =  str_replace("{@degistir}", $notfollowers, $html);
          

         

}else{
    $json['error'] = 'Lütfen tüm alanları doldurup tekrar deneyin.';
}

echo json_encode($json);