            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © <?=date('Y')?> InHouse. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?=base_url()?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=base_url()?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=base_url()?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url()?>vendor/slick/slick.min.js">
    </script>
    <script src="<?=base_url()?>vendor/wow/wow.min.js"></script>
    <script src="<?=base_url()?>vendor/animsition/animsition.min.js"></script>
    <script src="<?=base_url()?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=base_url()?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=base_url()?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url()?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>vendor/select2/select2.min.js"></script>
    <script src="<?=base_url()?>vendor/jquery-ui.min.js"></script>

    <!-- Main JS-->
    <script src="<?=base_url('assets/')?>js/main.js"></script>
    <!-- Local Page JS -->
    <?php $this->load->view($script); ?>

</body>

</html>
<!-- end document-->
