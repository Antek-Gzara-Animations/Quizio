<!DOCTYPE HTML>

<html>
  <head>
    <title>test quiz</title>
	<style> <!-- ERROR MESSAGE STYLE -->
		.ERROR{
			background-color: red;
			color: white;
			border-radius: 0px 10px 10px 0px;
			padding: 5px;
			display: inline;
			font-size: 30px;
			font-family: Sans-Serif;
			border: solid 2px red;
		}
		.ERRORINFO{
			background-color: white;
			font-size: 30px;
			font-family: Sans-Serif;
			border: solid 2px black;
			border-radius: 10px 0px 0px 10px;
			padding: 5px;
			display: inline;
		}
	</style>
	<style> <!--front-end style -->
			body{
				transition-duration: 0.3s;
			}
			.mainGuide{
				background-color: lightgray;
				border: solid 0.5px black;
			}
			.logoBar{
				padding: 10px;
				background-color: #008CBA;
				color: white;
				margin-left: 5%;
				/*border: solid 1px gray;*/
				/*width: 124.5px; */
				width: 85%;
				border-radius: 20px;
			}
			.logo{
				font-size: 40px;
				border: solid 1px white;
				border-radius: 50px;
				text-align: center;
				padding-left: 2.5px;
			}
			.logo2{
				font-size: 25px;
				margin-left: 10px;
			}
			.podpis{
				font-size: 10px;
				/*margin-left: 55%;*/
				float: right;
				
			}
			.GuideButton{
				width: 100px;
				height: 60px;
				background-color: gray;
				transition-duration: 0.5s;
				border: solid 2px gray;
				display: inline-block;
				/*padding: 10px;*/
				border-radius: 20px;
			}
			.GuideButton:hover{
				background-color: lightgray;
			}
			.GuideButtons{
				text-align: center;
			}
			.mainContent{
				text-align: center;
				margin-left: calc(100% - (100% - (50% / 2))); /* perfecly centered :) */
				width: 50%;
				background-color: lightgreen;
				height: 100vh;
			}
			.quizTitle{
				width: 100%;
				background-color: #56bf56;
				font-size: 30px;
			}
			.question{
				margin-top: 30px;
				margin: solid 2px green;
			}
			.questionTitle{
				width: calc(100% - 20px * 2);
				background-color: #b5b5b5; /*    #f57676 - red   #76f576 - green*/
				font-size: 22px;
				padding: 20px;
				border: solid 1px black;
			}
			.questionButton{
				width: 50%;
				height: 50px;
				background-color: #56bf56;
				float: left;
				transition-duration: 1s;
				border: none;
				display: inline-block;
			}
			.questionButton:hover{
				background-color: #90ee90; /*or you can use background-color: lightgreen;  */
			}
			.result{
				border: solid 2px lightgreen;
				font-size: 20px;
				color: lightgreen;
			}
		</style>
	
  </head>
  <body>
    <?php
		$QuizFile = @fopen("quiz.txt","r") or die('<p class="ERRORINFO">Error:</p><p class="ERROR">quiz file not found</p>');
		$linie = array(fgets($QuizFile),fgets($QuizFile));
		$LiczbaPytan = $linie[0];
		$Nazwa = $linie[1];
		
		$pytanie1 = array(
			"odpowiedz" => "",
			"pytanie"   => "",
			"a"			=> "",
			"b"			=> "",
			"c"			=> "",
			"d"			=> "",
		);
		
		pytanie1["odpowiedz"]  = fgets($QuizFile);
		pytanie1["pytanie"] = strval(fgets($QuizFile));
		pytanie1["a"] = fgets($QuizFile);
		pytanie1["b"] = fgets($QuizFile);
		pytanie1["c"] = fgets($QuizFile);
		pytanie1["d"] = fgets($QuizFile);
		
		
		if((intval($LiczbaPytan) == 2) || (intval($LiczbaPytan) > 2)){
			$pytanie2 = array(
				"odpowiedz" => fgets($QuizFile),
				"pytanie"   => fgets($QuizFile),
				"a"			=> fgets($QuizFile),
				"b"			=> fgets($QuizFile),
				"c"			=> fgets($QuizFile),
				"d"			=> fgets($QuizFile),
			);
		}
		
		if((intval($LiczbaPytan) == 3) || (intval($LiczbaPytan) > 3)){
			$pytanie3 = array(
				"odpowiedz" => fgets($QuizFile),
				"pytanie"   => fgets($QuizFile),
				"a"			=> fgets($QuizFile),
				"b"			=> fgets($QuizFile),
				"c"			=> fgets($QuizFile),
				"d"			=> fgets($QuizFile),
			);
		}
		
		/*
		echo 'quiz o nazwie "' , strval($Nazwa) , '" i długości ' , strval($LiczbaPytan);
		echo '<br> <br>' , gettype($LiczbaPytan) , '<br>' , gettype(intval($LiczbaPytan));
		*/
		
		echo <<<END
		<div class="mainGuide">
			<p class="logoBar">
				<span class="logo">
					 Q
				</span>
				<span class="logo2">
					Quizio
				</span>
				<span class="podpis">
					Created by Antek
				</span>
			</p>
			<div class="GuideButtons">
				<button class="GuideButton" onclick="home();">
					Home
				</button>
			
				<button class="GuideButton" onclick="more();">
					more quizes
				</button>
			
				<button class="GuideButton" onclick="help();">
					pomoc
				</button>
			</div>
		</div>
		
		<div class="mainContent">
			
			<p class="quizTitle">
				$Nazwa
			</p>
			
			<!--question-->
			<p class="result" id="question1Result"> </p>
			<div class="question">
				<p class="questionTitle" id="question1title">
					${pytanie1["pytanie"]}
				</p>
				<div>			
					<button class="questionButton" onclick="question1Bad();">
						5
					</button>
					<button class="questionButton" onclick="question1Bad();">
						2
					</button>
				</div>
				<div>
					<button class="questionButton" onclick="question1Good();">
						4
					</button>
					<button class="questionButton" onclick="question1Bad();">
						8
					</button>
				</div>
				
				
			<!--question-->
			<p class="result" id="question2Result" style="margin-top: 30px;">You Shoultn\'t see this</p>
			<div class="question">
				<p class="questionTitle" id="question2title">
					Question II: 1 / 2 = ?
				</p>
				<div>			
					<button class="questionButton" onclick="question2Bad();">
						0.4
					</button>
					<button class="questionButton" onclick="question2Bad();">
						0
					</button>
				</div>
				<div>
					<button class="questionButton" onclick="question2Bad();">
						0.6
					</button>
					<button class="questionButton" onclick="question2Good();">
						0.5
					</button>
				</div>
			</div>
			</div>
		</div>
		<button onclick="GoTotop();">
			back to top
		</button>
END;


		
		fclose($QuizFile);
    ?>
  </body>
</html>