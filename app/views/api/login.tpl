{*
	login
	Oren Shepes - 01/10
*}
{html func=css path="documents"}
{assign var=server value="http://"|cat:$smarty.server.SERVER_NAME}

<div id="content">
	<h2>Login service</h2>
	<li>Checks User credentials in the system and authenticates</li>
	<li>Access URL: {html func=link title="$server/api/login/" url=$server|cat:"/api/login/"}</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>user_id</td><td>Int</td><td>The created user ID&nbsp;</td></tr>
	</table>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>username</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>fname</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>lname</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>email</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>phone</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>cell</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>address</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>address_type</td><td>String</td><td>[1=residential | 2=commercial | 3=shipping | 4=billing | 5=work]</td></tr>
		<tr><td>city</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>state</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>country</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>zipcode</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>password</td><td>String</td><td>&nbsp;</td></tr>
		<tr><td>user_type</td><td>Int</td><td>&nbsp;</td></tr>
		<tr><td>device_id</td><td>Int</td><td>&nbsp;</td></tr>
		<tr><td>longtitude</td><td>Float</td><td>&nbsp;</td></tr>
		<tr><td>latitude</td><td>Float</td><td>&nbsp;</td></tr>
		<tr><td>gemz</td><td>String</td><td>delimited pairs of gemz ids, priorities [23,2 | 400,1 | 945,4]</td></tr>
		<tr><td>delimiter</td><td>Char</td><td>used in previous arg&nbsp;(example: "|")</td></tr>
	</table>
</div>