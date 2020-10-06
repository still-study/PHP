function addGood(goodId) {
    jQuery.ajax({
        url: '?a=addAjax&p=cart',
        type: 'post',
        data: {id: goodId},
        success: (response) => {
            if (!response.success) {
                console.log(response);
                return;
            }
            jQuery('.cart_count').text(response.count);
        }

    });

}