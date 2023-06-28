<div class="flex justify-center items-center mt-20">
    <div class="md:w-2/6 w-96">
        <div class="flex justify-center items-center mb-5 gap-x-3">
            <img src="assets/storage/defaults/logo.ico" alt="logo" class="h-14 w-14">
            <a href="./" class="font-bold text-1xl mt-1 capitalize">PHPQLJQTL</a>
        </div>
        <form id="login-form" class="rounded border border-gray-300 bg-white p-10 ">
            <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
            <h1 class="text-center text-[17px] mb-7 font-normal text-gray-900">Login to your account</h1>
            <p class="text-[14.10px] mb-5">Enter your email address that you used to register. We'll email you with a link to reset your password.</p>
            <div class="mb-10">
                <div class="mb-2">
                    <label for="email" class="text-[14.5px]">Email Address</label>
                </div>
                <input type="email" name="email" id="email" maxlength="50" placeholder="example@gmail.com" required class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="text-center my-2">
                <button type="submit" class="w-full bg-violet-600 text-base text-white hover:bg-blue-500 py-1 px-3 rounded transition duration-200">Send Password Reset link</button>
            </div>
        </form>
        <div class="flex mt-3 gap-x-2 justify-center items-center text-sm">
            <a href="?vs=login" class="text-violet-700 hover:underline hover:text-blue-600">Back to login</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=login',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    alert(resp.msg);
                }
            })
        });
    });
</script>