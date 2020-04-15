<?php 
function draw_calendar($month,$year){
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	$calendar.= '<tr class="calendar-row">';
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			$calendar.= '<div class="day-number">'.$list_day.'</div>';
			$calendar.= str_repeat('<p> </p>',2);
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;
	$calendar.= '</tr>';
	$calendar.= '</table>';
	return $calendar;
}


echo '<h2>November 2018</h2>';
echo draw_calendar(11,2018);

?>

 <!--
    ___                                           _____      
    |__| |_  _____  ___  __|        ___ ___ __|     |     | - ___ ___
    |  | | | | | |  |_|  |_|        |_| | | |_|   |_| |_| | | |_| | |
    
              (
             ( ,)
            ). ( )
           (, )' (.
          \WWWWWWWW/
           '--..--'
              }{
              {}
   ____   _____                    _____    ______
   |   \  |     \      /               /    |    |
   |    \ |___   \    /          _____/     |    |
   |    / |       \  /               /      |    |
   |___/  |____    \/           ____/  []   |____| 
-->    