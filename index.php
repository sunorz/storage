<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>网络存储</title>

<style type="text/css">

body {

	background-color: #FCFCDA;

}
.tips{ width:100%; height:50px; background-color:#F38D34; line-height:50px; padding:10px;
}
.tips:after{clear:both;}
</style>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
</head>



<body>
<!--000webhost-->
<div style="float:left"><img src="Harddrive - Cloud.png" width="100" height="100"></div>



<div style="float:left;">

<?php 

$curdir= dirname(__FILE__);

$used = getRealSize(getDirSize($curdir));

$total= 1000;

$freedir=$total-$used;

	$pr = $used/$total*100;

	$pr =sprintf("%.2f", $pr); 

echo '<br />';

$us2= getRealSize2(getDirSize($curdir));

if ($pr<50)

{

	$a="none";

	$b="inline";

	$cl="#71B7F7";

	$bcl="#71B7F7";

}

else

{

	$a="inline";

	$b="none";

	$cl="#FFFFFF";

	if($pr<90)

	{

	$bcl="#71B7F7";

	}

	else

	{

	$bcl="#FFB0B3";	

	}

}

?>



<div style="background:#FFF; width:500px; border:solid #646464 1px; height:30px; color:<?php echo $cl?>;"><div style="width:<?php echo $pr?>%; background-color:<?php echo $bcl?>; text-align:right; height:30px; float:left;"><span style=" margin-right:20px; line-height:30px; display:<?php echo $a ?>; font-family:Arial, Helvetica, sans-serif;"><strong><?php echo $pr.'%'?></strong></span></div><span style=" margin-left:20px; line-height:30px; display:<?php echo $b ?>; font-family:Arial, Helvetica, sans-serif;"><strong><?php echo $pr.'%'?></strong></span></div>



<?php 

 	echo '<br />';

    echo '已用：' .$us2;

	echo "&nbsp;总计：1<span style='background-color:#e61c1c;padding-left:7px; padding-right:7px; padding-top:2px; padding-bottom:2px;border-radius:4px;color:#FFFFFF;font-family:Arial;margin-left:5px;'>GB</span><br />";

?></div>

<?php



    // 

    function getDirSize($dir)

    {
        if(!isset($sizeResult))
		$sizeResult=-1;
        $handle = opendir($dir);

        while (false!==($FolderOrFile = readdir($handle)))

        {

            if($FolderOrFile != "." && $FolderOrFile != "..")

            {

                if(is_dir("$dir/$FolderOrFile"))

                {

                    $sizeResult += getDirSize("$dir/$FolderOrFile");
					

                }

                else

                {

                    $sizeResult += filesize("$dir/$FolderOrFile");

                }

            }   

        }

        closedir($handle);

        return $sizeResult;

    }



    // 

    function getRealSize($size)

    {

        $kb = 1024;         // Kilobyte

        $mb = 1024 * $kb;   // Megabyte


           return round($size/$mb,2);

       

    }


  function getRealSize2($size)

    {

        $kb = 1024;         // Kilobyte

        $mb = 1024 * $kb;   // Megabyte

        $gb = 1024 * $mb;   // Gigabyte    

       
switch($size)
{
	case ($size>$gb): return round($size/$gb,2)."<span style='background-color:#e61c1c;padding-left:7px; padding-right:7px; padding-top:2px; padding-bottom:2px;border-radius:4px;color:#FFFFFF;font-family:Arial;margin-left:5px;'>GB</span>";
	break;
	
	case ($size>$mb): return round($size/$mb,2)."<span style='background-color:#165faa;padding-left:7px; padding-right:7px; padding-top:2px; padding-bottom:2px;border-radius:4px;color:#FFFFFF;font-family:Arial;margin-left:5px;'>MB</span>";
	break;
	
	case ($size>$kb): return round($size/$kb,2)."<span style='background-color:#31c43c;padding-left:7px; padding-right:7px; padding-top:2px; padding-bottom:2px;border-radius:4px;color:#FFFFFF;font-family:Arial;margin-left:5px;'>kB</span>";
	break;
	
	case ($size<$kb): return round($size,2)."<span style='background-color:#cdcdcd;padding-left:7px; padding-right:7px; padding-top:2px; padding-bottom:2px;border-radius:4px;color:#FFFFFF;font-family:Arial;margin-left:5px;'>B</span>";
	break;	
}    

    }
?>

<div style="position:absolute; top:120px; padding:5px;">本站点被用于网络存储。<br/>&copy;&nbsp;Sunplace&nbsp;2015-<?php echo gmdate('Y', time() + 3600 * 8);?></div>
<script>
$(function(){
	$("div:last-child").remove();
	
})
</script>
</body>

</html>