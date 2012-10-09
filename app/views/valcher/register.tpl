{*
	Oren Shepes - 01/10
*}

{assign var=name value="register"}
<a name="{$name}"></a>
<h2>{$name} Service</h2>
	<li>Registers a user (short form)</li>
	<li>Access URL: {html func=link title="$server/$path/$name/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/{$name}/?fname=john&lname=smith&email=johns@gmail.com&passwd=abc98834Jy0934!xYaBC8734</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user ID</td><td>Int</td><td>The user ID registerd</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}

{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$fname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$lname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$email</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>