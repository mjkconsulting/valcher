{*
	Oren Shepes - 01/10
*}

<a name="getExpiredDeals"></a>
<h2>GetExpiredDeals service</h2>
	<li>Gets Expired deals for a user</li>
	<li>Access URL: {html func=link title="$server/$path/getExpiredDeals/userid/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getExpiredDeals/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Deals Array</td><td>Array</td><td>XML or JSON</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
{"response":{"deals":{"d":{"deal_id":"5","deal_category":"9","deal_name":"Harrah's Rincon","deal_start":"2010-12-03 00:00:00","deal_start_time":"12:00:00","deal_end":"2010-12-04 00:00:00","deal_end_time":"12:00:00","deal_price":"300","deal_discount":"68","deal_status":"1","deal_description":"$300 (2 Night Stay) Value Voucher For $96","vendor_id":"4","deal_tipped":"1","deal_details":"Enjoy two nights, a $300 value, for the unbelievable price of only $96.\r\n

 \r\nHarrah\u2019s Rincon Casino and Resort 21-story tower offers 662 hotel rooms which includes 104 suites. Each room features one king or two queen size beds-a large luxury bath with tub and a separated glass-enclosed shower area. You will enjoy first-class comforts and breath-taking views of Palomar Mountain and the valleys below. We also have 1600 slot machines-46 tables and 8 restaurants for you to choose from. Enjoy Las Vegas Action San Diego Style. City of Valley Center Book online using the form above.","deal_code":"Z665NNQ7-3","deal_fine_print":"Expires: Mar 30, 2011\r\n
 Limit 1 per person, may buy 1 additional as gift.\r\n
 Not valid on Holidays\r\n
 Not valid with other offers or discounts\r\n
 No cash back\r\n
 Tax and gratuity not included","deal_content":"
 Hotel Amenities for Harrah\u2019s Rincon Casino & Resort: \r\n
Casino, Concierge, City Center, 24 Hour Front Desk, Express Checkout, High speed internet access, Internet Access, Lounge, Meeting\/Banquet Facilities, Pool, Parking, Restaurant, Room Service, Safe Deposit Box, Telephone","deal_max":"127","deal_priority":"1"},"dt":{"id":"6","deal_id":"5","date_bought":"2010-12-03 10:57:11","user_id":"3","price":"96","trans_id":"5AE2C4EC7520B404A4104C2F99F896A0","email_sent":"1","card_charged":"1"},"v":{"vendor_id":"4","username":null,"category_id":"9","name":"Harrah Casino","contact_name":"Manuel Zamora","url":"www.harrahsrincon.com","created":"2010-12-02 22:46:39","email":"mzamora@mobilegates.com","type":"1","status_id":"1","phone":"(760) 751-3100","cellular":"(877) 777-2457","address_id":"4","passwd":"96e79218965eb72c92a549dd5a330112","image_url":null}}}}
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>The user ID</td></tr>
		<tr><td>$render</td><td>String</td><td>Render option (XML or JSON)</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
