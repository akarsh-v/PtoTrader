<div class="col-sm-12">
	<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="form-wrap">
					<form action="<?=site_url(); ?>/doctors/add" method="post" enctype="multipart/form-data" id="123">
						<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>Blood Bank</h6>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Institute Name</label>
									<input type="text" required name="name" id="firstName" class="form-control" placeholder="">
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">phone</label>
									<input type="text" required name="phone" id="lastName" class="form-control">
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
						    <div class="col-md-4">
								<div class="form-group dropdown">
									<label class="control-label mb-10">State</label>
									<input type="hidden" id="sid" >
									<input type="text" required id="state" name="state" class="form-control dropdown-toggle" data-toggle="dropdown">
									<ul class="dropdown-menu" autocompleat="off" id="statelist" role="menu" aria-labelledby="menu1">
								     
								    </ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group dropdown">
									<label class="control-label mb-10">city</label>
									<input type="hidden" id="cid" >
									<input  type="text" required id="city" name="city" class="form-control dropdown-toggle" data-toggle="dropdown">
									<ul class="dropdown-menu" id="citylist" role="menu" aria-labelledby="menu1">
								     
								    </ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label mb-10">Location</label>
									<input type="text" required onclick="getloc('asdf');" name="location" id="firstName" class="form-control" placeholder="">
								</div>
							</div>
							<!--/span-->
							
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <label class="control-label mb-10">Address</label>
									<textarea name="address" required class="form-control" rows="4"></textarea>
								</div>
							</div>
						</div>
						<!-- Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Email</label>
									<input type="email" required required id="" name="email" class="form-control" placeholder="">
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							
							
						</div>
						<div class="seprator-block"></div>
							<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>Education info</h6>
							<hr>
						
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								    <label class="control-label mb-10">Registered Number</label>
									<input type="text" required name="cno" class="form-control">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <label class="control-label mb-10">About</label>
									<textarea name="about" required class="form-control" rows="4"></textarea>
								</div>
							</div>
						</div>
						<!--/row-->
						
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
