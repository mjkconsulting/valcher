{*
	Oren Shepes - 01/10
*}

<a name="getDeal"></a>
<h2>GetDeal Service</h2>
	<li>Fetches Deal Data</li>
	<li>Access URL: {html func=link title="$server/$path/getDeal/" url="#"} [REST]</li>
	<li>e.g: {$server}/{$path}/getDeal/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>Array</td><td>Mixed</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (JSON)</b>:<br/>
{literal}
{"response":{"deal":{"deal_id":"5","deal_category":"9","deal_name":"Harrah's Rincon","deal_start":"2010-12-03 00:00:00","deal_end":"2010-12-04 00:00:00","deal_price":"300","deal_discount":"68","deal_status":"1","deal_fine_print":"Expires: Mar 30, 2011\r\n
 Limit 1 per person, may buy 1 additional as gift.\r\n
 Not valid on Holidays\r\n
 Not valid with other offers or discounts\r\n
 No cash back\r\n
 Tax and gratuity not included","deal_content":"
 Hotel Amenities for Harrah\u2019s Rincon Casino & Resort: \r\n
Casino, Concierge, City Center, 24 Hour Front Desk, Express Checkout, High speed internet access, Internet Access, Lounge, Meeting\/Banquet Facilities, Pool, Parking, Restaurant, Room Service, Safe Deposit Box, Telephone","deal_description":"$300 (2 Night Stay) Value Voucher For $96","deal_tipped":"1","deal_details":"Enjoy two nights, a $300 value, for the unbelievable price of only $96.\r\n

\r\nHarrah\u2019s Rincon Casino and Resort 21-story tower offers 662 hotel rooms which includes 104 suites. Each room features one king or two queen size beds-a large luxury bath with tub and a separated glass-enclosed shower area. You will enjoy first-class comforts and breath-taking views of Palomar Mountain and the valleys below. We also have 1600 slot machines-46 tables and 8 restaurants for you to choose from. Enjoy Las Vegas Action San Diego Style. City of Valley Center Book online using the form above.","deal_code":"Z665NNQ7-3","vendor_id":"4","category_id":"9","email":"mzamora@mobilegates.com","phone":"(760) 751-3100","cellular":"(877) 777-2457","name":"Harrah Casino","image_url":null,"address":"777 Harrah's Rincon Way","city":"Valley Center","state":"CA","zipcode":"92082"}}}
{/literal}
<br/>
	</td></tr>
	</table>
	{literal}
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$deal_id</td><td>Int</td><td>Required&nbsp;</td></tr>
		<tr><td>$view</td><td>String</td><td>Response content type&nbsp; (optional) [xml | json] default json</td></tr>
	</table>
	{/literal}
<a class="top" href="#top">Top</a>
