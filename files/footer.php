        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2018 IVM - Crafted with <i class="mdi mdi-heart text-danger"></i> by AH Soft.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/pages/dashborad.js"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- jquery datepicker -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <!-- Alertify js -->
        <script src="assets/plugins/alertify/js/alertify.js"></script>
        <script src="assets/pages/alertify-init.js"></script>

        <!-- search select link -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
           
          /* messge showing throughtout the website */
             function msg(msg,token,rel=0) 
            {
              var m = ""
               if (token === "su") 
               {
         m += "<h3 class='font-18'>Message <img src='assets/images/rightsign.png' height='30px' width='30px' /></h3><hr><p> "+msg+"</p>";
               }
               else if (token === "err") 
               {
         m += "<h3 class='font-18'>Problem <img src='assets/images/crosssign.png' height='30px' width='30px' /></h3><hr><p> "+msg+"</p>";
               }
               else if (token === "al") 
               {
         m += "<h3 class='font-18'>Warning<img src='assets/images/Alert_Symbol.png' height='30px' width='30px' /></h3><hr><p> "+msg+"</p>";
               }
               if (rel === 1) 
               {
                    alertify.alert(m,function(e){
                    e.preventDefault();
                    window.location.reload();
                    });
               }
               else 
               {
                    alertify.alert(m);
               }
        
            }

        
            function deleteItem(pagename,id) 
            {
                  alertify.confirm("Are you sure ?", function (ev) {
                  ev.preventDefault();
                var hbody = document.getElementById("wholehtmlfordelete").innerHTML;
                     alertify.confirm(hbody,function(e) 
                     {
                       window.location.href=pagename+'.php?del-id='+id;
                     },function(e)
                     {
                       // alert("cacel");
                     });
                     //msg(hbody,'al');
                   // window.location.href=pagename+'.php?del-id='+id;
                   },function(ev){
                    ev.preventDefault();
                   });
            }
        </script>

    </body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Nov 2018 15:46:44 GMT -->
</html>