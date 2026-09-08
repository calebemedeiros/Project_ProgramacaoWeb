<?php
include('layouts/header.php');

$data_nascimento = '';
if (isset($_POST['data_nascimento'])) {
    $data_nascimento = $_POST['data_nascimento'];
}

libxml_use_internal_errors(true);
$signos = simplexml_load_file("signos.xml");
libxml_clear_errors();

// Um ano bissexto de referência permite comparar também o dia 29/02.
function adaptarData($dia_mes) {
    return DateTime::createFromFormat('!d/m/Y', $dia_mes . '/2000');
}
$signo_encontrado = null;
$erro = '';

// A validação no servidor também protege contra envios fora do formulário.
$data = is_string($data_nascimento) && preg_match('/\A[0-9]{4}-[0-9]{2}-[0-9]{2}\z/', $data_nascimento)
    ? DateTime::createFromFormat('!Y-m-d', $data_nascimento)
    : false;

if (!$data || $data->format('Y-m-d') !== $data_nascimento) {
    $erro = 'Informe uma data de nascimento válida para consultar seu signo.';
} else {
    if ($signos === false) {
        $erro = 'Não foi possível carregar os signos. Tente novamente mais tarde.';
    } else {
        $data_comparacao = adaptarData($data->format('d/m'));

        foreach ($signos->signo as $signo) {
            $inicio = adaptarData((string) $signo->dataInicio);
            $fim = adaptarData((string) $signo->dataFim);

            if ($inicio <= $fim) {
                $pertence = $data_comparacao >= $inicio && $data_comparacao <= $fim;
            } else {
                // Capricórnio começa em dezembro e termina em janeiro.
                $pertence = $data_comparacao >= $inicio || $data_comparacao <= $fim;
            }

            if ($pertence) {
                $signo_encontrado = $signo;
                break;
            }
        }

        if ($signo_encontrado === null) {
            $erro = 'Não foi encontrado um signo para essa data.';
        }
    }
}

function escapar($texto) {
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

?>
<body>
    <main class="container py-4 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <section class="consulta card shadow-sm rounded-4 overflow-hidden" aria-labelledby="titulo">
            <div class="card-body p-4 p-md-5">
            <?php if ($erro !== ''): ?>
                <h1 id="titulo" class="display-6 fw-bold mb-3">Vamos tentar novamente?</h1>
                <p class="alert alert-warning" role="alert"><?= escapar($erro) ?></p>
            <?php else: ?>
                <img src="<?= escapar($signo_encontrado->icone) ?>" alt="Símbolo de <?= escapar($signo_encontrado->signoNome) ?>" width="96" height="96" class="d-block mb-4">
                <p class="subtitulo small fw-bold text-uppercase mb-3">SEU SIGNO É</p>
                <h1 id="titulo" class="display-6 fw-bold mb-3"><?= escapar($signo_encontrado->signoNome) ?></h1>
                <p class="periodo badge rounded-pill fw-normal fs-6 mb-3 px-3 py-2">De <?= escapar($signo_encontrado->dataInicio) ?> a <?= escapar($signo_encontrado->dataFim) ?></p>
                <p class="text-muted">Data informada: <?= escapar($data->format('d/m/Y')) ?></p>
                <p class="border-top pt-4 mt-4 lh-lg"><?= escapar($signo_encontrado->descricao) ?></p>
            <?php endif; ?>
            <a href="index.php" class="btn btn-primary w-100 mt-3 py-3">Voltar e consultar outra data</a>
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
