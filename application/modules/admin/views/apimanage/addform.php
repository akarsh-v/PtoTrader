<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
									</div>
									<div class="clearfix"></div>
								</div>
								<?php $gen = time().uniqid();
								      $key = md5($gen); 
								       ?>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form method="post" class="form-horizontal" action="<?=site_url(); ?>/admin/<?=controller; ?>/insert" id="bloodform">
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Api Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input class="form-control" name="name" type="text">
																	<div class="input-group-addon"><i class="icon-plus"></i></div>
																</div>
															</div>

														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Key*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" class="form-control" value="<?=$key; ?>" readonly name="key">
																	<div class="input-group-addon"><i class="icon-lock"></i></div>
																</div>
															</div>
														</div>
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info ">ADD</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>