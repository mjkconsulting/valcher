{*
	twitter followers
	Oren Shepes - 05/10
*}

<a name="twitter-followers"></a>
<h2>Twitter Followers Service</h2>
	<li>Fetches a users Twitter followers</li>
	<li>Access URL: {html func=link title="$server/twitter/followers/" url="#"} [REST]</li>
	<li>e.g: {$server}/twitter/followers/orensh/oren123/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Users</td><td>Array</td><td>The user followers</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<users type="array"><user id="103996731" name="FriedaTodd" screen_name="FriedaTodd422" profile_image_url="http://s.twimg.com/a/1273086425/images/default_profile_6_normal.png" protected="false" followers_count="15" profile_background_color="9ae4e8" profile_text_color="000000" profile_link_color="0000ff" profile_sidebar_fill_color="e0ff92" profile_sidebar_border_color="87bc44" friends_count="814" created_at="Mon Jan 11 23:06:04 +0000 2010" favourites_count="0" profile_background_image_url="http://s.twimg.com/a/1273086425/images/themes/theme1/bg.png" profile_background_tile="false" notifications="false" geo_enabled="false" verified="false" following="false" statuses_count="1" lang="en" contributors_enabled="false" _name_="0"><location /><description /><url /><utc_offset /><time_zone /><status created_at="Tue Jan 12 00:03:37 +0000 2010" id="7648557605" text="why are you people so afraid of your sexuality that you make your poor women wear shit on their faces? http://ow.ly/V1FE" source="web" truncated="false" favorited="false"><in_reply_to_status_id /><in_reply_to_user_id /><in_reply_to_screen_name /><geo /><coordinates /><place /><contributors /></status></user></users>'|escape|indent:10}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$passwd</td><td>String</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
