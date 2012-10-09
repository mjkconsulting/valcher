{*
	Oren Shepes - 01/10
*}

<a name="getUserData"></a>
<h2>GetUserData Service</h2>
	<li>Fetches User Data</li>
	<li>Access URL: {html func=link title="$server/$path/getUserData/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getUserData/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response><user user_id="1" fname="oren" lname="shepes" phone="818-988-9393" email="oren@mobilegates.com" cellular="818-988-9009" address="300 Main St" city="Santa Monica" zipcode="90401" state="ca" country="us" created="2010-02-10 00:00:00" /></response>'|escape|indent:10}
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
