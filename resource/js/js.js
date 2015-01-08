/*!
 * jQuery JavaScript Library v2.1.1
 * http://jquery.com/
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 *
 * Copyright 2005, 2014 jQuery Foundation, Inc. and other contributors
 * Released under the MIT license
 * http://jquery.org/license
 *
 * Date: 2014-05-01T17:11Z
 */
// 设置为主页 
function SetHome(obj,vrl){ 
	try{ 
		obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl); 
	} 
	catch(e){ 
		if(window.netscape) { 
			try { 
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
			} 
			catch (e) { 
			alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。"); 
		} 
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch); 
		prefs.setCharPref('browser.startup.homepage',vrl); 
		}else{ 
			alert("您的浏览器不支持，请按照下面步骤操作：\n1.打开浏览器设置。\n2.点击设置网页。\n3.输入："+vrl+"点击确定。"); 
		} 
	} 
} 
// 加入收藏 兼容360和IE6 
function shoucang(sTitle,sURL) 
{ 
	try 
	{ 
		window.external.addFavorite(sURL, sTitle); 
	} 
	catch (e) 
	{ 
		try 
		{ 
			window.sidebar.addPanel(sTitle, sURL, ""); 
		} 
		catch (e) 
		{ 
			alert("加入收藏失败，请使用Ctrl+D进行添加"); 
		} 
	} 
}


function addfavorite() 
{ 

try 
	{ 
		window.external.addFavorite('http://localhost/main.php','海娜搜藏'); 
	} 
	catch (e) 
	{ 
		try 
		{ 
			window.sidebar.addPanel('海娜搜藏', 'http://localhost/main.php', ""); 
		} 
		catch (e) 
		{ 
			alert("加入收藏失败，请使用Ctrl+D进行添加"); 
		} 
	} 
 
}  