<?php
session_start(); // nova sessao

function busca($query, $path) {
    $corpus = getCorpus($path);
    $emails = [];
    foreach($corpus as $text) {
        $coe = coeficiente_similaridade($query, $text, $corpus);
        if($coe > 0) {
            array_push($emails, array_search($text, $corpus));
        }
    }
    getEmails($path, $emails);
}

function idf($keyword, $corpus) {
    $n = count($corpus);
    $dft = doc_contain_term($keyword, $corpus);
    if($dft != 0) {
        return log10($n/$dft);
    } else {
        return 0;
    }
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
    return $bag;
}

function coeficiente_similaridade($keyword, $text, $corpus) {
    $text_bag = bag_of_words($corpus);
    $soma = 0;

    foreach($text_bag as $word) {
        $dij= tf_idf($word, $text, $corpus);
        $wqj = tf_idf($word, $keyword, $corpus);
        $soma = $soma + $dij * $wqj;
    }
    return $soma;
}

function getCorpus($path) {
    $xml_object = simplexml_load_file('../database/'.$path) or die("Error: Cannot create object");
    $corpus = [];
    foreach($xml_object as $mensagem){
        $text = "HnNhabsdBHaivf328Hnas8 ".$mensagem['remetente']." ".$mensagem['titulo']." ".$mensagem['conteudo'];
        array_push($corpus, $text);
    }
    return $corpus;
}

function getEmails($path, $lista) {
    $xml_object = simplexml_load_file('../database/'.$path) or die("Error: Cannot create object");
    $corpus = [];

    $xml = new DOMDocument("1.0");
    
    $xml_inbox = $xml->createElement("inbox");

    foreach($lista as $mail){
        $id = $xml_object->email[$mail]['id'];
        $remetente = $xml_object->email[$mail]['remetente'];
        $titulo = $xml_object->email[$mail]['titulo'];
        $conteudo = $xml_object->email[$mail]['conteudo'];

        $xml_email = $xml-> createElement("email");
        $xml_email->setAttribute("id", $id);
        $xml_email->setAttribute("remetente", $remetente);
        $xml_email->setAttribute("titulo", $titulo);
        $xml_email->setAttribute("conteudo", $conteudo);

        $xml_inbox->appendChild($xml_email);
    }

    $xml->appendChild($xml_inbox);
    $xml->save('../database/email/busca/'.$_SESSION['user'].'.xml');
}

busca($_POST['search-input'], 'email/inbox/'.$_SESSION['user'].'.xml');

$xml_resultado = simplexml_load_file('../database/email/busca/'.$_SESSION['user'].'.xml') or die(json_encode(array('success' => 1)));

echo json_encode($xml_resultado);


?>