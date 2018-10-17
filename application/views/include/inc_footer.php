<style>
    .footer-distributed{
        background-color: #292c2f;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font: bold 16px sans-serif;
        padding: 55px 50px;
        position: relative;
        bottom: 0px;
        clear: both;
    }

    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
        display: inline-block;
        vertical-align: top;
    }

    /* Footer left */

    .footer-distributed .footer-left{
        width: 40%;
    }

    /* The company logo */

    .footer-distributed h3{
        color:  #ffffff;
        font: normal 36px 'Cookie', cursive;
        margin: 0;
    }

    .footer-distributed h3 span{
        color:  #5383d3;
    }

    /* Footer links */

    .footer-distributed .footer-links{
        color:  #ffffff;
        margin: 20px 0 12px;
        padding: 0;
    }

    .footer-distributed .footer-links a{
        display:inline-block;
        line-height: 1.8;
        text-decoration: none;
        color:  inherit;
    }

    .footer-distributed .footer-company-name{
        color:  #8f9296;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
    }

    /* Footer Center */

    .footer-distributed .footer-center{
        width: 35%;
    }

    .footer-distributed .footer-center i{
        background-color:  #33383b;
        color: #ffffff;
        font-size: 25px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        text-align: center;
        line-height: 42px;
        margin: 10px 15px;
        vertical-align: middle;
    }

    .footer-distributed .footer-center i.fa-envelope{
        font-size: 17px;
        line-height: 38px;
    }

    .footer-distributed .footer-center p{
        display: inline-block;
        color: #ffffff;
        vertical-align: middle;
        margin:0;
    }

    .footer-distributed .footer-center p span{
        display:block;
        font-weight: normal;
        font-size:14px;
        line-height:2;
    }

    .footer-distributed .footer-center p a{
        color:  #5383d3;
        text-decoration: none;;
    }


    /* Footer Right */

    .footer-distributed .footer-right{
        width: 20%;
    }

    .footer-distributed .footer-company-about{
        line-height: 20px;
        color:  #92999f;
        font-size: 13px;
        font-weight: normal;
        margin: 0;
    }

    .footer-distributed .footer-company-about span{
        display: block;
        color:  #ffffff;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .footer-distributed .footer-icons{
        margin-top: 25px;
    }

    .footer-distributed .footer-icons a{
        display: inline-block;
        width: 35px;
        height: 35px;
        cursor: pointer;
        background-color:  #33383b;
        border-radius: 2px;

        font-size: 20px;
        color: #ffffff;
        text-align: center;
        line-height: 35px;

        margin-right: 3px;
        margin-bottom: 5px;
    }

    /* If you don't want the footer to be responsive, remove these media queries */

    @media (max-width: 880px) {

        .footer-distributed{
            font: bold 14px sans-serif;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right{
            display: block;
            width: 100%;
            margin-bottom: 0px;
            text-align: center;
        }

        .footer-distributed .footer-center i{
            margin-left: 0;
        }

    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<footer class="footer-distributed">

    <div class="footer-left">

        <h3>Access<span>Motos</span></h3>

        <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">Produtos</a>
            ·
            <a href="#">Sobre</a>
            ·
            <a href="#">Contato</a>
        </p>

        <p class="footer-company-name">Company Access Motos &copy; 2016</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>11111 Av. Bento Gonçalves</span> Pelotas, Rio Grande do Sul</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>0800 123 4567</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:accessmotos16@gmail.com">accessmotos16@gmail.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>Sobre a Access Motos</span>
            Neste local será inserido uma breve mensagem sobre a empresa Access Motos.
        </p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook-official"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>
    </div>

</footer>