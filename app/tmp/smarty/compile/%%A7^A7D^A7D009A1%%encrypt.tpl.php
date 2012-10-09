<?php /* Smarty version 2.6.26, created on 2010-12-22 18:58:12
         compiled from ../views/valcher/encrypt.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/encrypt.tpl', 9, false),)), $this); ?>

<?php $this->assign('name', 'secret'); ?>
<a name="<?php echo $this->_tpl_vars['name']; ?>
"></a>
<h2><?php echo $this->_tpl_vars['name']; ?>
 Service</h2>
	<li>Encrypts a string (simple)</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/".($this->_tpl_vars['name'])."/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['name']; ?>
/?string=1:9</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>String</td><td>String</td><td>The encrypted string</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
<?php echo '
{"response":51aBc123YzUnmE60aBc123YzUnmE59}
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$string</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>