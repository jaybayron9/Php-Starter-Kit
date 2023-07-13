<?php  
use Auth\Auth;
Auth::check_login_auth('admin_id', '_admin/'); 
?> 

<div class="flex justify-center items-center mt-20">
    <div class="md:w-2/6 w-96">
        <div class="flex justify-center items-center mb-5 gap-x-3">
            <img src="assets/storage/defaults/logo.ico" alt="logo" class="h-14 w-14">
            <a href="./" class="font-bold text-1xl mt-1 capitalize">ADMIN</a>
        </div>
        <form id="login-form" class="rounded border border-gray-300 bg-white p-10 ">
            <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
            <h1 class="text-center text-medium mb-4 font-normal text-gray-900">Welcome Admin!</h1>
            <div id="alert" hidden class="py-3">
                <p id="msg" class="border-y border-r border-l-red-600 border-l-4 rounded py-3 px-5 shadow text-red-700 text-[14.5px]">Tsdf</p>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label for="email" class="text-[14.5px]">Email Address</label>
                </div>
                <input type="email" name="email" id="email" maxlength="50" required placeholder="admin123@example.com"  class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="mb-6">  
                <div class="flex">
                    <div class="mb-2">
                        <label for="password" class="text-[14.5px]">Password</label>
                    </div>
                    <a href="?vs=_admin/forgot_password" class="hover:underline ml-auto text-[14.5px] text-violet-800">I forgot my password</a>
                </div>
                <input type="password" name="password" id="password" required maxlength="50" placeholder="Password" autocomplete="off"  class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="text-center my-2">
                <button type="submit" class="flex items-center justify-center w-full bg-violet-700 text-base text-white hover:bg-blue-500 py-1 px-3 rounded transition duration-200">
                    <span id="submit-txt">Sign in</span>
                    <svg id="spinner" hidden class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();
            $('#submit-txt').attr('hidden', '');
            $('#spinner').show(); 

            $.ajax({
                url: '?rq=admin_sign_in',
                type: 'POST',
                data: { 
                    csrf_token: $('#csrf-token').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                },
                dataType: 'json',
                success: function(resp) {
                    if (resp.status === 'success') {
                        window.location.href = '?vs=_admin/'
                    } else if (resp.status === 'error') {
                        $('#alert').removeAttr('hidden');
                        $('#msg').html(resp.msg);
                        $('#email, #password').val('');
                    }

                    $('#submit-txt').removeAttr('hidden');
                    $('#spinner').hide();
                } 
            });
        });
    });
</script>