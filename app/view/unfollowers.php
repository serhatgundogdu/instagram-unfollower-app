<? if(!isAjaxRequest()){ ?>
<?php require view('static/header')?>
<? } ?>
<div >
		<div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Takipten Çıkanlar</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
           			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            	    	<thead>
							<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Time</th>
							<th>Action</th>
							</tr>
				  		</thead>					
						<tbody>
							<?
							foreach ($query as $row): 
							$photo = $row['user_photo'];						
							?>
							<tr style="align-items: center;">
								<td>#<?=$row['id']?></td>
								<td><?=$row['username']?></td>
								<td><?=$row['user_left_time']?></td>
								<td width="40%" style="">
									<a class="btn btn-warning" target="_BLANK" href="https://www.instagram.com/<?=$row['username']?>"><i class="fa fa-user"></i> Profile Git</a>
									<button class="btn btn-danger" data-ajax onclick=""><i class="fas fa-sign-out-alt"></i> Takipten Çık</button>
									<button class="btn btn-primary" data-ajax onclick=""><i class="fas fa-comment-alt"></i> Mesaj Gönder</button>
								</td>
							</tr>
							<? endforeach;?>   
                		</tbody>
            		</table>
            	</div>
         	</div>
        </div>	
	</div>    
	                       


<? if(!isAjaxRequest()){?>
<?php require view('static/footer')?>
<? } ?>
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});

</script>