<?php
use Cake\Datasource\ConnectionManager;
use Cake\Network\Session;
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalender':
			getCalender($_POST['year'],$_POST['month']);
			break;
		case 'getEvents':
			getEvents($_POST['date']);
			break;
		default:
			break;
	}
}



/*
 * Get calendar full HTML
 */
function getCalender($year = '',$month = '')
{
	$dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
?>
	<div id="calender_section">
		<h2>
        	<a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
			<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
        </h2>
		<div id="event_list" class="none"></div>
		<div id="calender_section_top">
			<ul>
				<li>Sun</li>
				<li>Mon</li>
				<li>Tue</li>
				<li>Wed</li>
				<li>Thu</li>
				<li>Fri</li>
				<li>Sat</li>
			</ul>
		</div>
		<div id="calender_section_bot">
			<ul>
			<?php
				$dayCount = 1;
				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
						//Current date
						$dayCount = str_pad($dayCount , 2, '0', STR_PAD_LEFT);
						$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
						$user_id="";
						//Get number of events based on the current date

						$conn = ConnectionManager::get('default');
						if(!empty($_SESSION['Auth']['User']['id']))
							$user_id = $_SESSION['Auth']['User']['id'];

						$sql = $conn->execute("SELECT check_in_time, check_out_time FROM bp_m8dy_attendances WHERE date = '".$currentDate."' AND user_id = $user_id");
						$rows = $sql->fetchAll('assoc');

						$eventNum = count($rows);

						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}
						//Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';
						echo '<span style="margin: 0 !important;">';
						echo getEventsName($currentDate);
						echo '</span>';

						echo '</li>';
						$dayCount++;
			?>
			<?php }else{ ?>
				<li><span>&nbsp;</span></li>
			<?php } } ?>
			</ul>
		</div>
	</div>



	<script type="text/javascript">
		function getCalendar(target_div,year,month){
			$.ajax({
				type:'POST',
				url: SITE_URL + 'attendances/functions',
				data:'func=getCalender&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}


		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();
			});
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$(document).click(function(){
				$('#event_list').slideUp('slow');
			});
		});
	</script>
<?php
}

/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}


function getEventsName($date = ''){
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$conn = ConnectionManager::get('default');
	$user_id = $user_id = $_SESSION['Auth']['User']['id'];;
	$sql = $conn->execute("SELECT check_in_time, check_out_time, late_in_time FROM bp_m8dy_attendances WHERE date = '".$date."' AND user_id = $user_id");

	$rows = $sql->fetchAll('assoc');

	if(!empty($rows)) {
		$eventNum = count($rows);
		if ($eventNum > 0) {
			foreach ($rows as $row){
				if(!empty($row['late_in_time']))
					$eventListHTML .= '<span style="margin: 2px 0 0 4px; font-size: 12px; background: #ffff00">Entry:'. date('g:i A', strtotime($row['check_in_time'])) .'</span>';
				else
					$eventListHTML .= '<span style="margin: 2px 0 0 4px; font-size: 12px; text-align: center">Entry:'. date('g:i A', strtotime($row['check_in_time'])) .'</span>';

				if(!empty($row['check_out_time']))
					$eventListHTML .= '<span style="margin: 2px 0 0 4px; font-size: 12px; text-align: center">Exit:'. date('g:i A', strtotime($row['check_out_time'])).'</span>';
			}
		}
	}

	$sql = $conn->execute("SELECT leave_types, start_date, end_date,admin_status FROM bp_m8dy_leave_applications WHERE (start_date <= '".$date."' AND end_date >= '".$date."') AND user_id = $user_id");
	$rows = $sql->fetchAll('assoc');

	if(!empty($rows)) {
		$eventNum = count($rows);
		if ($eventNum > 0) {
			$eventListHTML .= '<span style="margin: 2px 0 0 4px; font-size: 12px; background: #ff0000; color:#ffffff;">Absent</span>';
			if($rows[0]['admin_status'] == 1){
				$eventListHTML .= '<span style="margin: 2px 0 0 4px; font-size: 12px;color:#000000;">Approved</span>';
			}else{
				$eventListHTML .= '<span style="margin: 2px 0 0 4px; font-size: 12px; color:#000000;">Requested</span>';
			}
		}
	}

	echo $eventListHTML;
}
?>