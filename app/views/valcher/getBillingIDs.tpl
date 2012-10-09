{*
	Oren Shepes - 01/10
*}

<a name="GetBillingIDs"></a>
<h2>GetBillingIDs Service</h2>
	<li>Gets the user's Billing IDS for multiple cards</li>
	<li>Access URL: {html func=link title="$server/$path/getBillingIDs/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getBillingIDs/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>

{literal}
{"response":{"billing_ids":{"b":{"id":"3","card_type":"AMEX","card_number":"5702232209992322","card_exp":"02\/12","card_name":"james","card_cvv":"123"},"u":{"fname":"oren","lname":"shepes"}}}}
{/literal}

<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;(The users card billing ID - you can pull this ID from getBillingIDs)</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
