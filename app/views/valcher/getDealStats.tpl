{*
	Oren Shepes - 01/10
*}

<a name="getDealStats"></a>
<h2>GetDealStats Service</h2>
	<li>Fetches Deal Stats</li>
	<li>Access URL: {html func=link title="$server/$path/getDealStats/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getDealStats/3</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
{"response":{"deal_stats":[[{"tipped:bought:req":"1:6:1"}]]}}
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$deal_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
