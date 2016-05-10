<?php
require 'config.php';

//date related
$date2 = strtotime("+1 hour"); //1 hour advanced
$checkdate = date('H', $date2).':'; //checks time/date of 1 hour forward
$checkdate2 = date('H').':';//current time
$ceqstart = date('H').':3';//concert eq start 30min
$f5min = date('H').':45';//eq announce :45min mark
//Ship Related
$ship = ''; //Specify Ship (ex: Ship01, Ship10)
//EQs into an array, specifiy different translation or add new line
$eqs = array(
	'インタラプトランキング予告' => 'Interrupt Ranking', 
	'ショップエリア　ライブ予告' => 'Shop Area Concert', 
	'惑星リリーパ　作戦予告' => 'Lilipa EQ', 
	'砂漠　作戦予告' => 'Lilipa: Desert EQ', 
	'地下坑道　作戦予告' => 'Lilipa: Subterranean Tunnels EQ', 
	'採掘場跡　作戦予告'  => 'Lilipa: Quarry EQ',
	'惑星ナベリウス 作戦予告' => 'Naberius EQ',
	'惑星ナベリウス　作戦予告' => 'Naberius EQ',
	'森林　作戦予告' => 'Naberius: Forest EQ',
	'凍土　作戦予告' => 'Naberius: Tundra EQ',
	'遺跡 作戦予告' => 'Naberius: Ruins EQ',
	'惑星ウォパル　作戦予告' => 'Vopal EQ',
	'海岸　作戦予告' => 'Vopal: Coast EQ',
	'海底 作戦予告' => 'Vopal: Seabed EQ',
	'浮上施設　作戦予告' => 'Vopal: Floating Faculity EQ',
	'惑星アムドゥスキア　作戦予告' => 'Amduscia EQ',
	'火山洞窟　作戦予告' => 'Amduscia: Caves EQ',
	'浮遊大陸　作戦予告' => 'Amduscia: Skyscrape EQ',
	'龍祭壇　作戦予告' => 'Amduscia: Dragon&#39;s Sanctum',
	'惑星ハルコタン 作戦予告' => 'Harkotan EQ',
	'惑星ハルコタン　作戦予告' => 'Harkotan EQ',
	'白ノ領域　作戦予告' => 'Harkotan: Shironia EQ',
	'黒ノ領域　作戦予告' => 'Harkotan: Kuron EQ',
	'『禍津』出現予告' => 'Harkotan: Magatsu ',
	'顕現せし星滅の災厄' => 'Harkotan: Annihilator’s Apparition',
	'星滅の災厄禊ぐ灰の唱' => 'Harkotan: Annihilator’s Apparition',
	'アークス船団航行物体接近予告' => 'Dark [Falz Loser]',
	'ＤＦ【敗者】接近予告' => 'Dark Falz [Loser]',
	'アークス船団ＤＦ接近予告' => 'Dark Falz [Elder]',
	'ＤＦ【巨躯】接近予告' => 'Dark Falz [Elder]',
	'第一採掘基地ダーカー接近予告' => 'Primary Mining Base',
	'第二採掘基地ダーカー接近予告' => 'Secondary Mining Base',
	'第三採掘基地ダーカー接近予告' => 'Tertiary Mining Base',
	'ＤＦ【若人】接近予告' => 'Mining Base Defense: Demise, Dark Falz [Apprentice]',
	'アークス船団ダーカー接近予告' => 'ARKS Ship: Urban EQ',
	'異常値観測宙域　一斉調査予告' => 'Deep Space Anomally: Darker Den',
	'旧マザーシップ　作戦予告' => 'ARKS Infested Mothership: Beckoning Darkness',
	'ＤＦ【巨躯】【敗者】接近予告' => 'Dark Falz [Elder] and Dark Falz [Loser]',
	'【深遠なる闇】接近予告' => 'Progeny of the Apocalypse: The Profound Darkness',
	'null' => 'Server in maintenance',
	);
	$str = '&#80;&#83;&#79;&#50;&nbsp;&#45;&nbsp;';
	//String Replace for jp characters into a non japanese string
	$time1 = str_replace('時', ':', $line); //adds colon inplace of 時
	$time2 = str_replace('分', '', $time1); //removes 分, as it means minutes in japanese
	$time3 = str_replace('【PSO2】', '&nbsp;', $time2); //replaces [PSO2] unitext with a space
	$time4 = str_replace($ship, '', $time3); //removes ship from text
	//Translate stripped line into our final translation
	$fmt = str_replace(array_keys($eqs), array_values($eqs), $time4);
	//Checks if there's an EQ running and doublechecks Ship.
	if (stristr($line, $ship)){
		if (stristr($time3, $checkdate)){
			echo 'PSO2 - '.$ship.' - '.$fmt.' next hour!'; //Advanced Warning
		}
		elseif (stristr($time3, $ceqstart)){
			if (stristr($checkdate2, $ceqstart)){
				echo 'PSO2&nbsp;&#45;&nbsp;'.$ship.'&nbsp;&#45;'.$fmt.'&nbsp;now running!'; //Concert EQ Start
			}
			else {
				echo 'PSO2&nbsp;&#45;&nbsp;'.$ship.'&nbsp;&#45;'.$fmt.'&nbsp;coming soon!'; //Concert EQ announce
			}
		}
		elseif (stristr($time3, $checkdate2)){
			echo 'PSO2&nbsp;&#45;&nbsp;'.$ship.'&nbsp;&#45;'.$fmt.'&nbsp;now running!'; //Current/On-going non-concert
		}
		else {
			echo 'No EQ next hour for&nbsp'.$ship.'.'; //No EQ
			echo '&nbsp;&nbsp;Last EQ notice:&nbsp;PSO2&nbsp;&#45; '.$ship.'&nbsp&#45;&nbsp;'.$fmt; //Serves last known EQ as a reminder
		}
	}
	else {
		echo 'No EQ next hour for&nbsp'.$ship.'.'; //No EQ
		echo '&nbsp;&nbsp;Last EQ notice:&nbsp;PSO2&nbsp;&#45; '.$ship.'&nbsp&#45;&nbsp;'.$fmt; //Serves last known EQ as a reminder, 2nd pass
	}
	?>
