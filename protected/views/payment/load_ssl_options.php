<?php 
        foreach ($options as $keys => $values) : 
          if ($keys == "mobile") :
      ?>
        
                     
          <?php foreach ($values as $key => $value) : ?>    
            <?php if (in_array(strtolower($value['name']), ["bkash"])) : ?>
            
            <div class="payment-methode-wrapping">
              <?=$value['link']?></br>
              <p style="text-align:center"><?=$value['name']?></p>
            </div>

            <?php endif; ?>
    
          <?php endforeach; ?>
 
      <?php 
          endif;
        endforeach; 
      ?>
      
<!-- THIS IS WITHOUT MOBILE PAYMENT -->              
      <?php 
        foreach ($options as $keys => $values) : 
          if ($keys != "mobile") :
      ?>
        
                     
          <?php foreach ($values as $key => $value) : ?>    
            <?php if (in_array(strtolower($value['name']), ["visa", "master", "amex"])) : ?>
            
            <div class="payment-methode-wrapping">
              <?=$value['link']?></br>
              <p style="text-align:center"><?=$value['name']?></p>
            </div>

            <?php endif; ?>
    
          <?php endforeach; ?>
          <div class="clearfix"></div>
 
      <?php 
          endif;
        endforeach; 
      ?>