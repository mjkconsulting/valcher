{*
	Image resize
	Oren Shepes - 01/10
*}

<a name="image"></a>
<h2>Image resize service</h2>
	<li>Resize an image on the fly</li>
	<li>Access URL: {html func=link title="$server/$path/image/resize/?src=[src]&w=50&h=50" url="#"} [REST]</li>
	<li>e.g: {$server}/image/resize/?src=http://radiotime-logos.s3.amazonaws.com/s55412q.png&w=50&h=50</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Png image</td><td>file</td><td>resized image in PNG format</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width=svn"450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$src</td><td>String</td><td>The image file source</td></tr>
		<tr><td>$w</td><td>Int</td><td>resized width</td></tr>
		<tr><td>$h</td><td>Int</td><td>resized height</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
