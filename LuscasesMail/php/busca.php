<?php
session_start(); // nova sessao

function busca($query, $path) {
    
    
    $emails = [];
    
    foreach(getCorpus($path) as $text) {
        $coe = coeficiente_similaridade($query, $text, getCorpus($path));
        if($coe > 0) {
            array_push($emails, array_search($text, getCorpus($path)));
        }
    }
    getEmails($path, $emails);
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
    $exploded_corpus = explode(" ", $corpus);
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
        if (is_array($corpus)){
    foreach($corpus as $phrase) {
        $exploded_phrase = explode(" ", $phrase);
        foreach($exploded_phrase as $word) {
            if(!in_array($word, $bag)) {
                array_push($bag, $word);
            }
        }}
    }
}

function coeficiente_similaridade($keyword, $text, $corpus) {
    $soma = 0;
    foreach(bag_of_words($corpus) as $word) {
        $dij = tf_idf($word, $text, $corpus);
        $wqj = tf_idf($keyword, $text, $corpus);
        $soma = $soma + $dij * $wqj;
    }
    return $soma;
}

function getCorpus($path) {
    $xml_object = simplexml_load_file('../database/'.$path) or die("Error: Cannot create object");
    $corpus = [];
    foreach($xml_object as $mensagem){
        $text = $mensagem['remetente']." ".$mensagem['titulo']." ".$mensagem['conteudo'];
        array_push($corpus, $text);
    }
    return $corpus;
}

function getEmails($path, $lista) {
    $xml_object = simplexml_load_file('../database/'.$path) or die("Error: Cannot create object");
    $corpus = [];
    foreach($lista as $email){
        $text = $xml_object->$mensagem[$email];
        array_push($corpus, $text);
    }

    $xml = new DOMDocument("1.0");
    $xml_inbox = $xml->createElement("inbox");
    foreach($corpus as $email) {
        $xml_inbox->appendChild($email);
    }
    $xml->appendChild($xml_inbox);
    $xml->save('../database/email/busca/'.$_SESSION['user'].'.xml');
}

busca('aa', 'email/inbox/'.$_SESSION['user'].'.xml');

?>