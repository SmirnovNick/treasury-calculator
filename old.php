<?php
/*
Template Name: Калькулятор союза
*/
?>
<link href="http://mbch.guide/wp-content/themes/pixeled/css/aqcalc.css" rel="stylesheet">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<?php get_header(); ?>

<div id="main">

<div id="contentwrapper2">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6890262500545007"
     data-ad-slot="2887301977"
     data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></center>
<?php 
if (qtranxf_getLanguage() == 'en') {
    $languageArray = [
        "Map 1"     => "1. Learning the Ropes",
        "Map 2"     => "2. Linked Power",
        "Map 3"     => "3. Dividing Paths",
        "Map 4"     => "4. Kang's Deception",
        "Map 5"     => "5. A Conqueror's Castle",
        "Map 6"     => "6. Throne of Time",
        "Price"     => "Price",
        "Prestige"  => "Prestige",
        "Point"     => "Points",
        "Total"     => "Overall",
        "Day"       => "Day",
        "Sum"       => "Summary points",
        "Gold"      => "Gold",
        "Loyalty"   => "Loyalty",
        "Start Prestige" => "Starting Prestige",
        "Choose map"     => "Choose map",
        "AQ calc"        => "Alliance Quest Calculator",
        "Battle Chips"   => "Battle chips",
        "Over all"   => "For alliance",
        "For one"  => "For each"
    ];}elseif (qtranxf_getLanguage() == 'ru') {
    $languageArray = [
        "Map 1"     => "1. Изучение азов",
        "Map 2"     => "2. Объединненая мощь",
        "Map 3"     => "3. Разные пути",
        "Map 4"     => "4. Уловка Канга",
        "Map 5"     => "5. Замок завоевателя",
        "Map 6"     => "6. Престол времени",
        "Price"     => "Цена",
        "Prestige"  => "Престиж",
        "Point"     => "Очки",
        "Total"     => "Итого",
        "Day"       => "День",
        "Sum"       => "Сумарный счёт",
        "Gold"      => "Золото",
        "Loyalty"   => "Очки верности",
        "Start Prestige" => "Начальный престиж",
        "Choose map"     => "Выбор карты",
        "AQ calc"        => "Калькулятор союза",
        "Battle Chips"   => "Боевые жетоны",
        "Over all"   => "На союз",
        "For one"  => "На одного"];}



 ?>


<div class="calc_body">
<headline><? echo $languageArray["AQ calc"]; ?></headline>
<br />

<table class='tdcenter noback'>
<tr>
<td colspan="4"></td>
<td colspan="2"><? echo $languageArray["Start Prestige"]; ?><input id="startPrestige" class="calc_element input" type="" name="" value="0" /></td>
<td colspan="4"></td>
</tr>

<tr><td colspan="10" class="title" ><? echo $languageArray["Choose map"]; ?></td></tr>

<tr>
<? for ($i = 1; $i <= 5; $i++) {
echo '
<td colspan="2" width="20%">
    '.$languageArray["Day"].' '.$i.'<br />
    <select id="day_'.$i.'" width="100%" class="calc_element">
        <option value="1">'.$languageArray["Map 1"].'</option>
        <option value="2">'.$languageArray["Map 2"].'</option>
        <option value="3">'.$languageArray["Map 3"].'</option>
        <option value="4">'.$languageArray["Map 4"].'</option>
        <option value="5">'.$languageArray["Map 5"].'</option>
        <option value="6">'.$languageArray["Map 6"].'</option>
    </select>
</td>';}?>
</tr>

<tr><td colspan="10" class="title"><? echo $languageArray["Price"]; ?></td></tr>

<tr>
<? for ($i = 1; $i <= 5; $i++) {
echo '
<td width="5%"><img width="100%" src="/wp-content/uploads/loyalty.png"/></td>
<td width="15%"><input id="loyaltyDay'.$i.'" class="calc_element" value="0" hidden /><input id="loyaltyDay'.$i.'View" class="calc_element" value="0" readonly /></td>';}?>
</tr>
<tr>
<? for ($i = 1; $i <= 5; $i++) {
echo '
<td width="5%"><img width="100%" src="/wp-content/uploads/battle_chips.png"/></td>
<td width="15%"><input id="battleChipsDay'.$i.'" class="calc_element" value="0" hidden /><input id="battleChipsDay'.$i.'View" class="calc_element" value="0" readonly /></td>';}?>
</tr>
<tr>
<? for ($i = 1; $i <= 5; $i++) {
echo '
<td width="5%"><img width="100%" src="/wp-content/uploads/gold.png"/></td>
<td width="15%"><input id="goldDay'.$i.'" class="calc_element" value="0" hidden /><input id="goldDay'.$i.'View" class="calc_element" value="0" readonly /></td>';}?>
</tr>

<tr>
<td colspan="10" class="title"><? echo $languageArray["Prestige"]; ?></td>
</tr>
<tr>
<? for ($i = 1; $i <= 5; $i++) {
echo '<td colspan="2" width="20%"><input id="prestigeDay'.$i.'"  class="calc_element input" value="0" readonly /> </td>';}?>
</tr>


<tr>
<td colspan="10" class="title"><? echo $languageArray["Point"]; ?></td>
</tr>
<tr>
<? for ($i = 1; $i <= 5; $i++) {
echo '<td colspan="2" width="20%"><input id="pointsDay'.$i.'" class="calc_element input" type="" name="" value="0" hidden /><input id="pointsDay'.$i.'View" class="calc_element input" type="" name="" value="0" readonly /> </td>';}?>
</tr>
<tr>
<td colspan="10" class="title"><? echo $languageArray["Total"]; ?></td>
</tr>

<tr>
<td colspan="2" width="20%"></td>
<td width="5%"><img width="100%" src="/wp-content/uploads/loyalty.png"/></td>
<td class="sumTitle" width="15%"><? echo $languageArray["Loyalty"]; ?></td>
<td width="5%"><img width="100%" src="/wp-content/uploads/battle_chips.png"/></td>
<td class="sumTitle" width="15%"><? echo $languageArray["Battle Chips"]; ?></td>
<td width="5%"><img width="100%" src="/wp-content/uploads/gold.png"/></td>
<td class="sumTitle" width="15%"><? echo $languageArray["Gold"]; ?></td>
<td colspan="2"  width="20%"><? echo $languageArray["Sum"]; ?></td>
</tr>
<tr>
<td colspan="2" width="20%"><? echo $languageArray["Over all"]; ?></td>
<td colspan="2" width="20%"><input id="loyaltySum" class="calc_element input" value="0" readonly /></td>
<td colspan="2" width="20%"><input id="battleChipsSum" class="calc_element input" value="0" readonly /></td>
<td colspan="2" width="20%"><input id="goldSum" class="calc_element input" value="0" readonly /></td>
<td colspan="2" rowspan="2" width="20%"  ><input  id="pointSum"  class="calc_element input" value="0" readonly /></td>
</tr>
<tr>
<td colspan="2" width="20%"><? echo $languageArray["For one"]; ?></td>
<td colspan="2" width="20%"><input id="loyaltyOne" class="calc_element input" value="0" readonly /></td>
<td colspan="2" width="20%"><input id="battleChipsOne" class="calc_element input" value="0" readonly /></td>
<td colspan="2" width="20%"><input id="goldOne" class="calc_element input" value="0" readonly /></td>

</tr>

</table>

</div>
<script>


function points_sum() {
var pointsSum = parseInt(document.getElementById('pointsDay1').value)+parseInt(document.getElementById('pointsDay2').value)+parseInt(document.getElementById('pointsDay3').value)+parseInt(document.getElementById('pointsDay4').value)+parseInt(document.getElementById('pointsDay5').value);
 document.getElementById('pointSum').value = new Intl.NumberFormat('de-DE').format(pointsSum);

}
function points_calc(prestige, map,elementID,elementIDView) {

switch (map) {
    //-----------------------
    case '1': 
    var mapMulti =  parseInt(1);
    var prestigeMulti = 650;
    break;
    //-----------------------
    case '2':
    var mapMulti =  parseFloat(1.5);
    var prestigeMulti = 443;
    break;
    //-----------------------
    case '3':
    var mapMulti =  parseInt(2);
    if (prestige < 5000) {
        var prestigeMulti = 544;
    }else if (prestige < 6000) {
        var prestigeMulti = 529;  
    }else if (prestige < 7000) {
        var prestigeMulti = 489;  
    }else if (prestige < 8000) {
        var prestigeMulti = 474;  
    }else if (prestige > 8000) {
        var prestigeMulti = 465;  
    } 
    break;
    //-----------------------
    case '4':
    var mapMulti =  parseInt(3);
    if (prestige < 6000) {
        var prestigeMulti = 490;
    }else if (prestige < 7000) {
        var prestigeMulti = 479;  
    }else if (prestige < 8000) {
        var prestigeMulti = 459;  
    }else if (prestige > 8000) {
        var prestigeMulti = 490;  
    }    
    break;
    //-----------------------
    case '5':
    var mapMulti =  parseInt(7);  
    if (prestige < 5000) {
        var prestigeMulti = 445;
    }else if (prestige >= 5000) {
        var prestigeMulti = 449;
    }
    break;
    //-----------------------
    case '6': 
    var mapMulti =  parseInt(10);
    var prestigeMulti = 469;
    break;
    
}
document.getElementById(elementID).value = Math.round(parseInt(prestige)*mapMulti*parseInt(prestigeMulti));
document.getElementById(elementIDView).value = new Intl.NumberFormat('de-DE').format(Math.round(parseInt(prestige)*mapMulti*parseInt(prestigeMulti)));

}












<? for ($i = 1; $i <= 5; $i++) {
    echo'document.getElementById("day_'.$i.'").onchange = function() {
    prestige_calc(document.getElementById("startPrestige").value);
    treasury_calc(document.getElementById("day_'.$i.'").value,"goldDay'.$i.'","loyaltyDay'.$i.'","battleChipsDay'.$i.'","goldDay'.$i.'View","loyaltyDay'.$i.'View","battleChipsDay'.$i.'View");
    points_calc(document.getElementById("prestigeDay'.$i.'").value,document.getElementById("day_'.$i.'").value,"pointsDay'.$i.'","pointsDay'.$i.'View");
    points_sum();
    };';
} ?>
document.getElementById("startPrestige").onchange = function() {
    prestige_calc(document.getElementById("startPrestige").value);
    points_calc(document.getElementById("prestigeDay1").value,document.getElementById("day_1").value,"pointsDay1","pointsDay1View");
    points_calc(document.getElementById("prestigeDay2").value,document.getElementById("day_2").value,"pointsDay2","pointsDay2View");
    points_calc(document.getElementById("prestigeDay3").value,document.getElementById("day_3").value,"pointsDay3","pointsDay3View");
    points_calc(document.getElementById("prestigeDay4").value,document.getElementById("day_4").value,"pointsDay4","pointsDay4View");
    points_calc(document.getElementById("prestigeDay5").value,document.getElementById("day_5").value,"pointsDay5","pointsDay5View");
    points_sum();
};</script>
<?php 
if (qtranxf_getLanguage() == 'ru') { ?>С помощью этого калькулятора можно легко рассчитать сбор в казну союза как общую, так и для каждого игрока, а также посмотреть максимальное количество очков, которое может набрать союз на 100% закрывая все карты.
Особая благодарность <a style="text-decoration: underline;" href="https://vk.com/smirnoff_zp" target="_blank">Никите Смирнову</a> за создание калькулятора.<?php } elseif (qtranxf_getLanguage() == 'en') { ?>Using this calculator will help you to know about contribution to treasury - for each member and for a whole alliance. And also you can see max points that your alliance can get for exploring all maps all days by 100%.<?php } ?>

<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6890262500545007"
     data-ad-slot="4364035176"
     data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></center>
  <div class="topContent"><?php the_content('(читать полностью...)'); ?></div>
<?php endwhile; ?>

<?php else : ?>

<div class="topPost">
  <h2 class="topTitle"><a href="<?php the_permalink() ?>">Не найдено</a></h2>
  <div class="topContent"><p>К сожалению, по вашему запросу ничего не найдено. Вы можете воспользоваться <a href="#searchform">формой поиска</a> по сайту...</p></div>
</div> <!-- Closes topPost -->

<?php endif; ?>
<?php comments_template(); ?>
</div> <!-- Closes contentwrapper2-->

<!--<php get_sidebar(); ?>-->
<div class="cleared"></div>

</div><!-- Closes Main -->


<?php get_footer(); ?>