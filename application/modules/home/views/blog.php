<div class="middle-banner row l">
        <div class="container">
            <div class="col-md-9">
                <?php foreach($post as $p){ ?>
                <div class="blog-content">
                    <div class="col-md-4">
                        <a href="<?=site_url(); ?>/home/blog/<?=$p['title']; ?>/<?=$p['id']; ?>/<?=$p['views']; ?>">
                        <div class="blog-image" style="background-image:url(<?=base_url(); ?><?=$p['image']; ?>);">
                        </div>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="sky-form">
                            <h2 style="font-size: 20px;"><a href="<?=site_url(); ?>/home/blog/<?=$p['title']; ?>/<?=$p['id']; ?>/<?=$p['views']; ?>"><?=$p['title']; ?></a></h2>
                            <div class="content-emoji">
                                <p class="emoji-text">
                                 <?=substr(strip_tags($p['description']), 0, 150).'...';?>
                                </p>
                            </div>
                            <div class="blog-footer">
                                <span class="pull-left"><i class="fa fa-calendar"></i> <?=$p['created']; ?></span>
                                <span class="pull-right"><i class="fa fa-eye"></i>  <?=$p['views']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-3">
                <div class="recent_blog">
                     <div class="head">Recent Blog</div>
                    <?php foreach($this->common_model->getrecentblog() as  $rb){ ?>
                    <div class="rbname"><a href="<?=site_url(); ?>/home/blog/<?=$p['title']; ?>/<?=$p['id']; ?>/<?=$p['views']; ?>" class="rbtitle"><?=$p['title']; ?></a></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>