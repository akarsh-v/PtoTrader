<style type="">
	.name:hover {
     background-color: #582735;
     color: #fff;
    }
	.name {
	    font-size: 63px;
	    text-align: center;
	    border: 4px solid #582735;
	    width: 130px;
	    height: 130px;
	    padding: 6%;
	    border-radius: 50%;
	    height: 130px;
	}
</style>

<div class="row">
 <div class="col-md-5">
   <div class="name">
    <?=$form[0]['group_name']; ?>
   </div>
 </div>
 <div class="col-md-7">
  <?php if($form[0]['active']==1){ ?>
    <button class="btn btn-success" style="margin: 40px auto;float: right;border-radius: 9px;background-color: #582735;border: 1px solid #582735;">Active</button>
  <?php }else{ ?>
   <button class="btn btn-danger" style="margin: 40px auto;float: right;border-radius: 9px;background-color: #582735;border: 1px solid #582735;">Deactive</button>
  <?php } ?>
 </div>
 <div class="col-md-12">
  <p style="max-height: 150px;color: #333;overflow-x: hidden;border: 1px solid #eee;padding: 11px;margin-top: 4%;"><?=$form[0]['shot_description']; ?></p>
 </div>
</div>