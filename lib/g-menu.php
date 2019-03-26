<?php global $smof_data; ?>
<?php if($smof_data['gamburger_menu']) { ?>
<style type="text/css">
	.menu-header {flex-direction: row-reverse;}
	.site-header > div {flex-direction: row !important;}
	a.phone-header {margin-left: 0;margin-right: 25px;}
	#primary-menu{padding-top:40px}
	#primary-menu a{text-align:left}
	.main-navigation ul ul{position:static;width: 100%;box-shadow: unset;border-top: none;}
	.main-navigation ul ul li{margin-left:0;}
	.menu-bar{display:block;position:relative;background:#337ab2;width:26px;height:2px;border-radius:1px;transition:all .3s;margin:0 auto}
	.menu-toggle,.menu-toggle:active,.menu-toggle:focus{display:block;position:relative;float:right;width:40px;height:40px;top:0;right:0;padding:0;margin:0 auto;background:0 0;transition:all .5s cubic-bezier(1,0,.645,.65);z-index:99999999;border:0;outline:0;box-shadow:none}
	.site-branding{float:left}
	#primary-menu > li {float: unset;margin: 0;}
	#primary-menu > li > a {padding: 10px 20px;display: block;}
	.main-navigation ul ul a {width: 100%;display: block;padding: 10px 20px;}
	header .main-navigation div li{display:block;text-align:right}
	header .main-navigation div li.current-menu-item,header .main-navigation div li:hover{border:0;color:#fff}
	header .main-navigation div li.current-menu-item a,header .main-navigation div li:hover a{color:#fff}
	header .main-navigation div{position:fixed;right:-300px;width:280px;background:#fff;z-index:150;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s;overflow:hidden;height:100%;top:0;padding-top:20px;box-shadow: -1px 0px 3px rgba(0,0,0,0.2);}
	header .toggled div{right:0}
	.main-navigation li.menu-item-has-children > i {z-index: 10; color: #051E83;cursor: default;display: block !important;font-size: 20px;font-weight: bold;padding: 10px 10px;position: absolute;top: 3px;right: 0;transition: all .3s ease;}
	.main-navigation ul .sub-menu {display: none;max-height: unset;overflow: unset;}
</style>
<?php } else { $show_menu = $smof_data['gamburger_menu_width']; ?>
<style type="text/css">
	@media screen and (max-width:<?php echo $show_menu; ?>px) {
		.menu-header {flex-direction: row-reverse;}
		.site-header > div {flex-direction: row !important;}
		a.phone-header {margin-left: 0;margin-right: 25px;}
		#primary-menu{padding-top:40px}
		#primary-menu a{text-align:left}
		.main-navigation ul ul{position:static;width: 100%;box-shadow: unset;border-top: none;}
		.main-navigation ul ul li{margin-left:0;}
		.menu-bar{display:block;position:relative;background:#337ab2;width:26px;height:2px;border-radius:1px;transition:all .3s;margin:0 auto}
		.menu-toggle,.menu-toggle:active,.menu-toggle:focus{display:block;position:relative;float:right;width:40px;height:40px;top:0;right:0;padding:0;margin:0 auto;background:0 0;transition:all .5s cubic-bezier(1,0,.645,.65);z-index:99999999;border:0;outline:0;box-shadow:none}
		.site-branding{float:left}
		#primary-menu > li {float: unset;margin: 0;}
		#primary-menu > li > a {padding: 10px 20px;display: block;}
		.main-navigation ul ul a {width: 100%;display: block;padding: 10px 20px;}
		header .main-navigation div li{display:block;text-align:right}
		header .main-navigation div li.current-menu-item,header .main-navigation div li:hover{border:0;color:#fff}
		header .main-navigation div li.current-menu-item a,header .main-navigation div li:hover a{color:#fff}
		header .main-navigation div{position:fixed;right:-300px;width:280px;background:#fff;z-index:150;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s;overflow:hidden;height:100%;top:0;padding-top:20px;box-shadow: -1px 0px 3px rgba(0,0,0,0.2);}
		header .toggled div{right:0}
		.main-navigation li.menu-item-has-children > i {z-index: 10; color: #051E83;cursor: default;display: block !important;font-size: 20px;font-weight: bold;padding: 10px 10px;position: absolute;top: 3px;right: 0;transition: all .3s ease;}
		.main-navigation ul .sub-menu {display: none;max-height: unset;overflow: unset;}
	}
</style>
<?php } ?>