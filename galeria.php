<?php
$diretorio = "fotos/";
$fotos = array_diff(scandir($diretorio), array('.', '..'));
$fotos = array_values($fotos); // reorganizar índices
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria - 15 anos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="galeria-header">
    <h1>Galeria de Fotos</h1>
    <p>Clique para ampliar e baixar</p>
</header>

<div class="gallery" id="gallery">
    <?php foreach ($fotos as $foto): ?>
        <div class="foto-box">
            <img src="fotos/<?= $foto ?>" alt="<?= $foto ?>" onclick="abrirModal('fotos/<?= $foto ?>')">
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <span id="close">&times;</span>
    <img id="modalImg">
    <a id="downloadBtn" download class="btn-theme">Baixar Foto</a>
</div>

<script>
let modal = document.getElementById("modal");
let modalImg = document.getElementById("modalImg");
let downloadBtn = document.getElementById("downloadBtn");
let closeBtn = document.getElementById("close");

function abrirModal(src) {
    modal.style.display = "block";
    modalImg.src = src;
    downloadBtn.href = src;
}

closeBtn.onclick = () => modal.style.display = "none";
window.onclick = (e) => { if (e.target == modal) modal.style.display = "none"; }
</script>

</body>
</html>
