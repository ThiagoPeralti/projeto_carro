@extends('layouts.main')

@section('title', 'Projeto Carros - Página principal')

@section('content')
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/civic.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Carros</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Os melhores carros disponíveis!</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <div id="search-container" class="col-md-12">
            <h1>Busque um modelo de carro: </h1>
            <form action="/" method="GET">
                <input type="" id="search" name="search" class="form-control" placeholder="Procurar...">
                <input type="submit" id="btn_pesquisar" class="btn btn-primary" value="Pesquisar">
            </form>
        </div>
        
        <div id="cars-container" class="col-md-12">
            @if($search)
            <h2>Buscando por: {{ $search }}</h2>
            @else
            <h2>Carros disponíveis</h2>
            <p class="subtitle">Veja os carros disponíveis: </p>
            @endif 
            <div id="cards-container" class="row">
                @foreach($cars as $car)
                    <div class="card col-md-3">
                        <img src="img/car/{{ $car->image }}" alt="{{ $car->marca }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->marca }} {{ $car->modelo }}</h5>
                            <p class="card-ano">{{ $car->ano }}</p>
                            <p class="card-valor">R$ {{ $car->valor }}</p>
                            @auth
                                <a href="/cars/edit/{{ $car->id }}" class="btn btn-primary">Editar carro</a>
                                <form action="/cars/{{ $car->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary" id="delete"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                @endforeach
                @if(count($cars) == 0 && $search)
                    <p>Não foi possível encontrar nenhum carro com "{{ $search }}"! <a href="/">Clique aqui</a> para ver todos os carros...</p>
                    @elseif(count($cars) == 0)
                    <p>Não há eventos disponíveis</p>
                @endif
            </div>
        
        </div>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Sobre a loja...</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">Somos renomados no mercado por conta do ótimo atendimento e do preço justo (E não somos nós que estamos falando xD). Veja alguns dos comentários: </p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">"Ótimo atendimento e preço justo!" -Fulano ⭐⭐⭐⭐⭐</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">"Muito atenciosos!" -Ciclano ⭐⭐⭐⭐</p></div>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Nos contacte para fazer um orçamento sem compromisso...</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Nome completo</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nome é obrigatório</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">E-mail</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">E-mail é obrigatório.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email não é válido.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(XX) XXXXX-XXXX" data-sb-validations="required" />
                                <label for="phone">Número de telefone</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Um número de telefone é obrigatório.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Mensagem...</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Mensagem é obrigatória</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Formulário enviado com sucesso!</div>
                                    Para ativar esse formulário, se inscreva no canal do: 
                                    <br />
                                    <a href="https://youtube.com/c/ThiagoPeralti">Thiago Peralti</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Erro ao enviar mensagem!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Local</h4>
                        <p class="lead mb-0">
                            IFSP
                            <br />
                            Câmpus Votuporanga
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Acesse nossas redes</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Sobre o tema</h4>
                        <p class="lead mb-0">
                            Freelance é um tema grátis do Bootstrap que pode ser acessado em: 
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>ThiagoPeralti &copy; Todos os direitos reservados 2022</small></div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>