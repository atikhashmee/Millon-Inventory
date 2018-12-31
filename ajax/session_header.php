<?php



                             session_start();

                              /* little work with session*/

                            if (!isset($_SESSION['u_id'])) 
                            {
                               ?>
                               <script>
                                 window.location.href='../logout.php?msg=Please do login again';
                               </script>
                               <?php
                            }
                            else 
                            {
                               $now = time();
                               if ($now > $_SESSION['expire']) 
                               {
                                   session_destroy();
                                   ?>
                                   <script>
                                     window.location.href='../logout.php?msg=session has expired login again';
                                   </script>
                                   <?php
                               }
                            }


?>