<?php

$rss_url = 'https://elpais.com/info/rss';

$rss = simplexml_load_file($rss_url);

if ($rss === false) {
    echo "Error: No se pudo cargar el archivo RSS.";
} else {
    
    echo "Título del canal: " . $rss->channel->title . "\n";

    
    foreach ($rss->channel->item as $item) {
        echo "Título del artículo: " . $item->title . "\n";
        echo "Enlace: " . $item->link . "\n";
        echo "Descripción: " . $item->description . "\n";
        echo "---------------------\n";
    }
}
?>
