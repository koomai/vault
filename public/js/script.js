var Vault = {};

// Base Url
Vault.baseUrl = $('meta[name="base_url"]').attr('content');

// CSRF token for Ajax requests
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

// Init functions
Vault.init = function() {

    Vault.validate();
    Vault.encrypt();
    Vault.submitForm();
    Vault.copyToClipboard();
    Vault.decrypt();
    Vault.close();
};

Vault.validate = function() {
    $('.ui.form')
        .form({
            textbox: {
                identifier  : 'textbox',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Please enter some text to encrypt'
                    }
                ]
            },
            password: {
                identifier  : 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Please enter a password'
                    }
                ]
            },
            expire: {
                identifier  : 'expire',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Please select an expiry time'
                    }
                ]
            }
        });
};

Vault.encrypt = function() {

};

Vault.submitForm = function() {
    $(document).ready(function() {
        // Encrypt!
        $('#create_form').submit(function(e) {
            e.preventDefault();

            // Encrypt!
            var secure_text = sjcl.encrypt($.trim($('#password').val()), $('#textbox').val());

            // Base64 encode and add to form
            $('#text').val($.base64.encode(secure_text));

            // Save it. When we serialize don't send the password and original text to the server.
            var serialized = $('#create_form input[name!="password"][name!="textbox"], #create_form select').serialize();
            $.post(Vault.baseUrl, serialized, function(data) {
                    // Put link in textarea & password in view box
                    $('#copy_text').val($.trim($('#response_template').html()));
                    $('#copy_text').val($('#copy_text').val().replace('%link%', data));
                    $('#copy_text').val($('#copy_text').val().replace('%password%', $.trim($('#password').val())));

                    // Show modal with results
                    $('#results').modal({closable:false}).modal('show');
                })
                .error(function() {
                    $('#results').find('.header').html('');
                    $('#results').find('.content').html($('#error').html());
                    // Get Home URL and attach to button to reload page
                    var url = $('.home').attr('href');
                    var $button = $('#results').find('button');
                    $button.on('click', function(){
                        document.location = url;
                    });
                    $button.html('Try again <i class="refresh icon"></i>');
                    // Show modal with error
                    $('#results').modal({closable:false}).modal('show');
                });
        });
    });
};

Vault.copyToClipboard = function() {
    $(document).ready(function() {
        // Setup copy to clipboard
        ZeroClipboard.config({swfPath: "//ajax.cdnjs.com/ajax/libs/zeroclipboard/2.2.0/ZeroClipboard.swf"});
        var zClip = new ZeroClipboard($("#copy_button"));
        zClip.on("ready", function (readyEvent) {
            zClip.on("aftercopy", function (event) {
                var $button = $('#results').find('button');
                $button.removeClass('blue').addClass('green');
                $button.html('Copied! <i class="checkmark icon"></i>');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            });
        });
    });
};

Vault.decrypt = function() {
    $(document).ready(function() {
        $('#display_message').click(function() {
            var $text = $('#view_body').find('span');
            // Base64 decode
            var encrypted_text = $.base64.decode($.trim($text.html()));

            // Decrypt!
            try
            {
                var open_text = sjcl.decrypt($.trim($('#decrypt_password').val()), encrypted_text);
                $('#get_password').hide();
                $('#view_body').find('.dimmer').addClass('active');
                $text.fadeOut(1000, function(){
                    $text.html(open_text.replace(/(?:\r\n|\r|\n)/g, '<br />'));
                    $('#view_body').find('.dimmer').removeClass('active');
                    $text.fadeIn();
                });
            }
            catch(err)
            {
                $('.error.message').slideDown();
            }

            return false;
        });
    });
};

Vault.close = function() {
    $(document).ready(function() {
        // close error
        $('.message').find('.close').on('click', function() {
            $(this).parent().hide();
        })
    });
};

// Init all things
Vault.init();
