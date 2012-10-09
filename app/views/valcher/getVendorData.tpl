{*
	Oren Shepes - 01/10
*}

<a name="getVendorData"></a>
<h2>GetVendorData Service</h2>
	<li>Fetches Vendor Data</li>
	<li>Access URL: {html func=link title="$server/$path/getVendorData/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getVendorData/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>

{literal}
{"response":{"vendor":{"vendor_id":"1","username":"oren","name":"Sushi YaGoGo","contact_name":"oren","url":"mobilegates.com","created":"2010-01-20 00:00:00","email":"oren@mobilegates.com","passwd":"c5601b8663fbf749a08162175a96b180","type":"1","status_id":"1","phone":"888-988-1000","cellular":"888-987-2000","address":"300 Main St","city":"Santa Monica","state":"ca","zipcode":"90401","country":"us"}}}
{/literal}

<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$vendor_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
