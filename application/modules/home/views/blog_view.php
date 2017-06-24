<div class="middle-banner row l">
        <div class="container">
            <div class="col-md-9">
                <?php foreach($post as $p){ ?>
                 <div class="col-md-12">
                    <div class="blog-content-view">
                        <div class="content-emoji">
                            <a href="<?=site_url(); ?>/home/blog/<?=$p['title']; ?>/<?=$p['id']; ?>/<?=$p['views']; ?>">
                             <div class="emoji-view" style="background-image:url(<?=base_url(); ?><?=$p['image']; ?>);"></div>
                             </a>
                        </div>
                        <div class="blog-heading sky-form">
                            <h2 style="font-size: 23px;"><?=$p['title']; ?></h2>
                        </div>
                        <div class="desc">
                            <p class="cont-blog"><?=$p['description']; ?></p>
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