<?php /* Smarty version 2.6.26, created on 2010-11-05 22:12:30
         compiled from /var/www/html/api.valcher/app/views/layouts/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '/var/www/html/api.valcher/app/views/layouts/default.tpl', 1, false),)), $this); ?>
<?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'css','path' => 'documents'), $this);?>

<a name="top"></a>
<h2>MobileGates Valcher API</h2>
<?php echo $this->_tpl_vars['content_for_layout']; ?>