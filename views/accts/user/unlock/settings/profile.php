<?php include view('accts/user/unlock', 'head.auth') ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64">
    <div class="px-4 my-[80px]">
        <!-- Profile Information Form -->
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Update your account's profile information and email address.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 col-span-2">
                <form id="profile-form" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
                    <input type="hidden" name="id" id="id" value="<?= $user_info[0]['id'] ?>">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="<?= $user_info[0]['name'] ?>" class="mt-1 p-2 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <span id="name-err" class="hidden text-sm text-red-500"></span>
                            </div>
                            <!-- Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Email</label>
                                <input type="text" name="email" id="email" value="<?= $user_info[0]['email'] ?>" class="mt-1 p-2 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <span id="email-err" class="text-sm text-red-500"></span>
                            </div>
                            <!-- Phone -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Phone number</label>
                                <input type="text" name="phone" id="phone" value="<?= $user_info[0]['phone'] ?>" class="mt-1 p-2 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <span id="phone-err" class="text-sm text-red-500"></span>
                            </div>
                            <!-- Photo -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Profile picture</label>
                                <!-- accept="image/*" -->
                                <input type="file" name="image" id="image"  class="mt-1 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <span id="image-err" class="text-sm text-red-500"></span>
                                <div class="flex justify-center items-center mt-5">
                                    <img src="assets/storage/<?= $user_info[0]['profile_photo_path'] ?>" alt="Profile picture" class=" h-32 w-32 rounded-full bg-black">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <div class="flex gap-4 text-sm text-gray-600">
                            <div id="saved-info" hidden class="text-sm text-gray-600 mt-2">
                                Saved.
                            </div>
                            <button type="submit" class="btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-300"></div>
            </div>
        </div>

        <!-- Update Password Form -->
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Update Password</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Ensure your account is using a long, random password to stay secure.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 col-span-2">
                    <form id="password-form">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <input type="hidden" name="id" value="<?= $user_info[0]['id'] ?>">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- Current Password -->
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700">Current Password</label>
                                    <input type="password" name="current_password" class="mt-1 p-2 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <span id="cur-err" class="text-sm text-red-500 block"></span>
                                </div>
                                <!-- New Password -->
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700">New Password</label>
                                    <input type="password" name="new_password" class="mt-1 p-2 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <span id="new-err" class="text-sm text-red-500 block"></span>
                                </div>
                                <!-- New Password -->
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="mt-1 p-2 block w-full border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <div class="flex gap-4 text-sm text-gray-600">
                                <div id="pass-saved" hidden class="text-sm text-gray-600 mt-2">
                                    Saved.
                                </div>
                                <button type="submit" class="btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-300"></div>
            </div>
        </div>

        <!-- Delete User Form -->
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Delete Account</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Permanently delete your account.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 col-span-2">
                    <form id="delete-acct-form">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <input type="hidden" name="id" value="<?= $user_info[0]['id'] ?>">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="max-w-xl text-sm text-gray-600">
                                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                            </div>
                            <div class="mt-5">
                                <button type="button" id="acct-open-modal" class="btn inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Delete Account
                                </button>
                            </div>
                        </div>

                        <!-- Delete User Confirmation Modal -->
                        <div id="del-acct-modal" hidden class="mt-10 md:mt-0">
                            <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
                                <div class="fixed inset-0 transform transition-all">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <div class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
                                    <div class="px-6 py-4">
                                        <div class="text-lg font-medium text-gray-900">
                                            Delete Account
                                        </div> 
                                        <div class="mt-4 text-sm text-gray-600">
                                            Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                                            <div class="mt-4">
                                                <input type="password" name="password" placeholder="Password" class="p-2 mt-1 block w-3/4 border border-gray-300 focus:outline-none focus:ring-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                                <span id="del-msg" class="text-sm text-red-500"></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="md:mt-0 md:col-span-2">
                                        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                                            <button type="button" id="hide-modal" class="btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                                Cancel
                                            </button> 
                                            <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-red-500 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                Delete Account
                                            </button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        $('#profile-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=user_update_profile',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 200) {
                        var msg = $('#saved-info');
                        msg.show();
                        setTimeout(() => {
                            msg.fadeOut('slow');
                        }, 2000)
                    } else if (resp.status == 400) {
                        $('#name-err').show().text(resp.name)
                        $('#email-err').show().text(resp.email)
                        $('#phone-err').show().text(resp.phone)
                    }
                }
            });
        });

        $('#password-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=user_update_password',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 200) {
                        $('#cur-err #new-err').hide();
                        var msg = $('#pass-saved');
                        msg.show();
                        setTimeout(() => {
                            msg.fadeOut('slow');
                        }, 2000)
                    } else if (resp.status == 400) {
                        if (resp.current_password !== '') {
                            $('#cur-err').text(resp.current_password);
                        } else {
                            $('#cur-err').text(resp.old_pass_confirmation);
                        }

                        if (resp.new_password !== '') {
                            $('#new-err').text(resp.new_password);
                        } else if (resp.pass_length !== '') {
                            $('#new-err').text(resp.pass_length);
                        } else {
                            $('#new-err').text(resp.password_confirmaton);
                        }
                    }
                }
            });
        })

        $('#delete-acct-form').submit(function(e) {
            e.preventDefault(); 

            $.ajax({
                url: '?rq=user_delete_account',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 200) {
                        alert('Your account has been deleted');
                        window.location.reload();
                    } else if (resp.status == 400) {
                        $('#del-msg').text(resp.msg);
                    }
                }
            });
        });

        $('#acct-open-modal').click(function() {
            $('#del-acct-modal').show();
        });

        $('#hide-modal').click(function() {
            setTimeout(() => {
                $('#del-acct-modal').hide();
            }, 200);
        })
    });
</script>