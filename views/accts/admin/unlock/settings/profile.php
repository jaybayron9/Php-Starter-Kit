<?php include view('accts/admin/unlock', 'head.auth') ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64">
    <div class="px-4 my-[80px]">
        <div class="p-6 text-gray-50 container flex flex-col mx-auto space-y-6 ng-untouched ng-pristine ng-valid">
            <form id="profile" class="bg-gray-100 rounded-md shadow-sm">
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md bg-gray-100">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <p class="font-medium text-gray-900">Profile Settings</p>
                        <!-- <p class="text-xs"></p> -->
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                        <div class="col-span-full sm:col-span-3">
                            <label for="name" class="text-sm text-gray-700">Name</label>
                            <input id="name" type="text" name="name" placeholder="Enter Full Name" value="<?= $admin_info[0]['name'] ?>" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 capitalize" required>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="username" class="text-sm text-gray-700">Username</label>
                            <input id="username" type="text" name="username" maxlength="35" placeholder="Enter Username" value=" " class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="email" class="text-sm text-gray-700">Email</label>
                            <input id="email" type="email" name="email" maxlength="35" placeholder="example300@gmail.com" value=" " class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="role" class="text-sm text-gray-700">Position <span class="text-red-500">This field can't be change.</span></label>
                            <input id="role" type="text" disabled placeholder=" " value=" " class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                    </div>
                </fieldset>
                <div class="flex">
                    <button type="submit" class="ml-auto mb-5 mr-6 px-4 py-2 border rounded-md border-gray-500 bg-gradient-to-r from-red-500 to-gray-700 text-white hover:text-red-200 shadow-md hover:border-gray-50">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>