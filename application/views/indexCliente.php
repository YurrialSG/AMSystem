<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
<!-- Icon -->
<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
<!-- Slicknav -->
<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
<!-- Owl carousel -->
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.css">
<!-- Slick Slider -->
<link rel="stylesheet" type="text/css" href="assets/css/slick.css" >
<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" >
<!-- Animate -->
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<!-- Main Style -->
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!-- Responsive Style -->
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

</head>
<body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="icon-menu"></span>
                        <span class="icon-menu"></span>
                        <span class="icon-menu"></span>
                    </button>
                    <a href="<?= base_url() ?>" class="navbar-brand"><img src="assets/img/AMSystem.png" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-left clearfix">
                        <li class="nav-item active">
                            <a class="nav-link" href="#hero-area">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">
                                Serviços
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feature">
                                Sobre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">
                                Contato
                            </a>
                        </li>
                    </ul>
                    <div class="btn-sing float-right">
                        <a class="btn btn-border" href="<?= base_url('usuarios/login') ?>">Login</a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Start -->
            <ul class="mobile-menu navbar-nav">
                <li>
                    <a class="page-scroll" href="#hero-area">
                        Home
                    </a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">
                        Serviços
                    </a>
                </li>
                <li>
                    <a class="page-scroll" href="#feature">
                        Sobre
                    </a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">
                        Contato
                    </a>
                </li>
            </ul>
            <!-- Mobile Menu End -->

        </nav>
        <!-- Navbar End -->

        <!-- Hero Area Start -->
        <div id="hero-area" class="hero-area-bg">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="contents text-center">
                            <h2 class="head-title wow fadeInUp">AMSystem<br> Sistema de Gerenciamento de Acidentes</h2>
                            <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                                <a href="<?= base_url('usuarios/cadastrar') ?>" class="btn btn-common">Cadastrar-se</a>
                            </div>
                        </div>
                        <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                            <img class="img-fluid" src="assets/img/telaInicial.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->

    <!-- Services Section Start -->
    <section id="services" class="section-padding">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Nossos Serviços</h2>
            </div>
            <div class="row">
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
                        <div class="icon">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Empresa</a></h3>
                            <p>Possibilidade de cadastrar informações de diversas empresas na qual você trabalha em um só lugar. Sistema limpo e visual para todos os tipos de empresas.</p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="lni-bar-chart"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Funcionários</a></h3>
                            <p>Registro de funcionários, juntamente com seu setor a função desempenhada, tendo a possibilidade de alteração e exclusão caso for necessário.</p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
                        <div class="icon">
                            <i class="lni-briefcase"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Acidentes</a></h3>
                            <p>Acidentes registrados são atrelados ao funcionário que sofreu o acidente, em sintonia com o tipo de risco, o registro da medição realiadas, entre outros fatores.</p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
                        <div class="icon">
                            <i class="lni-pencil-alt"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Mensagens</a></h3>
                            <p>Com muita facilidade é possivel registras mensagens de atividades e/ou metas futuras que devem ser realizadas, como por exemplo, avisos pessoais ao funcionários ou treinamentos a serem realizados.</p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
                        <div class="icon">
                            <i class="lni-mobile"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Normas Regulamentadoras - NR's</a></h3>
                            <p>Disponivel o acesso as Normas Regulamentadoras - NR's do Ministerio do Trabalho de forma simples e muito rápida, sendo entre a NR 01 até NR 36. </p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
                        <div class="icon">
                            <i class="lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Setores</a></h3>
                            <p>Setores são atrelados as empresas, aos funcionários e aos acidentes decorrentes da atividade e do ambiente de trabalho, mediante análise quantitativa ou qualitativa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->


    <!-- Feature Section Start -->
    <div id="feature">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h2 class="title-hl wow fadeInLeft" data-wow-delay="0.3s">Mais sobre nós</h2>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="features-box wow fadeInLeft" data-wow-delay="0.3s">
                                        <div class="features-icon">
                                            <i class="lni-layers"></i>
                                        </div>
                                        <div class="features-content">
                                            <h4>
                                                Gráficos
                                            </h4>
                                            <p>
                                                Relacionados aos acidentes de trabalho decorrentes da função e do ambiente de trabalho. 
                                            </p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-6 col-sm-6">
                                    <div class="features-box wow fadeInLeft" data-wow-delay="0.6s">
                                        <div class="features-icon">
                                            <i class="lni-briefcase"></i>
                                        </div>
                                        <div class="features-content">
                                            <h4>
                                                Relatórios
                                            </h4>
                                            <p>
                                                Apresentação de registros possibilitando a impressão dos mesmos quando for necessário. 
                                            </p>
                                        </div>
                                    </div>
                                </div>           
                                <div class="col-md-6 col-sm-6">
                                    <div class="features-box wow fadeInLeft" data-wow-delay="0.9s">
                                        <div class="features-icon">
                                            <i class="lni-cog"></i>
                                        </div>
                                        <div class="features-content">
                                            <h4>
                                                Agilidade
                                            </h4>
                                            <p>
                                                Geração em sintonia com os registros atrelados ao sistema e as operações efetuadas.  
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="features-box wow fadeInLeft" data-wow-delay="1.2s">
                                        <div class="features-icon">
                                            <i class="lni-leaf"></i>
                                        </div>
                                        <div class="features-content">
                                            <h4>
                                                Segurança
                                            </h4>
                                            <p>
                                                Informações registradas somente são acessiveis aos usuários responsavel por tais informações. 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 padding-none">
                    <div class="feature-thumb wow fadeInRight" data-wow-delay="0.3s">
                        <img src="assets/img/feature/img-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Section End -->
    <!-- Subscribe Section Start -->
    <section id="Subscribes" class="subscribes section-padding">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10 col-lg-5">
                    <h4 class="wow fadeInUp" data-wow-delay="0.3s">Atualização</h4>
                    <p class="wow fadeInUp" data-wow-delay="0.6s">Existing customized ideas through client-based deliverables. <br> Compellingly unleash fully tested outsourcing</p>
                    <form for="">
                        <div class="subscribe wow fadeInDown" data-wow-delay="0.3s">
                            <input type="Email" class="form-control" name="email" placeholder="Adicione seu e-mail">
                            <button class="btn-submit" type="submit"><i class="lni-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="section-padding">    
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Contato</h2>
                    </div>
                </div>
            </div>
            <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.4s">          
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="contact-block">
                        <h2>Formulário para contato</h2>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="E-mail" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Assunto" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <textarea class="form-control" id="message" placeholder="Sua mensagem" rows="5" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button">
                                        <button class="btn btn-common" id="form-submit" type="submit">Enviar</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                        <div class="clearfix"></div> 
                                    </div>
                                </div>
                            </div>            
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="contact-right-area wow fadeIn">
                        <h2>Entrar em contato</h2>
                        <div class="contact-right">
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="lni-map-marker"></i>
                                </div>
                                <p>Pelotas, Rio Grande do Sul</p>
                            </div>
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="lni-envelope"></i>
                                </div>
                                <p><a href="#">email@gmail.com</a></p>
                                <p><a href="#">tomsaulnier@gmail.com</a></p>
                            </div>
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="lni-phone-handset"></i>
                                </div>
                                <p><a href="#">+42 3740 5967</a></p>
                                <p><a href="#">+99 1231 5967</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam excepturi quasi, ipsam voluptatem.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
                        <h3 class="footer-titel">Empresa</h3>
                        <ul>
                            <li><a href="">Comunicados de Imprensa</a></li>
                            <li><a href="">Missão</a></li>
                            <li><a href="">Strategy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
                        <h3 class="footer-titel">Sobre</h3>
                        <ul>
                            <li><a href="">Carreira</a></li>
                            <li><a href="">Equipe</a></li>
                            <li><a href="">Clientes</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.8s">
                        <h3 class="footer-titel">Encontrar-nos no</h3>
                        <div class="social-icon">
                            <a class="facebook" target="" href="https://www.facebook.com/"><i class="lni-facebook-filled"></i></a>
                            <a class="twitter" href="https://twitter.com/?lang=pt-br"><i class="lni-twitter-filled"></i></a>
                            <a class="instagram" href="https://www.instagram.com/?hl=pt-br"><i class="lni-instagram-filled"></i></a>
                            <a class="linkedin" href="https://br.linkedin.com/"><i class="lni-linkedin-filled"></i></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>     
    </footer> 
    <!-- Footer Section End -->

    <section id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright © 2018 AMSystem - Todos os direitos são reservados.</p>
                </div>
            </div>
        </div>
    </section>   

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.min.js"></script>
    <script src="assets/js/map.js"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script>

</body>
</html>
