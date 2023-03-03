$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function loadMore() {
    const page = $('#page').val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data: { page },
        url: '/services/load-product',
        success: function(result) {
            // console.log(result);
            if (result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
            } else {
                alert('Đã load xong sản phẩm');
                $('#button-loadMore').css('display', 'none');
            }
        }
    })
}

// let loginForm = document.querySelector('.login-form');

// document.querySelector('#login-btn').onclick = () => {
//     loginForm.classList.toggle('active');
//     navbar.classList.remove('active');
//     searchForm.classList.remove('active');
// }