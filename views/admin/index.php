<?php if ($hello): ?>
    <table class="table-list">
		<thead>
			<tr>
				<th width="40%"><?php echo lang('hello.name');?></th>
				<th><?php echo "Message";?></th>
				<th width="200" class="align-center"><?php echo lang('action_label'); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($hello as $msg):?>
			<tr>
				<td><?php echo $msg->name; ?></td>
				<td><?php echo $msg->message; ?></td>
				<td class="align-center buttons buttons-small">
				<?php echo anchor('admin/hello/edit/'.$msg->id, lang('hello.edit'), 'class="button edit"'); ?>
				<?php if ( ! in_array($msg->name, array('user', 'admin'))): ?>
					<?php echo anchor('admin/hello/delete/'.$msg->id, lang('hello.delete'), 'class="confirm button delete"'); ?>
				<?php endif; ?>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
    </table>

<?php else: ?>
	<div class="blank-slate">
		<h2><?php echo lang('hello.no_hello');?></h2>
	</div>
<?php endif;?>