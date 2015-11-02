<!DOCTYPE html>
<html>
	<head>
	  <LINK href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
			function draw_calendar($month,$year){
				
				$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';//начало табл
				
				$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
				$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
				
				$running_day = date('w',mktime(0,0,0,$month,1,$year));//порядковый номер дня недели
				$days_in_month = date('t',mktime(0,0,0,$month,1,$year));//количество дней в месяце
				$day_counter = 0;
				
				$calendar.= '<tr class="calendar-row">';//ряд для недели
				//пустые дни
				for($x = 0; $x < $running_day; $x++){
					$calendar.= '<td class="calendar-day-np"> </td>';
				}
				
				for($list_day = 1; $list_day <= $days_in_month; $list_day++){
					$calendar.= '<td class="calendar-day">';
					
					$calendar.= '<div class="day-number">'.$list_day.'</div>';//число
							
					$calendar.= '</td>';
					if($running_day == 6){//конец недели
						$calendar.= '</tr>';
						if(($day_counter + 1) != $days_in_month){
							$calendar.= '<tr class="calendar-row">';
						}
						$running_day = -1;
					}
					$running_day++; 
					$day_counter++;
				}
				if($running_day < 7 && $running_day != 0){//оставшиеся дни след месяца
					for($x = 1; $x <= (7 - $running_day); $x++){
						$calendar.= '<td class="calendar-day-np"> </td>';
					}
				}
				$calendar.= '</tr>';
				$calendar.= '</table>';
				return $calendar;
			}
		?>
		<form method = "post" action = "Task2.php">
			<select name="month">
				<option value="1" name = "January">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<input name="year" type="number" min="1950" max="2100" step="1" />
			<input type = "submit" value="Show"/>
			<br>
		<form/>
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(isset($_POST['year']) && $_POST['year'] != ""){
			echo '<h2>'.$_POST["month"].".".$_POST["year"].'</h2>';
			echo draw_calendar($_POST["month"],$_POST["year"]);
			}
			else
				echo '<h2>'.'Type year'.'</h2>';
			
		} ?>
	</body>
</html>