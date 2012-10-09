{*
	pouches
	Oren Shepes - 01/10
*}

<a name="pouches"></a>
<h2>User pouches service</h2>
	<li>Fetches user pouches</li>
	<li>Access URL: {html func=link title="$server/$path/getPouches/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getPouches/1/1/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Pouch Set</td><td>Array</td><td>The user pouch sets</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response>
<pouches>
<pouch p_pouch_id="1" p_name="Social pouch" p_status_id="1" p_created="2010-01-02 00:00:00" p_updated="2010-02-01 00:00:00" p_priority="1" p_parent_id="0"/>
<pouch p_pouch_id="2" p_name="Location" p_status_id="1" p_created="2010-01-02 00:00:00" p_updated="2010-01-02 00:00:00" p_priority="4" p_parent_id="0"/>
<pouch p_pouch_id="3" p_name="Family" p_status_id="1" p_created="2010-01-02 00:00:00" p_updated="2010-01-02 00:00:00" p_priority="2" p_parent_id="0"/>
</pouches>
</response>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$status</td><td>Int</td><td>[1=active | -1=all]&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
