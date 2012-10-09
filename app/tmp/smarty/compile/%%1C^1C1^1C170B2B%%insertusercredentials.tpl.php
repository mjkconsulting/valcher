<?php /* Smarty version 2.6.26, created on 2010-05-25 21:49:04
         compiled from ../views/gemz/insertusercredentials.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/insertusercredentials.tpl', 9, false),)), $this); ?>

<a name="insertusercredentials"></a>
<h2>insertUserCredentials service</h2>
	<li>Inserts user credentials for an externals site</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getUserCredentials/site/username/passwd/url/userid/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/insertUserCredentials/facebook/1/</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Insert ID</td><td>Int</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo '
<response><credentials><user_credentials id="2" /></credentials></response>
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$site</td><td>String</td><td>The external site [enum type in: facebook, twitter, gmail, mail, digg, stumbleupon]</td></tr>
		<tr><td>$username</td><td>String</td><td>The username</td></tr>
		<tr><td>$passwd</td><td>String</td><td>The user password</td></tr>
		<tr><td>$url</td><td>String</td><td>The URL</td></tr>
		<tr><td>$user_id</td><td>Int</td><td>The user ID</td></tr>
		<tr><td>$render</td><td>String</td><td>Render option (XML or JSON)</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>