<?php include view('accts/admin/unlock', 'head.auth'); ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="grid grid-cols-2 mb-5 sm:grid-cols-6">
                <div class="col-span-4 gap-x-3 block md:flex">
                    <div  class="flex items-center -ml-2 sm:ml-0">
                        <div class="relative">
                            <input name="start" type="date" id="start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Select date start">
                        </div>
                        <span class="mx-1 text-gray-500">to</span>
                        <div class="relative">
                            <input name="end" type="date" id="end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Select date end">
                        </div>
                    </div>
                    <div class="flex gap-x-3 justify-left mt-3 sm:mt-0">
                        <div>
                            <button type="button" id="today" class="btn -mr-1 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Today
                            </button>
                        </div>
                        <div>
                            <button type="button" id="clear" class="btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Clear
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 mx-0 md:ml-auto flex mt-3 sm:mt-0"> 
                    <div>
                        <button type="button" id="open-dels-modal" class="btn inline-flex items-center px-3 py-[6px] bg-red-600 border border-red-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M10.375 2.25a4.125 4.125 0 100 8.25 4.125 4.125 0 000-8.25zM10.375 12a7.125 7.125 0 00-7.124 7.247.75.75 0 00.363.63 13.067 13.067 0 006.761 1.873c2.472 0 4.786-.684 6.76-1.873a.75.75 0 00.364-.63l.001-.12v-.002A7.125 7.125 0 0010.375 12zM16 9.75a.75.75 0 000 1.5h6a.75.75 0 000-1.5h-6z" />
                            </svg>
                            <span class="ml-2">Remove</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto overflow-y-auto" style=" max-height: 700px;"> 
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="text-xs uppercase whitespace-nowrap text-white">Name</th>
                            <th data-priority="3" class="text-xs uppercase whitespace-nowrap text-white">Phone</th>
                            <th data-priority="4" class="text-xs uppercase whitespace-nowrap text-white">Email</th>
                            <th data-priority="5" class="text-xs uppercase whitespace-nowrap text-white">Created At</th>
                            <th data-priority="1" data-orderable="false" class="text-xs text-white uppercase whitespace-nowrap"></th>
                            <th data-priority="2" data-orderable="false" class="text-xs text-white uppercase whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php foreach ($conn::select('users') as $user) { ?>
                            <tr data-row-id="<?= $user['id'] ?>">
                                <td class="text-sm capitalize name"><?= $user['name'] ?></td>
                                <td class="text-sm phone"><?= $user['phone'] ?></td>
                                <td class="text-sm email"><?= $user['email'] ?></td>
                                <td class="text-sm date"><?= date('Y-m-d', strtotime($user['created_at'])) ?></td>
                                <td class="text-sm capitalize text-center">
                                    <input type="checkbox" data-row-data="<?= $user['id'] ?>" id="" class="select rounded-md" value="<?= $user['id'] ?>">
                                </td>
                                <td class="text-sm text-center">
                                    <button type="button" data-row-data="<?= $user['id'] ?>" title="Delete account" class="delete-btn text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button type="button" data-row-data="<?= $user['id'] ?>" title="Edit account" class="edit-btn text-green-500">
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
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="created" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created</label>
                        <input type="datetime-local" name="created" id="created" disabled class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                    </div>
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="del-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="delete-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="id" id="acct-id">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">
                    Delete Account
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    Are you sure you want to delete this account? Once this account is deleted, all of its resources and data will be permanently deleted. Please confirm you would like to permanently delete your account.
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

<div id="del-accts-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="deletes-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">
                    Delete Account
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    Are you sure you want to delete this account(s)? Once this account(s) is deleted, all of its resources and data will be permanently deleted. Please confirm you would like to permanently delete your account.
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-red-500 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Delete Account(s)
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000], 
        columns: [
            { title: 'name' },
            { title: 'phone' },
            {  title: 'email' },
            { title: 'created' },
            {  title: '<input type="checkbox" id="selectAll" class="btn focus:outline-none focus:ring-2 focus:ring-indigo-500 duration-150 rounded-md">' },
            { title: 'actions' },
        ],
        "drawCallback": () => {
            $('.edit-btn').click(function() {
                $('#edit-acct-modal').show();
                var id = $(this).data('row-data')
                $('#support-id').val(id);
                $.ajax({
                    url: '?rq=show_user',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#phone').val(data.phone);
                        $('#email').val(data.email);
                        $('#created').val(data.created);
                    }
                })
            });

            $('#edit-form').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '?rq=update_user',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(resp) {
                        var tableRow = $('tr[data-row-id="' + resp.id + '"]');

                        tableRow.find('.name').text(resp.name);
                        tableRow.find('.phone').text(resp.phone);
                        tableRow.find('.email').text(resp.email);

                        setTimeout(() => {
                            $('#edit-acct-modal').hide();
                        }, 200);
                    }
                });
            });

            $('.delete-btn').click(function() {
                var id = $(this).data('row-data');
                $('#del-acct-modal').show();
                $('#acct-id').val(id);
            });

            $('#delete-form').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '?rq=delete_user_acct',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(resp) {
                        if (resp.status == 200) {
                            var tableRow = $('tr[data-row-id="' + resp.id + '"]');
                            table.row(tableRow).remove().draw();
                        }

                        setTimeout(() => {
                            $('#del-acct-modal').hide();
                        }, 200);
                    }
                });
            });
        }
    }).columns.adjust().responsive.recalc();

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var minDate = $('#start').val();
            var maxDate = $('#end').val();
            var date = data[3]; 
            if (minDate === '' || maxDate === '') {
                return true;
            }
            if (date >= minDate && date <= maxDate) {
                return true;
            }
            return false;
        }
    );

    $('#start, #end').on('change', () => {
        table.draw(); 
    });

    var today = new Date().toISOString().substr(0, 10);
    $('#today').click(() => {
        $('#start').val(today);
        $('#end').val(today);
        table.draw(); 
    });

    $('#clear').click(() => {
        $('#start').val('');
        $('#end').val('');
        table.draw(); 
    });

    $('.del-hide-modal').click(() => {
        setTimeout(() => {
            $('#del-acct-modal').hide();
            $('#edit-acct-modal').hide();
            $('#add-acct-modal').hide();
            $('#del-accts-modal').hide();
        }, 200)
    });

    $('.background').on('keydown click', (e) => {
        $('#del-acct-modal').hide();
        $('#edit-acct-modal').hide();
        $('#add-acct-modal').hide();
        $('#del-accts-modal').hide();
    });

    $('#selectAll').click(function() {
        $('.select').not(this).prop('checked', this.checked);
    });

    $('#open-dels-modal').click(() => {
        $('#del-accts-modal').show();
    });

    $('#deletes-form').submit(function(e) {
        e.preventDefault();

        var checkboxes = $('.select');
        var rowData = [];
        checkboxes.each(function() {
            if ($(this).is(':checked')) {
                var data = $(this).data('row-data');
                rowData.push(data);
            }
        }); 

        $.ajax({
            url: '?rq=delete_users',
            type: 'POST',
            data: { data: rowData },
            dataType: 'json',
            success: function(resp) {
                if (resp.status == 200) { 
                    rowData.forEach(function(id) {
                        var tableRow = $('tr[data-row-id="' + id + '"]');
                        table.row(tableRow).remove();
                    });
                    table.draw(); 
                    
                    setTimeout(() => { $('#del-accts-modal').hide(); }, 200)
                } else if (resp.status == 400) {
                    alert('Select a row to delete.');
                }
            }
        });
    }); 
</script>