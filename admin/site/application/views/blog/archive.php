<fieldset>
	<legend>Archived Blog Post</legend>
</fieldset>


<?php $flashdata = $this->session->flashdata('flashdata'); ?>
<?php if($flashdata != ''): ?>
	<div class="alert alert-success">
		<?php echo $flashdata; ?>
	</div>
<?php endif; ?>


<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Date</th>
			<th>Title - Summary</th>
			<th>Action</th>
		</tr>
	</thead>
	
	<tbody class="post-body">
		<?php if(is_array($post) && count($post)>0): ?>
			<?php $i = (int)@$offset; ?>
			<?php foreach($post as $row): ?>
				<?php $i++; ?>
				<tr class="post-item">
					<td><?php echo $i; ?></td>
					<td><?php echo date('d M Y H:i', strtotime($row['date_create'])); ?></td>
					<td>
						<div><strong><?php echo $row['title']; ?></strong></div>
						<div style="max-width:600px"><?php echo substr($row['summary'], 0, 300); ?></div>
					</td>
					<td>
						<a href="#" class="btn btn-small btn-primary btn-active" data-id="<?php echo $row['id']; ?>">Activate</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="4">
					<div>No post found.</div>
				</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>


<script type="text/javascript">
$(function(){
	$(".btn-active").each(function(){
		var me = $(this);
			
		me.bind('click', function(e){
			e.preventDefault();
			if(confirm('Are you sure you want to activate this post?')){
				$.ajax({
					url: App.base_url +"blog/set_status",
					data: {id: me.attr("data-id"), status: 'active'},
					dataType: "json",
					success: function(r){
						if(r.success == true){
							// hide 
							me.closest('.post-item').fadeOut(function(){
								$(this).remove();
								if($('.post-item').length == 0){
									var tpl = '<tr class="post-item">'+
											  '<td colspan="4">Data empty</td>';
											  '</tr>';
									$(".post-body").append(tpl);
								}
							});
						}
						else
						{
							alert(r.message);
						}
						return false;
					}
				});
			}
			return false;
		});
	});
});
</script>