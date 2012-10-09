{*
	RadioTime
	Oren Shepes - 01/10
*}

<a name="radiotime"></a>
<h2>RadioTime service</h2>
	<li>Gateway to RadioTime API</li>
	<li>Access URL: {html func=link title="$server/$path/radioTime/[method]/?[query_options]" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/radioTime/browse/?c=local&render=xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>RadioTime Object</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<opml version="1">
<head>
<title>RadioTime Music</title>
<status>200</status>
</head>
<body>
<outline type="link" text="Academy of Country Music Awards 2010 Nominees" URL="http://opml.radiotime.com/Browse.ashx?id=c885190&partnerId=Z9s2J4DX&serial=fe5p9qQpDoSf" guide_id="c885190"/>
<outline type="link" text="Adult Contemp" URL="http://opml.radiotime.com/Browse.ashx?id=c57935&partnerId=Z9s2J4DX&serial=fe5p9qQpDoSf" guide_id="c57935"/>
<outline type="link" text="Alt. Rock" URL="http://opml.radiotime.com/Browse.ashx?id=c57936&partnerId=Z9s2J4DX&serial=fe5p9qQpDoSf" guide_id="c57936"/>
</body></opml>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$method</td><td>String</td><td>Method to invoke in the RadioTime API</td></tr>
		<tr><td>$options</td><td>String</td><td>Query string consisting of key/value pairs (e.g c=local&render=json)</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
