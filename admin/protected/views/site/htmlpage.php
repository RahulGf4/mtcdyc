<style type="text/css">
h1, h2{
    text-align: center;
}
table{
    margin: auto;
    border: 1px solid gray;
      border-collapse: collapse;
      
}
table td,table th{
     border-left: 1px solid gray;
     border-right: 1px solid gray;
     border-bottom: 1px solid gray;
        padding: 5px 10px;
}
table th{
  border: 1px solid gray;
}
.approve{
      position: fixed;
  bottom: 20px;
  right: 332px;
}
</style>
<?php 
     $participants = Yii::app()->db->createCommand("SELECT cl.church_name, p.pName FROM 
        chruch_list cl JOIN participants p on cl.id = p.cid WHERE cl.id='".base64_decode($_GET['id'])."'")->queryRow();
         $dataJson = json_decode($participants['pName']);
?>
<page>
<div>
<h1>
Diocesan Youth Conference 2015
</h1>

</div>
<br /><h2> <?= $participants['church_name']; ?>'s Participants List</h2><br />
<?php
     

        $participants = array();
        $j=0;
        while ( $j< count($dataJson)/5) {
            for ($i=0; $i <5 ; $i++) { 
                $participants[$j][$i]=$dataJson[$i+$j*5]->value;
            }
                $j++;
        }

        echo "<table>";
        echo $th="<tr><th>#</th><th>Name</th><th>Mobile</th><th>Age</th><th>Gender</th><th>Email</th></tr>";
        $tr='';
       
        foreach ($participants as $key => $value) {
           $tr.= "<tr><td>".$key+1."</td><td>".$value[0]."</td><td>".$value[1]."</td><td>".$value[2]."</td><td>".$value[3]."</td><td>".$value[4]."</td></tr>";
        }
        echo $tr;
        echo "</table>";
        echo '<div style="position: absolute; bottom: 100px; right: 152px;"><b>Approved by Vicar</b></div>';
       
?>

</page>