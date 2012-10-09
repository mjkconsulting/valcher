{*
	Oren Shepes - 01/10
*}

<a name="getUserData"></a>
<h2>GetProfileData Service</h2>
	<li>Fetches User Profile Data</li>
	<li>Access URL: {html func=link title="$server/$path/getProfileData/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getProfileData/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response><profile><p user_id="1" gender="male" dob="01/17/1973" /><u zipcode="90401" /></profile></response>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
