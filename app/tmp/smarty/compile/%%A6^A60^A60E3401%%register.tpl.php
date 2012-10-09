<?php /* Smarty version 2.6.26, created on 2010-02-08 23:51:56
         compiled from ../views/gemz/register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/gemz/register.tpl', 9, false),)), $this); ?>

<a name="register"></a>
	<h2>User registration service</h2>
	<li>Registers a user in the system and sets the pouch and gemz sets for the user</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/registerUser/",'url' => "#"), $this);?>
 [REST|POST]</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user_id</td><td>Int</td><td>The newly created user ID&nbsp;</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th><th>Response</th></tr>
		<tr><td>$username</td><td>String</td><td>&nbsp;</td><td rowspan="20">
		<b>Success (XML)</b> e.g:<br>
		&lt;response&gt;<br/>
		&nbsp;&nbsp;&lt;register user_id="610"/&gt;<br/>
		&lt;/response&gt;
		<br/><br/>
		<b>Error (XML)</b> e.g:<br/>
		&lt;response&gt;<br/>
		&nbsp;&nbsp;&lt;errors&gt;<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&lt;error email="email validation failed" /&gt;<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&lt;error phone="phone validation failed" /&gt;<br/>
		&nbsp;&nbsp;&lt;/errors&gt;<br/>
		&lt;/response&gt;<br/><br/>
		<b>Success (JSON)</b>:<br/>
		{"response":{"register":[{"user_id":5}]}}
		
		</tr>
		<tr><td>$fname</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$lname</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$email</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$phone</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$cell</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$address</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$address_type</td><td>String</td><td>[1=residential | 2=commercial | 3=shipping | 4=billing | 5=work]</td></tr>
		<tr><td>$city</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$state</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$country</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$zipcode</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$user_type</td><td>Int</td><td>&nbsp;</td></tr>
		<tr><td>$device_id</td><td>Int</td><td>&nbsp;</td></tr>
		<tr><td>$lng</td><td>Float</td><td>&nbsp;</td></tr>
		<tr><td>$lat</td><td>Float</td><td>&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type (optional)&nbsp;[xml | json] (default xml)</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>