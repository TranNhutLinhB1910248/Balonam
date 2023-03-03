{{-- trang lien he --}}
@extends('home')
<br><br><br><br> 
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/template/images/bg-05.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Contact
    </h2>
</section>

@section('content')
<br>
<section>
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form>
                    <h4 class="ltext-102" style="color: black; font-size: 20px" >
                        <b>Phản hồi của bạn</b>
                    </h4><br>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Địa chỉ mail">
                        <img class="how-pos4 pointer-none" src="/template/images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Bạn cần hổ trợ ?"></textarea>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Gửi
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            <b>Địa chỉ</b>
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            Khu II, đường 3/2 
                                phường Xuân Khánh, quận Ninh Kiều 
                                thành phố Cần Thơ, Việt Nam
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            <b>Hot Line</b>
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            +84 237 683 252<br />
                            +84 237 684 363
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            <b>Mail</b>
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            balonam@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10044.024023688593!2d105.76789097274954!3d10.03110363427345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883a1c379615%3A0xd48ea8310024394f!2zQmFsbyBUw7ppIFjDoWNoIE5pbmggS2nhu4F1!5e0!3m2!1svi!2s!4v1664174658590!5m2!1svi!2s" 
    width="1275" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>   
</div>

@endsection