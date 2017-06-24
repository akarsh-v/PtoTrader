<?php foreach($doctors as $d){ ?>
<div class="row" style="padding: 1%;">
    <div class="col-md-3 profile" style="background-image:url(<?=base_url(); ?><?=$d['image']; ?>);">
    </div>
    <div class="col-md-9">
        <div class="info">
          <h5><?=$d['institue_name']; ?></h5>
          <h5><?=$d['location']; ?>,<?=$d['city']; ?></h5>
          <address><?=$d['address']; ?></address>
        </div>
    </div>
</div>
<div class="row" style="padding: 1%;">
    <div class="content">
      <p><?=$d['about']; ?></p>
    </div>
</div>
<?php } ?>