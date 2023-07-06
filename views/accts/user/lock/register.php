<!-- Google Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdIqu0mAAAAAHKhiSg-EnuA7O3-9EuayBVbUxMv"></script>

<div class="flex justify-center items-center mt-[40px]">
    <div class="md:w-2/6 w-96">
        <div class="flex justify-center items-center mb-5 gap-x-3">
            <img src="assets/storage/defaults/logo.ico" alt="logo" class="h-14 w-14">
            <a href="./" class="font-bold text-1xl mt-1 capitalize">USER</a>
        </div>
        <form id="register-form" class="rounded border border-gray-300 bg-white p-10 ">
            <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
            <h1 class="text-center text-[17px] mb-4 font-normal text-gray-900">Sign Up for YourProject</h1>
            <div id="alert" hidden class="py-3">
                <p id="msg" class="border-y border-r border-l-red-600 border-l-4 rounded py-3 px-5 shadow text-red-700 text-[14.5px]"></p>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label for="email" class="text-[14.5px]">Email Address</label>
                </div>
                <input type="text" name="email" id="email" maxlength="50" placeholder="user123@example.com" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                <span id="email-msg" class="text-sm text-red-700"></span>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label for="password" class="text-[14.5px]">Password</label>
                </div>
                <input type="password" name="password" id="password" maxlength="50" placeholder="Your password" autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                <span id="pass-msg" class="text-sm text-red-700"></span>
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <label for="pasword-confirmation" class="text-[14.5px]">Confirm Password</label>
                </div>
                <input type="password" name="password_confirmation" id="password-confirmation" maxlength="50" placeholder="Confirm your password" autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                <span id="confirm-pass-msg" class="text-sm text-red-700"></span>
            </div>
            <div class="flex items-center mb-5">
                <input id="agree" type="checkbox" name="agree" required class="w-4 h-4">
                <label for="agree" class="ml-2 text-sm text-gray-900 select-none">I've read and agree to the <a href="" class="text-violet-700">terms and service.</a></label>
            </div>
            <div class="text-center my-2">
                <button type="submit" class="flex items-center justify-center w-full bg-violet-700 text-base text-white hover:bg-blue-500 py-1 px-3 rounded transition duration-200">
                    <span id="submit-txt">Sign up</span>
                    <svg id="spinner" hidden class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </form>
        <div class="flex mt-3 gap-x-2 justify-center items-center text-sm">
            <p class="text-[14.5px] text-gray-600">Already have account?</p>
            <a href="?vs=login" class="text-violet-700 hover:underline hover:text-blue-600">Sign in</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#email').on('input', function() {
            var email = $(this).val();

            $.ajax({
                url: '?rq=user_similar_email',
                type: 'POST',
                data: {
                    email: email
                },
                success: function(resp) {
                    $('#email-msg').text(resp);
                }
            });
        })

        $('#register-form').submit(function(e) {
            e.preventDefault();
            $('#submit-txt').attr('hidden', '');
            $('#spinner').show();

            grecaptcha.ready(function() {
                grecaptcha.execute('6LdIqu0mAAAAAHKhiSg-EnuA7O3-9EuayBVbUxMv', {
                    action: 'submit'
                }).then(function(token) {
                    $.ajax({
                        url: '?rq=user_register',
                        type: 'POST',
                        data: {
                            recaptcha: token,
                            csrf_token: $('#csrf-token').val(),
                            email: $('#email').val(),
                            password: $('#password').val(),
                            password_confirmation: $('#password-confirmation').val()
                        },
                        dataType: 'json',
                        success: function(resp) {
                            if (resp.status == 'success') {
                                $('#alert').attr('hidden', '');
                                window.location.href = '?vs=_/';
                            } else if (resp.status == 'error') {
                                if (resp.msg !== '') {
                                    $('#alert').removeAttr('hidden');
                                    $('#msg').html(resp.msg);
                                } else {
                                    $('#alert').attr('hidden', '');
                                }

                                if (resp.email_format !== '') {
                                    $('#email-msg').text(resp.email_format);
                                } else {
                                    $('#email-msg').text(resp.similar_email);
                                }
                                
                                $('#pass-msg').text(resp.password_length);
                                $('#confirm-pass-msg').text(resp.pass_confirm);
                            }

                            $('#submit-txt').removeAttr('hidden');
                            $('#spinner').hide();
                        }
                    })
                });
            });
        });
    });
</script>