<!DOCTYPE html>
<html lang="zxx">

<?php
include 'header.php'
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';
$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }


    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();
        // specify SMTP credentials

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'kings1hotel@gmail.com';
        $mail->Password = 'rxmswruhbrccbyek';
        $mail->Subject = 'New message from your website';
        $mail->setFrom($email);
        $mail->addAddress('kings1hotel@gmail.com', 'Me');
        
        // Enable HTML if needed
        $mail->isHTML(true);
        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;
        $mail->addCC($email);

        if ( $mail->send() ) {
            echo '<script>alert("Mail sent successfully");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
        }

        $mail->smtpClose();

    }

}

?>

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Contact Info</h2>
                    <p>Want to make a reservation? Have any queries? <br>
                        Fill out the form and we will get back to you soon!</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Address:</td>
                                <td>63/5 Pasyala - Attanagalla Rd, Pasyala</td>
                            </tr>
                            <tr>
                                <td class="c-o">Phone:</td>
                                <td>033 22 70 229</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>kingshotel@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="c-o">Fax:</td>
                                <td>033 22 70 229</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="" method="post"  class="contact-form" id="contact">
                <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>    
                <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" placeholder="Your Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="email" placeholder="Your Email">
                        </div>
                        <div class="col-lg-12">
                            <textarea name="message" placeholder="Your Message"></textarea>
                            <button type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11196.897219905504!2d80.12101807636175!3d7.160508344286239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae302cdcb934875%3A0x2e9102dd6e70d100!2s63%2C%2005%20Pasyala%20-%20Attanagalla%20Rd%2C%20Nittambuwa%2011880!5e0!3m2!1sen!2slk!4v1675161752040!5m2!1sen!2slk"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="#">
                                <img src="img/logo1.png" alt="" width="150" height="150">
                            </a>
                        </div>

                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Contact Us</h6>
                        <ul>
                            <li>033 22 70 229</li>
                            <li>kingshotel@gmail.com</li>
                            <li>63/5 Pasyala - Attanagalla Rd, Pasyala</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>New latest</h6>
                        <p>Get the latest updates and offers.</p>
                        <form action="#" class="fn-form">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Environmental Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="co-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved by KINGS
                            HOTEL</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

<script>

    const constraints = {
        name: {
            presence: {allowEmpty: false}
        },
        email: {
            presence: {allowEmpty: false},
            email: true
        },
        message: {
            presence: {allowEmpty: false}
        }
    };

    const form = document.getElementById('contact');
    form.addEventListener('submit', function (event) {
        const formValues = {
            name: form.elements.name.value
            email: form.elements.email.value,
            message: form.elements.message.value

        };

        const errors = validate(formValues, constraints);

        if (errors) {
          event.preventDefault();
            const errorMessage = Object
                .values(errors)
                .map(function (fieldValues) {
                    return fieldValues.join(', ')
                })
                .join("\n");
            alert(errorMessage);

        }

    }, false);

</script>

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>