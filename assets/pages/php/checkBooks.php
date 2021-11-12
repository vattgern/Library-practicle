<?php
require 'connect.php';
function checkBooks($db){
    $result = $db->query("SELECT * FROM `books`");
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if(empty($data)){
        return false;
    } else{
        return $data;
    }
}
?>
<pre>
    <?php
        print_r(checkBooks($database));
    ?>
</pre>