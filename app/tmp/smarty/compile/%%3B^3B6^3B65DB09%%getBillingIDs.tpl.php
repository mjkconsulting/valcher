<?php /* Smarty version 2.6.26, created on 2010-12-17 18:40:15
         compiled from ../views/valcher/getBillingIDs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/getBillingIDs.tpl', 8, false),)), $this); ?>

<a name="GetBillingIDs"></a>
<h2>GetBillingIDs Service</h2>
	<li>Gets the user's Billing IDS for multiple cards</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getBillingIDs/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getBillingIDs/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>

<?php echo '
{"response":{"billing_ids":{"b":{"id":"3","card_type":"AMEX","card_number":"5702232209992322","card_exp":"02\\/12","card_name":"james","card_cvv":"123"},"u":{"fname":"oren","lname":"shepes"}}}}
'; ?>


<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;(The users card billing ID - you can pull this ID from getBillingIDs)</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>