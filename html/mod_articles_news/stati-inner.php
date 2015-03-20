<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<!-- Статьи о потолках -->
<div class="stat_o_potolk">
	<h3 class="h3_stat_o_potolk">Статьи о потолках</h3>					
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		<div class="stat_o_potolk1">
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item_statiinner'); ?>			
		</div>
	<?php endfor; ?>
	 <a class="vse_stat_o_pot" href="/stati.html">Все статьи</a>
</div>
<!-- end Статьи о потолках -->
