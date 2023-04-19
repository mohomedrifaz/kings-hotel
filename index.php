<!DOCTYPE html>
<html lang="xxx">

<?php
session_start();
include "header.php"
    ?>

<div id="simpleModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="width: 100%; text-align: center;">
                    Today's weather condition
                </h5>
                <button type="button" class="close" style="margin: -1rem -1rem -1rem 0px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body">
                <div id="weatherdesc"></div>
                <div id="temperature"></div>
                <div id="humidity"></div>
            </div>
            <div class="modal-footer" style="padding: 5px 10px;">
                <button type="button" style="padding: 3px 10px;font-size: 13px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>WELCOME TO KINGS HOTEL</h1>
                    <p>Composed of meticulously crafted accommodation options, sensibly selected amenities, best in
                        class service standards and a host of unique indulgent experiences,
                        we at Kings Hotel let you craft memories that you will carry in your hearts for a lifetime!
                    </p>
                    <a href="#" class="primary-btn">Discover Now</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Booking Your Hotel</h3>
                    <form action="check-availability.php" method="post">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>

                            <input name="checkin" class="form-control" type="date" required>

                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>

                            <input name="checkout" class="form-control" type="date" required>
                        </div>
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select name="roomtype" id="room">
                                <option value="premium">Premium King Room</option>
                                <option value="deluxe">Deluxe Room</option>
                                <option value="double">Double Room</option>
                                <option value="luxury">Luxury Room</option>
                                <option value="family">Family Room</option>
                                <option value="small">Small Room</option>
                            </select>
                        </div>
                        <button type="submit">Check Availability</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Us Section Begin -->
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>About Us</span>
                        <h2>KINGS HOTEL</h2>
                    </div>
                    <p class="f-para">The Kings hotel is located at Pasyala town on the Colombo to Kandy road.
                        It has well furnished, fully air-conditioned, luxury Deluxe rooms with modern facilities
                        including cable TV, Free Wi-Fi / tea/coffee amenities, hot water, and many other amenities.
                    </p>
                    <p class="s-para">The Kings hotel offers most authentic restaurant, Also offering delicious
                        cakes and gateaux prepared by well experienced pastry chef.
                        The hotel also has an ample parking area and provides a large garden and a terrace.</p>
                    <a href="#" class="primary-btn about-btn">Read More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="img/about/1.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="img/about/3.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="img/about/2.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="img/about/4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>What We Do</span>
                    <h2>Our Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-036-parking"></i>
                    <h4>Travel Plan</h4>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-033-dinner"></i>
                    <h4>Catering Service</h4>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-024-towel"></i>
                    <h4>Laundry</h4>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="img/room/room-b1.jpg">
                        <div class="hr-text">
                            <h3>Double Room</h3>
                            <h2>LKR10000<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                        <div class="hr-text">
                            <h3>Premium King Room</h3>
                            <h2>LKR35000<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="img/room/room-b3.jpg">
                        <div class="hr-text">
                            <h3>Deluxe Room</h3>
                            <h2>LKR25000<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>40 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 4</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="img/room/room-b4.jpg">
                        <div class="hr-text">
                            <h3>Family Room</h3>
                            <h2>LKR20000<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>50 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 8</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Testimonials</span>
                    <h2>What Customers Say?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <p>What an amazing resort! We had the best 5 night stay here in December. When we first
                            arrived we were a bit unsure of the location as it is a short tuk tuk ride away from
                            restaurants etc. How wrong we were it was the best, so nice to come home after a day out
                            to the peace and quiet!
                            We stayed in the Deluxe Room, the room was huge and the private pool was awesome. I
                            celebrated my 30th Birthday while we were there and was very spoilt by the amazing
                            staff!
                            The food at the restaurant was amazing and reasonably priced, always so much food
                            especially at breakfast!
                        </p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Rumesha</h5>
                        </div>
                        <img src="img/testimonial-logo.png" alt="">
                    </div>
                    <div class="ts-item">
                        <p>Finally, I can sit down to share my experience. As my title stated, I would highly
                            recommend this property if you are looking for something you like to feel at home.
                            Warmly welcomed by The Hotel Management after a long drive from Yala, I sincerely
                            appreciated.
                            Employees are hospitable and one of WOWs were soap butler concept which totally
                            enhancing the guest experiene with their basics. Additionally, breakfast service, we
                            could have breakfast until 2pm. Amazing. Sometimes, I encounterd that I had to wake up
                            early for having breakfast. This gesture made us felt we do not need to rush so we could
                            relax our holiday. Indeed we have never had breakfast after 10:30 am which was quite
                            internationally standard. Again such hospitable gesture made us feel at home.
                            <br> I LOVE THIS HOTEL SIUUUUUUUUU
                        </p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Cristiano Ronaldo</h5>
                        </div>
                        <img src="img/testimonial-logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

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

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script>

    $(document).ready(function () {
        makeApiCall();
    });

    function makeApiCall() {

        const apiKey = 'c4feee2845c285819149f7388af69c3a';

        const latitude = '7.154628';
        const longitude = '80.129159';

        const url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`;

        fetch(url)
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Request failed!');
            })
            .then(weatherData => {
                const temperature = weatherData.main.temp;
                const humidity = weatherData.main.humidity;
                const weather = weatherData.weather[0].description;

                const modalBodyElement = document.getElementById('modal-body');
                const modalBodyTemp = document.getElementById('temperature');
                const modalBodyHumidity = document.getElementById('humidity');
                const modalBodyWeatherDesc = document.getElementById('weatherdesc');

                modalBodyTemp.innerHTML = `Temperature: ${temperature}`;
                modalBodyHumidity.innerHTML = `Humidity: ${humidity}`;
                modalBodyWeatherDesc.innerHTML = `Weather Overall: ${weather}`;

                // console.log(weatherData);
                // console.log(weather);
            })
            .catch(error => console.log(error.message));
    }

    window.onload = function () {
        setTimeout(function () {
            OpenBootstrapPopup();
        }, 3000);

    };
    function OpenBootstrapPopup() {
        $("#simpleModal").modal('show');
    }
</script>

<script>
    // Use JavaScript to access the session data as JavaScript variables
    var email = "<?php echo $_SESSION['email']; ?>";
    var name = "<?php echo $_SESSION['name']; ?>";
    var id = "<?php echo $_SESSION['id']; ?>";

    var isloggedIn = "<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>"

    if (isloggedIn === 'true') {
        $("#loginlink").html('<a href="./logout.php">Logout</a>');
        $("#signup").html('<a href="./mybookings.php">Bookings</a>');
        $("#userwelcome").text('Hi <?php echo $_SESSION['name']; ?>');
    }

    if ($('#loginlink').text() === 'Logout') {
        $('#loginlink').click(function () {
            $.ajax({
                url: 'index.php',
                data: { logout: true },
                type: 'POST',
                success: function (res) {
                    window.location.href = 'index.php';
                }

            });
        });
    }

</script>


<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}
?>

</body>

</html>