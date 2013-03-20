<!DOCTYPE html>
<?php
	session_start(); $_SESSION['qvar'] = 0;
	if (!isset($_SESSION['quizno'])){
		$_SESSION['quizno'] = 0;
	}
	if (!isset($_SESSION['qcorrect'])){
		$_SESSION['qcorrect'] = 0;
	}

?>
<html>

    <head>
	<style>
	h1 { text-align:center; }
	p  { text-align:center; }

	</style>
       
	 <title> Memequiz.net </title>

    </head>

		<body>

		<h1>Memequiz.net</h1>
	
	
				
		<div id = "image"  style = width:"500px" align = "middle">

		<?php	
			$xml = simplexml_load_file('firsquiz.xml');
			

			$question = ($xml -> question[$_SESSION['quizno']] -> ask);
			$correctans = ($xml -> question[$_SESSION['quizno']] -> correctanswer);
			$answer0 = ($xml -> question[$_SESSION['quizno']] -> answers -> answer[$_SESSION['qvar']] -> text);
			$answer1 = ($xml -> question[$_SESSION['quizno']] -> answers -> answer[$_SESSION['qvar']+1] -> text);
			$answer2 = ($xml -> question[$_SESSION['quizno']] -> answers -> answer[$_SESSION['qvar']+2] -> text);
			$answer3 = ($xml -> question[$_SESSION['quizno']] -> answers -> answer[$_SESSION['qvar']+3] -> text);

			echo "<img src = \"".$xml -> question[$_SESSION['quizno']] -> picture."\" alt = \"Meme\" width = \"400\" height = \"350\">";
			echo "<p><br>Question ".$_SESSION['quizno']."<p>Number Correct: ".$_SESSION['qcorrect']."</p><p>".$question."<br></p>";
			
		
		

			echo "<form action = \"\" method = \"get\">";
			
			echo "<table>";

			echo "<tr> <td> <input type = \"radio\" name = \"ans\" value = \"".$answer0."\"></td> <td>".$answer0."</td> </tr>";
			echo "<tr> <td> <input type = \"radio\" name = \"ans\" value = \"".$answer1."\"></td> <td>".$answer1."</td> </tr>";
			echo "<tr> <td> <input type = \"radio\" name = \"ans\" value = \"".$answer2."\"></td> <td>".$answer2."</td> </tr>";
			echo "<tr> <td> <input type = \"radio\" name = \"ans\" value = \"".$answer3."\"></td> <td>".$answer3."</td> </tr>";

			echo "</table>";

			echo "<input type = \"submit\" name = \"submit1\">";
			echo "<input type = \"submit\" name = \"refresh\">";

			echo "</form>";

			echo "You submitted: ";
			if (isset($_GET['submit1'])){

				$_SESSION['quizno']+=1;

				if ($correctans	== $_GET['ans']){ 
					
					echo "The correct answer!";
					$_SESSION['qcorrect']+=1;
					

				}else{
					echo "The wrong answer, try again!";
					
				}
			
			}
			if (isset($_GET['refresh'])){
				session_destroy();
				}
		
				

			echo "<br><br><br>";
			echo "my xml file: ";
			

			
			


			
			
			
		?>	
		
			

		</div>
	</body>

</html>
