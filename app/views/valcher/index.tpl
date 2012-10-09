{*
	Valcher API index
*}
{html func=css path="documents"}
{assign var=server value="http://"|cat:$smarty.server.SERVER_NAME}
{assign var=path value="valcher"}
{assign var=wsdl value="$server"|cat:"/service/wsdl/api"}

<div id="content">
<p>Web Services availabe using REST (currently).<br/><br/></p>
[&nbsp;<a href="#register">registerUser</a>&nbsp;|
<a href="#register">register</a>&nbsp;|
<a href="#login">login</a>&nbsp;|
<a href="#subscribe">subscribe</a>&nbsp;|
<a href="#getUserData">getUserData</a>&nbsp;|
<a href="#getDeal">getDeal</a>&nbsp;|
<a href="#getDealStats">getDealStats</a>&nbsp;|
<a href="#getFeaturedDeal">getFeaturedDeal</a>&nbsp;|
<a href="#getExpiredDeals">getExpiredDeals</a>&nbsp;|
<a href="#getAvailableDeals">getAvailableDeals</a>&nbsp;|
<a href="#getDeals">getDeals</a>&nbsp;|
<a href="#getAllDeals">getAllDeals</a>&nbsp;|
<a href="#getDealByDate">getDealByDate</a>&nbsp;|
<a href="#getDealOfTheDay">getDealOfTheDay</a>&nbsp;|
<a href="#getVendorData">getVendorData</a>&nbsp;|
<a href="#registerCard">registerCard</a>&nbsp;|
<a href="#updateCard">updateCard</a>&nbsp;|
<a href="#GetBillingData">getBillingData</a>&nbsp;|
<a href="#GetBillingIDs">getBillingIDs</a>&nbsp;|
<a href="#purchase">Purchase</a>&nbsp;|
<a href="#trackDealShare">TrackDealShare</a>&nbsp;|
<a href="#secret">Secret</a>&nbsp;|
<a href="#unsecret">UnSecret</a>&nbsp;|
<a href="#getProfileData">getProfileData</a>&nbsp;]
<p>&nbsp;</p>
{include file="../views/valcher/registerUser.tpl"}
{include file="../views/valcher/register.tpl"}
{include file="../views/valcher/login.tpl"}
{include file="../views/valcher/subscribe.tpl"}
{include file="../views/valcher/getUserData.tpl"}
{include file="../views/valcher/getDeal.tpl"}
{include file="../views/valcher/getDealStats.tpl"}
{include file="../views/valcher/getFeatureDeal.tpl"}
{include file="../views/valcher/getExpiredDeals.tpl"}
{include file="../views/valcher/getAvailableDeals.tpl"}
{include file="../views/valcher/getDeals.tpl"}
{include file="../views/valcher/getAllDeals.tpl"}
{include file="../views/valcher/getDealByDate.tpl"}
{include file="../views/valcher/getDealOfTheDay.tpl"}
{include file="../views/valcher/getVendorData.tpl"}
{include file="../views/valcher/registerCard.tpl"}
{include file="../views/valcher/updateCard.tpl"}
{include file="../views/valcher/getBillingData.tpl"}
{include file="../views/valcher/getBillingIDs.tpl"}
{include file="../views/valcher/purchase.tpl"}
{include file="../views/valcher/trackDealShare.tpl"}
{include file="../views/valcher/encrypt.tpl"}
{include file="../views/valcher/decrypt.tpl"}
{include file="../views/valcher/getUserProfile.tpl"}

</div>