<?php include view('accts/admin/unlock', 'head.auth') ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<div id="div-alert" hidden class="fixed z-30 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px] animate__animated">
    <p id="alert-msg"></p>
</div>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64">
    <div class="px-4 my-[80px]">
        <!-- Backup Database -->
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Backup Database</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Permanently delete your account.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 col-span-2"> 
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="max-w-xl text-sm text-gray-600">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                        </div>
                        <div class="mt-5">
                            <a href="?rq=backup_database" id="backup" class="btn inline-flex items-center justify-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Backup Database
                            </a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $('#backup').click((e) => {
        dialog('border-yellow-600 text-yellow-700', 'Data Successfully Backup');
    });
</script>