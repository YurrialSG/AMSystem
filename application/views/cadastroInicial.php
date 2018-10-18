<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

<style>
    body {
        margin: auto;
        background: white; 
        font-family: 'Open Sans', sans-serif;
    }

    .info p {
        text-align:center;
        color: #999;
        text-transform:none;
        font-weight:600;
        font-size:15px;
        margin-top:2px
    }

    .info i {
        color:#F6AA93;
    }
    form h1 {
        font-size: 18px;
        background: #F6AA93 none repeat scroll 0% 0%;
        color: rgb(255, 255, 255);
        padding: 15px 25px;
        border-radius: 5px 5px 0px 0px;
        margin: auto;
        text-shadow: none; 
        text-align:left
    }

    form {
        border-radius: 5px;
        max-width:800px;
        width:100%;
        margin: auto;
        background-color: #FFFFFF;
        overflow: hidden;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    }

    p span {
        color: #F00;
    }

    p {
        margin: 0px;
        font-weight: 500;
        line-height: 2;
        color:#333;
    }

    h1 {
        text-align:center; 
        color: #666;
        text-shadow: 1px 1px 0px #FFF;
        margin:50px 0px 0px 0px
    }

    input {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #eee;
        margin-bottom: 15px;
        width: 75%;
        height: 40px;
        float: left;
        padding: 0px 15px;
    }

    a {
        text-decoration:inherit
    }

    textarea {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #EEE;
        margin: 0;
        width: 75%;
        height: 130px; 
        float: left;
        padding: 0px 15px;
    }

    .form-group {
        overflow: hidden;
        clear: both;
    }

    .icon-case {
        width: 35px;
        float: left;
        border-radius: 5px 0px 0px 5px;
        background:#eeeeee;
        height:42px;
        position: relative;
        text-align: center;
        line-height:40px;
    }

    i {
        color:#555;
    }

    .contentform {
        padding: 40px 30px;
    }

    .bouton-contact{
        background-color: #81BDA4;
        color: #FFF;
        text-align: center;
        width: 100%;
        border:0;
        padding: 7px 25px;
        border-radius: 0px 0px 5px 5px;
        cursor: pointer;
        margin-top: 40px;
        font-size: 18px;
    }

    .leftcontact {
        width:49.5%; 
        float:left;
        border-right: 1px dotted #CCC;
        box-sizing: border-box;
        padding: 0px 15px 0px 0px;
    }

    .rightcontact {
        width:49.5%;
        float:right;
        box-sizing: border-box;
        padding: 0px 0px 0px 15px;
    }

    .validation {
        display:none;
        margin: 0 0 10px;
        font-weight:400;
        font-size:13px;
        color: #DE5959;
    }
</style>

<body>
    <form>
        <h1>Por favor preencha o formulário para acessar o sistema:</h1>
        <div class="contentform">
            <div class="leftcontact">
                <div class="form-group">
                    <p>Cep<span>*</span></p>
                    <span class="icon-case"><i class="fa fa-male"></i></span>
                    <input type="text" name="nom" id="nom"/>
                    <div class="validation"></div>
                </div> 

                <div class="form-group">
                    <p>Logradouro <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-user"></i></span>
                    <input type="text" name="prenom" id="prenom"/>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Número <span>*</span></p>	
                    <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" name="email" id="email"/>
                    <div class="validation"></div>
                </div>	

                <div class="form-group">
                    <p>Complemento <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-home"></i></span>
                    <input type="text" name="society" id="society"/>
                    <div class="validation"></div>
                </div>

            </div>

            <div class="rightcontact">	

                <div class="form-group">
                    <p>Bairro <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
                    <input type="text" name="adresse" id="adresse"/>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Cidade <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="postal" id="postal" />
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Estado <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="postal" id="postal"/>
                    <div class="validation"></div>
                </div>	

            </div>
        </div>
        <button type="submit" class="bouton-contact">Enviar</button>

    </form>	

</body>
</html>