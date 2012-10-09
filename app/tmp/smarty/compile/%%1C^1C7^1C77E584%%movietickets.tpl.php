<?php /* Smarty version 2.6.26, created on 2010-11-05 20:06:01
         compiled from ../views/valcher/movietickets.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/movietickets.tpl', 9, false),)), $this); ?>

<a name="movietickets"></a>
<h2>Movie Tickets service</h2>
	<li>Gateway to MovieTickets API</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/movieTickets/[method]/?[query_options]",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/movieTickets/top_movies/?xml=0&amp;render=json</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>MovieTickets Object</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
<?php echo '
[{"ID":"76385","Actors":"Jessica Alba, Jessica Biel","Genre":"Drama","Runtime":117,"Rating":"PG-13","Image":"http://iphone.movietickets.com/images/photos/69x100/","Name":"Valentine\'s Day","Opens":{"Year":"2010","Month":"02","Date":"12"}},{"ID":"63080","Actors":"Logan Lerman, Brandon T. Jackson","Genre":"Drama","Runtime":120,"Rating":"PG","Image":"http://iphone.movietickets.com/images/photos/69x100/","Name":"Percy Jackson & the Olympians: The Lightning Thief","Opens":{"Year":"2010","Month":"02","Date":"12"}}]
'; ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width=svn"450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$method</td><td>String</td><td>Method to invoke in the MovieTickets API <br/><b>Available methods:</b> <br/>top_movies (xml=0, pretty=0, size) <br/>
		search_movies(xml=0, pretty=0, search, size)<br/>movie(id, xml=0, pretty=0, size)<br/>poster(id, movie_id, foldtimes, pretty=0, xml=0)</td></tr>
		<tr><td>$options</td><td>String</td><td>Query string consisting of key/value pairs (e.g xml=1|size=100x100|pretty=0|id=760065) render argument is required</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>