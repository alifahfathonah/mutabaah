<?php
	class Database extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function datatables($setup){
            $this->db->select($setup['table']['select']);
            $this->db->from($setup['database']);
            if(count($setup['table']['join'])){
                foreach($setup['table']['join'] as $table => $condition){
                    $this->db->join($table,$condition,'left');
                }
            }
            $keys = array_keys($setup['table']['column']);
            $c = 0;
            $having = "";
            foreach($setup['table']['column'] as $col => $type){
                if($_POST['search']['value']){

                    if($c == 0){
                        $having = $having." ( ";
                        $having = $having."`$col` LIKE '%".$_POST['search']['value']."%' ESCAPE '!' ";
                    }
                    else{
                        $having = $having." OR  `$col` LIKE '%".$_POST['search']['value']."%' ESCAPE '!' ";

                    }
                    if(count($keys) - 1 == $c){
                        $having = $having." ) ";

                    }
                }
                $c++;
            }
            if($setup['table']['condition'] != ""){
                $this->db->where($setup['table']['condition']);
            }
            if($_POST['search']['value']){
                $this->db->having($having);
            }
            if(isset($_POST['order'])){
                $this->db->order_by($keys[$_POST['order']['0']['column']-1], $_POST['order']['0']['dir']);
            }
            else {
                $this->db->order_by($setup['table']['ordercolumn'],$setup['table']['sort']);
            }
            if($_POST['length'] != -1){
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            return $this->db->get()->result_array();
        }

        function datatablescount($setup){
            $this->db->select($setup['table']['select']);
            $this->db->from($setup['database']);

            if(count($setup['table']['join'])){
                foreach($setup['table']['join'] as $table => $condition){
                    $this->db->join($table,$condition,'left');
                }
            }

            $keys = array_keys($setup['table']['column']);
            $c = 0;
            $having = "";
            foreach($setup['table']['column'] as $col => $type){
                if($_POST['search']['value']){

                    if($c == 0){
                        $having = $having." ( ";
                        $having = $having."`$col` LIKE '%".$_POST['search']['value']."%' ESCAPE '!' ";
                    }
                    else{
                        $having = $having." OR  `$col` LIKE '%".$_POST['search']['value']."%' ESCAPE '!' ";

                    }
                    if(count($keys) - 1 == $c){
                        $having = $having." ) ";
                    }
                }
                $c++;
            }
            if($setup['table']['condition'] != ""){
                $this->db->where($setup['table']['condition']);
            }
            if($_POST['search']['value']){
                $this->db->having($having);
            }
            if(isset($_POST['order'])){
                $this->db->order_by($keys[$_POST['order']['0']['column']-1], $_POST['order']['0']['dir']);
            }
            else {
                $this->db->order_by($setup['table']['ordercolumn'],$setup['table']['sort']);
            }
            return $this->db->get()->num_rows();
        }
        function create($tabel,$create){
            $this->db->insert($tabel, $create);
            return $this->db->insert_id();
        }

        function select($kolom,$tabel,$kondisi,$orderby='',$sort = 'asc'){
            $this->db->select($kolom);
            $this->db->from($tabel);
            $this->db->where($kondisi);
            $this->db->order_by($orderby, $sort);
            return $this->db->get()->result_array();
        }
        function selectjoin($kolom,$tabel,$join,$having,$orderby){
            $this->db->select($kolom);
            $this->db->from($tabel);
            foreach($join as $j){
                $this->db->join($j[0],$j[1],$j[2]);
            }
            $this->db->having($having);
            foreach($orderby as $o){
                $this->db->order_by($o[0],$o[1]);
            }
            return $this->db->get()->result_array();
        }
        function delete($tabel,$kondisi){
            $this->db->delete($tabel,$kondisi);
            return $this->db->affected_rows();
        }
        function truncate($tabel){
            $this->db->truncate($tabel);
        }
        function update($tabel,$kondisi,$data){
            $this->db->where($kondisi);
            $this->db->update($tabel, $data);
            return $this->db->affected_rows();
        }
        function login($tabel,$username,$password){
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where("'$username' = `email_user` AND '".md5($password)."' = `password_user` AND status_user = 'enabled' AND role_user = 'admin'");
            return $this->db->get()->result_array();
        }
        function login_user($tabel,$username,$password){
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where("'$username' = `email_user` AND '".md5($password)."' = `password_user` AND status_user = 'enabled'");
            return $this->db->get()->result_array();
        }
        function hitung($tabel){
            $this->db->from($tabel);
            return $this->db->count_all_results();
        }
    }
?>
