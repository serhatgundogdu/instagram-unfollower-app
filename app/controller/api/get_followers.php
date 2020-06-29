<?

if(isset($_POST['data_id'])){
    $query = $db->from('last_lefters')
    ->orderby('id', 'DESC')
    ->limit(0, 3)
    ->all();
    ?>
    <? foreach ($query as $row): 
        $photo = $row['user_photo'];
    ?>
        <div class="item col-md-4">
				<a class="user" target="_BLANK" href="https://www.instagram.com/<?=$row['username']?>">
					<img src="<?=$photo?>" alt="">   
          <a class="username"><?=$row['username']?></a> 				
        </a>										
        </div>
    <? endforeach;?>            
    <?
 }