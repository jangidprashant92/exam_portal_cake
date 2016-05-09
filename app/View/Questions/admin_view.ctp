
<div class="row">
    <div class="col-xs-12">
		
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Question'); ?></h3>
				<div class="box-tools pull-right">
	                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
			</div>
			
			<div class="box-body table-responsive">
                <table id="Questions" class="table table-bordered table-striped">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Test'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($question['Test']['name'], array('controller' => 'tests', 'action' => 'view', $question['Test']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Multichoice'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['multichoice']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Status'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['status']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

