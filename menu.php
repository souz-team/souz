<div class="list-sections">
   <p class="list-sections__title">Выбор раздела</p>

   <?php

      require_once 'config.php';
      require_once 'func/db.php';
       
        $menu = get_menu();
        $menu_tree = map_tree($menu);
        $menu_razdel = menu_to_string($menu_tree); 
        
        //$result = mysql_query ("SELECT * FROM Razdel");?>

       <ul class='list-sections__items'>
            <?= $menu_razdel; ?>
        </ul>
        
    <?php
      /*while ($row = mysql_fetch_array ($result)) {
         $id = $row['id'];
         $id_razdel = $row['P_id'];
         if ($id_razdel == 0) {
            echo "
               <ul class='list-sections__items'>
                  <li class='list-sections__item'>".$row ["Name"]."</li> 
               </ul>
            "; 
         }

         $result_p = mysql_query ("SELECT * FROM Razdel WHERE P_id = '$id'");

         while ($row = mysql_fetch_array ($result_p)) {

            if ($result_p) {
               echo "
                  <ul class='list-sections__subitems'>
                      <li class='list-sections__subitem'>
                        <a class='list-sections__name' href='view.php?id=".$row[0]."'>".$row ["Name"]."</a>
                     </li>
                  </ul>
               "; 
            }
         } 
      } */
     
      
    

    
    //echo $menu_razdel;                    
    //print_arr($menu_tree); 
        
   ?>
        
</div>

<!-- <script src = "js/jquery-3.2.1.min.js"></script> -->
<script src = "js/jquery.dcjqaccordion.2.9.js"></script>
<script src = "js/jquery.cookie.js"></script>
        
<script>
    $(document).ready(function(){
        $(".list-sections__items").dcAccordion();
    });
</script>     
