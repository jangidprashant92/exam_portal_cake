<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Test'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $test['Test']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Tests" class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td><strong><?php echo __('Id'); ?></strong></td>
                        <td>
                            <?php echo h($test['Test']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('User'); ?></strong></td>
                        <td>
                            <?php echo $this->Html->link($test['User']['name'], array('controller' => 'users', 'action' => 'view', $test['User']['id']), array('class' => '')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Name'); ?></strong></td>
                        <td>
                            <?php echo h($test['Test']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Description'); ?></strong></td>
                        <td>
                            <?php echo h($test['Test']['description']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Duration'); ?></strong></td>
                        <td>
                            <?php echo h(gmdate("H:i:s",$test['Test']['duration'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Start Date'); ?></strong></td>
                        <td>
                            <?php echo h($test['Test']['start_date']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('End Date'); ?></strong></td>
                        <td>
                            <?php echo h($test['Test']['end_date']); ?>
                            &nbsp;
                        </td>
                    </tr>

                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Questions'); ?></h3>
                <div class="box-tools pull-right">
                    <?php //echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div>
                <!-- /.actions -->
            </div>
            <?php if (!empty($test['Question'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center"><?php echo __('Id'); ?></th>
                            <th class="text-center"><?php echo __('Test Id'); ?></th>
                            <th class="text-center"><?php echo __('Description'); ?></th>

                            <th class="text-center"><?php echo __('Status'); ?></th>
                            <th class="text-center"><?php echo __('Actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($test['Question'] as $question): ?>
                            <tr>
                                <td class="text-center"><?php echo $question['id']; ?></td>
                                <td class="text-center"><?php echo $question['test_id']; ?></td>
                                <td class="text-center"><?php echo strip_tags($question['description']); ?></td>

                                <td class="text-center"><?php echo $question['status']; ?></td>
                                <td class="text-center">
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'questions', 'action' => 'view', $question['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'questions', 'action' => 'edit', $question['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                    <?php //echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'questions', 'action' => 'delete', $question['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $question['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


        </div><!-- /.related -->




    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

