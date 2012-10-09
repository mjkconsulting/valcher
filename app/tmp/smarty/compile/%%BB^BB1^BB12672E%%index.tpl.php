<?php /* Smarty version 2.6.26, created on 2010-06-04 19:52:37
         compiled from /var/www/html/api.mobilegates/app/views/gemz/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '/var/www/html/api.mobilegates/app/views/gemz/index.tpl', 4, false),array('modifier', 'cat', '/var/www/html/api.mobilegates/app/views/gemz/index.tpl', 5, false),)), $this); ?>
<?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'css','path' => 'documents'), $this);?>

<?php $this->assign('server', ((is_array($_tmp="http://")) ? $this->_run_mod_handler('cat', true, $_tmp, $_SERVER['SERVER_NAME']) : smarty_modifier_cat($_tmp, $_SERVER['SERVER_NAME']))); ?>
<?php $this->assign('path', 'gemz'); ?>
<?php $this->assign('wsdl', ((is_array($_tmp=($this->_tpl_vars['server']))) ? $this->_run_mod_handler('cat', true, $_tmp, "/service/wsdl/api") : smarty_modifier_cat($_tmp, "/service/wsdl/api"))); ?>

<div id="content">
<p>Web Services availabe using REST or SOAP. WSDL document can be found here: <a href="<?php echo $this->_tpl_vars['wsdl']; ?>
"><?php echo $this->_tpl_vars['wsdl']; ?>
</a><br/><br/></p>
[&nbsp;<a href="#register">registerUser</a>&nbsp;|
<a href="#radiotime">radioTime</a>&nbsp;|
<a href="#movietickets">movieTickets</a>&nbsp;|
<a href="#login">login</a>&nbsp;|
<a href="#pouches">getPouches</a>&nbsp;|
<a href="#pouchgemz">getPouchGemz</a>&nbsp;|
<a href="#categories">getGemzCategories</a>&nbsp;|
<a href="#content">getGemzContentType</a>&nbsp;|
<a href="#addresstype">getGemzAddressType</a>&nbsp;|
<a href="#registergemz">registerGemz</a>&nbsp;|
<a href="#getgemz">getGemz</a>&nbsp;|
<a href="#getuserdata">getUserData</a>&nbsp;|
<a href="#image">resize</a>&nbsp;|
<a href="#twitter-friends">Twitter - Friends</a>&nbsp;|
<a href="#twitter-feed">Twitter - Feed</a>&nbsp;|
<a href="#twitter-followers">Twitter - Followers</a>&nbsp;|
<a href="#getusercredentials">getUserCredentials</a>&nbsp;|
<a href="#insertusercredentials">insertUserCredentials</a>&nbsp;|
<a href="#getgemzmsgs">getGemzMessages</a>&nbsp;|
<a href="#registerpouch">registerPouch</a>&nbsp;]
<p>&nbsp;</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/register.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/radiotime.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/movietickets.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/login.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/pouches.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/pouchgemz.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/categories.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/content.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/addresstype.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/registergemz.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/registerpouch.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/getgemz.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/getuserdata.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/image.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/twitter/friends.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/twitter/feed.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/twitter/followers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/getusercredentials.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/insertusercredentials.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../views/gemz/getgemzmsgs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>