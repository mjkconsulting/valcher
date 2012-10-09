<?php /* Smarty version 2.6.26, created on 2010-11-21 12:48:08
         compiled from ../views/valcher/getVendorData.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/getVendorData.tpl', 8, false),)), $this); ?>

<a name="getVendorData"></a>
<h2>GetVendorData Service</h2>
	<li>Fetches Vendor Data</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getVendorData/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getVendorData/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>

<?php echo '
{"response":{"vendor":{"vendor_id":"1","username":"oren","name":"Sushi YaGoGo","contact_name":"oren","url":"mobilegates.com","created":"2010-01-20 00:00:00","email":"oren@mobilegates.com","passwd":"c5601b8663fbf749a08162175a96b180","type":"1","status_id":"1","phone":"888-988-1000","cellular":"888-987-2000","address":"300 Main St","city":"Santa Monica","state":"ca","zipcode":"90401","country":"us"}}}
'; ?>


<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$vendor_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>