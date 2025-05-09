$filtoAno = isset($_GET['ano_ingresso']) ? $_GET['ano_ingresso'] : null;
$filtroNome = isset($_GET['nome']) ? $_GET['nome'] : null;
$estudantes = $controller->listar($filtroNome, $filtoAno);

<input type="text" id="nome" autocomplete="off" name="nome" placeholder="Digite o nome do estudante" value="<?= htmlspecialchars($filtroNome ?? '') ?>">
