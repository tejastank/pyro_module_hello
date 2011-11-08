<?php if (!empty($msg)) : ?>
    <div class="blog_post">
        <?php foreach ($msg as $message): ?>
            <h3 style="display: inline;">
                <?php echo  $message->name; ?> <span style="font-size: 16px; font-style: italic;">says - </span>
            </h3>
            <?php echo $message->message; ?> <br/>
        <?php endforeach; ?>
    </div>

<?php else: ?>
    <p><?php echo "There is no messages to display!!";?></p>
<?php endif; ?>