{{-- trang footer --}}
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-10" style="font-size: 30px";>
                    BA LÔ NAM
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>
                                Khu II, đường 3/2 <br />
                                phường Xuân Khánh, quận Ninh Kiều <br />
                                thành phố Cần Thơ, Việt Nam
                            </p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>
                                +84 237 683 252<br />
                                +84 237 684 363
                            </p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>balonam@gmail.com</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-10" style="font-size: 30px";>
                    DỊCH VỤ
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Liên hệ</p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Cửa hàng</p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Giao hàng</p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Đổi trả</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-10" style="font-size: 30px";>
                    THÔNG TIN
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Hình thức thanh toán</p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Chính sách bảo mật</p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Chính sách bảo hành</p>
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="" class="stext-107 cl7 hov-cl1 trans-04">
                            <p>Thông tin cửa hàng</p>
                        </a>
                    </li>
                </ul>


            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-10" style="font-size: 30px";>
                    KẾT NỐI
                </h4>


                <div class="p-t-2">
                    <div>
                        <a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"> Facebook</i>
                        </a>
                    </div>
                    <br>
                    <div>
                        <a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"> Instagram</i>
                        </a>
                    </div>
                    <br>
                    <div>
                        <a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"> Pinterest</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--===============================================================================================-->
<script src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="/template/vendor/animsition/js/animsition.min.js"></script>
<script src="/template/vendor/bootstrap/js/popper.js"></script>
<script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="/template/vendor/daterangepicker/moment.min.js"></script>
<script src="/template/vendor/daterangepicker/daterangepicker.js"></script>
<script src="/template/vendor/slick/slick.min.js"></script>
<script src="/template/js/slick-custom.js"></script>
<script src="/template/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<script src="/template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<script src="/template/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="/template/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>
<!--===============================================================================================-->
<script src="/template/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
</script>

<script src="/template/js/main.js"></script>
<script src="/template/js/public.js"></script>
