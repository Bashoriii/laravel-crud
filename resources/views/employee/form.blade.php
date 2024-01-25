<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Employee Form</title>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
        @vite(["resources/js/app.js"])
    </head>
    <body>
        <div class="container-wrapper">
            <div class="form-input-container">
                <h1 class="mb-3">Add New Employee</h1>
                <form method="post" action="{{route('table.store')}}" class="needs-validation" novalidate>
                    @csrf
                    @method('post')
                    <div class="name-wrapper d-flex justify-content-between align-items-center gap-3">
                        <div class="mb-3">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" required>
                            <div class="invalid-feedback">
                                Please enter your first name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" required />
                            <div class="invalid-feedback">
                                Please enter your last name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" />
                        </div>
                    </div>
                    <div class="phone-email-wrapper d-flex justify-content-between align-items-center gap-3">
                        <div class="mb-3">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phoneNumber" class="form-control only-number" required />
                            <div class="invalid-feedback">
                                Please enter a valid phone number.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" name="email" class="form-control" required />
                            <div class="invalid-feedback">
                                Please enter a valid email.
                            </div>
                        </div>
                    </div>
                    <div class="address-wrapper d-flex justify-content-between align-items-center gap-3">
                        <div class="mb-3">
                            @php
                                $provinces = new App\Http\Controllers\DependantDropdownController;
                                $provinces= $provinces->provinces();
                            @endphp
                            <label class="form-label">Province</label>
                            <div>
                                <select class="form-control" name="province" id="province">
                                    <option>Select Province</option>
                                    @foreach ($provinces as $item)
                                        <option data-id="{{ $item->id ?? '' }}" value="{{ $item->name ?? '' }}">{{ $item->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <div>
                                <select class="form-control" name="city" id="city">
                                    <option>Select City</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Zip Code</label>
                            <input type="text" name="zip_code" class="form-control only-number" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Street Adress</label>
                        <textarea class="form-control" name="street" rows="3"></textarea>
                    </div>
                    <div class="ktp-bank-wrapper d-flex justify-content-between align-items-center gap-3">
                        <div class="ktp-current-position">
                            <div class="mb-3">
                                <select class="form-control" name="current_position">
                                    <option>Current Position</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Etc">Etc</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">KTP Number <span class="text-danger">*</span></label>
                                <input type="text" name="ktp_number" id="ktpNumber" class="form-control only-number" required />
                                <div class="invalid-feedback">
                                    Please enter your KTP Number.
                                </div>
                            </div>
                        </div>
                        <div class="bank-account">
                            <div class="mb-3">
                                <select class="form-control" name="bank_account">
                                    <option>Select Bank Account</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BNI">BNI</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bank Account Number</label>
                                <input type="text" name="bank_account_number" id="bankNumber" class="form-control only-number" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attach File</label>
                        <input type="file" name="file" id="bankNumber" class="form-control" />
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </body>

    <script>
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })();

        // Only Number Input
        const onlyNumberInputs = document.querySelectorAll('.only-number');
        onlyNumberInputs.forEach(function(input) {
            input.addEventListener('keydown', function(e) {
                if (isNaN(e.key) && e.key !== 'Backspace') {
                    e.preventDefault();
                }
            });
        });

        // Dropdown provinces and cities
        function onChangeSelect(url, id, name) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function (data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>Select City</option>');

                    $.each(data, function (key, value) {
                        $('#' + name).append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            });
            console.log(url, id, name);
        }
        $(function () {
            $('#province').on('change', function () {
                var selectedId = $(this).find(':selected').data('id');
                onChangeSelect('{{ route("cities") }}', selectedId, 'city');
            });
        });
    </script>
</html>
