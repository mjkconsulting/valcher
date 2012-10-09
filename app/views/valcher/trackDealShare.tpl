{*
	Oren Shepes - 01/10
*}

{assign var=name value="TrackDealShare"}
<a name="{$name}"></a>
<h2>{$name} Service</h2>
	<li>Tracks a Deal Share</li>
	<li>Access URL: {html func=link title="$server/$path/$name/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/{$name}/?ref_url=http://www.google.com/adwords&user_id=2&key=51aBc123YzUnmE60aBc123YzUnmE59&credit=10</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>ID</td><td>Int</td><td>Last Insert ID</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
{"response":[{"id":"3"}]}
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$ref_url</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$credit</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$key</td><td>String</td><td>Required&nbsp;- Contains an encrypted token in the following format: user_id: deal_id</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>