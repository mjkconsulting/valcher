{*
	Oren Shepes - 01/10
*}

<a name="register"></a>
<h2>RegisterUser service</h2>
	<li>Registers a User</li>
	<li>Access URL: {html func=link title="$server/$path/registerUser/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/registerUser/?user_id=1&fname=john&lname=smith&phone=818-988-0933...&view=xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user ID</td><td>Int</td><td>The user ID registerd</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<response>
<register user_id="5"/>
</response>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$fname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$lname</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$email</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$phone</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$address_type</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$city</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$state</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$country</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$cell</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$zipcode</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$user_type</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$device_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$lng</td><td>Float</td><td>Required&nbsp;</td></tr>
		<tr><td>$lat</td><td>Float</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
