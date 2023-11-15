<?php
session_start();
			//echo '<pre>';
			//print_r($csv);
			//echo '</pre>';
			
			//make the arrays needed

			$csvtmp = array();
			$csvFinal = array();

			@$csvfile = file_get_contents('../../data/reports/daily/'.$_GET['date'].'-viewReport.txt');
			$csv = str_getcsv($csvfile,"\n"); //make an array element for every record (new line)

			//Loop through the result 
			foreach ($csv as $key => $item) 
			{
				@$i++;
			    array_push($csvtmp, str_getcsv($item,";")); //push each record to the csv temp array

			    //here's the messy part. This set the key of the csvFinal array to the first field in the current record and for the value it gives it the array we got from the previous str_getcsv.
			    @$csvFinal[$csvtmp[$key][1]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal[$csvtmp[$key][0]][0]);

			    @$csvFinal_uip[$csvtmp[$key][2]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal_uip[$csvtmp[$key][0]][0]);

			    @$csvFinal_dates[$csvtmp[$key][1]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal_dates[$csvtmp[$key][0]][0]);

			    @$csvFinal_dates_unique[$csvtmp[$key][0]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal_dates_unique[$csvtmp[$key][0]][0]);


			}


			

			//echo "<pre>";
		    //print_r($csvFinal);
			//echo "</pre>"; 

			//echo "<pre>";
		    //print_r($csvFinal_uip);
			//echo "</pre>";


			// COUNT DATES TO CONCRETE DATE
			function search($array, $key, $value)
			{
			    $results = array();

			    if (is_array($array)) {
			        if (isset($array[$key]) && $array[$key] == $value) {
			            $results[] = $array;
			        }

			        foreach ($array as $subarray) {
			            $results = array_merge($results, search($subarray, $key, $value));
			        }
			    }

			    return $results;
			}




			//make the arrays needed


			$csvtmp2=array();

			@$csvfile2 = file_get_contents('../../data/reports/daily/'.$_GET['date'].'-clickReport.txt');
			$csv_clicks = str_getcsv($csvfile2,"\n"); //make an array element for every record (new line)

			//Loop through the result 
			foreach ($csv_clicks as $key => $item) 
			{
				@$i++;
			    array_push($csvtmp2, str_getcsv($item,";")); //push each record to the csv temp array

			    @$clickFinal[$csvtmp2[$key][1]] = $csvtmp2[$key]; 
			    unset($clickFinal[$csvtmp2[$key][0]][0]);


			    $clickFinal_dates[$csvtmp2[$key][0]] = $csvtmp2[$key]; 
			    unset($clickFinal_dates[$csvtmp2[$key][0]][0]);


			    @$clickFinal_uip[$csvtmp2[$key][2]] = $csvtmp2[$key]; 
			    unset($clickFinal_uip[$csvtmp2[$key][0]][0]);

			}

						

			// echo "<pre>";
		 //    print_r($clickFinal_dates);
			// echo "</pre>";

			// Write to monthly
			$current .= count($csv).";".count($csvFinal_uip).";\n";
			$date = explode("-", $_GET['date']);
			file_put_contents('../../data/reports/monthly/'.$date[0].'-'.$date[1].'-'.$date[2].'-viewReport.txt', $current, FILE_APPEND | LOCK_EX);

?>

<?=str_replace($_SESSION['campaign'].'-', '', $_GET['date']);?>|<?=count($csv);?>|<?=count($csvFinal_uip);?>|<?=count($clickFinal);?>;