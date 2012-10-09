{*
	categories
	Oren Shepes - 01/10
*}

<a name="categories"></a>
<h2>Categories service</h2>
	<li>Fetches categories under the parent category ID (root categories = 0)</li>
	<li>Access URL: {html func=link title="$server/$path/getGemzCategories/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getGemzCategories/0 (gets all root categories)</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Category Objects</td><td>Array</td><td>Categories under the parent ID (default 0)</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response>
<categories>
<category gc_category_id="1" gc_category_name="location" gc_category_parent="0" gc_status_id="1"/>
<category gc_category_id="2" gc_category_name="social" gc_category_parent="0" gc_status_id="1"/>
<category gc_category_id="3" gc_category_name="games" gc_category_parent="0" gc_status_id="1"/>
</categories>
</response>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$parent_id</td><td>Int</td><td>Optional&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
