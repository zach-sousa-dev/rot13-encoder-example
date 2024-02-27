<!DOCTYPE html>

<html lang = "en">
	<head>
        <meta charset="UTF-8">

        <title>ROT13 Encoder</title>
        <meta name="description" content="This program reads a .txt file and does ROT13 encoding to each line."/>
        <meta name="author" content="Zachary Sousa"/>

        <link href="style.css" rel="stylesheet" type="text/css"/>
        <!--<script src="something.js"></script>-->
	</head>

    <body> 

        <h2>WELCOME TO MY REALLY COOL ROT13 ENCODER. CHANGE input.txt IN THE FILES TO GET DIFFERENT RESULTS.</h2>

        <?php
            $input_file = "input.txt";
            $output_file = "output.txt";

            $input = file_get_contents($input_file);
            $input = explode("\n", $input);

            $output = [];
            $output_str = "";

            for($i = 0; $i < count($input); $i++) {
                echo "<strong>INPUTTED: </strong>".$input[$i]."<br>";
                array_push($output, rot13($input[$i]));
                $output_str.=$output[$i];
                echo "<strong>OUTPUTTED: </strong>".$output[$i]."<br>";
                echo "<strong>ROT26: </strong>".rot13($output[$i])."<br><br>";
            }

            file_put_contents($output_file, $output_str);
            echo "<strong>DATA WRITTEN.</strong>";
        ?>


        
        <?php
            # contains rot13 function

            function rot13($input_str) {
                //INIT
                # build lowercase cypher
                $alpha_str  = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
                $temp = explode(" ", $alpha_str);

                $cypher_lower = [];
                $cypher_upper = [];

                for($i = 0; $i < count($temp); $i++) {
                    if($i < 13) {
                        $cypher_lower[$temp[$i]] = $temp[$i + 13];
                    } else {
                        $cypher_lower[$temp[$i]] = $temp[$i - 13];
                    }
                }

                # build upperccase cypher
                $alpha_str = strtoupper($alpha_str);
                $temp = explode(" ", $alpha_str);

                for($i = 0; $i < count($temp); $i++) {
                    if($i < 13) {
                        $cypher_upper[$temp[$i]] = $temp[$i + 13];
                    } else {
                        $cypher_upper[$temp[$i]] = $temp[$i - 13];
                    }
                }
                //END INIT


                //CONVERSION
                $new_str = "";

                for($i = 0; $i < strlen($input_str); $i++) {
                    if(in_array($input_str[$i], $cypher_lower)) {
                        $new_str = $new_str.$cypher_lower[$input_str[$i]];
                    } else {
                        if(in_array($input_str[$i], $cypher_upper)) {
                            $new_str = $new_str.$cypher_upper[$input_str[$i]];
                        } else {
                            $new_str = $new_str.$input_str[$i];
                        }
                    }
                }
                return $new_str;
                //DONE CONVERSION
            }
        ?>
        
    </body>

</html>