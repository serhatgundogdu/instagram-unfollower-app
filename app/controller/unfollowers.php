<?  
    $contentheader = "Takipten Çıkanlar";
    $query = $db->from('last_lefters')
    ->orderby('id', 'DESC')
    ->all();
    require view('unfollowers');