<?php /* Smarty version 2.6.26, created on 2010-11-05 20:06:01
         compiled from ../views/valcher/getusercredentials.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/getusercredentials.tpl', 9, false),)), $this); ?>

<a name="getusercredentials"></a>
<h2>GetUserCredentials service</h2>
	<li>Gets user credentials for an externals site</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getUserCredentials/site/userid/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getUserCredentials/facebook/1/</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>UserCredentials Object</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo '
<response><credentials><user_credentials id="2" site="facebook" username="oshepes@gmail.com" passwd="5d87bd353f9fdd17fa702eb648a94e8e" status_id="1" url="http://login.facebook.com" /></credentials></response>
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$site</td><td>String</td><td>The external site</td></tr>
		<tr><td>$user_id</td><td>Int</td><td>The user ID</td></tr>
		<tr><td>$render</td><td>String</td><td>Render option (XML or JSON)</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>