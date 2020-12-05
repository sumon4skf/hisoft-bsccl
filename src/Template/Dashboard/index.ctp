<?php echo $this->Html->css('styles/plugins/fullcalendar', ['block' => true]);?>
<?php echo $this->Html->script('scripts/plugins/moment.min' , ['block' => true]); ?>
<?php echo $this->Html->script('scripts/plugins/fullcalendar.min', ['block' => true]); ?>
<?php echo $this->Html->script('scripts/plugins/waves.min', ['block' => true]); ?>
<?php echo $this->Html->script('scripts/calendar.init', ['block' => true]); ?>
<?php echo $this->Html->script('scripts/app', ['block' => true]); ?>
<style>

.fc-toolbar{display: none;}
.fc-content .fc-time{
   display : none;
}
    <?php
     foreach($weekDays as $weekday)
       {
           $weekends[]='.fc td.fc-'. strtolower($weekday->day_name_3);
       }
      $weekends = isset($weekends) ? implode(',' , $weekends) : '';
      echo $weekends;
    ?>
    {
        background-color:#dddddd;
    }
</style>
<div class="page page-dashboard">
   <input type="hidden" id="employeeId" value="<?php echo !empty($employeeId) ? $employeeId : ''; ?>">
    <div class="page-wrap">

        <div class="row">

            <div class="col-md-12">
                <?php echo $this->Flash->render('admin_success'); ?>
                <?php echo $this->Flash->render('admin_error'); ?>
            </div>
            <div class="col-md-12">
                <div class="dash-head clearfix mt15 mb20">
                    <div class="left">
                        <h4 class="mb5 text-light"> Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $switchType = $this->request->session()->read('switchType');?>
<?php if(!empty($employeeId)) { ?>

    <?php if ($switchType == 'Employee' || $switchType == null) { ?>
    <div class="page page-app-calendar">
        <div class="page-wrap">
            <!-- row -->
            <div class="row">
                <div class="col-sm-8">
                    <!-- calendar toolbar, this will replaced default toolbar -->
                    <div class="calendar-toolbar mb20 text-center">
                        <div class="btn-group btn-group-sm left">
                            <button type="button" class="btn btn-default ion ion-arrow-left-c prev-btn"></button>
                            <button type="button" class="btn btn-default ion ion-arrow-right-c next-btn"></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm ml15 left today-btn">today</button>
                        <strong class="text-uppercase current-date"></strong>
                        <div class="btn-group btn-group-sm right">
                            <button type="button" class="btn btn-default view-month">Month</button>
                            <button type="button" class="btn btn-default view-week">Week</button>
                            <button type="button" class="btn btn-default view-day">Day</button>
                        </div>
                    </div>
                    <!-- calendar -->
                    <div id="fullCalendar"></div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default mb20 panel-hovered project-stats table-responsive">
                        <div class="panel-heading">Summary of <?php echo date("F", mktime(0, 0, 0, $month, 15))?></div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-sm-1">SL.</th>
                                    <th class="col-sm-5">Title</th>
                                    <th class="col-sm-1">Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Opening Balance</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-primary right"> <?php echo !empty($opening_balance) ? $opening_balance : 0 ; ?></span>

                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Total earned leave</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-info right"> <?php echo !empty($employeeMonthLeaves->earn_leaves) ? $employeeMonthLeaves->earn_leaves : 0 ; ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Extra work day </td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-success right"> <?php echo !empty($employeeMonthLeaves->extra_work_days) ? $employeeMonthLeaves->extra_work_days : 0; ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Adjusted leave</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-info circle right"> <?php echo !empty($employeeMonthLeaves->adjusted_leaves) ? $employeeMonthLeaves->adjusted_leaves : 0; ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Leave for absence</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-info circle right"> <?php echo !empty($employeeMonthLeaves->leave_for_late) ? $employeeMonthLeaves->leave_for_late : 0 ;?></span>

                                    </td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>Total Absent</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-danger right"> <?php echo !empty($employeeMonthLeaves->total_absent) ? $employeeMonthLeaves->total_absent : 0 ;?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Leave Taken</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-info circle right"> <?php echo !empty($employeeMonthLeaves->leave_taken) ? $employeeMonthLeaves->leave_taken : 0 ; ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>Remaining balance</td>
                                    <td class="text-center">
                                        <span class="badge badge-lg badge-primary right"><?php echo !empty($remainingBalance) ? $remainingBalance : 0; ?></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- #end row -->

        </div> <!-- #end page-wrap -->
    </div>
    <!-- #end calendar page -->


    <?php } ?>


<?php } ?>




<?php

 /* <div class="page page-dashboard">

    <div class="page-wrap">

        <div class="row">

            <!-- Analytics -->
            <div class="col-md-9">
                <div class="panel panel-default mb20 panel-hovered analytics">
                    <div class="panel-heading"><?php echo isset($id) ? 'Attendances' : '' ; ?> </div>
                    <div class="panel-body">
                        </div>
                    </div>
                    <!-- <div class="panel-heading">Attendance Report</div>
                     <div class="date_picker input-group date col-md-3" style="margin: 0 13px 40px 0; float: left">
                         <input type="text" class="form-control" id="attendance_start_date">
                                <span class="input-group-addon">
                                    <i class=" ion ion-calendar"></i>
                                </span>
                     </div>
                     <div class="date_picker input-group date col-md-3"  style="margin: 0 13px 40px 0; float: left">
                         <input type="text" class="form-control" id="attendance_end_date">
                                <span class="input-group-addon">
                                    <i class=" ion ion-calendar"></i>
                                </span>
                     </div>
                     <div class="btn-group btn-group-sm">
                          <button class="search">search</button>
                     </div>
                     <div id="bar_chart"></div> -->
                </div>

            </div> <!-- #end analytics -->


            <!-- recent activities -->
<!--            <div class="col-md-3 col-sm-12">-->
<!--                <div class="panel panel-default mb20 list-widget">-->
<!--                    <ul class="list-unstyled clearfix">-->
<!--                        <li>-->
<!--                            <i class="fa fa-file-o"></i>-->
<!--                            <span class="text">Entry Time</span>-->
<!--                            <span class="right">8:00 AM</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-comments-o"></i>-->
<!--                            <span class="text">Total Earn Leave</span>-->
<!--                            <span class="right">5 days</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-bullhorn"></i>-->
<!--                            <span class="text">Total Sick Leave</span>-->
<!--                            <span class="right">10 days</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-hdd-o"></i>-->
<!--                            <span class="text">Earn Leave Taken</span>-->
<!--                            <span class="right">10 days</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-microphone"></i>-->
<!--                            <span class="text">Earn Leave Taken</span>-->
<!--                            <span class="right">10 days</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-bookmark-o"></i>-->
<!--                            <span class="text">Total Late</span>-->
<!--                            <span class="right">2 days</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-bug"></i>-->
<!--                            <span class="text">Total Absence</span>-->
<!--                            <span class="right">3 days</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <i class="fa fa-bug"></i>-->
<!--                            <span class="text">Total Extra Work Day</span>-->
<!--                            <span class="right">2 days</span>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
            <!-- #end recent activities -->


        </div>
        </div>

    </div>
</div>

*/
?>