<?php
/*
  Template Name: Contact
  Template Post Type: page
*/
?>
<?php
$nameError = '';
$prenomError = '';
$emailError = '';
$commentError = '';
$tacError = '';
if (isset($_POST['submitted'])) {
  if (trim($_POST['contactName']) === '') {
    $nameError = 'Veuillez saisir votre nom.';
    $hasError = true;
  } else {
    $name = trim($_POST['contactName']);
  }
  if (trim($_POST['prenom']) === '') {
    $nameError = 'Veuillez saisir votre prénom.';
    $hasError = true;
  } else {
    $surname = trim($_POST['prenom']);
  }

  if (trim($_POST['email']) === '') {
    $emailError = 'Please enter your email address.';
    $hasError = true;
  } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
    $emailError = "Ceci n'est pas une adresse email valide.";
    $hasError = true;
  } else {
    $email = trim($_POST['email']);
  }
  $telephone = $_POST['telephone'];

  if (trim($_POST['comments']) === '') {
    $commentError = "Merci d'écrire un message.";
    $hasError = true;
  } else {
    if (function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['comments']));
    } else {
      $comments = trim($_POST['comments']);
      $comments = sanitize_text_field($comments);
    }
  }

  if (!isset($_POST['tac'])) {

    $tacError = "Veuillez accepter les conditions d'utilisation.";
    $hasError = true;
  }  else {
    $tac = $_POST['tac'];
     
    }

  if (!isset($hasError)) {
    // $emailTo = get_option('tz_email');
    // if (!isset($emailTo) || ($emailTo == '')) {
    //   $emailTo = get_option('admin_email');
    // }
    $emailTo = 'lapetiteboucle80@gmail.com';
    $subject = '[contact du site] de ' . $name .' '.$surname;
    $body = "Nom : $name \n\nPrénom : $surname \n\nEmail : $email \n\nTéléphone : $telephone \n\nMessage : $comments";
    $headers = 'From: ' . $name .' '.$surname .' <info@lapetiteboucle.fr>' . "\r\n" . 'Reply-To: ' . $email;
   // $headers = array( 'Content-Type: text/html; charset=UTF-8' );
    	
//$headers = "From: Site name <info@lapetiteboucle.fr" . "\r\n";
    wp_mail($emailTo, $subject, $body, $headers, array());
    $emailSent = true;
  }
} ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();
?>
    <section class="section">
      <div class="section__container contact-form__container">
        <h1 class="titre-2"><?php the_title(); ?></h1>

        <!-- <div class="entry-content"> -->
        <?php if (isset($emailSent) && $emailSent == true) { ?>
          <div class="thanks">
            <p>Merci, votre message nous a bien été envoyé. Nous vous répondrons très rapidement.</p>
          </div>
        <?php } else { ?>
          <?php the_content(); ?>
          <?php if (isset($hasError) || isset($captchaError)) { ?>
            <p class="error">Désolé, il y a une erreur dans le formulaire.
            <p>
            <?php } ?>

            <form action="<?php the_permalink(); ?>" id="contactForm" class="contact-form" method="post" spellcheck="false" autocomplete="on">

              <label for="contactName" class="requit">nom</label>
              <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="required requiredField" required autofocus autocapitalize="words" autocomplete="family-name" />
              <?php if ($nameError != '') { ?>
                <span class="error"><?= $nameError; ?></span>
              <?php } ?>

              <label for="prenom" class="requit">prénom</label>
              <input type="text" name="prenom" id="prenom" value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom']; ?>" class="required requiredField" required autocapitalize="words" autocomplete="given-name" />
              <?php if ($prenomError != '') { ?>
                <span class="error"><?= $prenomError; ?></span>
              <?php } ?>

              <label for="telephone">téléphone</label>
              <input type="tel" name="telephone" id="telephone" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']; ?>" class="" autocomplete="tel-local" pattern="^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$" />


              <label for="email" class="requit">mail</label>
              <input type="email" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="required requiredField email" required autocapitalize="none" autocomplete="email" />
              <?php if ($emailError != '') { ?>
                <span class="error"><?= $emailError; ?></span>
              <?php } ?>


              <label for="commentsText" class="requit">message</label>
              <textarea name="comments" id="commentsText" rows="6" cols="60" class="required requiredField" required spellcheck="true"><?php if (isset($_POST['comments'])) {
                                                                                                                                          if (function_exists('stripslashes')) {
                                                                                                                                            echo stripslashes($_POST['comments']);
                                                                                                                                          } else {
                                                                                                                                            echo $_POST['comments'];
                                                                                                                                          }
                                                                                                                                        } ?></textarea>
              <?php if ($commentError != '') { ?>
                <span class="error"><?= $commentError; ?></span>
              <?php } ?>

              <label for="tac" class="requit">
                <input id="tac" type="checkbox" name="tac" required />
                J'accepte les conditions d'utilisation</label>
              <?php if ($tacError != '') { ?>
                <span class="error"><?= $tacError; ?></span>
              <?php } ?>
              <p class="lire-tac">
                <a href="https://www.lapetiteboucle.fr/politique-de-confidentialite/">Lire les conditions d'utilisation</a>
              </p>
              <p class="notice lire-tac"><span class="color-jaune">
                * </span> = champs requis</p>
   
             
             

              <input type="submit" class="bouton bouton--blanc" value="envoyer"/>


              <input type="hidden" name="submitted" id="submitted" value="true" />
            </form>
          <?php } ?>
      </div>
      <!-- </div> -->
    </section>


<?php
  endwhile;
endif;
get_footer();
?>