{*
	Oren Shepes - 01/10
*}

{assign var=name value="GetBillingData"}
<a name="{$name}"></a>
<h2>{$name} Service</h2>
	<li>Fetches User's Billing Data</li>
	<li>Access URL: {html func=link title="$server/$path/$name/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/{$name}/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
{"response":{"billing_data":{"card_type":"AMEX","card_number":"5702232209992322","card_exp":"02\/12","card_name":"james","card_cvv":"123","address":"30 main st","city":"santa monica","state":"CA","country":"US","zipcode":"90405","email":"user@mobilegates.com","fname":null,"lname":null,"passwd":"c5601b8663fbf749a08162175a96b180"}}}
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default JSON</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
