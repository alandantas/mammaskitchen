<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="icon" type="image/png" href="{{asset('backend/img/favicon.png')}}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

        <title>Mamma's Kitchen</title>

        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}} ">
        <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/pricing.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <style>
            @foreach($sliders as $key=>$slider)
                .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{$key + 1}}) .item {
                background: url({{asset('uploads/slider/'.$slider->image)}});
                background-size: cover;
            }
            @endforeach
        </style>


        <script src="{{asset('frontend/js/jquery-1.11.2.min.js')}} "></script>
        <script type="text/javascript" src=" {{asset('frontend/js/jquery.flexslider.min.js')}}"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>

    </head>
    <body data-spy="scroll" data-target="#template-navbar">

        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img id="logo" src="{{asset('frontend/images/Logo_main.png')}}" class="logo img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#header-slider">HOME</a></li>
                        <li><a href="#about">Sobre</a></li>
                        <li><a href="#pricing">Cardápio</a></li>
                        <li><a href="#have-a-look">Destaques</a></li>
                        <li><a href="#reserve">Reservas</a></li>
                        <li><a href="#contact">Contato</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>


        <!--== 5. Header ==-->
        <section id="header-slider" class="owl-carousel">
            @foreach($sliders as $key=>$slider)
                <div class="item">
                    <div class="container">
                        <div class="header-content">
                            <h1 class="header-title">{{$slider->title}}</h1>
                            <p class="header-sub-title">{{$slider->sub_title}}</p>
                        </div> <!-- /.header-content -->
                    </div>
                </div>
            @endforeach
        </section>

        <!--== 6. About us ==-->
        <section id="about" class="about">
        <img src="{{asset('frontend/images/icons/about_color.png')}}" class="img-responsive section-icon hidden-sm hidden-xs">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                        </div>
                        <div class="col-xs-12 col-sm-6 dis-table-cell">
                            <div class="section-content">
                                <h2 class="section-content-title">Sobre</h2>
                                <p class="section-content-para">
                                    Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                                </p>
                                <p class="section-content-para">
                                    beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.  Where ignorance lurks, so too do the frontiers of discovery and imagination.
                                </p>
                            </div> <!-- /.section-content -->
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#about -->


        <!--==  7. Afordable Pricing  ==-->
        <section id="pricing" class="pricing">
            <div id="w">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Cardápio com Preços Acessíveis</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">Todas</li>
                                            @foreach($categories as $category)
                                                <li class="filter" data-filter="#{{$category->slug}}">{{$category->name}} <span class="badge">{{$category->items->count()}}</span> </li>
                                            @endforeach
                                        </ul><!-- @end #filter-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">
                                @foreach($items as $item)
                                    <li class="item dinner" id="{{$item->category->slug}}">
                                        <a href="#">
                                            <img src="{{asset('uploads/item/'.$item->image)}}" class="img-responsive" alt="item" style="height: 300px; width: 369px;" >
                                            <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$item->name}}</h3>
                                                {{$item->description}}
                                            </span>
                                            </div>
                                        </a>

                                        <h2 class="white">R${{$item->price}}</h2>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- <div class="text-center">
                                    <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                            </div> -->

                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!--== 14. Have a look to our dishes ==-->

        <section id="have-a-look" class="have-a-look hidden-xs">
        <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/food_color.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">

                        <div class="menu-gallery" style="width: 50%; float:left;">
                            <div class="flexslider-container">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu1.png')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu2.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu3.png')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu4.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu5.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu6.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu7.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu8.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu9.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu10.jpg')}}" />
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/images/menu-gallery/menu11.jpg')}}" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="gallery-heading hidden-xs color-bg" style="width: 50%; float:right;">
                            <h2 class="section-title">Veja alguns de nossos pratos</h2>
                        </div>


                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section>




        <!--== 15. Reserve A Table! ==-->
        <section id="reserve" class="reserve">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/reserve_black.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Reserve uma Mesa !</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                        </div>
                    </div> <!-- /.dis-table -->
                </div> <!-- /.row -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#reserve -->



        <section class="reservation">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/reserve_color.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class=" section-content">
                        <div class="row">
                            <div class="col-md-5 col-sm-6">
                                <form class="reservation-form" method="post" action="{{route('reservation.reserve')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control reserve-form empty iconified" name="name" id="name" placeholder="  &#xf007;  Nome">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control reserve-form empty iconified" id="email" placeholder="  &#xf1d8;  e-mail">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone"  placeholder="  &#xf095;  DDD+Telefone">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" id="datetimepicker1" placeholder="&#xf017;  Dia/Horário">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3" placeholder="  &#xf086;  Escreva sua mensagem..."></textarea>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                                <span><i class="fa fa-check-circle-o"></i></span>
                                                Fazer Reserva
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="col-md-2 hidden-sm hidden-xs"></div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="opening-time">
                                    <h3 class="opening-time-title">Funcionamento</h3>
                                    <p>Seg. a Qua : 11:00 - 01:30</p>
                                    <p>Qui. a Dom : 11:00 - 02:30</p>

                                    <div class="launch">
                                        <h4>Almoço</h4>
                                        <p>Seg a Sex: 11:00 - 15:00</p>
                                    </div>

                                    <div class="dinner">
                                        <h4>Jantar</h4>
                                        <p>Seg a Sab: 18:00 - 1:00</p>
                                        <p>Dom: 17:30 - 00:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>




        <section id="contact" class="contact">
            <div class="container-fluid color-bg">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell">
                        <h2 class="section-title">Contato</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <p>Av. Marechal Deodoro da Fonseca, 367</p>
                            <p>Pitangueiras - Guarujá/SP</p>
                            <p>13 3351-9999</p>
                            <p>example@mail.com</p>
                        </div>
                    </div>
                </div>
                <div class="social-media">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="center-block">
                                <li><a href="#" class="fb"></a></li>
                                <li><a href="#" class="twit"></a></li>
                                <li><a href="#" class="g-plus"></a></li>
                                <li><a href="#" class="link"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="row">
                             <form class="contact-form" method="post" action="{{route('contact.send')}}">
                                 @csrf
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input  name="name" type="text" class="form-control" id="name" placeholder="Nome">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="email"  placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Assunto">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <textarea name="message" type="text" class="form-control" id="message" rows="7" placeholder="Deixe aqui sua mensagem..."></textarea>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="submit" class="btn btn-send">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2018 <a href="#">Mamma's Kitchen</a> Desenvolvido por: <a href="https://github.com/alandantas"  target="_blank">Alan Dantas</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/jquery.mixitup.min.js')}}" ></script>
        <script src="{{asset('frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/jquery.hoverdir.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/jQuery.scrollSpeed.js')}}"></script>
        <script src="{{asset('frontend/js/script.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap-datetimepicker.pt-BR.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <script>
                        toastr.error('{{$error}}')
                    </script>
                </div>
            @endforeach
        @endif
        <script>
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: "dd MM yyyy - hh:ii",
                    autoclose: true,
                    todayBtn: true,
                    language: 'pt-BR'
                });
            })
        </script>

{!! Toastr::message() !!}
    </body>
</html>
