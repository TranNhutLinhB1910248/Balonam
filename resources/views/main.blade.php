{{-- trang chu --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- head -->
	@include('head')
</head>
<body> <!-- class="animsition"-->
	<!-- Header -->
	@include('header')
	<!-- Cart -->	
	@include('cart')
	<br><br><br><br> 
	
	@yield('content')
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				@foreach ($sliders as $slider)
				<div class="item-slick1" style="background-image: url( {{$slider->thumb}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2" style="color: RED">
									HOT 2022
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800" >
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color: RED">
									{{$slider->name}}
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="{{ $slider->url}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="color: RED">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>		
				@endforeach
			</div>
		</div>
	</section>
	@include('section')

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-102" style="color: black; font-size: 40px" >
					<b>SẢN PHẨM NỔI BẬT</b>
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="ltext-102" style="color: gray; font-size: 20px">
						<u>Tất cả sản phẩm</u>
					</button>
				</div>		
			</div>
			<div id="loadProduct">
				@include('products.list')
			</div>
			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
				<input type="hidden" value="1" id="page">
				<a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>

<!-- Footer -->
	@include('footer')

</body>
</html>