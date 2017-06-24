<?php foreach($doctors as $d){ ?>
<div class="row" style="padding: 1%;">
    <div class="col-md-3 profile" style="background-image:url(<?=base_url(); ?><?=$d['profile_image']; ?>);">
    </div>
    <div class="col-md-9">
     <div class="info">
      <div class="col-md-6">
      <h5><?=$d['name']; ?><small><?=$d['course_done']; ?></small></h5>
      <h6><?=$d['specialaization']; ?></h6>
      <h6><?=$d['univercity']; ?></h6>
      <h6><?=$d['experiance']; ?> Years Experiance</h6>
      </div>
      <div class="col-md-6">
      <h5><?=$d['location']; ?>,<?=$d['city']; ?></h5>
      <address><?=$d['address']; ?></address>
      </div>
     </div>
    </div>
</div>
<div class="row" style="padding: 1%;">
    <div class="content">
      <p><?=$d['about']; ?></p>
    </div>
</div>
<?php } ?>