<?php 
function realkillstring($mainstring,$length,$case1,$type)
{
$mainstring=cleancommonlength($mainstring,$length);


     return($mainstring);

}

function cleancommonlength($mainstring,$length)
{
 
        if(is_array($mainstring))
        {
        // echo "data array not expected ";
			
        $mainstring="";
       
			header("Location:../index.php");
        exit();
        }
        $mainstring= trim($mainstring);
	
        if(strlen($mainstring) > $length)
        {
			
          // echo "data error in length ";
        $mainstring="";
     
         // $_SESSION['s_emp_code']='';
			header("Location:../index.php");
        exit();
        }
        $badstrings="=%.js%.htm%+%//%\\%.%html%create alter %mouseover%keypress%keydown%alert %script%<%>%select %drop %;%--%insert %update %delete %xp_%";
        $badarray=explode("%",$badstrings);
        $orglength=strlen($mainstring);
	
      foreach( $badarray as $key =>$badsubstring)
      {
      	 $mainstring = str_ireplace($badsubstring," ",$mainstring);

      }
        $newlength=strlen($mainstring);
        if ($orglength !=$newlength)
          {
		
 			$_SESSION['stoken']='';
	
            // echo "data error ";
         // $_SESSION['s_emp_code']='';
			header("Location:../index.php");

          exit();
          }
         $mainstring=preg_replace("([^a-zA-Z0-9/. (),_-])", "", $mainstring);
        	$mainstring=pg_escape_string($mainstring);
        		$mainstring=htmlentities($mainstring);
        return($mainstring);
}
function intkillstring($mainstring)
    {
             $mainstring = trim($mainstring);
             $badstrings="create%alter%script%<%>%select%drop%;%--%insert%update%delete%xp_%'%\%,%(%)%`%~%!%@%#%$%^%&%*%+%:%,%[%]%|%?%";
             $badarray=explode("%",$badstrings);

            foreach( $badarray as $key =>$badsubstring)
                    {
                     $mainstring = str_replace($badsubstring," ",$mainstring);
                    }
             $mainstring= trim($mainstring);
                      return($mainstring);
    }
    function sanitize_filename($filename) {
      $target_dir = "../uploads/"; 
      // Replace spaces with underscores
      $filename = str_replace(' ', '_', $filename);
  
      // Remove all characters except letters, numbers, periods, hyphens, and underscores
      $filename = preg_replace('/[^A-Za-z0-9._-]/', '', $filename);
  
      // Convert to lowercase
      $filename = strtolower($filename);
  
      // Ensure unique filename
      $base_name = pathinfo($filename, PATHINFO_FILENAME);
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      $counter = 1;
      while (file_exists($target_dir . $filename)) {
          $filename = $base_name . "_" . $counter . "." . $extension;
          $counter++;
      }
  
      return $filename;
  }
    ?>