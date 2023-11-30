<!-- HEAD -->
<!-- kode untuk memanggil file head.php -->


<?php include 'head.php' ?>

    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->
    

<!-- kode untuk memanggil file sidebar.php -->
        <!-- Sidebar Start -->
        <?php include 'sidebar.php' ?>
        
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- kode untuk memanggil file navbar.php -->
            <!-- Navbar Start -->
            <?php include 'navbar.php' ?>
            
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
           
            <?php echo $konten ?>
            <!-- konten ini untuk menampilkan data dari database -->

            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 mb-3 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class=" text-center ">
                            &copy; <a href="#">Si-Vosis</a>, All Right Reserved. 
                        </div>


                        <!-- <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div> -->


                    </div>
                </div>
            </div>


            
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../aset/lib/chart/chart.min.js"></script>
    <script src="../aset/lib/easing/easing.min.js"></script>
    <script src="../aset/lib/waypoints/waypoints.min.js"></script>
    <script src="../aset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../aset/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../aset/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../aset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Template Javascript -->
    <script src="../aset/js/main.js"></script>
</body>

</html>