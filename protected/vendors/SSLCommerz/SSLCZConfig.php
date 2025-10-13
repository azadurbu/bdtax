<?php

define("SSLCZ_STORE_ID", "test_bdtax001");
define("SSLCZ_STORE_PASSWD", "test_bdtax001@ssl");

//define("SSLCZ_STORE_ID", "bdtax001live");
//define("SSLCZ_STORE_PASSWD", "bdtax001live13926");

# IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX SYSTEM
define("SSLCZ_IS_SANDBOX", true);
//define("SSLCZ_IS_SANDBOX", false);

# IF BROWSE FROM LOCAL HOST, KEEP true
define("SSLCZ_IS_LOCAL_HOST", true); 
//define("SSLCZ_IS_LOCAL_HOST", false); 