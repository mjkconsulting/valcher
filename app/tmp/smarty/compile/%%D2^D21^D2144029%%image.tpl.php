<?php /* Smarty version 2.6.26, created on 2010-02-25 22:54:08
         compiled from ../views/gemz/image.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/image.tpl', 9, false),)), $this); ?>

<a name="image"></a>
<h2>Image resize service</h2>
	<li>Resize an image on the fly</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/image/resize/?src=[src]&w=50&h=50",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/image/resize/?src=http://radiotime-logos.s3.amazonaws.com/s55412q.png&w=50&h=50</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Png image</td><td>file</td><td>resized image in PNG format</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width=svn"450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$src</td><td>String</td><td>The image file source</td></tr>
		<tr><td>$w</td><td>Int</td><td>resized width</td></tr>
		<tr><td>$h</td><td>Int</td><td>resized height</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>