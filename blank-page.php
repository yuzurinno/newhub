<!DOCTYPE html>
<html lang="en">

<head>
    <title>Color Admin | Dashboard</title>
    <?php include 'includes/head.php'; ?>
    <style>
        {
            background-color: #e74c3c !important;
        }

        #bg-here {
            background-image: url(https://lh5.googleusercontent.com/DA7ByaAwj-ywdprjUj68Ug4tqxPcLHCZqhU3sxVNuGaYcrbOOLv_FQRabuNdiaq1wdc_x3xE_tVx4g=w1920-h969-rw);
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
        }

        .card {
            border: 2px solid #c0392b;
            background-color: #e74c3c;
        }

        .card-body {
            color: white !important;
            font-size: 14px;
        }

    </style>
</head>

<body>
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <?php include 'includes/header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div id="content" class="content">
            <?php include 'includes/breadcrumb.php'; ?>
            <!-- Content Here -->
            <div class="row" id="bg-here">
                <div class="col-md-12 text-center">
                    <h1>Happy</h1>
                    <h3>20th</h3>
                    <h1>Monthsary</h1>
                    <h4>baby ko</h4>
                </div>
                <div class="offset-md-4 col-md-4">
                    <div class="card">
                        <div class="card-body text-success">
                            <p>Alam mo po, napaka swerte ko po sayo. </p>
                            <p>Kasi ikaw po binigay ni Lord para sakin.</p>
                            <p>Kasi ikaw po ay nakilala ko.</p>
                            <p>Basta po, nandito lng po ako lagi para sayo.</p>
                            <p>Mahal na mahal po kita. Hinding hindi po kita iiwan. tutulugan lang xD.</p>

                                <span class="text-right float-right">Lubos nagmamahal,<br>
                                    Emil Tamayo
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/app-settings.php'; ?>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script>
        function getRandomArbitrary(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

        $(document).ready(function() {
            setInterval(function() {
                var screenHeight = $(document).height();
                var screenWidth = $(document).width();

                var startLeft = getRandomArbitrary(0, screenWidth);

                var timeRun = getRandomArbitrary(4000, 6000);
                var opacityR = Math.random() * (1 - 0.2) + 0.2;
                var sizeR = getRandomArbitrary(5, 20);

                var endLeft = getRandomArbitrary(startLeft - 100, startLeft + 100);

                var snow = document.createElement('span');

                $(snow).addClass('snow-item fa fa-heart').css({
                        'position': 'absolute',
                        'z-index': 'auto',
                        'color': '#ff0000',
                        'display': 'block',
                        'top': 0,
                        'left': startLeft,
                        'opacity': opacityR,
                        'font-size': sizeR + 'px'
                    })
                    .appendTo('body')
                    .animate({
                        'top': screenHeight - sizeR,
                        'left': endLeft
                    }, {
                        duration: timeRun,
                        easing: 'linear',
                        complete: function() {
                            $(this).fadeOut('fast', function() {
                                $(this).remove();
                            });
                        }
                    });

            }, 500);
        });

    </script>
</body>

</html>
