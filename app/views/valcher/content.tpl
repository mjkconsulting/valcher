{*
	content
	Oren Shepes - 01/10
*}

<a name="content"></a>
<h2>Content type service</h2>
	<li>Returns the available content types</li>
	<li>Access URL: {html func=link title="$server/$path/getGemzContentType/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getGemzContentType</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Content type Set</td><td>Array</td><td>Available content types</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response>
<types>
<type ct_content_id="1" ct_type="text" ct_status_id="1"/>
<type ct_content_id="2" ct_type="audio" ct_status_id="1"/>
<type ct_content_id="3" ct_type="video" ct_status_id="1"/>
<type ct_content_id="4" ct_type="image" ct_status_id="1"/>
<type ct_content_id="5" ct_type="binary" ct_status_id="1"/>
<type ct_content_id="6" ct_type="gzip" ct_status_id="1"/>
</types>
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
