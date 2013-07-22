<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Zyght Utility class
 * Created By:Vijeesh
 */
 
class Zyght_utility {
	
        public function fetch_url_params ($urlParams) 
        {
            $urlValues = array();
            $urlValues = explode("/", $urlParams);
            return $urlValues;
        }
        public function get_active_menu ($urlParams) 
        {
            $urlValues = array();
            $classValues['alerts']     = "";
            $classValues['statistics'] = "";
            $classValues['incidents']  = "";
            $classValues['map']        = "";
            $classValues['workareas']  = "";
            $classValues['company']    = "";
            $classValues['users']      = "";
            $urlValues = explode("/", $urlParams);
            $alerts = array('alerts', 'new_alert','mis_alerts','view_alert');
            $statistics = array('statistics');
            $incidents = array('incidents_list','new_incident');
            $work_areas = array('workarea_list','new_workarea','edit_workarea');
            $companies = array('company_list','new_company','edit_company');
            $users = array('user_list','new_user','edit_user','auth');
            if(in_array($alerts[0], $urlValues)) {
                $classValues['alerts'] = "active";
            }
            else if(in_array($alerts[1], $urlValues)) {
                $classValues['alerts'] = "active";
            }
            else if(in_array($alerts[2], $urlValues)) {
                $classValues['alerts'] = "active";
            }
            else if(in_array($alerts[3], $urlValues)) {
                $classValues['alerts'] = "active";
            }
            else if(in_array($statistics[0], $urlValues)) {
                $classValues['statistics'] = "active";
            }
            else if(in_array($incidents[0], $urlValues)) {
                $classValues['incidents'] = "active";
            }
            else if(in_array($incidents[1], $urlValues)) {
                $classValues['incidents'] = "active";
            }
            else if(in_array($work_areas[0], $urlValues)) {
                $classValues['workareas'] = "active";
            }
            else if(in_array($work_areas[1], $urlValues)) {
                $classValues['workareas'] = "active";
            }
            else if(in_array($work_areas[2], $urlValues)) {
                $classValues['workareas'] = "active";
            }
            else if(in_array($companies[0], $urlValues)) {
                $classValues['company'] = "active";
            }
            else if(in_array($companies[1], $urlValues)) {
                $classValues['company'] = "active";
            }
            else if(in_array($companies[2], $urlValues)) {
                $classValues['company'] = "active";
            }
            else if(in_array($users[0], $urlValues)) {
                $classValues['users'] = "active";
            }
            else if(in_array($users[1], $urlValues)) {
                $classValues['users'] = "active";
            }
            else if(in_array($users[2], $urlValues)) {
                $classValues['users'] = "active";
            }
            else if(in_array($users[3], $urlValues)) {
                $classValues['users'] = "active";
            }
            else {
               $classValues['users'] = "";;
            }
            return $classValues;
        }
        public function get_active_sidebar ($urlParams) 
        {
            $urlValues = array();
            $classValues['alerts']         = "";
            $classValues['mis_alerts']     = "";
            $classValues['new_alert']      = "";
            $classValues['statistics']     = "";
            $classValues['incidents_list'] = "";
            $classValues['new_incident']   = "";
            $classValues['workarea_list']  = "";
            $classValues['new_workarea']   = "";
            $classValues['company_list']   = "";
            $classValues['new_company']    = "";
            $classValues['user_list']      = ""; 
            $classValues['new_user']       = "";
            $classValues['edit_user']      = ""; 
           
            $urlValues = explode("/", $urlParams);
            $alerts = array('alerts', 'new_alert','mis_alerts');
            $statistics = array('statistics');
            $incidents = array('incidents_list','new_incident');
            $work_areas = array('workarea_list','new_workarea','edit_workarea');
            $companies = array('company_list','new_company','edit_company');
            $users = array('user_list','new_user','edit_user','auth');
           
            if(in_array($alerts[1], $urlValues)) {
                $classValues['new_alert'] = "active";
            }
            else if(in_array($alerts[2], $urlValues)) {
                $classValues['mis_alerts'] = "active";
            }
            else  if(in_array($alerts[0], $urlValues)) {
                $classValues['alerts'] = "active";
            }
            else if(in_array($statistics[0], $urlValues)) {
                $classValues['statistics'] = "active";
            }
            else if(in_array($incidents[0], $urlValues)) {
                $classValues['incidents_list'] = "active";
            }
            else if(in_array($incidents[1], $urlValues)) {
                $classValues['new_incident'] = "active";
            }
            else if(in_array($work_areas[0], $urlValues)) {
                $classValues['workarea_list'] = "active";
            }
            else if(in_array($work_areas[1], $urlValues)) {
                $classValues['new_workarea'] = "active";
            }
             else if(in_array($work_areas[2], $urlValues)) {
                $classValues['workarea_list'] = "active";
            }
             else if(in_array($companies[0], $urlValues)) {
                $classValues['company_list'] = "active";
            }
            else if(in_array($companies[1], $urlValues)) {
                $classValues['new_company'] = "active";
            }
             else if(in_array($companies[2], $urlValues)) {
                $classValues['company_list'] = "active";
            }
            else if(in_array($users[0], $urlValues)) {
                $classValues['user_list'] = "active";
            }
            else if(in_array($users[1], $urlValues)) {
                $classValues['new_user'] = "active";
            }
            else if(in_array($users[2], $urlValues)) {
                $classValues['user_list'] = "active";
            }
            else if(in_array($users[3], $urlValues)) {
                $classValues['user_list'] = "active";
            }
                        
            return $classValues;
        }
        
        function getYear($cond = null ){
            
            for ($i = (date("Y")); $i >= (date("Y")-100); $i--) {
                $dropdown[$i] = $i;
            }
            return $dropdown;
        }
        function getDay($cond = null){
            
            for ($i = 1; $i <= 31; $i++) {
                $dropdown[$i] = $i;
            }
            return $dropdown;
            
        }
        function getMonth($cond = null){
            
            for ($i = 1; $i <= 12; $i++)
            {
                $dropdown[$i] = $i;
            }
            return $dropdown;
        }
       
}

?>