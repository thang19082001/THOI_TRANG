<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="icon" href="//bizweb.dktcdn.net/100/347/092/themes/708609/assets/favicon.png?1680609715779"
        type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/css/header.css">
    <!-- <link rel="stylesheet" href="template/css/main.css"> -->
    <link rel="stylesheet" href="template/css/footer.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="./template/css/suplo-style.scss.css">
    <link rel="stylesheet" href="./template/css/timber.scss.css">

    <link rel="stylesheet" href="template/css/base.scss.css">
    <script>
        window.BizwebAnalytics = window.BizwebAnalytics || {};
        window.BizwebAnalytics.meta = window.BizwebAnalytics.meta || {};
        window.BizwebAnalytics.meta.currency = 'VND';
        window.BizwebAnalytics.tracking_url = '/s';

        var meta = {};


        meta.customer = {
            "id": 14239466,
            "first_name": "thắng",
            "last_name": "nguyễn",
            "phone": "",
            "email": "nguyenvanthang.19082001@gmail.com"
        };

        for (var attr in meta) {
            window.BizwebAnalytics.meta[attr] = meta[attr];
        }
    </script>
    <script src="/dist/js/stats.min.js?v=69e02f0"></script>

    <script src="https://kit.fontawesome.com/f03f52505a.js" crossorigin="anonymous"></script>
    <title>Trang khách hàng</title>
</head>

<body>

    <section class="navbar-left-box">
        <div id="hideContent" class=""></div>
        <div id="navbar-active" class="navbar-left">
            <div class="visual">
                <a id="btn-login" type="button" href="login.php">
                    <!-- Đoạn thẻ a thiếu đoạn mở hộp( data-toggle="modal" data-target="#exampleModal" )-->
                    <div class="avatar-box">
                        <div class="avatar-icon"><span><i class="fas fa-user-circle"></i></span></div>
                        <div class="avatar-content">
                            <div>Đăng nhập</div>
                            <div class="avatar-content-adver">Nhận thêm ưu đãi</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="navbar-left-content">
                <div class="navbar-left-item">

                    <a href="trangchu.php" class="active-nav"><span><i class="fas fa-home"></i></span>Trang chủ</a>
                </div>
                <div>
                    <div class="navbar-left-item">

                        <a type="button" class="" href="#" id="btnDropdownMenuProduct">
                            <span><i class="fas fa-list"></i></span>
                            Sản Phẩm

                            <span class="btn-dropdown"><i class="fas fa-angle-down"></i></span>
                        </a>
                    </div>
                    <div id="dropdownMenuProduct" class="dropdown-menu-product">
                        <a href="shirt.php">Ao</a>
                        <a href="pant.php">Quần</a>
                        <a href="shoes.php">Giày</a>
                        <a href="accessories.php">Phụ Kiện</a>
                    </div>
                </div>
                <div class="navbar-left-item">

                    <a href="blog.php"><span><i class="far fa-newspaper"></i></span>Tin Tức</a>
                </div>
                <div class="navbar-left-item">

                    <a href="contact.php"><span><i class="fas fa-map"></i></span>Liên Hệ</a>
                </div>
            </div>
        </div>
    </section>



    <section id="" class="search">
        <div id="hideContentSearch" class=""></div>
        <div class="search-box" id="searchBox">
            <form action="" class="form-seach" id="form-search">
                <input type="text" name="" class="form-input-search" id="">
                <button type="submit" class="btn-submit-search"><span><i class="fas fa-search"></i></span></button>
                <button type="button" class="btnCancel">X</button>
            </form>
            <div class="resSearch">

            </div>
        </div>
    </section>

    <header>
        <div class="header-wellcome">

            <div class="text-header">
                <p>Wellcome to Men's Shop !</p>
            </div>

        </div>
        <div class="" id="navbarFixed">
            <nav class="navbar navbar-expand-lg navbar-light container">
                <button id="btn-active-nav" class="navbar-toggler" type="button" data-toggle="collapse" data-target=""
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="trangchu.php"><img src="img/logoshop.png" alt=""></a>
                <div class="header-nav-card">
                    <button class="btn-search" id="btnSearchNav" type="button"><span><i class="fa fa-search"
                                aria-hidden="true"></i></span></button>
                    <a href="cart.php"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>

                </div>
                <div class="nav-search-box" id="navSearchBox">
                    <div class="nav-icon-search"><span><i class="fa fa-search" aria-hidden="true"></i></span></div>
                    <input type="text" class="w-100 form-control" placeholder="Bạn muốn tìm gì ?">
                </div>
                <div class="collapse navbar-collapse main-menu" id="navbarNav">
                    <div class="navbar-nav navbar-menu">
                        <div class="nav-item active-nav"><a href="trangchu.php" class="">Trang chủ</a></div>
                        <div class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sản Phẩm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="shirt.php">Ao</a>
                                <a class="dropdown-item" href="pant.php">Quan</a>
                                <a class="dropdown-item" href="shoes.php">Giay</a>
                                <a class="dropdown-item" href="accessories.php">Phu Kien</a>
                            </div>
                        </div>
                        <div class="nav-item"><a href="blog.php">Tin Tức</a>

                        </div>

                        <div class="nav-item"><a href="contact.php">Liên Hệ</a></div>
                    </div>
                    <ul class="navbar-nav navbar-icon ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" type="button" id="btnSearch"><span><i class="fa fa-search"
                                        aria-hidden="true"></i></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" type="button" href="#" data-toggle="modal"
                                data-target="#exampleModal"><span><i class="fa fa-user"
                                        aria-hidden="true"></i></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><span class=""><i class="fa fa-shopping-cart"
                                        aria-hidden="true"></i></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section id="breadcrumb-wrapper">
        <div class="breadcrumb-content">
            <div class="wrapper">
                <div class="inner">
                    <div class="breadcrumb-small">
                        <a href="trangchu.php" title="Quay trở về trang chủ">Trang chủ</a>



                        <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>
                        <a href="account.php" title="Quay trở về trang chủ">Tài khoản</a>

                        <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>
                        <span>Sổ tài khoản</span>

                    </div>
                </div>
            </div>
        </div>
    </section>




    </div>
    <section class="address">
        <div class="container page_address margin-bottom-20">
            <div class="wrap_background_aside margin-bottom-40">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 adr_title">
                        <h1 class="title-head h5">Địa chỉ của bạn <a class="f-right a_address" href="account.php"
                                alt=""><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại trang tài khoản</a>
                        </h1>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="btn-row">
                                    <button class="btn-edit-addr btn btn-primary" type="button"
                                        onclick="Bizweb.CustomerAddress.toggleNewForm(); return false;"> + Thêm địa
                                        chỉ</button>
                                </p>
                            </div>
                            <div id="add_address" class="col-xs-12 form-list" style="display:none; margin-top:30px;">
                                <form method="post" action="/account/addresses" id="customer_address"
                                    accept-charset="UTF-8"><input name="FormType" type="hidden"
                                        value="customer_address" /><input name="utf8" type="hidden" value="true" />
                                    <div class="clearfix row">
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Tên <span class="required">*</span></label>
                                                <input type="text" class="form-control" name="FirstName"
                                                    placeholder="Nhập tên của bạn" value="Thắng" required
                                                    requiredmsg="Không được bỏ trống">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Họ <span class="required">*</span></label>
                                                <input type="text" class="form-control" name="LastName"
                                                    placeholder="Nhập họ của bạn" value="Nguyễn" required
                                                    requiredmsg="Không được bỏ trống">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Công ty</label>
                                                <input type="text" class="form-control" name="Company"
                                                    placeholder="Nhập công ty của bạn" value="">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Địa chỉ <span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Address1"
                                                    placeholder="Nhập địa chỉ của bạn" value="" required
                                                    requiredmsg="Không được bỏ trống">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Địa chỉ 2</label>
                                                <input type="text" class="form-control" name="Address2"
                                                    placeholder="Nhập địa chỉ của bạn" value="">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Thành phố <span class="required">*</span></label>
                                                <input type="text" class="form-control" name="City"
                                                    placeholder="Nhập thành phố của bạn" value="" required
                                                    requiredmsg="Không được bỏ trống">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Quốc gia <span class="required">*</span></label>
                                                <select name="Country" class="form-control vn-fix" id="mySelect1"
                                                    data-default="">
                                                    <option value="Abkhazia">Abkhazia</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                    </option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo-Brazzaville">Congo-Brazzaville</option>
                                                    <option value="Congo-Kinshasa">Congo-Kinshasa</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan (Nippon)">Japan (Nippon)</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="North Korea">North Korea</option>
                                                    <option value="Kosovo">Kosovo</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macedonia (FYROM)">Macedonia (FYROM)</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="South Korea">South Korea</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestine">Palestine</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russia</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and
                                                        the Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="South Sudan">South Sudan</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                                    </option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Ossetia">South Ossetia</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="China">China</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican">Vatican</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Wales">Wales</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Mã Zip</label>
                                                <input type="text" class="form-control" name="Zip"
                                                    placeholder="Nhập địa chỉ của bạn" value="">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset class="form-group">
                                                <label>Số điện thoại <span class="required">*</span></label>
                                                <input type="number" class="form-control" name="PhoneNumber"
                                                    placeholder="Nhập số điện thoại của bạn" value="" required
                                                    requiredmsg="Không được bỏ trống">
                                            </fieldset>
                                        </div>

                                        <div class="checkbox  col-xs-12 col-lg-12">
                                            <label class="c-input c-checkbox check_h">
                                                <input type="checkbox" id="address_default_address_" name="IsDefault"
                                                    value="true">
                                                <span class="c-indicator"></span>
                                                Đặt là địa chỉ mặc định?
                                            </label>
                                        </div>
                                        <div class="form-group clearfix col-xs-12">

                                            <div class="col-xs-12">
                                                <div class="">
                                                    <button class="btn btn-lg btn-primary" type="submit">
                                                        <span>Thêm địa chỉ</span></button>
                                                    <button
                                                        class="btn btn-lg btn-dark-address btn-outline article-readmore"
                                                        type="button"
                                                        onclick="Bizweb.CustomerAddress.toggleNewForm(); return false;"><span>Hủy</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" charset="utf-8">
        new Bizweb.CountrySelector('address_country_new');


        $(document).ready(function () {
            $('.vn-fix').val('Việt Nam');

            var elements = $("input, select, textarea");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function (e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(e.target.getAttribute("requiredmsg"));
                    }
                };
                elements[i].oninput = function (e) {
                    e.target.setCustomValidity("");
                };
            }
            $('.btn-edit-addr').click(function () {
                var ctr = $(this).attr('aria-controls');
                $('#' + ctr).slideToggle("fast");
            });
            $('.mySelect2').each(function () {
                var old = $(this).attr('data-default');
                $(this).val(old);
                $(this).change();
            })
            $('.btn-fix-addr').click(function (e) {
                $(this).parents('.collapse').removeClass('in').hide();
            })
        })
    </script>



    <footer>
        <div class="container">
            <div class="list-slide-logo box-element">
                <div class="owl-carousel owl-theme" id="owlCarouselLogo">
                    <div class="item"><img src="./img/slidelogo/logo1.png" alt=""></div>
                    <div class="item"><img src="./img/slidelogo/logo2.png" alt=""></div>
                    <div class="item"><img src="./img/slidelogo/logo3.png" alt=""></div>
                    <div class="item"><img src="./img/slidelogo/logo4.png" alt=""></div>

                    <div class="item"><img src="./img/slidelogo/logo2.png" alt=""></div>
                </div>
            </div>
        </div>
        <div class="footer-area">
            <div class="footer-service">
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-4 col-md-6 col-sm-12 footer-service-box">
                            <div class="footer-icon-service"><span><i class="fas fa-paper-plane"></i></span>
                            </div>
                            <div class="footer-content-serivce">
                                <span>FREE SHIPPING</span>
                                <span>ĐƠN HÀNG TRÊN 500.000</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-service-box">
                            <div class="footer-icon-service"><span><i class="fas fa-sync"></i></span></div>
                            <div class="footer-content-serivce">
                                <span>ĐỔI TRẢ</span>
                                <span>5 NGÀY ĐỔI TRẢ MIỄN PHÍ</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 footer-service-box">
                            <div class="footer-icon-service"><span><i class="far fa-credit-card"></i></span>
                            </div>
                            <div class="footer-content-serivce">
                                <span>THANH TOÁN</span>
                                <span>CHẤP NHẬN TẤT CẢ LOẠI THẺ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-infor">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Men's Shop</h5>
                                <p>Cửa hàng thời trang nam mang phong cách mới lạ</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Hỗ Trợ Mua Hàng</h5>
                                <div class="footer-list-service">
                                    <a href=""><span><i class="fas fa-angle-right"></i></span> Hướng
                                        dẫn mua hàng</a>
                                    <a href=""><span><i class="fas fa-angle-right"></i></span> Hướng
                                        dẫn tranh toán</a>
                                    <a href=""><span><i class="fas fa-angle-right"></i></span>
                                        Phương thức vẫn
                                        chuyển</a>
                                    <a href=""><span><i class="fas fa-angle-right"></i></span> Tra
                                        cứu đơn hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Theo Dõi Chúng Tôi</h5>
                                <div class="follow-icon">
                                    <a href=""><span style="color: #3B5A9A;"><i
                                                class="fab fa-facebook-square"></i></span></a>
                                    <a href=""><span style="color: #42C8F4;"><i
                                                class="fab fa-twitter-square"></i></span></a>
                                    <a href=""><span style="color: #F8BC2E;"><i class="fab fa-skype"></i></span></a>
                                    <a href=""><span style="color: #CE3633;"><i
                                                class="fab fa-google-plus-square"></i></span></a>
                                    <a href=""><span style="color: #040707;"><i class="fab fa-behance-square"></i>
                                        </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Thanh Toán</h5>
                                <p>Chúng tôi chấp nhận thanh toán với tất cả loại thẻ</p>
                                <div class="atm-icon">
                                    <span style="color: #3B5A9A;"><i class="fab fa-cc-visa"></i></span>
                                    <span style="color: #CE3633;"><i class="fab fa-cc-mastercard"></i></span>
                                    <span style="color: #42C8F4;"><i class="fab fa-cc-paypal"></i></span>
                                    <span style="color: #F8BC2E;"><i class="fab fa-cc-jcb"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="template/js/jquery-3.5.1.js"></script>
    <script src="template/js/footer.js"></script>
    <script src="template/js/header.js"></script>
    <script src="lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#owlCarouselProduct').owlCarousel({
                autoplay: true,
                autoplayTimeout: 2000,
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            })

        })
    </script>
</body>

</html>