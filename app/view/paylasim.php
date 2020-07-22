<? if(!isAjaxRequest()){?>
<?php require view('static/header')?>
<? } ?>
<div class="row">
    <div class="col-md-8">
        
     <!-- md8 end-->
    </div>
    <div class="col-md-4">
    <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Paylaşım Sayısı: <?=$count_feed?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                      <div class="dropdown-header">İşlemler</div>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="padding: 0px 2px; display: flex;flex-direction: column;box-sizing: border-box; height: 500px; overflow-y: scroll">
                  <?
                    for($i=0; $i<$count_feed; $i++){ ?>
                    <img style="max-width: 100%; height: auto; margin-bottom:5px;"  src="<?=$feed['items'][$i]['image_versions2']['candidates']['0']['url']?>" alt="">
                    <?}
                  ?>
                </div>
              </div>
      
    <!-- md4 end-->
    </div>
</div>



<? if(!isAjaxRequest()){?>
<?php require view('static/footer')?>
<? } ?>
