<?php
require_once __DIR__ . '/vendor/autoload.php';


date_default_timezone_set('America/Sao_Paulo');


$produtos = [
    [
        'nome' => 'Caderno Universitário',
        'categoria' => 'Papelaria',
        'preco' => 19.90,
        'descricao' => 'Caderno universitário com 200 folhas pautadas.'
    ],
    [
        'nome' => 'Caneta Azul',
        'categoria' => 'Papelaria',
        'preco' => 2.50,
        'descricao' => 'Caneta esferográfica azul de ponta fina.'
    ],
    [
        'nome' => 'Garrafa Térmica',
        'categoria' => 'Utilidades Domésticas',
        'preco' => 45.00,
        'descricao' => 'Garrafa térmica de aço inoxidável com capacidade de 1L.'
    ],
    [
        'nome' => 'Fone de Ouvido',
        'categoria' => 'Eletrônicos',
        'preco' => 79.90,
        'descricao' => 'Fone de ouvido estéreo com cancelamento de ruído.'
    ]
];


$dataHoraGeracao = date("d/m/Y H:i");


$mpdf = new \Mpdf\Mpdf();


$html = '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; text-align: center; }
        .data-hora { text-align: right; font-size: 12px; color: #666; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #333; padding: 8px; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Relatório de Produtos</h1>
    <p class="data-hora">Data e Hora de Geração: ' . $dataHoraGeracao . '</p>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço (R$)</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>';

foreach ($produtos as $produto) {
    $html .= '
        <tr>
            <td>' . $produto['nome'] . '</td>
            <td>' . $produto['categoria'] . '</td>
            <td>' . number_format($produto['preco'], 2, ',', '.') . '</td>
            <td>' . $produto['descricao'] . '</td>
        </tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';


$mpdf->WriteHTML($html);


$mpdf->Output('relatorio_produtos.pdf', 'I'); 
?>
