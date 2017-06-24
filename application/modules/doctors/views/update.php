<div class="col-sm-12">
	<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="form-wrap">
				 <?php foreach($doctors as $d){ ?>
					<form action="<?=site_url(); ?>/doctors/updateaction" method="post" enctype="multipart/form-data" id="123">
						<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about Doctor</h6>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Doctor Name</label>
									<input type="text" value="<?=$d['name']; ?>" required name="name" id="firstName" class="form-control" placeholder="">
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">phone</label>
									<input type="text" value="<?=$d['phone']; ?>" required name="phone" id="lastName" class="form-control">
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
						    
							<div class="col-md-4">
								<div class="form-group dropdown">
									<label class="control-label mb-10">city</label>
									<input type="hidden" id="cid" >
									<input value="<?=$d['city']; ?>"  type="text" required id="city1" name="city" class="form-control dropdown-toggle" >
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label mb-10">Location</label>
									<input value="<?=$d['location']; ?>" type="text" required  name="location" id="firstName" class="form-control" placeholder="">
								</div>
							</div>
							<!--/span-->
							
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <label class="control-label mb-10">Address</label>
									<textarea name="address" required class="form-control" rows="4"><?=$d['address']; ?></textarea>
								</div>
							</div>
						</div>
						<!-- Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Email</label>
									<input type="email" value="<?=$d['email']; ?>" required id="" name="email" class="form-control" placeholder="">
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">BNI Member?</label>
									<div class="radio-list">
									   <?php if($d['is_bni_member']==1){ $check='checked'; }else{ $check=''; } ?>
										<div class="radio-inline pl-0">
											<div class="radio radio-info">
												<input type="radio" <?=$check; ?>  required name="bni" id="radio1" value="1">
												<label for="radio1">Yes</label>
											</div>
										</div>
										 <?php if($d['is_bni_member']==0){ $check1='checked'; }else{ $check1=''; } ?>
										<div class="radio-inline">
											<div class="radio radio-info">
												<input type="radio" <?=$check1; ?> required name="bni" id="radio2" value="0">
												<label for="radio2">No</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Experiance</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="ti-"></i></div>
										<input type="text" value="<?=$d['experiance']; ?>" required name="experiance" class="form-control" id="exampleInputuname" placeholder="">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Specialization</label>
									<div class="input-group dropdown">
										<div class="input-group-addon"><i class="ti-"></i></div>
										
										<input value="<?=$d['specialaization']; ?>"   type="text" required id="specialization" name="specialization" class="form-control dropdown-toggle" data-toggle="dropdown">
										<ul class="dropdown-menu"  id="specializationlist" role="menu" aria-labelledby="menu1">
									     
									    </ul>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="seprator-block"></div>
							<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>Education info</h6>
							<hr>
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								    <label class="control-label mb-10">Course</label>
									<input type="text" value="<?=$d['course_done']; ?>" required class="form-control" name="course">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group dropdown">
								    <label class="control-label mb-10">College</label>
									
									<input value="<?=$d['univercity']; ?>"  type="text" required id="college" name="college" class="form-control dropdown-toggle" data-toggle="dropdown">
									<!-- <ul class="dropdown-menu" id="collegelist" role="menu" aria-labelledby="menu1">
								     
								    </ul> -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <label class="control-label mb-10">About</label>
									<textarea name="about" required class="form-control" rows="4"><?=$d['about']; ?></textarea>
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
									<img class="img-responsive" src="<?=base_url(); ?><?=$d['profile_image']; ?>"> 
								</div>
								<input type="hidden" name="oldimg" value="<?=$d['profile_image']; ?>">
								<input type="hidden" name="id" value="<?=$d['id']; ?>">
								<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Change image</span>
									<input type="file" name="img" class="upload">
								</div>
							</div>
						</div>
						
						<div class="form-actions">
							<button type="submit" class="btn btn-success btn-icon left-icon mr-10"> <i class="fa fa-check"></i> <span>save</span></button>
							<button type="button" class="btn btn-warning">Cancel</button>
						</div>
					</form>
				 <?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
