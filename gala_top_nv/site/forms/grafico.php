<?php
 // Importar o módulo
 require("phplot-6.1.0/phplot.php");
 
 // Instanciar o gráfico com tamanho pré-definido
 // Deixar em branco faz com que o gráfico encaixe na janela
 $grafico = new PHPlot(800,600);
 
 // Definindo o formato final da imagem
 $grafico->SetFileFormat("png");
 
 // Definindo o título do gráfico
 $grafico->SetTitle("Grafico Exemplo\nseucurso.com.br");
 
 // Tipo do gráfico
 // Por ser: lines, bars, boxes, bubbles, candelesticks, candelesticks2, linepoints, ohlc, pie, points, squared, stackedarea, stackedbars, thinbarline
 $grafico->SetPlotType("lines");
 
 // Título dos dados no eixo Y
 $grafico->SetYTitle("Vezes");
 
 // Título dos dados no eixo X
 $grafico->SetXTitle("Dias");
 
 // dados do gráfico
 $dados = array(
 array('Dom', 12),
 array('Seg', 20),
 array('Ter', 7),
 array('Qua', 2),
 array('Qui', 6),
 array('Sex', 4),
 array('Sáb', 1)
 );
 
 $grafico->SetDataValues($dados);
 
 //Exibimos o gráfico
 $grafico->DrawGraph();
?>
 