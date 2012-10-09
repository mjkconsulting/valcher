<?php /* Smarty version 2.6.26, created on 2010-11-05 20:06:01
         compiled from ../views/valcher/getgemzmsgs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html', '../views/valcher/getgemzmsgs.tpl', 8, false),array('modifier', 'escape', '../views/valcher/getgemzmsgs.tpl', 18, false),array('modifier', 'indent', '../views/valcher/getgemzmsgs.tpl', 18, false),)), $this); ?>

<a name="getgemzmsgs"></a>
<h2>Get Gemz Messages</h2>
	<li>Fetches Social Networks/Mail Services Messages</li>
	<li>Access URL: <?php echo $this->_plugins['function']['html'][0][0]->html(array('func' => 'link','title' => ($this->_tpl_vars['server'])."/".($this->_tpl_vars['path'])."/getGemzMessages/1/",'url' => "#"), $this);?>
 [REST]</li>
	<li>e.g: <?php echo $this->_tpl_vars['server']; ?>
/<?php echo $this->_tpl_vars['path']; ?>
/getGemzMessages/1</li>
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Returns</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>GemSetInfo Objects</td><td>Array</td><td>&nbsp;</td></tr>
	</table>
	<table class="plain">
		<tr><th>Response</th></tr>
		<tr><td>
<b>Success (XML)</b>:<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp='<GemSetInfo userid="1" gemsetid="1001" timestamp="1275596052" resroot="gemzapi.mobilepublish.com"><GemInfo subj="Tweet" from="eric welling" date="Sat Apr 18 20:56:43 +0000 2009" body="DWP is back we are going to tour again." type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="yafit" date="Sat Apr 18 06:51:51 +0000 2009" body="" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="Alber Kohan" date="Fri Apr 17 23:29:24 +0000 2009" body="" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="QualitySmith" date="Fri Jan 16 22:08:12 +0000 2009" body="QualitySmith, Inc.announces key management changes: http://tinyurl.com/3yegoth" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="Mark Elias" date="Sun Apr 08 03:31:24 +0000 2007" body="How great is game seven in Boston gonna be??? Flyers are reborn... Again. Is it too much to ask for Carter to return for the eastern finals?" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="Kameshia Duncan" date="Sat Jan 17 02:23:18 +0000 2009" body="@staceynwest Awesome!!" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="purplestream" date="Wed Feb 20 23:28:18 +0000 2008" body="Up at 5am. Headed to LA for a few hours then gonna have a kick ass weekend in paradise aka my new house.  Thank god for the EZ pass" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="tom" date="Tue Apr 14 23:05:41 +0000 2009" body="entertaiment" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="Rubenism" date="Mon Feb 05 03:55:16 +0000 2007" body="Hot! PlayStation 3 120 GB - http://bit.ly/aru1eD" type="message" gemid="" priority="1" /><GemInfo subj="Tweet" from="ezzzer" date="Tue Dec 16 12:57:05 +0000 2008" body="posted my trance track on yutube - http://bit.ly/3a5adt" type="message" gemid="" priority="1" /></GemSetInfo>')) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('indent', true, $_tmp, 10) : smarty_modifier_indent($_tmp, 10)); ?>

<br/>
	</td></tr>
	</table>
	<?php echo '
	<table class="plain" cellpadding="2" border="0" width="450px">
		<tr><th>Param</th><th>Data Type</th><th>Comment</th></tr>
		<tr><td>$user_id</td><td>Int</td><td>Required &nbsp;</td></tr>
	</table>
	'; ?>

<a class="top" href="#top">Top</a>