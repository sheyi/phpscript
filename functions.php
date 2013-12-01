<?php
!defined('IN_SHEYI') && exit('Forbidden');
//setlocale(LC_ALL, 'zh_CN');

function a_danger($a){
echo '
<div class="alert alert-danger alert-dismissable">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<i class="icon-ban-circle icon-2x text-info"></i>'.$a.'</div>';
}

function a_info($a){
echo '
<div class="alert alert-info alert-dismissable">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<i class="icon-exclamation-sign icon-2x text-info"></i>'.$a.'</div>';
}



function jq() {


if ( $_SERVER['HTTP_HOST'] == 'higrid.net' ){ 
echo '<script src="http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script><script>!window.jQuery && document.write("<script src=/include/js/jquery-1.8.3.min.js><\/script>")</script>';
	}
else{
echo '<script src="/include/js/jquery-1.8.3.min.js"></script>';
}


//echo '<script src="http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script><script>!window.jQuery && document.write("<script src=/include/js/jquery-1.8.3.min.js><\/script>")</script>';

//echo '<script src="//lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script>';

//echo '<script src="/include/js/jquery-1.8.3.min.js"></script>';
//2013-03-13更新版本有问题！
//echo '<script src="http://lib.sinaapp.com/js/jquery/1.9.0/jquery.min.js"></script><script>!window.jQuery && document.write("<script src=/include/js/jquery-1.9.1.min.js><\/script>")</script>';


}



function jquery() {
if ( $_SERVER['HTTP_HOST'] == 'higrid.net' ){ 
echo '<script src="http://lib.sinaapp.com/js/jquery/1.9.0/jquery.min.js"></script><script>!window.jQuery && document.write("<script src=/include/assets/ui/js/jquery.js?190><\/script>")</script>';
	}
else{echo '<script src="/include/assets/ui/js/jquery.js?190"></script>';}
//echo '<script src="/include/assets/ui/js/jquery.js?190"></script>';
}


function higridjs() {
//echo '<script type="text/javascript" src="/include/min/?g=higridjs&amp;20131014" charset="utf-8"></script>';
echo '<script type="text/javascript" src="/include/assets/higrid.js?20131013" charset="utf-8"></script>';

}


function higridcss() {

//echo '<link rel="stylesheet" href="/include/min/?g=higridcss&amp;20131013" type="text/css" media="screen" charset="utf-8" />';
echo '<link rel="stylesheet" href="/include/assets/higrid.css?20131011" type="text/css" media="screen" charset="utf-8" />';

}



function juijs() {

//echo '<script type="text/javascript" src="/include/min/?g=higrid_all_js&amp;20130313" charset="utf-8"></script>';
echo '<script type="text/javascript" src="/include/js/higridstock.js?20130313" charset="utf-8"></script>';

}


function juicss() {

//echo '<link rel="stylesheet" href="/include/min/?g=higrid_all_css&amp;20130313" type="text/css" media="screen" charset="utf-8" />';
echo '<link rel="stylesheet" href="/include/css/higridstock.css?20130313" type="text/css" media="screen" charset="utf-8" />';

}






//取消HTML代码
function htmlFilter($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = shtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
			str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}


//防止sql注入函数：
//$sql_str     从外部传入的参数，比如ID
function inject_check($sql_str){
//$check=eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
$check=preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/', $sql_str);
if ($check){
exit("地址含有非法字符，断开连接！");
}else{return $sql_str; //返回正常参数
}
}


/*
function cnfurl($s,$h,$e){
$cnf_host=($_SERVER["HTTPS"]=='on'?'https':'http').'://'.$_SERVER['HTTP_HOST'];
$cnf_doc=($e='')? ($s.'-'.$h):($s.'-'.$h.'-'.$e);
return $cnf_host.'/'.$cnf_doc.'.shtml';

//return $http_host.'/'.$s.'-'.$h.'-'.$e.'.shtml';
}

*/

function cnfurl($s,$h){
$http_host=(( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" )?'https':'http').'://'.$_SERVER['HTTP_HOST'];
return $http_host."/".$s."-".$h.".htm";
}

function s_url($url){
if(empty($url))return "";
$http_host=(( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" )?'https':'http').'://'.$_SERVER['HTTP_HOST'];
return $http_host."/".$url.".htm";
}



function sheyiurl($a,$b,$c,$d,$e='na')
{ 
  global $shorturl;
  $http_host=(( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" )?'https':'http').'://'.$_SERVER['HTTP_HOST'];
  if($shorturl){return $http_host.'/'.$a.'-'.$b.'-'.$c.'-'.$d.'-'.$e.'.htm';}
  else {return $http_host.'/?z='.$a.'-'.$b.'-'.$c.'-'.$d.'-'.$e;}
}

/*
function sheyiurl($a,$b,$c,$d,$e='na')
{ 
  global $shorturl;
  $http_host=($_SERVER["HTTPS"]=='on'?'https':'http').'://'.$_SERVER['HTTP_HOST'];
  if($shorturl){
	  return $http_host.'/cnf'.base64_encode($a.'-'.$b.'-'.$c.'-'.$d.'-'.$e).'.shtml';}
  else {return $http_host.'/?z='.$a.'-'.$b.'-'.$c.'-'.$d.'-'.$e;}
}

function sheyiurltoggle($bb)
{ 

$aaa1=substr($bb,0,3);$aaa2=substr($bb,3);
if($aaa1!='cnf'){ return $bb;}
  else {return base64_decode($aaa2);}
}
//$z=rtrim($_GET['z']);//2012-09-05：对编码进行处理判断
//$z=sheyiurltoggle($z);//2012-09-05：对编码进行处理判断

*/

function e404() //显示 404 错误
{
	//header("HTTP/1.1 404 Not Found");//include SHEYIROOT_PATH.'/include/html/404.html'; 
	//echo '404';统一换为一个错误slim rooter
	header("/s/error");//include SHEYIROOT_PATH.'/include/html/404.html'; 

//exit(1);
}

function e403() //显示 404 错误
{	
	//echo '404';统一换为一个错误slim rooter
	header("/s/error");//include SHEYIROOT_PATH.'/include/html/404.html'; 
	//header("/s-common-403.htm");

exit(1);}


/**
 * PHP截取UTF-8字符串，解决半字符问题。
 * 英文、数字（半角）为1字节（8位），中文（全角）为3字节
 * 
 * @return 取出的字符串, 当$len小于等于0时, 会返回整个字符串
 * @param  $str 源字符串
 * $len 左边的子串的长度
 */
function utf_substr($str, $len)
{
    for($i = 0;$i < $len;$i++)
    {
        $temp_str = substr($str, 0, 1);
        if(ord($temp_str) > 127)
            {
            $i++;
            if($i < $len)
            {
                $new_str[] = substr($str, 0, 3);
                $str = substr($str, 3);
                }
            }
        else
            {
            $new_str[] = substr($str, 0, 1);
            $str = substr($str, 1);
            }
        }
    return join($new_str);
    }
//echo utf_substr('社仪', 3);


/**
 * Convert a comma separated file into an associated array.
 * The first row should contain the array keys.
 * 
 * Example:
 * 
 * @param string $filename Path to the CSV file
 * @param string $delimiter The separator used in the file
 * @return array
 * @link http://gist.github.com/385876
 * @author Jay Williams <http://myd3.com/>
 * @copyright Copyright (c) 2010, Jay Williams
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
function csv_to_array($filename='', $delimiter=',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}
function csvline2($File) {
	//比较好，带标题
        $handle = fopen($File, "r");
        $fields = fgetcsv($handle, 1000, ",");
        
        while($data = fgetcsv($handle, 1000, ",")) {
            $detail[] = $data;
        }
        
        $x = 0;
        $y = 0;
            
        foreach($detail as $i) {
            foreach($fields as $z) {
                $stock[$x][$z] = $i[$y];
                $y++;
            }
            $y = 0;
            $x++;
        }
        return $stock;
    }









/** 
* read a csv file and return an indexed array. 
* @param string $cvsfile path to csv file 
* @param array $fldnames array of fields names. Leave this to null to use the first row values as fields names. 
* @param string $sep string used as a field separator (default ';') 
* @param string $protect char used to protect field (generally single or double quote) 
* @param array  $filters array of regular expression that row must match to be in the returned result. 
*                        ie: array('fldname'=>'/pcre_regexp/') 
* @return array 
*/ 
function csv2array($csvfile,$fldnames=null,$sep=',',$protect='"',$filters=null){ 
    if(! $csv = file($csvfile) ) 
        return FALSE; 

    # use the first line as fields names 
    if( is_null($fldnames) ){ 
            $fldnames = array_shift($csv); 
            $fldnames = explode($sep,$fldnames); 
            $fldnames = array_map('trim',$fldnames); 
            if($protect){ 
                foreach($fldnames as $k=>$v) 
                    $fldnames[$k] = preg_replace(array("/(?<!\\\\)$protect/","!\\\\($protect)!"),'\\1',$v); 
            }             
    }elseif( is_string($fldnames) ){ 
            $fldnames = explode($sep,$fldnames); 
            $fldnames = array_map('trim',$fldnames); 
    } 
     
    $i=0; 
    foreach($csv as $row){ 
            if($protect){ 
                $row = preg_replace(array("/(?<!\\\\)$protect/","!\\\\($protect)!"),'\\1',$row); 
            } 
            $row = explode($sep,trim($row)); 
             
            foreach($row as $fldnb=>$fldval) 
                $res[$i][(isset($fldnames[$fldnb])?$fldnames[$fldnb]:$fldnb)] = $fldval; 
             
            if( is_array($filters) ){ 
                foreach($filters as $k=>$exp){ 
                    if(! preg_match($exp,$res[$i][$k]) ) 
                        unset($res[$i]); 
                } 
            } 
            $i++; 
    } 
     
    return $res; 
}  

/*
不要标题索引；一行行读，然后去掉标题；
$jqgrid_csvdata=csv2array('./a/cc/db_csv/cc2_contractfee_spec.csv','no');
array_shift($jqgrid_csvdata);

print_r($jqgrid_csvdata);
*/










/**
 * Example
 */

//print_r(csv_to_array('example.csv'));

/*
$badkey = "敏感词|敏感词B|敏感词C";
$string = "我是不含有敏感词的，我要发表";
if(preg_match("/$badkey/i",$string)){
echo "对不起，含有含有敏感字符，不允许发表";
}else{
//do something...
}


$badstring="tmd|他妈的|TNND|她娘的";
$string="你tmd说什么，她娘的，不是人";
//echo preg_replace("/$badstring/i",'***',$string);
*/

 function filterword($string) {
         //请自行增减此数组内容，以达到最好过滤效果
         $keywords= array(
             'shit' => 's**t',
             'Shit' => 'S**t',
             'twat' => 't**t',            
             '他妈的' => 'TMD',
             '狗日的' => '狗X的',
             'X你妈' => '草泥马',
             '肏' => '*',
             '屁眼' => '菊花',
             '躲猫猫' => '朵猫猫',
             '70码' => '欺实马',
             'Yamete' => '雅蔑蝶',
             'fuck you' => '法克鱿',
             '打飞机' => '达菲鸡',
             '前列腺' => '潜烈蟹',
             'Tokyo Hot' => '东京热',
             '松岛枫' => '松岛蜂',
             '武藤兰' => '舞腾狼',
             '菊花残' => '菊花蚕',            
             '谢亚龙' => '獬犽龙',
             '叉腰肌' => '猹妖鸡',            
             '90后' => '九岭猴',
             '傻逼' => '傻X'            
            );
         return strtr($string, $keywords);
     }

//echo filterWord($string);


//https://gist.github.com/862452
function compress_html($buffer )
{
	$chunks = preg_split( '/(<pre.*?\/pre>)/ms', $buffer, -1, PREG_SPLIT_DELIM_CAPTURE );
	$buffer = '';
	foreach ( $chunks as $c )
	{
		if ( strpos( $c, '<pre' ) !== 0 )
		{
			# remove new lines & tabs
			$c = preg_replace( '/[\\n\\r\\t]+/', ' ', $c );
			# remove extra whitespace
			$c = preg_replace( '/\\s{2,}/', ' ', $c );
			# remove inter-tag whitespace
			$c = preg_replace( '/>\\s</', '><', $c );
			# remove CSS & JS comments
			$c = preg_replace( '/\\/\\*.*?\\*\\//i', '', $c );
		}
		$buffer .= $c;
	}
	return $buffer;
}



////可能没有用了。
function compress_html1($string) {  
    $string = str_replace("\r\n", '', $string); //清除换行符  
    $string = str_replace("\n", '', $string); //清除换行符  
    $string = str_replace("\t", '', $string); //清除制表符  
    $pattern = array (  
                    "/> *([^ ]*) *</", //去掉注释标记  
                    "/[\s]+/",  
                    "/<!--[^!]*-->/",  
                    "/\" /",  
                    "/ \"/",  
                    "'/\*[^*]*\*/'" 
                    );  
    $replace = array (  
                    ">\\1<",  
                    " ",  
                    "",  
                    "\"",  
                    "\"",  
                    "" 
                    );  
    return preg_replace($pattern, $replace, $string);  
}

/*只压缩HTML不压缩JS //未验证
$content = preg_replace("~>\s+\r~", ">", preg_replace("~>\s+\n~", ">", $content));
$content = preg_replace("~>\s+<~", "><", $content);

以下代码可以压缩HTML和JS，但如果JS没有用分号结尾的会有问题。//验证可行，但js中有变量不可行。
$content = str_replace(array('<!--<!---->','<!---->',"\r\n\r\n","\r\n","\n","   ","\t"),'',$content);

*/



function create_toc( $content ) {
	preg_match_all( '/<h([2-5])(.*)>([^<]+)<\/h[2-5]>/i', $content, $matches, PREG_SET_ORDER );
 
	global $anchors;
 
	$anchors = array();
	$toc 	 = '<ol id="toc">'."\n";
	$i 		 = 0;
 
	foreach ( $matches as $heading ) {
 
		if ($i == 0)
			$startlvl = $heading[1];
		$lvl 		= $heading[1];
 
		$ret = preg_match( '/id=[\'|"](.*)?[\'|"]/i', stripslashes($heading[2]), $anchor );
		if ( $ret && $anchor[1] != '' ) {
			$anchor = stripslashes( $anchor[1] );
			$add_id = false;
		} else {
			$anchor = preg_replace( '/\s+/', '-', preg_replace('/[^a-z\s]/', '', strtolower( $heading[3] ) ) );
			$add_id = true;
		}
 
		if ( !in_array( $anchor, $anchors ) ) {
			$anchors[] = $anchor;
		} else {
			$orig_anchor = $anchor;
			$i = 2;
			while ( in_array( $anchor, $anchors ) ) {
				$anchor = $orig_anchor.'-'.$i;
				$i++;
			}
			$anchors[] = $anchor;
		}
 
		if ( $add_id ) {
			$content = substr_replace( $content, '<h'.$lvl.' id="'.$anchor.'"'.$heading[2].'>'.$heading[3].'</h'.$lvl.'>', strpos( $content, $heading[0] ), strlen( $heading[0] ) );
		}
 
		$ret = preg_match( '/title=[\'|"](.*)?[\'|"]/i', stripslashes( $heading[2] ), $title );
		if ( $ret && $title[1] != '' )
			$title = stripslashes( $title[1] );
		else	
			$title = $heading[3];
		$title 		= trim( strip_tags( $title ) );
 
		if ($i > 0) {
			if ($prevlvl < $lvl) {
				$toc .= "\n"."<ol>"."\n";
			} else if ($prevlvl > $lvl) {
				$toc .= '</li>'."\n";
				while ($prevlvl > $lvl) {
					$toc .= "</ol>"."\n".'</li>'."\n";
					$prevlvl--;
				}
			} else {
				$toc .= '</li>'."\n";
			}
		}
 
		$j = 0;
		$toc .= '<li><a href="#'.$anchor.'">'.$title.'</a>';
		$prevlvl = $lvl;
 
		$i++;
	}
 
	unset( $anchors );
 
	while ( $lvl > $startlvl ) {
		$toc .= "\n</ol>";
		$lvl--;
	}
 
	$toc .= '</li>'."\n";
	$toc .= '</ol>'."\n";
 
	return array( 
		'toc' => $toc,
		'content' => $content
	);
}




/*

function sheyi_add($a,$b,$c){return $a+$b+$c;}
function sheyi_sub($a,$b,$c){return $a-$b-$c;}
function sheyi_mul($a,$b,$c){return $a*$b*$c;}
function sheyi_div($a,$b,$c){return number_format($a/($a+$b+$c),4)*100;}

*/

//is_int($aa)?'N':'S';
//$tid = isset($tid) && is_numeric($tid) ? $tid : 0;
/*
if(ereg('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']))
{ 
        if ( function_exists('ob_gzhandler')){                ob_start('ob_gzhandler');        } 
		else {                ob_start();        } 	
		} 
//print_r($_SERVER['HTTP_ACCEPT_ENCODING']);
			*/






$_GET       = daddslashes($_GET, 1, TRUE);   
$_POST      = daddslashes($_POST, 1, TRUE);    
$_COOKIE    = daddslashes($_COOKIE, 1, TRUE);    
$_SERVER    = daddslashes($_SERVER);    
$_FILES     = daddslashes($_FILES);    
$_REQUEST   = daddslashes($_REQUEST, 1, TRUE);  
if (!get_magic_quotes_gpc()){if(!empty($_GET)){$_GET  = addslashes_deep($_GET);}	if (!empty($_POST)){$_POST = addslashes_deep($_POST);}	$_COOKIE   = addslashes_deep($_COOKIE);		$_REQUEST  = addslashes_deep($_REQUEST);}
unregister_globals('_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');


function daddslashes($string, $force = 0, $strip = FALSE) {    
    if(!get_magic_quotes_gpc() || $force) {    
        if(is_array($string)) {    
            foreach($string as $key => $val) {    
                $string[$key] = daddslashes($val, $force, $strip);    
            }    
        } else {    
            $string = addslashes($strip ? stripslashes($string) : $string);    
        }    
    }    
    return $string; }

function addslashes_deep($value){if (empty($value)){return $value;}else{return is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);}}
function unregister_globals(){if (!ini_get('register_globals')){return false;}foreach (func_get_args() as $name){foreach ($GLOBALS[$name] as $key=>$value){if (isset($GLOBALS[$key])){ unset($GLOBALS[$key]);}}}}




//===================================




function r($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function d($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
