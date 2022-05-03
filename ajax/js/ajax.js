$('select').on('change', function () {
    let key = $(this).attr('name');
    let value = $(this).val();

    // console.log(key, value)

    $.ajax({
        type: 'get',
        data: key + '=' +value,
    });
});