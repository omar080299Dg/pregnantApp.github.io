<?php if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
 require "../elements/header.php";
if (isset($_POST['message']) && isset($_POST['name'])) {
    $to      = $_POST['name'];
    $subject = 'LIRE CE MAIL D\'URGENCE';
    $message = $_POST['message'];
    $headers = 'From: 99omar.niang@gmail.com' . "\r\n" .
        'Reply-To: 99omar.niang@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);?>
    <script>
    alert('MESSAGE ENVOYE');
    </script>

<?php } ?>


<div class="container">
<div class="row">
    <div class="col-12">
        <h2 class="contact-title">Votre messagae</h2>
    </div>
    <div class="col-lg-8">
        <form class="form-contact contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" message"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" placeholder="addresse mail du correspondant">
                    </div>
                </div>
                
                 
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm boxed-btn">Envoyer</button>
            </div>
        </form>
    </div>
    <div class="col-lg-3 offset-lg-1">
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
                <h3>mail de medecin</h3>
                <p>medein12@gmail.com</p>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
                <h3>mail de votre mari</h3>
                <p>99omar.niang@gmail.com/p>
            </div>
        </div>
        
    </div>
</div>
</div>
</section>
</div>