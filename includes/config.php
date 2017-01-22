<?php 
   //constants used throughout the RP site

   $rp_name = "Reflections | Projections";
   $rp_year = "2006";
   $rp_days = "October 20 - 22";
   $rp_date = "$rp_days, $rp_year";
   $rp_number = "12th";
   $rp_numyears = "12";
   $rp_yearsago = "11";
   $rp_url = 'http://www.acm.uiuc.edu/conference/' . $rp_year;
   $rp_email = 'conference@acm.uiuc.edu';
   $rp_chair = "Anthony Philipp";
   $rp_chair_email = 'conference-chair@acm.uiuc.edu';
   // Vol. reg Closed
   //$rp_volunteer_cap = 0;
   $rp_volunteer_cap = 40;
   $rp_cost = "$20";
   $rp_jobfair_date = "Friday October 20, 2006";
   $rp_mechmania_num = "XII";
   $rp_mechmania_coordinators = "Jacob Lee";
   $rp_resume_upload_name = "rp06/";
   $rp_admin_email = 'mloar2@uiuc.edu';

   $rp_db_host = "db1.acm.uiuc.edu";
   $rp_db_user = "reflect";
   $rp_db_pwd = "r3fl3ct";
   $rp_db_database = "reflect";
   $rp_db_locked = false;

   // ACTUAL constants

   define("REG_STAT_PREOPEN", 0);
   define("REG_STAT_ONLINE", 1);
   define("REG_STAT_OFFLINE", 2);
   define("REG_STAT_CLOSED", 3);

   $rp_reg_stat_attendee = array( 'status' => REG_STAT_CLOSED, 'name' => 'Attendee registration');
   $rp_reg_stat_volunteer = array( 'status' => REG_STAT_CLOSED, 'name' => 'Volunteer registration');
   $rp_reg_stat_jobfair = array('status' => REG_STAT_CLOSED, 'name' => 'Job fair registration');
   $rp_reg_stat_mechmania = array('status' => REG_STAT_CLOSED, 'name' => 'MechMania registration');
?>
