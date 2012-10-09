{*
	insertUserCredentials
	Oren Shepes - 01/10
*}

<a name="insertusercredentials"></a>
<h2>insertUserCredentials service</h2>
	<li>Inserts user credentials for an externals site</li>
	<li>Access URL: {html func=link title="$server/$path/getUserCredentials/site/username/passwd/url/userid/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/insertUserCredentials/facebook/1/</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Insert ID</td><td>Int</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{literal}
<response><credentials><user_credentials id="2" /></credentials></response>
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$site</td><td>String</td><td>The external site [enum type in: facebook, twitter, gmail, mail, digg, stumbleupon]</td></tr>
		<tr><td>$username</td><td>String</td><td>The username</td></tr>
		<tr><td>$passwd</td><td>String</td><td>The user password</td></tr>
		<tr><td>$url</td><td>String</td><td>The URL</td></tr>
		<tr><td>$user_id</td><td>Int</td><td>The user ID</td></tr>
		<tr><td>$render</td><td>String</td><td>Render option (XML or JSON)</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
