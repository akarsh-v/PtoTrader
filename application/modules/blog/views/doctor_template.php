          <div class="page-wrapper">
            <div class="container-fluid">
				<div class="row heading-bg" style="background-color: #582735; "> 
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light"><?=Module; ?></h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=site_url(); ?>admin">Dashboard</a></li>
						<li><a href="#"><span>Doctors</span></a></li>
						<li class="active"><span><?=$bred; ?></span></li>
					  </ol>
					</div>
				</div>

				<div class="row">
				       <?php if(!empty($this->session->flashdata('msg'))){ ?>
					    <div class="alert alert-success">
					    	<?php echo $this->session->flashdata('msg'); ?>
					    </div>
					   <?php } ?>
					<?php $this->load->view('blog/'.$page_content.''); ?>
				</div>
			</div>