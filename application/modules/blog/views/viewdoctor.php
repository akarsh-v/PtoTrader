<?php foreach($doctors as $d){ ?>
<div class="row" style="padding: 1%;">
    <div class="col-md-3 profile" style="background-image:url(<?=base_url(); ?><?=$d['image']; ?>);">
    </div>
    <div class="col-md-9">
     <div class="info">
      <div class="col-md-6">
      <h5><?=$d['title']; ?></h5>
      </div>
     </div>
    </div>
</div>
<div class="row" style="padding: 1%;">
    <div class="content">
      <p><?=$d['description']; ?></p>
    </div>
</div>
<?php } ?>