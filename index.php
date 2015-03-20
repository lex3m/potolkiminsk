<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.potolkiminsk
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('/libraries/cegcore/assets/gplugins/gtooltip/gtooltip.js');
$doc->addScript('/libraries/cegcore/assets/gplugins/gvalidation/gvalidation.js');
$doc->addScript('/libraries/cegcore/assets/gplugins/gvalidation/lang/ru.js');
$doc->addScript('/libraries/cegcore/assets/jquery/jquery.inputmask.js');
$doc->addScript('templates/' . $this->template . '/js/etimer.js');

//$doc->addScript('templates/' . $this->template . '/js/application.js');
//$doc->addScript('templates/' . $this->template . '/js/fancybox/jquery.fancybox-1.3.4.pack.js');

// Add Stylesheets
$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/style.css');
//$doc->addStyleSheet('templates/' . $this->template . '/js/fancybox/jquery.fancybox-1.3.4.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>   
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<jdoc:include type="head" />
	<script type="text/javascript">
	  WebFontConfig = {
	    google: { families: [ 'Philosopher:400,400italic,700,700italic:latin,cyrillic' ] }
	  };
	  (function() {
	    var wf = document.createElement('script');
	    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	    wf.type = 'text/javascript';
	    wf.async = 'true';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(wf, s);
  	 })(); </script>
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]--> 
</head>
<noscript><p class="noscript">Ваш браузер не поддерживает javascript! Корректность работы сайта не гарантирована! Пожалуйста, включите javascript в настройках Вашего браузера или установите современный браузер.</p></noscript>     
<body>
<!-- Хедер -->
<div id="top"></div>
	<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid header_t' : ''); ?>">

		<?php if ($this->countModules('header')) : ?>						
				<div class="header">
					<div class="row">
						<!-- логотип -->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 logo_top">
						<a href="<?php echo $this->baseurl; ?>" class="logo_a">
							<?php echo $logo; ?>
							<?php if ($this->params->get('sitedescription')) : ?>
								<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
							<?php endif; ?>
						</a>				
						</div>
						<!-- end логотип -->	
						<jdoc:include type="modules" name="header" style="none" />		                                                    
					</div>
					<jdoc:include type="modules" name="header-after" style="none" />
				</div>
		<?php endif; ?>
	</div>
<!-- end Хедер -->
		<jdoc:include type="modules" name="banner" style="xhtml" />
<!-- Меню -->
	<div class="container-fluid">
	   <?php if ($this->countModules('menu')) : ?>
		<nav class="navbar navbar-default" role="navigation">
			<jdoc:include type="modules" name="menu" style="none" />
		</nav>
	   <?php endif; ?>
	</div>	
<!-- end Меню -->

<!-- Слайдер -->
	<?php if ($this->countModules('slider') && $this->countModules('timer'))  : ?>
	<div class="slider_top">
		<jdoc:include type="modules" name="slider" style="none" />
		<jdoc:include type="modules" name="timer" style="none" />
	</div>
	<?php endif; ?>
<!-- end Слайдер -->

	<?php if ($this->countModules('sidebar')) : ?>

              <!-- Begin Sidebar -->
              <div id="sidebar" class="col-lg-3 col-sm-4">				
                  <jdoc:include type="modules" name="sidebar" style="none" />				
              </div>
              <!-- End Sidebar -->
              <!-- Begin Content -->
		<?php endif; ?>

                <!-- Begin Content -->
                <jdoc:include type="modules" name="content-before" style="none" />
                <jdoc:include type="message" />
                <jdoc:include type="component" />
                <jdoc:include type="modules" name="content-after" style="none" />
                <!-- End Content -->

		<?php if ($this->countModules('sidebar')) : ?>

              <!-- End Content -->
		                                                                              
        <?php endif; ?>
		   

		<?php if ($this->countModules('footer_menu')) : ?>	
			 <div class="container-fluid menu_footer">
					<jdoc:include type="modules" name="footer_menu" style="none" />
			 </div>
		<?php endif; ?>	

		<?php if ($this->countModules('footer')) : ?>			
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?> my_footer">
    				<div class="row">
					<jdoc:include type="modules" name="footer" style="none" />				
				</div>
                        </div>
		<?php endif; ?>	

		<jdoc:include type="modules" name="debug" style="none" />
<noscript><p class="noscript">Ваш браузер не поддерживает javascript! Корректность работы сайта не гарантирована! Пожалуйста, включите javascript в настройках Вашего браузера или установите современный браузер.</p></noscript>                                                 
</body>
</html>
