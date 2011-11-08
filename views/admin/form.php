<?php if ($this->method == 'edit'): ?>
    <h3><?php echo sprintf(lang('hello.edit_title'), $hello->name); ?></h3>
<?php else: ?>
    <h3><?php echo lang('hello.add_title'); ?></h3>
<?php endif; ?>

<?php echo form_open(uri_string(), 'class="crud"'); ?>
    <ul>
		<li>
			<label for="name"><?php echo lang('hello.name');?>:</label>
			<?php echo form_input('name', $hello->name);?>
			<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>

		<li class="even">
			<label for="message"><?php echo "Message";?></label>

			<?php //if ( ! in_array($hello->name, array('user', 'admin'))): ?>
			<?php echo form_input('message', $hello->message);?>
			<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>
    </ul>

	<div class="buttons float-right padding-top">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
	</div>
	
<?php echo form_close();?>

<script type="text/javascript">
	jQuery(function($) {
		$('form input[name="description"]').keyup($.debounce(300, function(){

			var slug = $('input[name="name"]');

			$.post(SITE_URL + 'ajax/url_title', { title : $(this).val() }, function(new_slug){
				slug.val( new_slug );
			});
		}));
	});
</script>