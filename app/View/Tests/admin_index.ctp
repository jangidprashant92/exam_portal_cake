<?php echo $this->Html->css('datatables/dataTables.bootstrap'); ?>
<div class="row">
    <div class="col-xs-12">

    <div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo __('Exams'); ?></h3>
			<div class="box-tools pull-right">
                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Exam'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
            </div>
		</div>	
			<div class="box-body table-responsive">
                <table id="Tests" class="table table-bordered table-striped">
					<thead>
						<tr>

													
													<th class="text-center"><?php echo $this->Paginator->sort('user_id'); ?></th>
													<th class="text-center"><?php echo $this->Paginator->sort('name'); ?></th>
													<th class="text-center"><?php echo $this->Paginator->sort('description'); ?></th>
													<th class="text-center"><?php echo $this->Paginator->sort('duration'); ?></th>
													<th class="text-center"><?php echo $this->Paginator->sort('start_date'); ?></th>
													<th class="text-center"><?php echo $this->Paginator->sort('end_date'); ?></th>
													<th class="text-center"><?php echo $this->Paginator->sort('status'); ?></th>

												<th class="text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($tests as $test): ?>
	<tr>


		<td class="text-center">
			<?php echo $this->Html->link($test['User']['name'], array('controller' => 'users', 'action' => 'view', $test['User']['id'])); ?>
		</td>
		<td class="text-center"><?php echo h($test['Test']['name']); ?>&nbsp;</td>
		<td class="text-center"><?php echo h($test['Test']['description']); ?>&nbsp;</td>
		<td class="text-center"><?php echo h(gmdate("H:i:s",$test['Test']['duration'])); ?>&nbsp;</td>
		<td class="text-center"><?php echo h($test['Test']['start_date']); ?>&nbsp;</td>
		<td class="text-center"><?php echo h($test['Test']['end_date']); ?>&nbsp;</td>
		<td class="text-center"><?php  $x=1; echo $x=$test['Test']['status'] ? '<span class="label label-success">Completed</span>':'<span class="label label-warning">Pending</span>'; ?>&nbsp;</td>


		<td class="text-center">
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $test['Test']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $test['Test']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
			<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $test['Test']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $test['Test']['id'])); ?>
			<?php $x=1; echo $x = $test['Test']['is_publish'] ? $this->Html->link(__('<i class="fa fa-check"></i>'), array('action' => 'is_publish', $test['Test']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Not Publish'))
				: $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'is_publish', $test['Test']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Publish'));
			?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

<?php
	echo $this->Html->script('jquery.min');
	echo $this->Html->script('plugins/datatables/jquery.dataTables');
	echo $this->Html->script('plugins/datatables/dataTables.bootstrap');
?>
<script type="text/javascript">
    $(function() {
        $("#Tests").dataTable();
    });
</script>