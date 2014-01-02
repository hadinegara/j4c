<?php 
$flashdata = $this->session->flashdata('flashdata'); 
$alert_status = $this->session->flashdata('alert_status'); 
?>
<?php if($flashdata != ''): ?>
	<div class="alert alert-<?php echo ($alert_status == '' ? 'info' : $alert_status); ?>">
		<?php echo $flashdata; ?>
	</div>
<?php endif; ?>

<table class="table">
	<thead>
		<th>No</th>
		<th><?php echo $this->lang->line('label_title'); ?></th>
		<th><?php echo $this->lang->line('label_date_create'); ?></th>
		<th><?php echo $this->lang->line('label_date_close'); ?></th>
		<th><div class="text-right"><?php echo $this->lang->line('label_applicant'); ?></div></th>
		<th><?php echo $this->lang->line('label_status'); ?></th>
		<th><?php echo $this->lang->line('label_action'); ?></th>
	</thead>
	<tbody>
		
		<?php if(is_array($posted_job) && count($posted_job)>0): ?>
			<?php foreach($posted_job as $i=>$row): ?>
				<tr class="<?php echo ($row['status'] == 'reject') ? 'muted' : ''; ?>">
					<td><?php echo ($i+1); ?></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo date('d M Y', strtotime($row['date_create'])); ?></td>
					<td><?php echo date('d M Y', strtotime($row['date_close'])); ?></td>
					<td><div class="text-right"><?php echo $row['seeker_count']; ?></div></td>
					<td>
						<select name="status" style="width:auto" onchange="location.href='<?php echo base_url('company/posted_job/set_status?p='. enc($row['job_id'])); ?>-'+this.value">
							<option <?php echo ($row['status'] == 'publish' ? 'selected="selected"' : ''); ?> value="publish"><?php echo $this->lang->line('label_status_publish'); ?></option>
							<option <?php echo ($row['status'] == 'reject' ? 'selected="selected"' : ''); ?> value="reject"><?php echo $this->lang->line('label_status_reject'); ?></option>
						</select>
					</td>
					<td>
						<a href="#" class="btn btn-small btn-preview"><?php echo $this->lang->line('btn_preview'); ?></a>
						<a href="<?php echo base_url('company/posted_job/edit?id='. enc($row['job_id'])); ?>" class="btn btn-small btn-warning"><?php echo $this->lang->line('btn_edit'); ?></a>
						<a href="<?php echo base_url('company/posted_job/delete?id='. enc($row['job_id'])); ?>" class="btn btn-small btn-danger btn-delete"
							data-confirm-message="<?php echo $this->lang->line('msg_job_confirm_delete'); ?>"><?php echo $this->lang->line('btn_delete'); ?></a>
						<div class="data-preview" data-title="<?php echo $row['title']; ?>" style="display:none">
							<div>
								<strong><?php echo $this->lang->line('label_description'); ?></strong>
								<div><?php echo $row['description']; ?></div>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_requirement'); ?></strong>
								<div>
									<?php if($row['requirement'] != ''): ?>
										<ul>
											<?php foreach(json_decode($row['requirement'], TRUE) as $req): ?>
												<li><?php echo $req; ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_month_salary'); ?></strong>:
								<?php echo $row['month_salary']; ?>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_location'); ?></strong>:
								<?php echo $row['location']; ?>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_category'); ?></strong>:
								<?php echo $row['category']; ?>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_job_type'); ?></strong>:
								<?php echo $row['job_type']; ?>
								<?php if($row['job_type'] == 'contract'): ?>
									<?php echo $row['contract_duration']; ?>
								<?php endif; ?>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_number_of_jobs'); ?></strong>:
								<?php echo $row['noj']; ?>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_date_create'); ?></strong>:
								<?php echo date('d F Y', strtotime($row['date_create'])); ?>
							</div>
							<div>
								<strong><?php echo $this->lang->line('label_date_close'); ?></strong>:
								<?php echo date('d F Y', strtotime($row['date_close'])); ?>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="5">
					<?php echo $this->lang->line('message_no_posted_job'); ?>
				</td>
			</tr>
		<?php endif; ?>
	
	</tbody>	
</table>
