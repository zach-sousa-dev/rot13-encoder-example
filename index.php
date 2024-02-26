<!DOCTYPE html>

<html lang = "en">
	<head>
        <meta charset="UTF-8">

        <title>ROT13 Encoder</title>
        <meta name="description" content="This program shows the user 3 slots with a spin button.
        A different message is displayed upon getting no matches, 2 matches, or a jackpot."/>
        <meta name="author" content="Zachary Sousa"/>

        <link href="style.css" rel="stylesheet" type="text/css"/>
        <!--<script src="something.js"></script>-->
	</head>

    <body> 
        
        <?php
            $alpha_str  = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
            $temp_lower  = explode(" ", $alpha_str);

            for($i = 0; $i < count($temp_lower); $i++) {
                if($i < 13) {
                    $cypher_lower[$temp_lower[$i]] = $temp_lower[$i + 13]."<br>";
                } else {
                    $cypher_lower[$temp_lower[$i]] = $temp_lower[$i - 13]." <br>";
                }
            }

            echo var_dump($temp_lower);

            echo "<br><br>";

            echo var_dump($cypher_lower);

            echo "<br><br>";



            $input_str = "Hello World";
            $input_str = strtolower($input_str);
            echo $input_str."<br>";

            for($i = 0; $i < strlen($input_str); $i++) {
                $is_ok = true;
                for($j = 0; $j < count(explode(" ", $alpha_str); $i++) {
                    strcmp();
                }
            }



        ?>
        
    </body>

</html>