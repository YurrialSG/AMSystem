<style>
    .blog-card {
        display: flex;
        flex-direction: column;
        margin: 1rem auto;
        box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.6%;
        background: #fff;
        line-height: 1.4;
        font-family: sans-serif;
        border-radius: 5px;
        overflow: hidden;
        z-index: 0;
        height: auto;
    }
    .blog-card a {
        color: inherit;
    }
    .blog-card a:hover {
        color: #5ad67d;
    }
    .blog-card:hover .photo {
        -webkit-transform: scale(1.3) rotate(3deg);
        transform: scale(1.3) rotate(3deg);
    }
    .blog-card .meta {
        position: relative;
        z-index: 0;
        height: 400px;
    }
    .blog-card .photo {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: center;
        transition: -webkit-transform 0.2s;
        transition: transform 0.2s;
        transition: transform 0.2s, -webkit-transform 0.2s;
    }
    .blog-card .details,
    .blog-card .details ul {
        margin: auto;
        padding: 0;
        list-style: none;
    }
    .blog-card .details {
        position: absolute;
        top: 0;
        bottom: 0;
        left: -100%;
        margin: auto;
        transition: left 0.2s;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 10px;
        width: 100%;
        font-size: 0.9rem;
    }
    .blog-card .details a {
        -webkit-text-decoration: dotted underline;
        text-decoration: dotted underline;
    }
    .blog-card .details ul li {
        display: inline-block;
    }
    .blog-card .details .author:before {
        font-family: FontAwesome;
        margin-right: 10px;
        content: "\f007";
    }
    .blog-card .details .date:before {
        font-family: FontAwesome;
        margin-right: 10px;
        content: "\f133";
    }
    .blog-card .description {
        padding: 1rem;
        background: #fff;
        position: relative;
        z-index: 1;
    }
    .blog-card .description h1,
    .blog-card .description h2 {
        font-family: Poppins, sans-serif;
    }
    .blog-card .description h1 {
        line-height: 1;
        margin: 0;
        font-size: 1.7rem;
    }
    .blog-card .description h2 {
        font-size: 1rem;
        font-weight: 300;
        text-transform: uppercase;
        color: #a2a2a2;
        margin-top: 5px;
    }
    .blog-card p {
        position: relative;
        margin: 1rem 0 0;
    }
    .blog-card p:first-of-type {
        margin-top: 1.25rem;
    }
    .blog-card p:first-of-type:before {
        content: "";
        position: absolute;
        height: 5px;
        background: #5ad67d;
        width: 35px;
        top: -0.75rem;
        border-radius: 3px;
    }
    .blog-card:hover .details {
        left: 0%;
    }
    @media (min-width: 640px) {
        .blog-card {
            flex-direction: row;
            max-width: 90%;
        }
        .blog-card .meta {
            flex-basis: 40%;
            height: auto;
        }
        .blog-card .description {
            flex-basis: 60%;
        }
        .blog-card .description:before {
            -webkit-transform: skewX(-3deg);
            transform: skewX(-3deg);
            content: "";
            background: #fff;
            width: 30px;
            position: absolute;
            left: -10px;
            top: 0;
            bottom: 0;
            z-index: -1;
        }
        .blog-card.alt {
            flex-direction: row-reverse;
        }
        .blog-card.alt .description:before {
            left: inherit;
            right: -10px;
            -webkit-transform: skew(3deg);
            transform: skew(3deg);
        }
        .blog-card.alt .details {
            padding-left: 25px;
        }
    }

</style>

<body>
    <div class="col-sm-10" style="margin-left: 200px; margin-top: -20px;">
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"> 
                <a href="<?= base_url('mensagem/open_new_mensagens') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-new-window"></span> Adicionar Mensagem
                </a>
            </div>
        </div>
        <br />
        <div class="blog-card">
            <div class="meta">
                <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
                <ul class="details">
                    <li class="author">John Doe</a></li>
                    <li class="date">Aug. 24, 2015</li>
                </ul>
            </div>
            <div class="description">
                <h1>Learning to Code</h1>
                <h2>Opening a door to the future</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
            </div>
        </div>
        <div class="blog-card alt">
            <div class="meta">
                <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)"></div>
                <ul class="details">
                    <li class="author">Jane Doe</li>
                    <li class="date">July. 15, 2015</li>
                </ul>
            </div>
            <div class="description">
                <h1>Mastering the Language</h1>
                <h2>Java is not the same as JavaScript</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <button type="button" id="btn_voltar" class="btn btn-block btn-default btn-circle" style="width: 100%;" onclick="document.location.href = '<?= base_url('admin') ?>'"> Voltar</button>
            </div>
        </div>
        <br />
    </div>
</body>
</html>