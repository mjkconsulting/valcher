{*
	Oren Shepes - 01/10
*}

<a name="registerCard"></a>
<h2>RegisterCreditCard Service</h2>
	<li>Registers a Credit Card</li>
	<li>Access URL: {html func=link title="$server/$path/registerCard/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/registerCard/?user_id=1&card_type=AMEX&card_number=5702232209992322&card_cvv=123&card_exp=02/12&card_name=james&address=30 main st&city=santa monica&state=CA&zipcode=90405</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>

{literal}
{"response":{"registerCard":{"bid":"2"}}}
{/literal}

<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$userid</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_type</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_number</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_cvv</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_exp</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$card_name</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$city</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$state</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$zipcode</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
