<?php /* Smarty version 2.6.26, created on 2010-12-16 09:59:10
         compiled from ../views/valcher/register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/register.tpl', 9, false),)), $this); ?>

<?php $this->assign('name', 'register'); ?>
<a name="<?php echo $this->_tpl_vars['name']; ?>
"></a>
<h2><?php echo $this->_tpl_vars['name']; ?>
 Service</h2>
	<li>Registers a user (short form)</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/".($this->_tpl_vars['name'])."/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['name']; ?>
/?fname=john&lname=smith&email=johns@gmail.com&passwd=abc98834Jy0934!xYaBC8734</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user ID</td><td>Int</td><td>The user ID registerd</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
<?php echo '

'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$fname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$lname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$email</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>