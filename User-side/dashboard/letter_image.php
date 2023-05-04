<?php
function letters_images(){
    $user_name = $_SESSION['User'];
    $user_first_letter = substr($user_name, 0 , 1);
    if($user_first_letter == 'A' || $user_first_letter == 'a'){
        echo '<img src="../letters_images/a.svg" alt="" class="w-12 sm:w-14 lg:w-10">';
    }
    elseif($user_first_letter == 'B' || $user_first_letter == 'b'){
        echo '<img src="../letters_images/b.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'C' || $user_first_letter == 'c'){
        echo '<img src="../letters_images/c.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'D' || $user_first_letter == 'd'){
        echo '<img src="../letters_images/d.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'E' || $user_first_letter == 'e'){
        echo '<img src="../letters_images/e.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'F' || $user_first_letter == 'f'){
        echo '<img src="../letters_images/f.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'G' || $user_first_letter == 'g'){
        echo '<img src="../letters_images/g.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'H' || $user_first_letter == 'h'){
        echo '<img src="../letters_images/h.svg" alt="" class="w-9 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'I' || $user_first_letter == 'i'){
        echo '<img src="../letters_images/i.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'J' || $user_first_letter == 'j'){
        echo '<img src="../letters_images/j.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'K' || $user_first_letter == 'k'){
        echo '<img src="../letters_images/k.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'L' || $user_first_letter == 'l'){
        echo '<img src="../letters_images/l.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'M' || $user_first_letter == 'm'){
        echo '<img src="../letters_images/m.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'N' || $user_first_letter == 'n'){
        echo '<img src="../letters_images/n.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'O' || $user_first_letter == 'o'){
        echo '<img src="../letters_images/o.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'P' || $user_first_letter == 'p'){
        echo '<img src="../letters_images/p.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'Q' || $user_first_letter == 'q'){
        echo '<img src="../letters_images/q.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'R' || $user_first_letter == 'r'){
        echo '<img src="../letters_images/r.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'S' || $user_first_letter == 's'){
        echo '<img src="../letters_images/s.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'T' || $user_first_letter == 't'){
        echo '<img src="../letters_images/t.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'U' || $user_first_letter == 'u'){
        echo '<img src="../letters_images/u.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'V' || $user_first_letter == 'v'){
        echo '<img src="../letters_images/v.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'W' || $user_first_letter == 'w'){
        echo '<img src="../letters_images/w.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }  
    elseif($user_first_letter == 'X' || $user_first_letter == 'x'){
        echo '<img src="../letters_images/x.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'Y' || $user_first_letter == 'y'){
        echo '<img src="../letters_images/y.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                   
    elseif($user_first_letter == 'Z' || $user_first_letter == 'z'){
        echo '<img src="../letters_images/z.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }
}
?>