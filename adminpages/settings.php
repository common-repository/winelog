<?php
	//saving?
	if($_REQUEST['Submit'])
	{
		wl_setOption("winebadge_embed");
		wl_setOption("winelist_embed");
	}	
	
	$winebadge_embed = wl_getOption("winebadge_embed");
	$winelist_embed = wl_getOption("winelist_embed");	
?>
<div class="wrap">				
    
    <h2>WineLog Settings</h2>    
    <form action="" method="post">
    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row">
                    <label for="winebadge_embed">Wine Badge Embed Method</label>
                </th>
                <td>
                    <input type="radio" name="winebadge_embed" value="php" <?php if($winebadge_embed == "php") { ?>checked="checked"<?php } ?> />PHP &nbsp;
                    <input type="radio" name="winebadge_embed" value="javascript" <?php if($winebadge_embed == "javascript") { ?>checked="checked"<?php } ?> />Javascript
                    <br />
                    <small>Choose whichever performs better on your setup. Usage: <strong>[winebadge id="55195"]</strong></small>
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">
                    <label for="winelist_embed">Wine List Embed Method</label>
                </th>
                <td>
                    <input type="radio" name="winelist_embed" value="php" <?php if($winelist_embed == "php") { ?>checked="checked"<?php } ?> />PHP &nbsp;
                    <input type="radio" name="winelist_embed" value="javascript" <?php if($winelist_embed == "javascript") { ?>checked="checked"<?php } ?> />Javascript
                    <br />
                    <small>Choose whichever performs better on your setup. Usage: <strong>[winelist query="Praxis"]</strong></small>
                </td>
            </tr>
        </tbody>
    </table>  
    <p class="submit">
    	<input class="button-primary" type="submit" value="Save Changes" name="Submit" />
    </p>  
    </form>
</div>
<?php
?>