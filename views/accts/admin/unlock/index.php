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
                    <span id="alert_only_letters" class="text-xs text-red-600">Letters only.</span>
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
                    <span id="alert_big_letters" class="text-xs text-red-600">Big letters only.</span>
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
                    <span id="alert_small_letters" class="text-xs text-red-600">Small letters only.</span>
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
                    <label for="words_capitalize">Words Capitalize</label>
                    <input type="text" name="words_capitalize" id="words_capitalize" class="w-full block rounded-md" />
                    <span id="alert_words_capitalize" class="text-xs text-red-600">Words are capitalize only.</span>
                    <script type="text/javascript">
                        $('#words_capitalize').keyup(function() {
                            $.ajax({
                                type: "POST",
                                url: "?validation=words_capitalize",
                                data: { words_capitalize: $(this).val() },
                                dataType: 'json',
                                success: function(response) {   
                                    $('#alert_words_capitalize').text(response.error); 
                                }
                            });
                        })
                    </script>
                </div>
                <div>
                    <label for="password">Password Format</label>
                    <input type="password" name="password" id="password" class="w-full block rounded-md" />
                    <span id="password_msg" class="text-xs text-red-600">Password format.</span>
                    <ul id="password-format" class="list-disc grid grid-cols-2 ml-4 mt-1">
                        <li id="min" class="text-xs text-red-600">8 Characters</li>
                        <li id="small_letters" class="text-xs text-red-600">Small Letter</li>
                        <li id="big_letters" class="text-xs text-red-600">Big Letter</li>
                        <li id="_number" class="text-xs text-red-600">Number</li>
                        <li id="special_char" class="text-xs text-red-600">Special Characters</li>
                    </ul> 
                    <script type="text/javascript">
                        $('#password-format').hide();
                        $('#password').focusout(() => {
                            $('#password-format').hide();
                            $('#password_msg').show();
                        })
                        $('#password').focus(() => {
                            $('#password_msg').hide();
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
                    <label for="email">Email Format</label>
                    <input type="email" name="email" id="email" class="w-full block rounded-md" />
                    <span id="error_email" class="text-xs text-red-600">Email format.</span> 
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
                    <span id="error_number" class="text-xs text-red-600">Numbers only.</span> 
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
                    <span id="error_whole_number" class="text-xs text-red-600">Whole number only.</span> 
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
                    <span id="error_decimal_number" class="text-xs text-red-600">Decimal number only.</span> 
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
                    <label for="negative_number">Only Negative Number</label>
                    <input type="text" name="negative_number" id="negative_number" class="w-full block rounded-md" />
                    <span id="error_negative_number" class="text-xs text-red-600">Negative number only.</span> 
                    <script type="text/javascript">
                        $('#negative_number').keyup(function (e) { 
                            $.ajax({
                                type: "POST",
                                url: "?validation=negative_number",
                                data: {negative_number: $(this).val()},
                                dataType: "json",
                                success: function (response) {
                                    $('#error_negative_number').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="mobile_number_format">Mobile Number format</label>
                    <input type="text" name="mobile_number_format" id="mobile_number_format" placeholder="09123456789" class="w-full block rounded-md" />
                    <span id="error_mobile_number_format" class="text-xs text-red-600">Mobile number format</span> 
                    <script type="text/javascript">
                        $('#mobile_number_format').keyup(function (e) { 
                            $.ajax({
                                type: "POST",
                                url: "?validation=mobile_number_format",
                                data: {mobile_number_format: $(this).val()},
                                dataType: "json",
                                success: function (response) {
                                    $('#error_mobile_number_format').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="future_date">Future Date</label>
                    <input type="date" name="future_date" id="future_date" class="w-full block rounded-md" />
                    <span id="error_future_date" class="text-xs text-red-600">Future date only.</span> 
                    <script type="text/javascript"> 
                        $('#future_date').change(function () {  
                            $.ajax({
                                type: "POST",
                                url: "?validation=future_data",
                                data: {future_date: $(this).val()},
                                dataType: "json",
                                success: function (response) { 
                                    $('#error_future_date').text(response.error);
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <label for="past_date">Past Date</label>
                    <input type="date" name="past_date" id="past_date" class="w-full block rounded-md" />
                    <span id="error_past_date" class="text-xs text-red-600">Past date only.</span> 
                    <script type="text/javascript"> 
                        $('#past_date').change(function () {  
                            $.ajax({
                                type: "POST",
                                url: "?validation=past_date",
                                data: {past_date: $(this).val()},
                                dataType: "json",
                                success: function (response) { 
                                    $('#error_past_date').text(response.error);
                                }
                            });
                        });
                    </script>
                </div> 
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="w-full block rounded-md" />
                    <span id="error_image" class="text-xs text-red-600">Upload image only.</span> 
                    <script type="text/javascript">
                        $('#image').change(function (event) {
                            var fileInput = event.target;
                            var formData = new FormData();
                            formData.append('image', fileInput.files[0]);

                            $.ajax({
                                type: "POST",
                                url: "?validation=upload_image",
                                data: formData,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function (response) {
                                    console.log(response);
                                    $('#error_image').text(response.error);
                                }
                            });
                        });
                    </script>
                </div> 
                <div>
                    <label for="document">Document</label>
                    <input type="file" name="document" id="document" class="w-full block rounded-md" />
                    <span id="error_document" class="text-xs text-red-600">Upload documents only.</span> 
                    <script type="text/javascript">
                        $('#document').change(function (event) {
                            var fileInput = event.target;
                            var formData = new FormData();
                            formData.append('document', fileInput.files[0]);

                            $.ajax({
                                type: "POST",
                                url: "?validation=upload_document",
                                data: formData,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function (response) {
                                    console.log(response);
                                    $('#error_document').text(response.error);
                                }
                            });
                        });
                    </script>
                </div> 
            </div> 
        </form>
    </div>
</main>

<script type="text/javascript">
    
</script>