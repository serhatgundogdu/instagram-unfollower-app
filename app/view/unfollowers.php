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
							<tr>
								<td>#1</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
							</tr>
				
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