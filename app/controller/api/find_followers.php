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

    function searchMyCoolArray($arrays, $key, $search) {

        foreach($arrays as $object) {
            if(is_object($object)) {
               $object = get_object_vars($object);
            }
     
            if(array_key_exists($key, $object) && $object[$key] == $search) return true;
            }
     
            return false;
     }
          
           //print_r(array_intersect($followers['users'], $lul['users']));
           $html = '<div class="kt-portlet kt-portlet--height-fluid">
           <div class="kt-portlet__body">							
           <div class="kt-widget4">
            {@degistir}
           </div>
             </div>
           </div>';
           $notfollowers = "";
           $notfollowername = null;
           //$notfollowers+= "UnFollowers ".count($followers['users'])."<br>";
           $count = count($lul['users']);
           
           for($i=0; $i<$count; $i++){
              if(searchMyCoolArray($followers['users'], 'username', $lul['users'][$i]['username'])){
                //echo $lul['users'][$i]['username']." Takip Ediyor!<br>";
              }else{
            
                $notfollowers.='<div class="kt-widget4__item">
                <a target="_BLANK" class="kt-widget4__title kt-widget4__title--light" href="https://www.instagram.com/'.$lul['users'][$i]['username'].'">'.$lul['users'][$i]['username'].' Takip Takipten Çıktı!</a>
                </div>';
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
            $notfollowers = '<div class="kt-widget4__item"><span class="kt-widget4__icon">
            <i class="flaticon2-rocket kt-font-brand"></i>
          </span><a class="kt-widget4__title kt-widget4__title--light">Kimse takipten çıkmamış.</a></div>';
          }
		  $ayarsor=$db->prepare("UPDATE followings SET followers='".$followers."' WHERE id='0'");
		  $ayarsor->execute();
          $json['html'] =  str_replace("{@degistir}", $notfollowers, $html);
          

         

}else{
    $json['error'] = 'Lütfen tüm alanları doldurup tekrar deneyin.';
}

echo json_encode($json);