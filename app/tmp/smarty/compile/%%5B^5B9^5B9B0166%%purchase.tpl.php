<?php /* Smarty version 2.6.26, created on 2010-12-17 18:40:15
         compiled from ../views/valcher/purchase.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/purchase.tpl', 8, false),)), $this); ?>

<a name="purchase"></a>
<h2>Purchase Service</h2>
	<li>Purchase a deal</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/purchase/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/purchase/?deal_id=3&price=20&email=oshepes@gmail.com&card_type=visa&card_number=4111111111111111&card_cvv=123&card_exp=02/12&card_name=james&address=30%20main%20st&city=santa%20monica&state=CA&zip=90405</li>
	
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>status ID</td><td>Int</td><td>The transaction status [1=success | 2=declined | 3=error]</td></tr>
		<tr><td>Array</td><td>Array</td><td>Errors that were encountred</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Declined e.g</b>:<br/>
<?php echo '
{"response":{"status":"1","response_text":["This transaction has been approved."],"errors":[]}}
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$deal_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$user_id</td><td>Int</td><td><b>Optional (If provided the rest of the args are optional as well - set to NULL)</b>&nbsp;</td></tr>
		<tr><td>$price</td><td>Float</td><td>Required&nbsp;</td></tr>
		<tr><td>$email</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$phone</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_type</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_name</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_number</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_exp</td><td>String</td><td>Required&nbsp;[mm/yy]</td></tr>
		<tr><td>$card_cvv</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$zip</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$cell</td><td>String</td><td>Optional&nbsp;</td></tr>
		<tr><td>$state</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$city</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>