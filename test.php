<!--
SWE Group B
-->
<html>
<head>
    <title>Apply to be a TA Today!</title>
</head>
<body>
<table border = "1">
<?php
	var_dump($_POST);
	$db = pg_connect("host=127.0.0.1 user=adminjaavkik password=RSjXYyeCyNyc dbname=sweworkspace");//connect to local db
    if(!$db)
    {
        die("Failed to connect to database: ".pg_last_error($db));
    }

	$studentName = pg_escape_string($_POST['studentName']);//take in name string, break into first and last
	$firstAndLast = explode(" ", $studentName);
	//echo $firstAndLast[0];
	//echo $firstAndLast[1];
	$studentPhone = pg_escape_string($_POST['studentPhone']);
	$studentId = pg_escape_string($_POST['studentId']);
	
	if(isset($_POST['U']))//if user undergrad
	{
	    $studentGPA = pg_escape_string($_POST['studentGPA']);
    }

    if(isset($_POST['G']))//if user graduate
    {
    }


	$query = "INSERT INTO Applicant(FirstName, LastName, phone, GPA) VALUES(' " . $firstAndLast[0] . "' , '" . $firstAndLast[1] . "' , '" . $studentPhone . "' , '" . $studentID . "' , '" . $studentGPA . "')"; 
    $result = pg_query($db, $query);
	if(!$result)
    {
		die("Error with query: ".pg_last_error($db));
	}
    else
    {
        display_result($result);
    }
	pg_close();
	

    function display_results($result)//uglyPrint results
    {
        $row = pg_fetch_assoc($result);
        if(!$row)
        {
            return FALSE;
        }
        echo "<tr>";
        foreach($row as $key => $value)
        {
            echo "<th>$key</th>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach($row as $res)
        {
            echo "<td>$res</td>";
        }
        echo "</tr>";
        while($row = pg_fetch_assoc($result))
        {
            echo "<tr>";
            foreach($row as $res)
            {
                echo "<td>$res</td>";
            }
            echo "</tr>";
        }
    }
?>
</table>
</body>
</html>
