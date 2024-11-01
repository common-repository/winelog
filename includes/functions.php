<?php
function wl_getOption($s)
{
    if($_REQUEST[$s])
        return $_REQUEST[$s];
    elseif(get_option("wl_" . $s))
        return get_option("wl_" . $s);
    else
        return "";
}

function wl_setOption($s, $v = NULL)
{
    //no value is given, set v to the request var
    if($v === NULL)
        $v = $_REQUEST[$s];    	
		
    if(get_option("wl_" . $s) !== false)
        return update_option("wl_" . $s, $v);
    else
	{
		echo "adding";
        return add_option("wl_" . $s, $v);
	}
}
?>