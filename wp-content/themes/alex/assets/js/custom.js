jQuery(document).ready(function($) {
    // Toggle search form on click
    $('#toggle-search').click(function() {
        $('#search-form, #toggle-search').toggleClass('open');
        return false;
    });
    $('#search-form input[type=submit]').click(function() {
        $('#search-form, #toggle-search').toggleClass('open');
        return true;
    });
    $(document).click(function(event) {
        var target = $(event.target);
  
        if (!target.is('#toggle-search') && !target.closest('#search-form').size()) {
            $('#search-form, #toggle-search').removeClass('open');
        }
    });

    // Fixed menu
    jQuery(window).scroll(function(){
        if (jQuery(window).scrollTop() > 150) {
            jQuery('.header-main').addClass('header-sticky');
        } else {
            jQuery('.header-main').removeClass('header-sticky');
        }
    });

    // Woo login
    // AJAX login
    $('#ajax-login-form').on('submit', function(e) {
        e.preventDefault();
    
        const username = $('#login_username').val();
        const password = $('#login_password').val();
    
        const data = {
          action: 'ajax_login',
          username: username,
          password: password,
          security: '<?php echo wp_create_nonce("ajax-login-nonce"); ?>'
        };
    
        $.post('<?php echo admin_url("admin-ajax.php"); ?>', data, function(response) {
          if (response.loggedin) {
            location.reload();
          } else {
            $('#login-response').text(response.message);
          }
        }, 'json');
    });
    
    // ?login_redirect=1
    const url = new URL(window.location.href);
    const loginRedirect = url.searchParams.get("login_redirect");
    if (loginRedirect === "1") {
        $('#authModal').modal('show');
    }
    
    // Dropdown 
    // Toggle dropdown 
    $('#userDropdown').on('click', function(e) {
        e.preventDefault();
        $(this).next('.dropdownMenu').toggleClass('show');
    });

    // None dropdown 
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.dropdown').length) {
        $('.dropdownMenu').removeClass('show');
        }
    });

    

});


// 



