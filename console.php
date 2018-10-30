<?php

// Input validation - checking preconditions necessary for program's execution
$first_argv = $argv[1];
$second_argv = $argv[2];
$third_argv = $argv[3];


class Validator
{

    public static function validate_inputs( $first_argv, $second_argv, $third_argv )
    {

        if( $first_argv === "-h" || $first_argv === "--help"){
            Helper::print_help();
            exit;
        }
        
        $input_valid = True;
        
        if($first_argv != NULL){ 
            if(is_numeric($first_argv)){
                if((int)$first_argv < 0){ 
                    echo "First arg is not positive\n";
                    $input_valid = False; 
                }
            } else {
                echo "First arg is not a number\n";
                $input_valid = False;
            }
        } else {
            echo "Please enter first number\n";
            $input_valid = False;
        }
        
        if($second_argv != NULL){
            if(is_numeric($second_argv)){
                if((int)$second_argv < 0){
                    echo "Second arg is not positive\n";
                    $input_valid = False;
                }
            } else {
                echo "Second arg is not a number\n";
                $input_valid = False;
            }
        } else {
            echo "Please enter second number\n";
            $input_valid = False;
        }
        
        if($third_argv != NULL){
            
            if($third_argv != "+" && $third_argv != "-" && $third_argv != "*" && $third_argv != "/"){
                echo "Operation must be one of: +, -, /, *, you provided: ". $third_argv;
                $input_valid = False;
            }
        } else {
            echo "Please enter an arithmetic operation\n";
            $input_valid = False;
        }
        
        if($input_valid){
            Calculator::calculate((int)$first_argv, (int)$second_argv, $third_argv);
        }
    }
}

Validator::validate_inputs($first_argv, $second_argv, $third_argv);



class Helper
{
    public static function print_help()
    {
        echo "This is a calculator application that does X, Y, Z." . "\n";
        echo "Usage: console_app.php 2 3 +"  . "\n";
        echo "Output: 6"  . "\n\n";
    
        echo "Please use the following options:"  . "\n";
        echo "-h - prints help"  . "\n";
        echo "--help - prints help"  . "\n";
    }
}

class Calculator 
{
    public static function calculate($first_argv, $second_argv, $third_argv){

        switch ($third_argv) {
            case '+':
                fwrite(STDOUT, "Result: " . ( $first_argv + $second_argv )); 
                break;
            case '-':
                fwrite(STDOUT, "Result: " . ( $first_argv - $second_argv ));
                break;
            case '*':
                fwrite(STDOUT, "Result: " . ( $first_argv * $second_argv ));
                break;
            case '/':
                fwrite(STDOUT, "Result: " . ( $first_argv / $second_argv ));
                break;
            default: 
                echo "No such arithmetic mark. !!";
        }  
    }
}



?>