<?php
require 'vendor/autoload.php';
 
$produtos = [
    [
        'nome' => 'Relógio de Pulso',
        'categoria' => 'Acessórios',
        'preco' =>199,90,
        'descricao' => 'Relógio digital resistente à água',
    ],
    [
        'nome' => 'Cadeira de Escritório',
        'categoria' => '>Mobiliário',
        'preco' =>499,00,
        'descricao' => 'Cadeira ergonômica com apoio lombar',
    ],
    [
        'nome' => 'Notebook Gamer',
        'categoria' => 'Eletrônicos',
        'preco' => 3.299,00,
        'descricao' => 'Notebook com alto desempenho gráfico',
    ],
];
 
$mpdf = new \Mpdf\Mpdf();
$dataHoraGeracao = date('d/m/Y H:i:s');
 
$pdfContent = "<h1>Relatório de Produtos</h1>";
$pdfContent .= "<div style='text-align: right; font-size: 12px;'>Gerado em: {$dataHoraGeracao}</div>";
$pdfContent .= "<table style='width: 100%; border-collapse: collapse; margin: 20px 0;'>";
$pdfContent .= "<tr><th style='border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;'>Nome</th>";
$pdfContent .= "<th style='border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;'>Categoria</th>";
$pdfContent .= "<th style='border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;'>Preço (R$)</th>";
$pdfContent .= "<th style='border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;'>Descrição</th></tr>";
 
foreach ($produtos as $produto) {
    $pdfContent .= "<tr>";
    $pdfContent .= "<td style='border: 1px solid #ddd; padding: 8px;'>{$produto['nome']}</td>";
    $pdfContent .= "<td style='border: 1px solid #ddd; padding: 8px;'>{$produto['categoria']}</td>";
    $pdfContent .= "<td style='border: 1px solid #ddd; padding: 8px;'>" . number_format($produto['preco'], 2, ',', '.') . "</td>";
    $pdfContent .= "<td style='border: 1px solid #ddd; padding: 8px;'>{$produto['descricao']}</td>";
    $pdfContent .= "</tr>";
}
 
$pdfContent .= "</table>";
 
$mpdf->WriteHTML($pdfContent);
$mpdf->Output('relatorio_produtos.pdf', 'D');
?>
