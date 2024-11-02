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
