<ul>
	<li><?php echo CHtml::link('Create New Post',array('posts/create')); ?></li>
	<li><?php echo CHtml::link('Manage Posts',array('posts/admin')); ?></li>
	<li><?php echo CHtml::link('Approve Comments',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>