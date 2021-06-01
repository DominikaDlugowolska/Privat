<?php

    // api nyckeln
    $key = "ef2823e64e2f48378cbea5f338f29c25";
    $stad = "Stockholm";

    // URL till tjänsten
    $url = "https://newsapi.org/v2/everything?q=Apple&from=2021-05-31&sortBy=popularity&apiKey=$key";
    //echo $url;

    // Gör ett anrop
    $json = file_get_contents($url);
    // avkoda json
    $jsonData = json_decode($json);

    $random = rand(0, 20);
    

    // plocka ut koordinaterna
    $articles = $jsonData->articles;
    $author = $articles[$random]->author;
    $title = $articles[$random]->title;
    $content = $articles[$random]->content;

    echo "<p style=\"display: none\">Article: $author</p>";
    echo "<p style=\"display: none\">Title: $title</p>";
    echo "<p style=\"display: none\">Content: $content</p>";

    ?>