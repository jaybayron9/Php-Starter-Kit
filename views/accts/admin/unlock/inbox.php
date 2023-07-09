<?php include view('accts/admin/unlock', 'head.auth'); ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64">
    <div class="px-4 h-full my-[80px]">
        <div class="grid grid-cols-6 gap-x-4">
            <div class="col-span-2">
                <input type="search" id="search" placeholder="Search User" class="w-full mb-2 px-2 py-2 mr-4 rounded-full outline-none sticky left-0 placeholder:text-sm">
                <ul class="overflow-y-auto py-2" style="max-height: 500px;">
                    <li class="bg-blue-100 p-2 rounded-lg mb-0 hover:cursor-pointer min-w-[100px] relative">
                        <div class="flex flex-row gap-x-2">
                            <div class="flex flex-row">
                                <img src="assets/storage/<?= $admin_info[0]['profile_photo_path'] ?>" alt="Profile picture" class="h-14 w-14 rounded-full bg-black">
                                <div class="absolute h-[15px] w-[15px] mt-10 ml-8 bg-green-400 rounded-full border-2 border-gray-600"></div>
                            </div>
                            <div class="sm:flex hidden flex-col">
                                <h1 class="font-semibold text-[15px]">Jay Bayron</h1>
                                <p class="flex flex-row">
                                    <span class="text-sm">Message here</span><span class="text-sm mt-1">.5m</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="hover:bg-gray-200 p-2 rounded-lg mb-0 hover:cursor-pointer min-w-[100px] relative">
                        <div class="flex flex-row gap-x-2">
                            <div class="flex flex-row">
                                <img src="assets/storage/uploads/she.png" alt="Profile picture" class="h-14 w-14 rounded-full bg-black">
                                <div class="absolute h-[15px] w-[15px] mt-10 ml-8 bg-green-400 rounded-full border-2 border-gray-600"></div>
                            </div>
                            <div class="sm:flex hidden flex-col">
                                <h1 class="font-semibold text-[15px]">Sheilah Bayron</h1>
                                <p class="flex flex-row">
                                    <span class="text-sm">Message here</span><span class="text-sm mt-1">.1h</span>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-span-4">
                <div class="ml-3 flex flex-row gap-2 mb-3">
                    <div class="flex flex-row ">
                        <img src="assets/storage/<?= $admin_info[0]['profile_photo_path'] ?>" alt="Profile picture" class="overflow-x-auto h-12 w-12 min-w-[49px] rounded-full bg-black">
                        <div class="absolute h-[15px] w-[15px] mt-8 ml-7 bg-green-400 rounded-full border-2 border-gray-600"></div>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="font-semibold text-[18px] whitespace-nowrap">Jay Bayron</h1>
                        <span class="text-sm">Active now</span> 
                    </div>
                    <div class="ml-auto mt-[7px] lg:fixed sticky right-6">
                        <button class="text-blue-600 hover:text-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="chatDisplay" class="border border-gray-300 shadow-inner bg-gray-50 rounded-md p-5 mb-4 h-screen overflow-y-auto max-h-[445px]"></div> 
                <form id="sm-form" class="flex gap-x-1">
                    <div class="mt-1">
                        <button class="text-blue-600 hover:text-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-2 ml-1">
                        <button class="text-blue-600 hover:text-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-2 mr-2 ml-1">
                        <button class="text-blue-600 hover:text-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm9 4.5a.75.75 0 00-1.5 0v7.5a.75.75 0 001.5 0v-7.5zm1.5 0a.75.75 0 01.75-.75h3a.75.75 0 010 1.5H16.5v2.25H18a.75.75 0 010 1.5h-1.5v3a.75.75 0 01-1.5 0v-7.5zM6.636 9.78c.404-.575.867-.78 1.25-.78s.846.205 1.25.78a.75.75 0 001.228-.863C9.738 8.027 8.853 7.5 7.886 7.5c-.966 0-1.852.527-2.478 1.417-.62.882-.908 2-.908 3.083 0 1.083.288 2.201.909 3.083.625.89 1.51 1.417 2.477 1.417.967 0 1.852-.527 2.478-1.417a.75.75 0 00.136-.431V12a.75.75 0 00-.75-.75h-1.5a.75.75 0 000 1.5H9v1.648c-.37.44-.774.602-1.114.602-.383 0-.846-.205-1.25-.78C6.226 13.638 6 12.837 6 12c0-.837.226-1.638.636-2.22z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-full">
                        <textarea id="message" name="message" cols="2" rows="1" placeholder="Aa" class="w-full border border-gray-400 shadow rounded-full px-3 focus:outline-none"></textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="text-blue-600 hover:bg-gray-300 hover:text-sky-500 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $('body').addClass('overflow-y-hidden');
</script>