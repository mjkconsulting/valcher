{*
	MovieTickets
	Oren Shepes - 01/10
*}

<a name="movietickets"></a>
<h2>Movie Tickets service</h2>
	<li>Gateway to MovieTickets API</li>
	<li>Access URL: {html func=link title="$server/$path/movieTickets/[method]/?[query_options]" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/movieTickets/top_movies/?xml=0&amp;render=json</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>MovieTickets Object</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
[{"ID":"76385","Actors":"Jessica Alba, Jessica Biel","Genre":"Drama","Runtime":117,"Rating":"PG-13","Image":"http://iphone.movietickets.com/images/photos/69x100/","Name":"Valentine's Day","Opens":{"Year":"2010","Month":"02","Date":"12"}},{"ID":"63080","Actors":"Logan Lerman, Brandon T. Jackson","Genre":"Drama","Runtime":120,"Rating":"PG","Image":"http://iphone.movietickets.com/images/photos/69x100/","Name":"Percy Jackson & the Olympians: The Lightning Thief","Opens":{"Year":"2010","Month":"02","Date":"12"}}]
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width=svn"450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$method</td><td>String</td><td>Method to invoke in the MovieTickets API <br/><b>Available methods:</b> <br/>top_movies (xml=0, pretty=0, size) <br/>
		search_movies(xml=0, pretty=0, search, size)<br/>movie(id, xml=0, pretty=0, size)<br/>poster(id, movie_id, foldtimes, pretty=0, xml=0)</td></tr>
		<tr><td>$options</td><td>String</td><td>Query string consisting of key/value pairs (e.g xml=1|size=100x100|pretty=0|id=760065) render argument is required</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
