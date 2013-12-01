<?php
require_once('cmdconfig.php');

if(empty($_COOKIE['w_username']) || empty($_COOKIE['w_userpass']))
    {         printMsg('sheyi:unknown error'); //请选择用户名和密码
    exit();}


//$db->row_delete("online","userid={$_SESSION['userid']} or ip='".getIP()."'");
$t= -86400 * 365 * 2;
$_SESSION['userid'] = '';
$_SESSION['groupid'] = '';
$_SESSION['isadmin'] = '';
session_destroy();
setCookies('username', '', $t);
setCookies('joanid', '', $t);//SSSSSSSSSSSSSSSSSSSSSheyi add
setCookies('sheyiid', '', $t);//SSSSSSSSSSSSSSSSSSSSSheyi add
setCookies('userpass', '', $t);
setCookies('expire', '', $t);
//printMsg('logout_succeed');//SSSSSSSSSSSSSSSSSSSSSheyi add
//echo '成功安全退出！';

//_header_("location:sylogin.s");
include './logout.html';
 exit();?>

