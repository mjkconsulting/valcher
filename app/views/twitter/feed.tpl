{*
	twitter feed
	Oren Shepes - 05/10
*}

<a name="twitter-feed"></a>
<h2>Twitter Feed Service</h2>
	<li>Fetches a users Twitter feed</li>
	<li>Access URL: {html func=link title="$server/twitter/feed/" url="#"} [REST]</li>
	<li>e.g: {$server}/twitter/feed/orensh/oren123/xml</li>
	<li>To Fetch all: {$server}/twitter/all/orensh/oren123/xml</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Users</td><td>Array</td><td>The status feed for that user</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
{'<statuses type="array"><status created_at="Thu Apr 22 00:34:25 +0000 2010" id="12607931618" text="Been eating Italian food in New Jersey for the last 8 days.  NEED SUSHI" source="&lt;a href=&quot;http://twitterrific.com&quot; rel=&quot;nofollow&quot;&gt;Twitterrific&lt;/a&gt;" truncated="false" favorited="false" _name_="0"><in_reply_to_status_id /><in_reply_to_user_id /><in_reply_to_screen_name /><user id="13745902" name="purplestream" screen_name="purplestream" profile_image_url="http://a1.twimg.com/profile_images/50233062/me_normal.jpg" url="http://theshanaphyfamily.blogspot.com/" protected="false" followers_count="42" profile_background_color="9ae4e8" profile_text_color="000000" profile_link_color="0000ff" profile_sidebar_fill_color="e0ff92" profile_sidebar_border_color="87bc44" friends_count="61" created_at="Wed Feb 20 23:28:18 +0000 2008" favourites_count="8" utc_offset="-32400" time_zone="Alaska" profile_background_image_url="http://s.twimg.com/a/1272044617/images/themes/theme1/bg.png" profile_background_tile="false" notifications="false" geo_enabled="false" verified="false" following="true" statuses_count="455" lang="en" contributors_enabled="false"><location /><description /></user><geo /><coordinates /><place /><contributors /></status><status created_at="Mon Apr 12 06:53:23 +0000 2010" id="12033689151" text="Absolutely in love with our new place...still can&#039;t believe it&#039;s mine. Wow.  I am truly blessed" source="&lt;a href=&quot;http://twitterrific.com&quot; rel=&quot;nofollow&quot;&gt;Twitterrific&lt;/a&gt;" truncated="false" favorited="false" _name_="0"><in_reply_to_status_id /><in_reply_to_user_id /><in_reply_to_screen_name /><user id="13745902" name="purplestream" screen_name="purplestream" profile_image_url="http://a1.twimg.com/profile_images/50233062/me_normal.jpg" url="http://theshanaphyfamily.blogspot.com/" protected="false" followers_count="42" profile_background_color="9ae4e8" profile_text_color="000000" profile_link_color="0000ff" profile_sidebar_fill_color="e0ff92" profile_sidebar_border_color="87bc44" friends_count="61" created_at="Wed Feb 20 23:28:18 +0000 2008" favourites_count="8" utc_offset="-32400" time_zone="Alaska" profile_background_image_url="http://s.twimg.com/a/1272044617/images/themes/theme1/bg.png" profile_background_tile="false" notifications="false" geo_enabled="false" verified="false" following="true" statuses_count="455" lang="en" contributors_enabled="false"><location /><description /></user><geo /><coordinates /><place /><contributors /></status><status created_at="Sat Apr 10 01:04:15 +0000 2010" id="11911425163" text="HATE LA traffic. How did I do for so long?? Country livin Im coming!!!" source="&lt;a href=&quot;http://twitterrific.com&quot; rel=&quot;nofollow&quot;&gt;Twitterrific&lt;/a&gt;" truncated="false" favorited="false" _name_="0"><in_reply_to_status_id /><in_reply_to_user_id /><in_reply_to_screen_name /><user id="13745902" name="purplestream" screen_name="purplestream" profile_image_url="http://a1.twimg.com/profile_images/50233062/me_normal.jpg" url="http://theshanaphyfamily.blogspot.com/" protected="false" followers_count="42" profile_background_color="9ae4e8" profile_text_color="000000" profile_link_color="0000ff" profile_sidebar_fill_color="e0ff92" profile_sidebar_border_color="87bc44" friends_count="61" created_at="Wed Feb 20 23:28:18 +0000 2008" favourites_count="8" utc_offset="-32400" time_zone="Alaska" profile_background_image_url="http://s.twimg.com/a/1272044617/images/themes/theme1/bg.png" profile_background_tile="false" notifications="false" geo_enabled="false" verified="false" following="true" statuses_count="455" lang="en" contributors_enabled="false"><location /><description /></user><geo /><coordinates /><place /><contributors /></status></statuses>'|escape|indent:10}
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
