<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
												    
													<form method="post" class="form-horizontal" action="<?=site_url(); ?>/admin/<?=controller; ?>/insert/<?=$form[0]['id']; ?>" id="bloodform">
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input class="form-control" name="name" readonly value="<?=$form[0]['group_name']; ?>" type="text">
																	<div class="input-group-addon"><i class="icon-plus"></i></div>
																</div>
															</div>

														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Description*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<textarea class="form-control" style="width:100%;" name="description"><?=$form[0]['shot_description']; ?></textarea>
																</div>
															</div>
														</div>
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info ">Update</button>
															</div>
														</div>
													</form>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>