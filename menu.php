<!-- Início da Área do Cabeçalho -->
<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Início do Logo do Cabeçalho -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="index.php"><img src="assets/images/logo/logo_history.png" alt=""></a>
                            </div>
                        </div>
                        <!-- Fim do Logo do Cabeçalho -->

                        <!-- Início do Menu Principal do Cabeçalho -->
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="index.php">Apresentação</a>
                                    </li>

                                    <li>
                                        <a href="centro-documentacao.php">Centro de Documentação</a>
                                    </li>

                                    <li>
                                        <a href="pesquisas.php">Pesquisas</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.php">Colabore</a>
                                    </li>
                                    <li>
                                        <a href="about-us.php">Sobre Nós</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Fim do Menu Principal do Cabeçalho -->

                        <!-- Início dos Links de Ação do Cabeçalho -->
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Fim dos Links de Ação do Cabeçalho -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Fim da Área do Cabeçalho -->

<!-- Início do Cabeçalho para Dispositivos Móveis -->
<div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Início do Lado Esquerdo do Cabeçalho Móvel -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="index.php">
                                <div class="logo">
                                    <img src="assets/images/logo/logo_history.png" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Fim do Lado Esquerdo do Cabeçalho Móvel -->

                <!-- Início do Lado Direito do Cabeçalho Móvel -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--golden">
                        <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Fim do Lado Direito do Cabeçalho Móvel -->
            </div>
        </div>
    </div>
</div>
<!-- Fim do Cabeçalho para Dispositivos Móveis -->

<!-- Início da Seção do Menu Móvel Offcanvas -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Início do Cabeçalho do Menu Offcanvas -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div>
    <!-- Fim do Cabeçalho do Menu Offcanvas -->

    <!-- Início do Invólucro do Menu Móvel Offcanvas -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Início do Menu Móvel -->
        <div class="mobile-menu-bottom">
            <!-- Início da Navegação do Menu Móvel -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="#"><span>Apresentação</span></a>
                    </li>

                    <li>
                        <a href="centro-documentacao.php">Centro de Documentação</a>
                    </li>

                    <li>
                        <a href="pesquisas.php">Pesquisas</a>
                    </li>
                    <li>
                        <a href="contact-us.php">Colabore</a>
                    </li>
                </ul>
            </div>
            <!-- Fim da Navegação do Menu Móvel -->
        </div>
        <!-- Fim do Menu Móvel -->

        <!-- Início das Informações de Contato Móveis -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo/logo_history.png" alt=""></a>
            </div>

            <address class="address">
                <span>Endereço: ----------</span>
                <span>Telefone: +55 31 9940-8134</span>
                <span>Email: simelliana@gmail.com </span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
            <ul class="user-link">
                <li><a href="login_admin.php">Admin</a></li>
            </ul>
        </div>
        <!-- Fim das Informações de Contato Móveis -->
    </div>
    <!-- Fim do Invólucro do Menu Móvel Offcanvas -->
</div>
<!-- ...:::: Fim da Seção do Menu Móvel Offcanvas ::::... -->

<!-- Início da Seção da Barra de Pesquisa do Offcanvas -->
<div id="search" class="search-modal">
    <button type="button" class="close">×</button>
    <form action="search.php" method="POST" class="search-form">
        <input type="search" name="search_box" maxlength="100" placeholder="Pesquisar postagens" required />
        <button type="submit" class="btn btn-lg btn-golden" name="search_btn">Pesquisar</button>
    </form>
</div>

<!-- 
<form action="search.php" method="POST" class="search-form">
    <input type="text" name="search_box" class="box" maxlength="100" placeholder="search for blogs" required>
    <button type="submit" class="fas fa-search" name="search_btn"></button>
</form> -->

<!-- Fim da Seção da Barra de Pesquisa do Offcanvas -->

<!-- Sobreposição do Offcanvas -->
<div class="offcanvas-overlay"></div>