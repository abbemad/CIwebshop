<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <body>

   <!-- Search form (start) -->
   <form method='post' action="<?= base_url() ?>index.php/User/loadRecord" >
     <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Submit'>
   </form>
   <br/>

   <!-- Posts List -->
   <table border='1' width='100%' style='border-collapse: collapse;'>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Image?</th>
    </tr>
    <?php 
    // $sno = $row+1;
    foreach($result as $data){

      $content = substr($data['body'],0, 180)." ...";
      echo "<tr>";
    //   echo "<td>".$sno."</td>";
      echo "<td><a href='".$data['slug']."' target='_blank'>".$data['title']."</a></td>";
      echo "<td>".$content."</td>";
      echo "</tr>";
    //   $sno++;

    }
    if(count($result) == 0){
      echo "<tr>";
      echo "<td colspan='3'>No record found.</td>";
      echo "</tr>";
    }
    ?>
   </table>

   <!-- Paginate -->
   <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>
