{*
	Oren Shepes - 01/10
*}

<a name="subscribe"></a>
<h2>Subscribe service</h2>
	<li>Subscribes a user</li>
	<li>Access URL: {html func=link title="$server/$path/login/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/subscribe/user@mobilegates.com/xml/</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th><th>Response</th></tr>
		<tr><td>email</td><td>String</td><td>The email to subscribe&nbsp;</td><td>
<b>Success (XML)</b>:<br/>
{'<response><subscribe id="0" /></response>'|escape|indent:10}
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$email</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
