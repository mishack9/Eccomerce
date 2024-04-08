<?php
$url = "bookscrape.com";
foreach($url->find('<img>') as $data){
    echo $data->src;
}