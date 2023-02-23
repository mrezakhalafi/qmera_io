<style>
    /* #firstlogin .modal-body {
        min-height: 700px;
    } */

    .vertical-center {
        min-height: 50%;
        /* Fallback for vh unit */
        min-height: 50vh;
        /* You might also want to use
                                'height' property instead.
                                
                                Note that for percentage values of
                                'height' or 'min-height' properties,
                                the 'height' of the parent element
                                should be specified explicitly.
        
                                In this case the parent of '.vertical-center'
                                is the <body> element */

        /* Make it a flex container */
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;

        /* Align the bootstrap's container vertically */
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;

        /* In legacy web browsers such as Firefox 9
            we need to specify the width of the flex container */
        width: 100%;

        /* Also 'margin: 0 auto' doesn't have any effect on flex items in such web browsers
            hence the bootstrap's container won't be aligned to the center anymore.
        
            Therefore, we should use the following declarations to get it centered again */
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
    }

    .carousel-control-next,
    .carousel-control-prev {
        width: 10%;
    }

    @media (max-width:768px) {
        #copyright-footer {
            text-align: center;
        }
    }

    @media (min-width: 1024px) {
        #slogan {
            float: right;
        }
    }

    .main-footer {
        background: #f4f6f9;
        border: unset;
    }
</style>


<footer class="main-footer d-none">
    <div class="container-fluid">
        <div class="row" id="copyright-footer">
            <div class="col-12 col-lg-6">
                <strong>Copyright &copy; 2021 Qmera.</strong>
                All rights reserved.
            </div>
            <div class="col-12 col-lg-6">
                <strong><span id="slogan"><span style="color:black;">Customer Engagement, </span><span style="color:#f2ad33;">Made Easy</span></span></strong>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- /.content-wrapper -->
</div>

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- <script src="jquery.validate.min.js"></script> -->

<!-- compressor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.0.7/compressor.js"></script>


<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>

<script src="https://omnipotent.net/jquery.sparkline/2.1.2/jquery.sparkline.min.js"></script>