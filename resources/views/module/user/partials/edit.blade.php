<div class="row">
    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="melli_code" namefa="کد ملی" require="0" :value="$value->details->melli_code"></x-form.text>
    </div>

    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="phone" namefa="شماره تماس" require="0" :value="$value->details->phone"></x-form.text>
    </div>

    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="birth_date" kind="date" namefa="تاریخ تولد" require="0" :value="$value->details->birth_date"></x-form.text>
    </div>

    <div class="col-6 col-md-12">
        <x-form.textarea type="کاربر" name="bio" namefa="بیوگرافی" require="0" :value="$value->details->bio"></x-form.textarea>
    </div>

    <div class="col-6 col-md-12">
        <x-form.textarea type="کاربر" name="address" namefa="آدرس" require="0" :value="$value->details->address"></x-form.textarea>
    </div>

</div>
