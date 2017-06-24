<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="">
									<h6 class="panel-title txt-dark pull-left">Doctors List</h6>
									<a href="<?=site_url(); ?>/doctors/DoctorsAdd" class="btn btn-default btn-icon-anim btn-circle pull-right"><i class="fa fa-plus"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
									    <?php //echo '<pre>'; print_r($doctors); ?>
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
													    <th>No</th>
													    <th>Image</th>
														<th>Name</th>
														<th>Specialization</th>
														<th>BNI Member</th>
														<th>Experience</th>
														<th>Education</th>
														<th>contact</th>
														<th>active</th>
														<th>action</th>
													</tr>
												</thead>
												<tbody>
												    <?php $i=1; foreach($doctors as $d){ ?>
													<tr>
														<td><?=$i; ?></td>
														<td style="background-image: url(<?=base_url(); ?><?=$d['profile_image']; ?>);background-repeat: no-repeat; background-position: center;background-size: contain;"></td>
														<td><?=$d['name']; ?></td>
														<td><?=$d['specialaization']; ?></td>
														<td><?php if($d['is_bni_member']==1){ echo 'YES'; }else{ echo 'NO'; } ?></td>
														<td><?=$d['experiance']; ?> Years</td>
														<td><?=$d['course_done']; ?></td>
														<td><?=$d['phone']; ?></br><?=$d['email']; ?></td>
														<td><?php if($d['active']==1){ echo 'YES'; }else{ echo 'NO'; } ?></td>
														<td style="width: 13%;">
														    <a href="<?=site_url(); ?>/doctors/update/<?=$d['id']; ?>" class="btn btn-default btn-icon-anim btn-circle"><i class="fa fa-pencil"></i></a>
														    <button data-toggle="modal" data-target="#myModal" onclick="view('/doctors/view/<?=$d['id']; ?>')" class="btn btn-success btn-icon-anim btn-circle"><i class="fa fa-eye"></i></button>
														    <button onclick="remove('/doctors/delete/<?=$d['id']; ?>')" class="btn btn-danger btn-icon-anim btn-circle"><i class="fa fa-trash"></i></button>
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

				    <div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">View</h4>
					      </div>
					      <div class="modal-body" id="viewbody">
					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>