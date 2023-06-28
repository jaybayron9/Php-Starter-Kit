<div class="flex justify-center items-center mt-20">
    <div class="md:w-2/6 w-96">
        <div class="flex justify-center items-center mb-5 gap-x-3">
            <img src="assets/storage/defaults/logo.ico" alt="logo" class="h-14 w-14">
            <a href="./" class="font-bold text-1xl mt-1 capitalize">PHPQLJQTL</a>
        </div>
        <form id="register-form" class="rounded border border-gray-300 bg-white p-10 ">
            <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
            <h1 class="text-center text-[17px] mb-4 font-normal text-gray-900">Sign Up for YourProject</h1>
            <div class="mb-4">
                <div class="mb-2">
                    <label for="email" class="text-[14.5px]">Email Address</label>
                </div>
                <input type="email" name="email" id="email" maxlength="50" placeholder="example@gmail.com" required class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="mb-4">  
                <div class="mb-2">
                    <label for="password" class="text-[14.5px]">Password</label>
                </div>
                <input type="password" name="password" id="password" maxlength="50" placeholder="Your password" autocomplete="off" required class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="mb-3">  
                <div class="mb-2">
                    <label for="pasword-confirmation" class="text-[14.5px]">Confirm Password</label>
                </div>
                <input type="password" name="password_confirmation" id="pasword-confirmation" maxlength="50" placeholder="Confirm your password" autocomplete="off" required class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
            </div>
            <div class="flex items-center mb-5">
                <input id="remember" type="checkbox" name="remember" value="" class="w-4 h-4">
                <label for="remember" class="ml-2 text-sm text-gray-900">I've read and agree to the <a href=""  class="text-violet-700">terms and service.</a></label>
            </div>
            <div class="text-center my-2">
                <button type="submit" class="w-full bg-violet-700 text-base text-white hover:bg-blue-500 py-1 px-3 rounded transition duration-200">Sign up</button>
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
        $('#register-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=register',
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