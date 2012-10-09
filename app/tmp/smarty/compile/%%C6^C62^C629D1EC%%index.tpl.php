<?php /* Smarty version 2.6.26, created on 2010-12-22 19:05:10
         compiled from /var/www/html/api.valcher/app/views/valcher/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '/var/www/html/api.valcher/app/views/valcher/index.tpl', 4, false),array('modifier', 'cat', '/var/www/html/api.valcher/app/views/valcher/index.tpl', 5, false),)), $this); ?>
<?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'css','path' => 'documents'), $this);?>

<?php $this->assign('server', ((is_array($_tmp="http://")) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['SERVER_NAME']) : smarty_modifier_cat($_tmp, $_SERVER['SERVER_NAME']))); ?>
<?php $this->assign('path', 'valcher'); ?>
<?php $this->assign('wsdl', ((is_array($_tmp=($this->_tpl_vars['server']))) ? $this->_run_mod_handler('cat', true, $_tmp, "/service/wsdl/api") : smarty_modifier_cat($_tmp, "/service/wsdl/api"))); ?>

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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/registerUser.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/register.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/login.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/subscribe.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getUserData.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getDeal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getDealStats.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getFeatureDeal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getExpiredDeals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getAvailableDeals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getDeals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getAllDeals.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getDealByDate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getDealOfTheDay.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getVendorData.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/registerCard.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/updateCard.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getBillingData.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getBillingIDs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/purchase.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/trackDealShare.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/encrypt.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/decrypt.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/valcher/getUserProfile.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>