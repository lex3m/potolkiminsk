<?php
// no direct access
defined('_JEXEC') or die;
?>
<?php if (!empty($list)) :?>
<div class="over_hid">
<?php if ($grouped) : ?>
	<?php foreach ($list as $group_name => $group) : ?>
	<li>
		<h<?php echo $item_heading; ?>>
			<?php if ($params->get('link_object_title') && $group[0]->object_link != '') : ?>
				<a href="<?php echo $group[0]->object_link;?>"><?php echo $group_name;?></a>
			<?php else : ?>
				<?php echo $group_name; ?>
			<?php endif; ?>
		</h<?php echo $item_heading; ?>>
		<ul>
			<?php $i = 0; $n = count($group); ?>
			<?php foreach ($group as $item) : ?>
			<li>
				<?php if ($params->get('show_avatar')) :?>
					<?php echo $item->avatar; ?>
				<?php endif; ?>

				<?php if ($params->get('show_comment_author')) :?>
				<span class="author"><?php echo $item->displayAuthorName; ?></span>
				<?php endif; ?>
				<?php if ($params->get('show_comment_date')) :?>
				<span class="date"><?php echo $item->displayDate; ?></span>
				<?php endif; ?>

				<div class="comment rounded<?php echo $params->get('show_avatar') ? ' avatar-indent' : '';?>">
					<?php if ($params->get('show_comment_title') && $item->displayCommentTitle) :?>
					<a class="title" href="<?php echo $item->displayCommentLink; ?>" title="<?php echo htmlspecialchars($item->displayCommentTitle); ?>">
						<?php echo $item->displayCommentTitle; ?>
					</a>
					<?php endif; ?>
					<div>
						<?php echo $item->displayCommentText; ?>
						<?php if ($params->get('readmore')) : ?>
						<p class="jcomments-latest-readmore">
							<a href="<?php echo $item->displayCommentLink; ?>"><?php echo $item->readmoreText; ?></a>
						</p>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($n > 1 && ($i < $n - 1)) :?>
				<span class="comment-separator">&#160;</span>
				<?php endif; ?>
			</li>
			<?php $i++; ?>
		<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>

<?php else : ?>
	
	<?php $i = 0; $n = count($list); ?>
	<?php foreach ($list as $item) : ?>
	<div class="col-lg-4 col-md-6 col-sm-12 proz_fon">
		
		<h4><?php echo $item->displayAuthorName; ?></h4>		
		<p>		
				<?php echo $item->displayCommentText; ?>
				<?php if ($params->get('readmore')) : ?>				
					<a href="<?php echo $item->displayCommentLink; ?>"><?php echo $item->readmoreText; ?></a>				
				<?php endif; ?>
		</p>

		<?php if ($n > 1 && ($i < $n - 1)) :?>
		<span class="comment-separator">&#160;</span>
		<?php endif; ?>
	</div>
	<?php $i++; ?>
	<?php endforeach; ?>
<?php endif; ?>
<div class="col-lg-12 col-md-6 col-sm-12">
  <a class="a_vse_otz" href="/otzyvy.html">Все отзывы</a>
</div>
</div>

<?php endif; ?>
