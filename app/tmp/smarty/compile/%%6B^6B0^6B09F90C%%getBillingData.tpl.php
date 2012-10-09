<?php /* Smarty version 2.6.26, created on 2010-11-21 14:47:20
         compiled from ../views/valcher/getBillingData.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/getBillingData.tpl', 9, false),)), $this); ?>

<?php $this->assign('name', 'GetBillingData'); ?>
<a name="<?php echo $this->_tpl_vars['name']; ?>
"></a>
<h2><?php echo $this->_tpl_vars['name']; ?>
 Service</h2>
	<li>Fetches User's Billing Data</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/".($this->_tpl_vars['name'])."/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['name']; ?>
/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
<?php echo '
{"response":{"billing_data":{"card_type":"AMEX","card_number":"5702232209992322","card_exp":"02\\/12","card_name":"james","card_cvv":"123","address":"30 main st","city":"santa monica","state":"CA","country":"US","zipcode":"90405","email":"user@mobilegates.com","fname":null,"lname":null,"passwd":"c5601b8663fbf749a08162175a96b180"}}}
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default JSON</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>