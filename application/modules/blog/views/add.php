<div class="col-sm-12">
	<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="form-wrap">
					<form action="<?=site_url(); ?>/blog/addaction" method="post" enctype="multipart/form-data" id="123">
						<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>Write a Brodcast</h6>
						<hr>
						<div class="row">
							<div class="col-md-12">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default card-view">
								   <div class="form-group">
									<label class="control-label mb-10">Title</label>
									  <input type="text" required name="name" id="firstName" class="form-control" placeholder="">
								    </div>
									<div class="panel-heading">
										<div class="pull-left">
											<h6 class="panel-title txt-dark">Description</h6>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<textarea class="summernote" name="description"></textarea>
										</div>
									</div>
								</div>
							</div>
					    </div>
						<div class="seprator-block"></div>
						<h6 class="txt-dark capitalize-font"><i class="icon-picture mr-10"></i>upload image</h6>
						<hr>
						<div class="row">
							<div class="col-lg-12">
								<div class="img-upload-wrap">
									<img class="img-responsive" src="<?=base_url(); ?>dist/img/chair.jpg" alt="upload_img"> 
								</div>
								<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Upload new image</span>
									<input type="file" name="img" class="upload">
								</div>
							</div>
						</div>
						
						<div class="form-actions">
							<button type="submit" class="btn btn-success btn-icon left-icon mr-10"> <i class="fa fa-check"></i> <span>save</span></button>
							<button type="button" class="btn btn-warning">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
