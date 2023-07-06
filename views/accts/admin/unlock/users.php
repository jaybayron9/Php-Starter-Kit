<?php include view('accts/admin/unlock', 'head.auth'); ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <h1 class="mb-3 font-bold text-2xl">USERS</h1>
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <style>
            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: .5rem;
                /*pl-2*/
                padding-bottom: .5rem;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: .25rem;
                border-color: #edf2f7;
                /*border-gray-200*/
                background-color: #edf2f7;
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
            table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important;
                /*bg-indigo-500*/
            }
        </style>
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1" class="text-xs uppercase whitespace-nowrap">Name</th>
                        <th data-priority="3" class="text-xs uppercase whitespace-nowrap">Phone</th>
                        <th data-priority="4" class="text-xs uppercase whitespace-nowrap">Email</th>
                        <th data-priority="5" class="text-xs uppercase whitespace-nowrap">Created At</th>
                        <th data-priority="2" class="text-xs uppercase whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($conn::select('users') as $user) { ?>
                        <tr>
                            <td class="text-sm capitalize name"><?= $user['name'] ?></td>
                            <td class="text-sm"><?= $user['phone'] ?></td>
                            <td class="text-sm"><?= $user['email'] ?></td>
                            <td class="text-sm"><?= date('M d, Y | h:i a', strtotime($user['created_at'])) ?></td>
                            <td class="text-sm text-center">
                                <button type="button" data-row-data="<?= $user['id'] ?>" class="delete text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button type="button" data-row-data="<?= $user['id'] ?>" class="edit text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<div id="edit-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="edit-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="id" id="support-id">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900 mb-2">
                    Edit Account
                </div>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>  
                    <div>
                        <label for="created" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created</label>
                        <input type="datetime-local" name="created" id="created" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="del-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="delete-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="id" id="acct-id">
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
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-red-500 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Delete Account
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
            responsive: true,
            "drawCallback": () => {
                $('.edit').click(function() {
                    $('#edit-acct-modal').show();
                    var id = $(this).data('row-data')
                    $('#support-id').val(id);
                    $.ajax({
                        url: '?rq=show_support', 
                        type: 'POST',
                        data: {id: id}, 
                        dataType: 'json',
                        success: function(data) { 
                            $('#name').val(data.name);
                            $('#phone').val(data.phone);
                            $('#email').val(data.email);
                            $('#created').val(data.created);
                        }
                    })
                });

                $('.delete').click(function() {
                    var id = $(this).data('row-data');
                    $('#del-acct-modal').show();
                    $('#acct-id').val(id);
                });
            }
        })
        .columns.adjust()
        .responsive.recalc();

    $('.del-hide-modal').click(function() {
        setTimeout(() => {
            $('#del-acct-modal').hide();
            $('#edit-acct-modal').hide();
        }, 200)
    })

    $('.background').click(function() {
        $('#del-acct-modal').hide();
        $('#edit-acct-modal').hide();
    })

    $('#delete-form').submit(function(e) {
        e.preventDefault();

        alert('You clicked');
    });

    $('#edit-form').submit(function(e) {
        e.preventDefault();

    })
</script>