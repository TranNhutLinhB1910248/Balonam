$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                consol.log(result);
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}
/*Upload file*/
$('#upload').change(function() {
    //consol.log(123);
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        datatype: 'JSON',
        data: form,
        url: '/admin/upload/services',
        // success: function(resuts) {
        //     console.log(resuts);
        // }
        success: function(results) {
            if (results.error === false) {
                console.log(results);
                $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src ="' + results.url + '" width = "100px"></a>');

                $('#thumb').val(results.url);
            } else {
                alert('Upload file Lỗi!!');
            }
        }
    })
});