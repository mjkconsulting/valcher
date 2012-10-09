{*
	login
	Oren Shepes - 01/10
*}

<a name="login"></a>
<h2>Login service</h2>
	<li>Checks User credentials in the system and authenticates</li>
	<li>Access URL: {html func=link title="$server/$path/login/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/login/user@mobilegates.com/passwd1234/</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th><th>Response</th></tr>
		<tr><td>user_id</td><td>Int</td><td>The user ID&nbsp;</td><td>
<b>Success (XML)</b>:<br/>
{'<response><login>1</login></response>'|escape|indent:10}
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$email</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>8 - 12 chars long - alpha-numeric&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
