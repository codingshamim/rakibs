<?php
$footerSql = "select * from admindetails";
$footerQuery = mysqli_query($conn,$footerSql);
$footer  = mysqli_fetch_assoc($footerQuery);


?>
<footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                   <p> <?php echo $footer['adminFoot'] ?> </p>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">All rights reserved</div>
                </div>
            </div>
        </footer>
    </main>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="assets/js/vendors/chart.js"></script>
    <script src="assets/js/main.js?v=1.0.0"></script>
    <script src="assets/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>