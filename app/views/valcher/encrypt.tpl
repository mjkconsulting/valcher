{*
	Oren Shepes - 01/10
*}

{assign var=name value="secret"}
<a name="{$name}"></a>
<h2>{$name} Service</h2>
	<li>Encrypts a string (simple)</li>
	<li>Access URL: {html func=link title="$server/$path/$name/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/{$name}/?string=1:9</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>String</td><td>String</td><td>The encrypted string</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
{"response":51aBc123YzUnmE60aBc123YzUnmE59}
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$string</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>