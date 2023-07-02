<?php 

use Auth\Auth;

Auth::check_login_auth('support_id', '_sup/');

?>

<div class="flex justify-center items-center mt-20">
    <div class="md:w-2/6 w-96">
        <div class="flex justify-center items-center mb-5 gap-x-3">
            <img src="assets/storage/defaults/logo.ico" alt="logo" class="h-14 w-14">
            <a href="./" class="font-bold text-1xl mt-1 capitalize">PJMT</a>
        </div>
        <form id="form" class="rounded border border-gray-300 bg-white p-10 ">
            <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
            <h1 class="text-center text-[17px] mb-7 font-normal text-gray-900">Reset your password</h1>
            <div id="alert" hidden class="py-3">
                <p id="msg" class="border-y border-r border-l-red-600 border-l-4 rounded py-3 px-5 shadow text-red-700 text-[14.5px]"></p>
            </div>
            <p class="text-[14.10px] mb-5">Enter your email address that you used to register. We'll email you with a link to reset your password.</p>
            <div class="mb-10">
                <div class="mb-2">
                    <label for="email" class="text-[14.5px]">Email Address</label>
                </div>
                <input type="email" name="email" id="email" maxlength="50" required placeholder="support123@example.com"  class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="text-center my-2">
                <button type="submit" class="flex items-center justify-center w-full bg-violet-600 text-base text-white hover:bg-blue-500 py-1 px-3 rounded transition duration-200">
                    <span id="submit-txt">Send Password Reset link</span>
                    <svg id="spinner" hidden class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button> 
            </div>
        </form>
        <div class="flex mt-3 gap-x-2 justify-center items-center text-sm">
            <a href="?vs=_sup" class="text-violet-700 hover:underline hover:text-blue-600">Back to login</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $('#submit-txt').attr('hidden', '');
            $('#spinner').show();

            $.ajax({
                url: '?rq=sup_send_pass_req',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 'success') {
                        $('#alert').removeAttr('hidden');
                        $('#msg').removeClass('border-l-red-600 text-red-700');
                        $('#msg').addClass('border-l-green-500 text-green-600')
                    } else if (resp.status == 'error') {
                        $('#alert').removeAttr('hidden');
                        $('#email').val('');
                    }

                    $('#msg').html(resp.msg);
                    $('#submit-txt').removeAttr('hidden');
                    $('#spinner').hide();
                }
            });
        });
    });
</script>