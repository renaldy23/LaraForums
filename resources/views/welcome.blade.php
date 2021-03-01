<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset("img/llogo.png") }}">
    <title>LaraForums</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="{{ asset("js/app.js") }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset("img/llogo.png") }}" alt=""></a>
            <a href="/" id="title-link"><h5>araForums</h5></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#back">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#intro">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Sign</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="back">
        <img src="{{ asset("img/backs.jpg") }}" alt="">
    </section>
    <section id="intro">
        <div class="container">
            <h3 class="text-center mb-0">Introduction</h3>
            <hr>
            <div class="container-fluid bg-light p-3">
                <p><b>LaraForums</b> adalah sebuah website forum yang membahas mengenai masalah teman-teman sekalian di dalam dunia teknologi informasi , di dalam website ini teman-teman 
                    bisa memberikan pertanyaan terkait masalah teman-teman , nanti teman-teman Users LaraForums yang lain akan menjawab pertanyaan teman-teman , teman-teman pun bisa memberikan jawaban untuk pertanyaan teman-teman yang  lain:) . 
                    Tentunya dengan bahasa yang sopan ya teman-teman , <b>Into Another Level of Programming , Enjoy the Jouney</b></p>
            </div>
        </div>
    </section>
    <section id="features">
        <div class="container">
            <h3 class="text-center">Features</h3>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jawaban Cepat & Tepat</h5>
                            <p class="card-text"><b>LaraForums</b> memiliki banyak kontributor yang dapat 
                                membantu kamu 24/7 , sehingga masalah kamu dapat cepat terselesaikan dan dalam project kamu ,
                                kamu bisa memiliki progress yang cepat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kontribusi Expert</h5>
                            <p class="card-text">Di dalam <b>LaraForums</b> banyak expert yang berkontribusi , sehingga masalah 
                                yang kamu hadapi bisa di selesaikan dengan sesegera mungkin oleh para expert tersebut</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Online Portofolio</h5>
                            <p class="card-text">Portofolio bagaikan asset untuk mu , semakin kamu 
                                aktif dalam menjawab pertanyaan-pertanyaan teman-teman yang lain 
                                semakin kamu membuktikan bahwa kamu adalah programmer yang berkualitas </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Easy to Used and Simply Design</h5>
                            <p class="card-text"><b>LaraForums</b> sangat mudah digunakan ,tampilan simple dan tidak akan buatmu 
                                menjadi pusing , kamu menjadi betah untuk berlama-lama di website LaraForums , 
                                untuk memantau permasalahan temen-temen yang lain</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="footer">
        <h5 class="text-center">&copy;2021 - LaraForums</h5>
        <p class="text-center">laraforums@info.com</p>
    </section>
</body>
</html>