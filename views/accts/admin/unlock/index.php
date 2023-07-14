<?php include view('accts/admin/unlock', 'head.auth') ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 my-[80px]">
        <form id="validation-form" action="?vs=_admin/" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-5">
                <div>
                    <label for="only_letters">Only Letters</label>
                    <input type="text" name="only_letters" id="only_letters" class="w-full block rounded-md" />
                    <span id="alert_only_letters" class="text-xs text-red-400"></span>
                    <script type="text/javascript">
                        $('#only_letters').keyup(() => {
                            $.ajax({
                                type: "POST",
                                url: "?validation=only_letter",
                                data: { only_letters: $('#only_letters').val() },
                                dataType: 'json',
                                success: function(response) {
                                    $('#alert_only_letters').text(response.error);
                                }
                            });
                        })
                    </script>
                </div>
                <div>
                    <label for="only_letters">Only Big Letters</label>
                    <input type="text" name="only_big_letters" id="only_big_letters" class="w-full block rounded-md" />
                    <span id="alert_big_letters" class="text-xs text-red-400"></span>
                    <script type="text/javascript">
                        $('#only_big_letters').keyup(function() {
                            $.ajax({
                                type: "POST",
                                url: "?validation=only_big_letters",
                                data: { only_big_letters: $(this).val() },
                                dataType: 'json',
                                success: function(response) { 
                                    $('#alert_big_letters').text(response.error); 
                                }
                            });
                        })
                    </script>
                </div>
                <div>
                    <label for="only_small_letters">Only Small Letters</label>
                    <input type="text" name="only_small_letters" id="only_small_letters" class="w-full block rounded-md" />
                    <span id="alert_small_letters" class="text-xs text-red-400"></span>
                    <script type="text/javascript">
                        $('#only_small_letters').keyup(function() {
                            $.ajax({
                                type: "POST",
                                url: "?validation=only_small_letters",
                                data: { only_small_letters: $(this).val() },
                                dataType: 'json',
                                success: function(response) { 
                                    $('#alert_small_letters').text(response.error); 
                                }
                            });
                        })
                    </script>
                </div>
                <div>
                    <label for="password">Password Format</label>
                    <input type="text" name="password" id="password" class="w-full block rounded-md" />
                    <ul id="password-format" class="list-disc grid grid-cols-2 ml-4">
                        <li id="min" class="text-xs text-red-400">8 Characters</li>
                        <li id="small_letters" class="text-xs text-red-400">Small Letter</li>
                        <li id="big_letters" class="text-xs text-red-400">Big Letter</li>
                        <li id="_number" class="text-xs text-red-400">Number</li>
                        <li id="special_char" class="text-xs text-red-400">Special Characters</li>
                    </ul> 
                    <script type="text/javascript">
                        $('#password-format').hide();
                        $('#password').focusout(() => {
                            $('#password-format').hide();
                        })
                        $('#password').focus(() => {
                            $('#password-format').show();
                            $('#password').keyup(function() {
                                $.ajax({
                                    type: "POST",
                                    url: "?validation=password",
                                    data: {password: $(this).val()},
                                    dataType: "json",
                                    success: function (response) { 
                                        response.lenght == '' ? $('#min').hide() : $('#min').show();
                                        response.small == '' ? $('#small_letters').hide() : $('#small_letters').show();
                                        response.number == '' ? $('#_number').hide() : $('#_number').show();
                                        response.big == '' ? $('#big_letters').hide() : $('#big_letters').show();
                                        response.symbol == '' ? $('#special_char').hide() : $('#special_char').show();
                                    }
                                });
                            })
                        })
                    </script>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="w-full block rounded-md" />
                    <span id="error_email" class="text-xs text-red-400"></span> 
                    <script type="text/javascript">
                        $('#email').keypress(function (e) { 
                            $.ajax({
                                type: "POST",
                                url: "?validation=email",
                                data: {email: $(this).val()},
                                dataType: "json",
                                success: function (response) {
                                    $('#error_email').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="number">Only Number</label>
                    <input type="text" name="number" id="number" class="w-full block rounded-md" />
                    <span id="error_number" class="text-xs text-red-400"></span> 
                    <script type="text/javascript">
                        $('#number').keyup(function (e) { 
                            $.ajax({
                                type: "POST",
                                url: "?validation=only_number",
                                data: {number: $(this).val()},
                                dataType: "json",
                                success: function (response) {
                                    $('#error_number').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="whole_number">Only Whole Number</label>
                    <input type="text" name="whole_number" id="whole_number" class="w-full block rounded-md" />
                    <span id="error_whole_number" class="text-xs text-red-400"></span> 
                    <script type="text/javascript">
                        $('#whole_number').keyup(function (e) { 
                            $.ajax({
                                type: "POST",
                                url: "?validation=whole_number",
                                data: {whole_number: $(this).val()},
                                dataType: "json",
                                success: function (response) {
                                    $('#error_whole_number').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="decimal_number">Only Decimal Number</label>
                    <input type="text" name="decimal_number" id="decimal_number" class="w-full block rounded-md" />
                    <span id="error_decimal_number" class="text-xs text-red-400"></span> 
                    <script type="text/javascript">
                        $('#decimal_number').keyup(function (e) { 
                            $.ajax({
                                type: "POST",
                                url: "?validation=decimal_number",
                                data: {decimal_number: $(this).val()},
                                dataType: "json",
                                success: function (response) {
                                    $('#error_decimal_number').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="datetime_local">DateTime-local</label>
                    <input type="datetime-local" name="datetime_local" id="datetime_local" class="w-full block rounded-md" />
                </div>
                <div>
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="w-full block rounded-md" />
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="w-full block rounded-md" />
                </div>
                <div>
                    <label for="document">Document</label>
                    <input type="file" name="document" id="document" class="w-full block rounded-md" />
                </div>
                <div>
                    <label for="folder">Folder</label>
                    <input type="file" name="folder" id="folder" class="w-full block rounded-md" />
                </div>
            </div> 
        </form>
    </div>
</main>

<script type="text/javascript">
    
</script>