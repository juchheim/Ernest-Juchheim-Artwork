jQuery(document).ready(function($) {
    // Update cart quantities asynchronously
    $('.woocommerce-cart-form').on('change', '.qty', function() {
        var item = $(this);
        var quantity = item.val();
        var cart_item_key = item.closest('tr').attr('data-cart-item-key');

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_update_cart',
                cart_item_key: cart_item_key,
                quantity: quantity,
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });

    // Apply coupon asynchronously
    $('body').on('click', 'button[name="apply_coupon"]', function(e) {
        e.preventDefault();
        var coupon_code = $('#coupon_code').val();

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_apply_coupon',
                coupon_code: coupon_code,
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });

    // Update cart asynchronously
    $('body').on('click', 'button[name="update_cart"]', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_update_cart_totals',
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });
});


jQuery(document).ready(function($) {
    // Update cart quantities asynchronously
    $('.woocommerce-cart-form').on('change', '.qty', function() {
        var item = $(this);
        var quantity = item.val();
        var cart_item_key = item.closest('tr').attr('data-cart-item-key');

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_update_cart',
                cart_item_key: cart_item_key,
                quantity: quantity,
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });

    // Apply coupon asynchronously
    $('body').on('click', 'button[name="apply_coupon"]', function(e) {
        e.preventDefault();
        var coupon_code = $('#coupon_code').val();

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_apply_coupon',
                coupon_code: coupon_code,
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });

    // Update cart asynchronously
    $('body').on('click', 'button[name="update_cart"]', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_update_cart_totals',
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });

    // Remove item asynchronously
    $('.woocommerce-cart-form').on('click', '.remove', function(e) {
        e.preventDefault();
        var item = $(this);
        var cart_item_key = item.closest('tr').attr('data-cart-item-key');

        $.ajax({
            type: 'POST',
            url: custom_cart_params.ajax_url,
            data: {
                action: 'custom_remove_cart_item',
                cart_item_key: cart_item_key,
                nonce: custom_cart_params.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(response.data.message);
                }
            }
        });
    });
});
