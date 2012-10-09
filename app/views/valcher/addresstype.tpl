{*
	address type
	Oren Shepes - 01/10
*}

<a name="addresstype"></a>
<h2>Address Type service</h2>
	<li>Displays the available address types</li>
	<li>Access URL: {html func=link title="$server/$path/getGemzAddressType/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getGemzAddressType</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Address Type Objects</td><td>Array</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response>
<addresses>
<address at_address_type_id="1" at_address_type="residential"/>
<address at_address_type_id="2" at_address_type="commercial"/>
<address at_address_type_id="3" at_address_type="shipping"/>
<address at_address_type_id="4" at_address_type="billing"/>
<address at_address_type_id="5" at_address_type="work"/>
</addresses>
</response>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
