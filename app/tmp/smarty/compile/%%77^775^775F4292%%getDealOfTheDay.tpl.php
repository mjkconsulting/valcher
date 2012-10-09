<?php /* Smarty version 2.6.26, created on 2010-12-22 18:58:12
         compiled from ../views/valcher/getDealOfTheDay.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/getDealOfTheDay.tpl', 8, false),)), $this); ?>

<a name="getDealOfTheDay"></a>
<h2>GetDealOfTheDay Service</h2>
	<li>Fetches the daily deal per a given date</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getDealOfTheDay/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getDealOfTheDay/2010-11-25</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th><th>Response</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>The deal object&nbsp;</td><td>
<b>Success (JSON)</b>:<br/>
<?php echo '
 {"response":{"deals":{"d":{"deal_id":"3","deal_category":"1","deal_name":"Ecco Restaurant","deal_start":"2010-11-15 00:00:00","deal_start_time":"12:00:00","deal_end":"2010-12-25 00:00:00","deal_end_time":"12:00:00","deal_price":"40","deal_discount":"50","deal_status":"1","deal_description":"$40 Value Voucher for $20","vendor_id":"1","deal_tipped":"2","deal_details":"Ecco is tucked deep inside one of Costa Mesa\'s bohemian retail centers, The Camp. When you enter, a minimalist d\\u00e9cor awaits, the chic space punctuated by exposed bricks and vintage blow torch lamps. \\n\\nA typical dining experience at ECCO could look something like this:\\n\\nStarters: Meat-and-cheese plate, Prosciutto, salami and bresaola are cut thin and stacked tall, and are joined by three exceptional cheeses \\u2014 a soft Taleggio, a subdued blue and a nicely balanced truffle offering. Fig preserves, whole-grain mustard and pistachios let guests add variety to each bite.\\n\\nA decadent take on bruschetta, melts creamy burrata onto grilled slices of bread, then adds a mountain of fruity tomatoes.\\n\\nSalad: Caesar salad, uses house-made dressing that pops with citrus and anchovy. Croutons are replaced by crostini that\'s spread with a zippy tapenade.\\n\\nPizza: The pizza is wood-fired and made with Caputo flour, and the result is top-notch.\\u2014 chewy yet crackly, it\'s one of Orange County\'s better pies. Choose from a variety of speciality pizza\\u2019s including The Ecco pizza, which mixes crushed San Marzano tomatoes, small bits of squash, red onion and tender squash blossoms with luxurious burrata\\n\\nPasta: A big bowl of delicate ear-shaped pasta with crumbles of sausage, grana padano, Swiss chard and basil. Olive oil combines with juices from the pork and mushrooms to form a savory broth.\\n\\nAll of this is served by youthful staffers who combine casual chit-chat with proper service.","deal_code":"PQZPCAJ6-2","deal_fine_print":"Expires: March 1, 2011\\n\\n
 Limit 2 per person, may buy 2 additional as gift.\\n\\nAdd others if you require:\\n\\n
 Limit 1 per table, 2 for tables of 5 or more.\\n\\n
 Dine in only\\n\\n
 Not valid with other offers or discounts\\n\\n
 No cash back\\n\\n
 Tax and gratuity not included","deal_content":"
 Patio seating\\n
 Rooftop banquet\\/large party area\\n\\n
 Located in the CAMP\\n\\n
 Authentic Italian Cuisine\\n\\n
 Wood Fired Oven Pizza\\u2019s\\n\\n
 Happy Hour Specials","deal_max":"2","deal_priority":"1"},"dt":{"id":"3","deal_id":"3","date_bought":"2010-11-25 00:00:00","user_id":"1","price":"20","trans_id":"6B1D36E6C97C231C7BA9BA8B116C2039","email_sent":"1","card_charged":"0"},"v":{"vendor_id":"1","username":"oren","category_id":"1","name":"ECCO","contact_name":"Ecco Ecco","url":"www.eccocm.com","created":"2010-11-20 00:00:00","email":"oren@mobilegates.com","type":"1","status_id":"1","phone":"818-334-0399","cellular":"818-845-0499","address_id":"2","passwd":"96e79218965eb72c92a549dd5a330112","image_url":""}}}}
'; ?>

	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$date</td><td>Date</td><td>&nbsp;The date to get the daily deal for</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default xml</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>