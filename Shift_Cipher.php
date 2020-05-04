<?php
echo "
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <style>
    body
    {
        padding:1%;
        padding-left:5%;
        padding-right:5%;
        padding-bottom:1%;
    }
    .main_info 
    {
      display:grid;
      grid-template-columns:20% 50% 30%;
    }
    @media screen and (max-width:660px)
    {
      .main_info 
      {
          display:grid;
          grid-template-columns:100%;
      }
    }
    </style>
</head>
<body>
<h2 style='color:rgba(39, 39, 39, 0.945);text-align:center;'>SHIFT CIPHER PHP PROGAM</h2>
  <div class='main_info' style='height:auto;width:100%;background-color:white;box-shadow:1px 2px 1px 2px rgba(0,0,0,0.3);'>
  
  <div class='left' style='background-color:rgba(39, 39, 39, 0.945);padding:2%;'>
  <h3 style='text-align:center;color:white;'>ALPHABET FOR CIPHER</h3>
  <h4 style='color:white;text-align:center;'>
  
  A |
  B | C | D | E | F | G | H | I <br><br> J | K |
   L | M | N | O | P | Q | R | S <br><br> T | U | V | W | X | Y | Z
 
  </h4><br>
  <h3 style='text-align:center;color:white;'>PROGRAM HINT</h3><br>
  <p style='text-align:center;color:white;'>Suppose the Message<br>
  Entered is <b>'MAHORO'</b>.<br>
  and Number of Shift is 4<br><br>
  then Cipher Text will be<br><br>
  M=Q , A=E, H=L, O=S, <br><br>
  R=V , O=S<br><br>
  Finally, The CipherText<br><br>
  is <b>'QELSVS'</b>
  </p>
  </div>
  <div class='right'  style='background-color:white;padding:2%;'>
  <center>
  <h4>Please Enter Any Message </h4>
  <form action='' method='post'>
  <textarea name='my_message' id='' cols='80' rows='4' style='background-color: rgba(241, 240, 158, 0.788);border-radius:10px;padding:2px;' placeholder='Enter Text Message Here ...'></textarea>
  <p>Enter Number of Shifts</p>
  <input type='text' name='shift' placeholder='Write a shift number here...' style='padding:5px;padding-left:25px;padding-right:25px; background-color: rgba(241, 240, 158, 0.788);border:none;border:1px solid royalblue;border-radius:10px;'><br><br><br><br>
  <input type='submit' name='btn' value='Encrypt Message' name='enc' style='padding:10px;padding-left:25px;padding-right:25px;background-color: rgb(24, 168, 80);color:white;border:none;border:1px solid royalblue;border-radius:2px;'>
  </form>
  </center>
  </div>
  <div class='third'>
  <h3 style='text-align:center;'>View Encrypted Message</h3>
  <center>
  <div class='message_entered' style='padding:2%;background-color:rgb(30, 95, 121);color:white;font-size:20px;'>
  
  <p style=' text-transform: uppercase;'>";

    $text="";
    $shift=""; 
    $enc="";
    
    if(isset($_POST['btn']))
    {
        if(isset($_POST['my_message']))
        {
            $text=$_POST['my_message'];//This variable hold the message Entered by User
        }
        if(isset($_POST['shift']))
        {
            $shift=$_POST['shift'];//This variable hold the number of shift Entered by User
        }
        if(($text=="") or ($shift==""))
        {
            echo "<script>alert('Please Verify if You Enter Message or Number of Shifts , To Proceed')</script>";
        }
        if(($text!="") and ($shift!=""))
        {   
            /*THE FUNCTION BELOW PERFORM OPERATION SHIFTING CIPHER */  
            function shiftCipher( $text, $shift ){
                $plaintext = strtolower( $text );
                $ciphertext = "";
                $ascii_a = ord( 'a' );
                $ascii_z = ord( 'z' );
                while( strlen( $plaintext ) ){
                    $char = ord( $plaintext );
                    if( $char >= $ascii_a && $char <= $ascii_z ){
                        $char = ( ( $shift + $char - $ascii_a ) % 26 ) + $ascii_a;
                    }
                    $plaintext = substr( $plaintext, 1 );
                    $ciphertext .= chr( $char );
                }
                return $ciphertext;            
            }
            echo "<br><b>Plaintext:</b><br><br><br><br>";
            echo $text;
            echo "<br><br><br><b>Ciphertext:</b><br><br><br>";
            echo shiftCipher( $text, $shift ), "\n";
            echo "<br><br><br><b>Number of Shift:</b><br><br><br>";
            echo $shift;
        }
    }

  echo "
  </p>
  </div>
  </center>
  </div>
  </div>
 
  
</body>
</html>";
?>