<?php include('layouts/header.php'); ?>
<body>
    <main class="container py-4 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <section class="consulta card shadow-sm rounded-4 overflow-hidden" aria-labelledby="titulo">
            <div class="card-body p-4 p-md-5">
            <img src="https://cdn-icons-png.magnific.com/256/3013/3013308.png" alt="Roda do zodíaco" width="80" height="80" class="d-block mb-4">
            <p class="subtitulo small fw-bold text-uppercase mb-3">OS SIGNOS DO ZODÍACO</p>
            <h1 id="titulo" class="display-6 fw-bold mb-3">Descubra seu signo</h1>
            <p class="text-muted mb-4">Informe sua data de nascimento para conhecer seu signo e algumas de suas características.</p>

            <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                <div class="mb-4">
                    <label for="data_nascimento" class="form-label fw-semibold">Data de nascimento</label>
                    <input type="date" class="form-control form-control-lg" id="data_nascimento" name="data_nascimento" required aria-describedby="ajuda-data">
                    <div id="ajuda-data" class="form-text">A consulta considera o dia e o mês do nascimento.</div>
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Consultar signo</button>
                </div>
            </form>
            </div>
        </section>
            </div>
        </div>
        <footer class="text-center text-muted small mt-4">Programação Web · Consulta de signos<br>
            <a href="https://www.magnific.com/author/magnific/icons" class="text-muted">Ícones: Freepik (atual Magnific)</a>
        </footer>
    </main>
</body>

</html>