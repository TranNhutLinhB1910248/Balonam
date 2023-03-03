{{-- trang tim kiem --}}
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

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="ltext-102" style="color: gray; font-size: 20px">
						<u>KẾT QUẢ TÌM KIẾM</u>
					</button>
				</div>		
			</div>
			<div id="loadProduct">
				@include('products.list_search')
			</div>
		</div>
	</section>

<!-- Footer -->
	@include('footer')

</body>
</html>