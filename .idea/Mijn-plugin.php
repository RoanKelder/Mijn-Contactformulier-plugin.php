<?php

/**
* Plugin Name: Een simpel contact formulier
 * description: Plugin voor een contact formulier
*/

// De plugin
function een_simpel_contact_formulier()
{
    //Openings tekst boven het formulier
    $Form = '';
    $Form .= '<h2>Neem contact op!</h2>';

    $Form .='<form method="post" action="https://examenroan.rdjwebdevelopment.nl/bedankt-voor-het-gebruiken-van-onze-contact-formulier/"/>';


    //Naam invoer veld
    $Form  .='<label>Naam</label>';
    $Form  .='<input type="text" name="Naam" class="form-control" placeholder="Voer uw naam in." />';


    //Mail invoer veld
    $Form  .= '<label for="Email">E-mail</label>';
    $Form  .= '<input type="email" name="your_email" class="form-control" placeholder="voer uw email in." />';


    //Opmerkingen veld
    $Form  .= '<label for="your_comments">Vragen of opmerkingen </label>';
    $Form  .= '<textarea name="Opmerkingen" placeholder="Voer uw vraag of opmerking in"></textarea>';


    $Form  .= '<input type="submit" name="example_form_submit" class="btn btn-md btn-primary" value="Stuur je informatie" />';

    $Form  .= '</form>';
    return $Form;




}
add_shortcode('example_form','een_simpel_contact_formulier');

?>

<?php
    if(isset($_POST['example_form_submit']))
    {
        $n=$_POST['Naam'];
        $e=$_POST['Email'];
        $o=$_POST['Opmerkingen'];

              global $wpdb;

              $sql=$wpdb->insert("ContactFormulier 2",array("Naam"=>$n,"Email"=>$e,"Opmerkingen"=>$o));

              if($sql==true)
              {
                  echo"<script>alert('data ingevoerd')</script>";
              }
              else
              {
                  echo "<script>alert('data niet ingevoerd')</script>";
              }
    }
?>

