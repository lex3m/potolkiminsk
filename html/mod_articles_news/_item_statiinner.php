<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$images = json_decode($item->images);
$introtext = mb_substr( strip_tags($item->introtext), 0, 250, 'UTF-8' );
$item_heading = $params->get('item_heading', 'h4');
?>

<?php if ($params->get('item_title')) : ?>
	<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if ($params->get('link_titles') && $item->link != '') : ?>
		<h4><a href="<?php echo $item->link; ?>">
			<?php echo $item->title; ?>
		</a></h4>
	<?php else : ?>
		<?php echo $item->title; ?>
	<?php endif; ?>
	</<?php echo $item_heading; ?>>
<?php endif; ?>

<?php if (isset($images->image_intro) and !empty($images->image_intro) and $params->get('image')) : ?>
    <a href="<?php echo $item->link;?>">
      <img src="<?php echo htmlspecialchars($images->image_intro); ?>" class="stat_min_img" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
    </a>
 <?php endif; ?>

<?php if (!$params->get('intro_only')) : ?>
	<?php echo $item->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $item->beforeDisplayContent; ?>
<p>
<?php echo $introtext; ?>
</p>
<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
	<?php echo '<a class="a_stat_o_pot" href="' . $item->link . '">' . $item->linkText . '</a>'; ?>
<?php endif; ?>

