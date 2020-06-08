<?php
require 'KutyaNevek.php';
require 'KutyaFajtak.php';
require 'Kutyak.php';

function beolvasNev(){
    $tomb=array();
    try {
        $file= file_get_contents("KutyaNevek.csv");
        $sorok=explode("\n", $file);
        array_shift($sorok);
        for ($i = 0; $i < count($sorok); $i++) {
            $split= explode(";",$sorok[$i]);
            $o=new KutyaNevek($split[0], $split[1]);
            $tomb[]=$o;
        }
    } catch (Exception $exc) {
        die("Hiba a fájl beolvasásakor! Kutyanév".$exc);
    }
    return $tomb;
}


function beolvasFajta(){
    $tomb=array();
    try {
        $file= file_get_contents("KutyaFajták.csv");
        $sorok=explode("\n", $file);
        array_shift($sorok);
        for ($i = 0; $i < count($sorok); $i++) {
            $split= explode(";",$sorok[$i]);
            $o=new KutyaFajtak($split[0], $split[1],$split[2]);
            $tomb[]=$o;
        }
    } catch (Exception $exc) {
        die("Hiba a fájl beolvasásakor! Kutyafajta".$exc);
    }
    return $tomb;
}


function beolvasKutyak(){
    $tomb=array();
    try {
        $file= file_get_contents("Kutyák.csv");
        $sorok=explode("\n", $file);
        array_shift($sorok);
        for ($i = 0; $i < count($sorok); $i++) {
            $split= explode(";",$sorok[$i]);
            $o=new Kutyak($split[0], $split[1],$split[2],$split[3],$split[4]);
            $tomb[]=$o;
        }
    } catch (Exception $exc) {
        die("Hiba a fájl beolvasásakor! Kutyafajta".$exc);
    }
    return $tomb;
}

$a= beolvasNev();
$b= beolvasFajta();
$c= beolvasKutyak();
//print_r($c);
echo '3. feladat: Kutyanevek száma: '.count($a).'<br> ';
$ossz=0;
foreach ($c as $value) {
    $ossz+=$value->getEletkor();
}
$atl=$ossz/count($c);
echo '6. feladat: Kutyák átlag életkora: '.number_format($atl,2,",","")."<br>";
echo '7. feladat:  Legidősebb kutya neve és fajtája: ';
$leg=null;
$max=0;
foreach ($c as $value) {
    if($value->getEletkor()>$max){
        $leg=$value;
        $max=$value->getEletkor();
    }
}
$legNev="";
foreach ($a as $v) {
    if($v->getId()==$leg->getNev_id()){
        $legNev=$v->getKutyaNev();
    }
}
$legFajta="";
foreach ($b as $va){
    if($va->getId()==$leg->getFajta_id()){
        $legFajta=$va->getNev();
    }
}
echo $legNev.', '.$legFajta.'<br> ';

//8. feladat: 
echo '8. feladat: Január 10.-én vizsgált kutya fajták:<br> ';
$vizsgalt=array();
foreach ($c as $item) {
    if(strpos($item->getUt_ell(), "2018.01.10")!==false){
        foreach ($b as $fajta) {
            if($item->getFajta_id()==$fajta->getId()){
                $vizsgalt[]=$fajta->getNev();
            }
        }
    }
}
$behuzas="&nbsp&nbsp&nbsp&nbsp&nbsp";
$stat=array_count_values($vizsgalt);


foreach ($stat as $key=>$value) {
    echo $behuzas.$key.": ".$value." kutya<br>";
}

//9. feladat: 
$lista=array();
foreach ($c as $value) {
    $lista[]= substr($value->getUt_ell(),0, strlen($value->getUt_ell())-1)."."; //a végén a szóközt pontra kell  cserélni
}
$stat2= array_count_values($lista);
arsort($stat2);

echo '9. feladat: Legjobban leterhelt nap: '. key($stat2).": ".reset($stat2)." kutya<br>";

$fajlba="";
$stat3=array();
foreach ($c as $item) {
    foreach ($a as $nev) {
        if($nev->getId()==$item->getNev_id()){
                $stat3[]= substr($nev->getKutyaNev(),0, strlen($nev->getKutyaNev())-1);
        }
    }
}
$stat4= array_count_values($stat3);
arsort($stat4);
foreach ($stat4 as $key=>$value) {
    $fajlba.=$key.";".$value."\n";
}
$myFile= fopen("Névstatisztika.txt", "w");
fwrite($myFile, $fajlba);
echo '10. feladat: névstatisztika.txt';