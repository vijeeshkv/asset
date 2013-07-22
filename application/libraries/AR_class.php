<?php defined('BASEPATH') OR exit('No direct script access allowed');

abstract class AR_class extends CI_Model{
    
    protected $table = NULL;
       
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /*
     * Select data from $table based on 
     * $conditions = array(
     *              'where' => array(`column` => `value`,...) ONLY USE FOR AND!,
     *              'order' => array(`column` => ASC, DESC or RANDOM),
     *              'limit' => 'from, number_of_rows'
     */
    function select_simple($conditions = NULL){

        $this->db->select(isset($conditions['select']) ? $conditions['select'] : "*");
        
        if(isset($conditions['where']) && !empty($conditions['where']))
            $this->db->where($conditions['where']);
        
        /*vijeesh code */
        if(!empty ($conditions['join'])) {
            foreach($conditions['join'] as $key=>$value){
                 $tabname = $joinfield = $jointype= "";
                 foreach($value as $inkey=>$invalue){
                       
                     if ( ($inkey == 'tbname') && $invalue != "" ) {
                           $tabname = $invalue;
                     }
                     if ( ($inkey == 'joinfield') && $invalue != "" ) {
                           $joinfield = ",".$invalue;
                     }
                     if ( ($inkey == 'jointype') && $invalue != "" ) {
                          $jointype = ",".$invalue;
                     }
                      
                  }
                  $this->db->join($tabname, $joinfield, $jointype);
                }
        }  
        /* end vijeesh code */
        
        if(!empty($conditions['order']))
            foreach($conditions['order'] as $order => $by){
                $this->db->order_by($order, $by);
            }
        
        if(!empty($conditions['limit'])){
            $limit = explode(",", $conditions['limit']);
            if(count($limit)>1){
                if(!empty($conditions['table']))
                {
                    $query = $this->db->get($conditions['table'],$limit[1],$limit[0]);
                } 
                else    
                $query = $this->db->get($this->table,$limit[1],$limit[0]);
            }else{
                
                $query = $this->db->get($this->table,$limit[0],0);
            }
        }else{
            if(!empty($conditions['table']))
                $query = $this->db->get($conditions['table']);
            else
            $query = $this->db->get($this->table);
        }
        
        if($query)
            return $query->result();
        return array();
    }
    
    /*
     * Select data by query.
     * For complex queries
     */
    function select_by_query($query){
        $query = $this->db->query($query);
        if($query)
            return $query->result();
        return array(0); 
    }
    
    function run_query($query){
        $query = $this->db->query($query);
        if($query)
            return TRUE;
        return FALSE; 
    }
    
    /*
     * Insert $data into $table.
     * $data = array(`column` => `value`, ...)
     * If we want to insert multiple values use "insert_more"
     */        
    function insert_it($data){
        $query =  $this->db->insert($this->table, $data);
        if($query)
                return $this->db->insert_id();
        return FALSE;
    }
    
    
    /*
     * Insert multiple data into table
     */
    
    function insert_all($data){
        
        $query =  $this->db->insert_batch($this->table, $data);
        if($query)
                return TRUE;
        return FALSE;
    }
    
    /*
     * Update $data into $table with $were condition
     * $data = array(`column` => `value`, ...)
     * $where = array(`column` => `value`,...)
     */ 
    function update($data, $where=NULL){
        if($this->db->update($this->table, $data, $where))
                return TRUE; 
        return FALSE;
    }
    
    /*
     * Delete from $table with $were condition
     * $where = array(`column` => `value`,...)
     * if $where is not set then empty table;
     */ 
    function delete($where){
        if(isset($where))
            $this->db->where($where);
        if($this->db->delete($this->table))
                return TRUE; 
        return FALSE;
    }
    
    /*
     * Delete from $table with $were condition
     * $where = array(`column` => `value`,...)
     * if $where is not set then empty table;
     */ 
    function truncate($table){
        if($this->db->truncate($table))
                return TRUE; 
        return FALSE;
    }
    
    function dropdown($conditions = NULL){
        $temp = $this->select_simple($conditions);
        $vars = explode(",", $conditions['select']);
        if($temp){
            foreach($temp as $t_object){
                $t = (array) $t_object;
                $dropdown[$t[trim($vars[0])]] = $t[trim($vars[1])];
            }
            return $dropdown;
        }
        return FALSE;
    }
    function dropdownNew($conditions = NULL){
       
        $temp = $this->select_simple($conditions);
        $vars = explode(",", $conditions['select']);
        if($temp){
            foreach($temp as $t_object){
                $t = (array) $t_object;
                $dropdown[$vars[0]] = $vars[1];
            }
            return $dropdown;
        }
        return FALSE;
    }
    
    function dropdown_selected($conditions = NULL){
        $dropdown_selected = $this->select_simple($conditions);
        $vars = explode(",", $conditions['select']);
        if(isset($dropdown_selected[0]))
            return $dropdown_selected[0]->$vars[0];
        return 0; 
    }
}