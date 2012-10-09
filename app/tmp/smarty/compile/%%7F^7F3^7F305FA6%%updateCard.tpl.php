<?php /* Smarty version 2.6.26, created on 2010-12-14 18:25:30
         compiled from ../views/valcher/updateCard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/updateCard.tpl', 8, false),)), $this); ?>

<a name="updateCard"></a>
<h2>UpdateCreditCard Service</h2>
	<li>Updates a Credit Card</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/updateCard/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/updateCard/?bid=1&card_type=AMEX&card_number=5702232209992322&card_cvv=123&card_exp=02/12&card_name=james&address=30 main st&city=santa monica&state=CA&zipcode=90405</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>

<?php echo '
{"response":{"updateCard":{"bid":"2"}}}
'; ?>


<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$bid</td><td>Int</td><td>Required&nbsp;(The users card billing ID - you can pull this ID from getBillingIDs)</td></tr>
		<tr><td>$card_type</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_number</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_cvv</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_exp</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_name</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$city</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$state</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$zipcode</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>