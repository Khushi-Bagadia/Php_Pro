<?php

class model
{
    public $connection;
    public function __construct()
    {
        $this->connection = new mysqli('localhost','root','','22_12_25_24sep_oop_mvc_project');
    }

    // insert into tableusers(name,email,password) values("eto","je@registerhoyte","Kaipan");

    // $data = ['name'=>"x","email"=>"y","password"=>123]
    // insert('users',$data)

    public function insert($tbl,$data)
    {
        $col_arr = array_keys($data);  //[name,email,password]
        $col = implode(',',$col_arr); //name,email,password
        $val_arr = array_values($data);  //["x","y",123]
        $val = implode("','",$val_arr); //"x","y",123
        
        // insert into $tbl(name,email,password) values("eto","je@registerhoyte","Kaipan");
        // echo $sql = "insert into $tbl($col) values('$val')";
        $sql = "insert into $tbl($col) values('$val')";
        
        // exit();

        $run = $this->connection->query($sql);

        return $run;
    }



    // select * from users where id=7;
    // select email,password from users where id=7 and name="12312"; 
    
    // select * from table where 1==1 
    // and col1='sadf' and col2='sdf';

    function select_where($table, $where)
    {
        $col_arr = array_keys($where); //[name,email,password] 

        $val_arr = array_values($where); //[Kuldeep,k@gmail.com] 

        $select = "select * from $table where 1=1";

        $i = 0;

        foreach($where as $w)
        {
            $select.=" and $col_arr[$i] ='$val_arr[$i]'";
            // select * from $table where 1=1 and name='raviraj' and email='r@gmail.com'
            // $select = $select . " and $col_arr[$i] = '$val_arr[$i]'";

            $i++;
        }

        // echo $select;
        // exit();

        $run = $this->connection->query($select);
        return $run;

    }


    function select($tbl)
    {
        $sql = "select * from $tbl";
        $run = $this->connection->query($sql);
        
        while($fetch = $run->fetch_object())
        {
            $arr[] = $fetch;
        }

        return $arr;
    }


    function update($tbl, $data, $where)
    {
        $col_arr = array_keys($data);  //id,qty,pid,uid
        $val_arr = array_values($data);  //1,2,4,5 

        //update cart set qty=3, where pid=2 and uid=8
        $update = "update $tbl set ";   // update cart set
        $j = 0;
        $count = count($data);  //0
        foreach($data as $d)
            {
                if($count == $j+1)  //0 == 0+1//0==1
                {
                    $update .= "$col_arr[$j] = '$val_arr[$j]' ";  //qty = 3
                }
                else
                {
                    $update .= "$col_arr[$j] = '$val_arr[$j]', "; //qty=1
                    $j++;
                }
            }

        $update .= "where 1=1";  //where userid=6 and prd_id=2
        $wcol_arr = array_keys($where);
        $wval_arr = array_values($where);

        $i = 0;
        foreach($where as $d)
            {
                $update .= " and $wcol_arr[$i] = '$wval_arr[$i]'";
                $i++;
            }

        // echo $update;
        // exit(); 

        $run = $this->connection->query($update);

        return $run;

    }

    //select * from cart join products on cart.pid = products.id

    function select_join2($tbl1,$tbl2,$on)
    {
        $sel="select * from $tbl1 join $tbl2 on $on";  //query
        $run= $this->connection->query($sel);  //query run by conn
        while($fetch=$run->fetch_object())  //fetch data from mysql
            {
                $arr[]=$fetch;

            }

        if(!empty($arr))
            {
                return $arr;
            }

    }

      
}

?>


