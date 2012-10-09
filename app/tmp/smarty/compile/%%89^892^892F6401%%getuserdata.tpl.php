<?php /* Smarty version 2.6.26, created on 2010-02-21 14:06:58
         compiled from ../views/gemz/getuserdata.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/getuserdata.tpl', 9, false),)), $this); ?>

<a name="getuserdata"></a>
<h2>GetUserData service</h2>
	<li>Gets user data given a userID</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getUserData/".($this->_tpl_vars['userid'])."/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getUserData/1/json</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>UserInfo Object</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
<?php echo '
{"response":{"user":{"info":{"user_id":"1","username":"oren","fname":"oren","lname":"shep","address":"33 main st","city":"Santa Monica","zipcode":"90401","state":"CA","country":"US","created":"2010-01-01 00:00:00"}}}}
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width=svn"450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>The user ID</td></tr>
		<tr><td>$render</td><td>String</td><td>Render option (XML or JSON)</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>