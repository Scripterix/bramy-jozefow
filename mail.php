<?php

if (empty($_POST['token'])) {
	echo '<span class="notice">Error!</span>';
	exit;
}
if ($_POST['token'] != 'FsWga4&@f6aw') {
	echo '<span class="notice">Error!</span>';
	exit;
}

$name = $_POST['name'];
$from = $_POST['email'];
$addressCity = $_POST['addressCity'];
$addressStreet = $_POST['addressStreet'];
$phone = $_POST['phone'];
$subject = stripslashes(nl2br($_POST['subject']));
$message = stripslashes(nl2br($_POST['message']));

$headers = "From: Bramy-Józefów <$from>\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8";

ob_start();
?>
Cześć !<br /><br />
<?php echo ucfirst($name); ?>
<br />
Formularz kontaktowy Bramy-Józefów
<br />
Poniżej treść wiadomości, przesłanej przez klienta !!!
<br /><br />

Imię: <?php echo ucfirst($name); ?><br />
Nazwisko: <?php echo $from; ?><br />
Miasto: <?php echo $addressCity; ?><br />
Ulica: <?php echo $addressStreet; ?><br />
Telefon: <?php echo $phone; ?><br />
Wiadomość Tytuł: <?php echo $subject; ?><br />
Widamość Treść: <br /><br />
<?php echo $message; ?>
<br />
<br />
============================================================
<?php
$body = ob_get_contents();
ob_end_clean();

$to = 'biuro@bramy-jozefow.com';

$s = mail($to, $subject, $body, $headers, "-t -i -f $from");

if ($s == 1) {
	echo '<div class="success"><i class="fa fa-check-circle"></i><h3>Dziękujemy!</h3>Wiadomość została przesłana.</div>';
} else {
	echo '<div>Wiadomość niewysłana!</div>';
}


?>