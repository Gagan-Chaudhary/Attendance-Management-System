<?php
include("connect.php");
error_reporting(0);
session_start();
$sub=$_SESSION['subject'];

$DB_TBLName = $sub; 
$filename = "filename";       

    mysqli_select_db ($connection, $DB_TBLName); 
  
    mysqli_set_charset($connection,"utf8");

$sql = "Select * from $DB_TBLName";

   
 
$result = @mysqli_query($connection, $sql) or die("Couldn't execute query:<br>" . mysqli_error($connection));    
$file_ending = "xls";

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t"; 

$arr=array("Date","Student1","Student2","Student3","Student4","Student5");
foreach($arr as $value){
    echo $value."\t" ;
}


for ($i = 0; $i < mysqli_num_fields($result); $i++) {
echo mysqli_fetch_field($result,$i) . "\t";
}
print("\n");    

    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }  
 
?>