<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap newspraper Template</title>

    <!-- Bootstrap -->
    <link href='https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700|Libre+Baskerville' rel='stylesheet'
        type='text/css'>
    <link href="{{ asset('frontend') }}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div id="app">
        <public-master></public-master>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery-3.1.1.js"></script>


    <script src="{{ asset('frontend') }}/assets/js/swiper.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/min.js"></script>

    <script type="text/javascript" src="{{ asset('frontend') }}/assets/js/scrollUo.js"></script>



    <script src="{{ asset('frontend') }}/assets/js/gmaps.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/swiper.min.js"></script>


    <script>
        //client
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 1,
            paginationClickable: true,
            speed: 10000,
            spaceBetween: 30,
            autoplay: true,
            breakpoints: {

                1024: {
                    slidesPerView: 1,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });

    </script>


    <script type="text/javascript" src="{{ asset('frontend') }}/assets/js/scrollUo.js"></script>






</body>

</html>
