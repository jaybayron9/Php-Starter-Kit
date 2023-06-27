<div class="flex justify-center items-center h-screen">
    <form id="login-form" class="rounded-md shadow-md p-5 bg-gray-100">
        <h1 class="text-center text-3xl mb-2 font-bold">LOGIN</h1>
        <div class="mb-2">
            <label for="email" class="font-semibold">Email Address</label>
            <input type="email" name="email" id="email" maxlength="50" required class="block px-2 py-1 border border-sky-700 rounded outline-none">
        </div>
        <div class="mb-2">
            <div class="flex">
                <label for="password" class="font-semibold">Password</label>
                <a href="?vs=forgot_password" class="hover:no-underline underline ml-auto text-blue-500 hover:text-blue-700">Forgot Password?</a>
            </div>
            <input type="password" name="password" id="password" maxlength="50" autocomplete="off" required class="block px-2 py-1 border border-sky-700 rounded outline-none">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="rememberme" id="remember-me">
            <label for="remember-me">Keep me logged in</label>
        </div>
        <div class="text-center my-2">
            <button type="submit" class="w-full bg-blue-500 font-bold text-white hover:bg-blue-700 py-1 px-3 rounded">LOGIN</button>
        </div>
    </form>
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