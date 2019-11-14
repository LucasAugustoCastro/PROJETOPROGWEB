<?php
function busca($query, $path) {

}

function idf($keyword, $corpus) {
    $n = count($corpus);
    $dft = doc_contain_term($keyword, $corpus);
    return log10($n/$dft);
}

function tf_idf($keyword, $text, $corpus) {
    $tf = term_freq($keyword, $text);
    $idf = idf($keyword, $corpus);
    return $tf * $idf;
}

function term_freq($keyword, $corpus) {
    $freq = 0;
    $exploded_corpus = explode(" ", $corpus)
    foreach($exploded_corpus as $word) {
        if($word == $keyword) {
            $freq = $freq + 1;
        }
    }
    if($freq == 0){
        return 0;
    }
    return $freq / count($exploded_corpus);
}

function doc_contain_term($keyword, $corpus) {
    $qnt_doc = 0;
    foreach($corpus as $doc){
        if(strpos($doc, $keyword)) {
            $qnt_doc = $qnt_doc + 1;
        }
    }
    return $qnt_doc;
}

function bag_of_words($corpus) {
    $bag = [];
    foreach($corpus as $phrase) {
        $exploded_phrase = explode(" ", $phrase);
        foreach($exploded_phrase as $word) {
            if(!in_array($word, $bag)) {
                array_push($bag, $word);
            }
        }
    }
}

function coeficiente_similaridade($keyword, $text, $corpus) {
    
}

function getCorpus($path) {
    $xml_object = simplexml_load_file('../database/'.$path) or die("Error: Cannot create object");
    $corpus = [];
    foreach($xml_object as $mensagem){
        $text = $mensagem['de']." ".$mensagem['cc']." ".$mensagem['assunto']." ".$mensagem['mensagem'];
        array_push($corpus, $text);
    }
    return $corpus;
}
?>