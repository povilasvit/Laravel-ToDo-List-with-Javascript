<!DOCTYPE html>
<html>
<head>
<title>Povilas Vitkauskas</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<!-- Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('css/homePage.css')}}">
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="containerInfo">
                <div class="leftSection">
                    <div class="myPhoto"><img src="myPhoto.jpg" class="myPhotoImg">1</div>
                    <div class="myName"><h3 class="myNameH3">Povilas Vitkauskas</h3></div>
                </div>
                <div class="rightSection">
                    <div class="coll">
                        <div class="sectionCollapsible">Bendra Informacija</div>
                        <div class="collapsibleContent">
                            <p>Gimimo metai: 1983 05 29</p>
                            <p>Gimimo vieta: Alytus</p>
                        </div>
                    </div>
                    <div class="coll">
                        <div class="sectionCollapsible">Kalbos</div>
                        <div class="collapsibleContent">
                            <table class="tableL">
                              <tr class="tableEl">
                                <th></th>
                                <th>Kalbėjimas</th>
                                <th>Skaitymas</th>
                                <th>Rašymas</th>
                              </tr>
                              <tr>
                                <td class="tableEl">Anglų</td>
                                <td>B1</td>
                                <td>B1</td>
                                <td>B1</td>
                              </tr>
                              <tr>
                                <td  class="tableEl">Lietuvių</td>
                                <td>C1</td>
                                <td>C1</td>
                                <td>C1</td>
                              </tr>
                            </table>
                        </div>
                    </div>
                    <div class="coll">
                        <div class="sectionCollapsible">Išsilavinimas</div>
                        <div class="collapsibleContent">
                            <table class="tableL">
                              <tr>
                                <td class="tableEl">Dzūkijos vidurinė mokykla</td>
                                <td>1990 - 2002</td>
                              </tr>
                            </table>
                        </div>
                    </div>
                    <div class="coll">
                        <div class="sectionCollapsible">Darbas</div>
                        <div class="collapsibleContent">
                            <table class="tableL">
                              <tr>
                                <td class="tableEl">2003-2011</td>
                                <td class="tableW">UAB MAXIMA, Prekių kokybės ir kainų kontrolierius</td>
                              </tr>
                              <tr>
                                <td class="tableEl">2011-2020</td>
                                <td class="tableW">Henrik Bjerre, ferma Danijoje</td>
                              </tr>
                              <tr>
                                <td class="tableEl">2020-</td>
                                <td class="tableW">UAB Aiventus, gamybos operatorius</td>
                              </tr>
                            </table>
                        </div>
                    </div>
                    <div class="coll">
                        <div class="sectionCollapsible">Kontaktai</div>
                        <div class="collapsibleContent">
                            <table class="tableL">
                              <tr>
                                <td class="tableEl"><i class="fa-solid fa-phone"></i></td>
                                <td class="tableW">+37065528918</td>
                              </tr>
                              <tr>
                                <td class="tableEl"><i class="fa-solid fa-envelope"></i></td>
                                <td class="tableW">povilasvitkauskass@gmail.com</td>
                              </tr>
                              <tr>
                                <td class="tableEl"><i class="fa-brands fa-facebook"></i></td>
                                <td class="tableW">https://www.facebook.com/povilas.vitkauskas</td>
                              </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                             <div class="slide1">1</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide1">2</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide1">3</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide1">4</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide1">5</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide1">6</div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>  


    </div>
        
    <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
          var swiper = new Swiper(".mySwiper", {
            effect: "flip",
            grabCursor: true,
            pagination: {
              el: ".swiper-pagination",
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
          });
        </script>
    <script src="{{asset('js/homePage.js')}}"></script>
</body>
</html>