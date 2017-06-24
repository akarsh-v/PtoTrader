<div class="page-wrapper">
            <div class="container-fluid">
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">basic table</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=site_url(); ?>/admin">Dashboard</a></li>
						<li><a href="#"><span><?=TITLE; ?></span></a></li>
					  </ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="">
									<h6 class="pull-left panel-title txt-dark"><?=TITLE; ?></h6>
									<a onclick="getform('/admin/<?=controller; ?>/click/insert');" class="btn btn-default btn-icon-anim btn-circle pull-right"><i class="fa fa-plus"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<p class="text-muted">
										<?php if(!empty($this->session->flashdata('msg'))){ ?>
										    <div class="alert alert-success">
										    	<?php echo $this->session->flashdata('msg'); ?>
										    </div>
										<?php } ?>
									</p>
									
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table table-striped table-bordered mb-0">
												<thead>
												  <tr>
													<?php for($i=1; $i<=count($thead); $i++){ ?>
                                                    <th><?=$thead[$i-1]; ?></th>
													<?php } ?>
												  </tr>
												</thead>
												<tbody>
												<?php $i=1; foreach($tbody as $t){ ?>
												  <tr>
													<td><?=$i; ?></td>
													<td><?=$t['group_name']; ?></td>
													<td><?php if($t['active']==1){ $check='checked'; }else{ $check = ''; } ?>
															<label class="switch">
															  <input type="checkbox" <?=$check ?> value="<?=$t['active']; ?>">
															  <div class="slider round"></div>
															</label>
														</td>
														<td style="width: 14%;">
														    <a onclick="getform('/admin/<?=controller; ?>/click/update/<?=$t['id']; ?>');" class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-pencil"></i></a>
														    <button onclick="getform('/admin/<?=controller; ?>/click/view/<?=$t['id']; ?>');" class="btn btn-success btn-icon-anim btn-circle"><i class="fa fa-eye"></i></button>
														</td>
												  </tr>
												<?php $i++; } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Basic Table -->
				</div>
				
			</div>