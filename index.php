<?php 

	if (isset($_POST['param'])) {		
		$param = $_POST['param'];
		$result = simply_consecutive($param);
	} else {
		$param = '100000000000000';
		$result = null;
	}
	
	function simply_consecutive($digit)
	{
		$retval = "";
		if(is_numeric($digit))
		{
			for($i=1; $i<=strlen($digit); $i++) $retval .= $i;
			$retval = number_format(substr($retval,0,strlen($digit)));
		}
		return $retval;
	}
	
    function effective_consecutive($digit)
    {	
        $x = 10;
        $y = $x;
        $z = '123456789';
        $retval = null;
        
        if(is_numeric($digit))
        {
            if(strlen($digit)<10) 
            {
                $retval = number_format(substr($z,0,strlen($digit)));
            } else {
				for($i=1; $i<=strlen($digit)-strlen($z); $i++) 
                {
                    if($i%2==0) 
                    {
                        $x++;
                        $y .= $x;
                    }
                }
                $retval = number_format($z.substr($y,0,strlen($digit)-strlen($z)));
            }
        }
        return $retval;
    }
	
?>

<form method="post" action="index.php">
	<table align="center" border="0" width="500px" cellpadding="5" cellspacing="1">
		<tr><td colspan="2"><strong>Consecutive Numbers</strong></td></tr>
		<tr><td>Pick a Number:</td><td align="right"><input type="text" name="param" value="<?php echo $param?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"/></td></tr>
		<tr class="calcrow">
			<td><i>The answer is:</td>
			<td align="right"><input type="text" value="<?php echo $result?>"></td></i>
		</tr>
		<tr><td align="right" colspan="2"><input type="submit" value="Calculate"/></td></tr>
	</table>
</form>
