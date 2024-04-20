<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted' => 'يجب قبول :attribute:',
    'active_url' => ':attribute ليست عنوان URL صالحًا.',
    'after' => 'يجب أن تكون :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن تكون :attribute تاريخًا بعد أو يساوي:date.',
    'alpha' => 'لا يجوز أن تحتوي :attribute إلا على أحرف.',
    'alpha_dash' => 'لا يجوز أن تحتوي :attribute إلا على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'لا يجوز أن تحتوي :attribute إلا على أحرف وأرقام.',
    'array' => 'يجب أن تكون :attribute مصفوفة.',
    'before' => 'يجب أن تكون :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن تكون :attribute تاريخًا قبل أو يساوي:date.',
    'between' => [
        'numeric' => 'يجب أن تكون :attribute بين :min و:max.',
         'file' => 'يجب أن تكون :attribute بين الحد الأدنى و:الحد الأقصى للكيلوبايت.',
         'string' => 'يجب أن تكون :attribute بين الحد الأدنى و:الحد الأقصى للأحرف.',
         'array' => 'يجب أن تحتوي :attribute على عناصر بين :min و :max.',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأ.',
     'confirmed' => 'تأكيد كلمة المرور غير متطابق.',
     'date' => ':attribute ليست تاريخًا صالحًا.',
     'date_equals' => 'يجب أن تكون :attribute تاريخًا يساوي :date.',
     'date_format' => 'لا تتطابق :attribute مع التنسيق :format.',
     'مختلف' => 'يجب أن تكون الخاصية :attribute و :other مختلفة.',
     'digits' => 'يجب أن تكون :attribute :digits digits.',
     'digits_between' => 'يجب أن تكون :attribute بين :min و:max digit.',
     'dimensions' => 'تحتوي :attribute على أبعاد صورة غير صالحة.',
     'distinct' => 'يحتوي الحقل :attribute على قيمة مكررة.',
     'email' => 'يجب أن تكون :attribute عنوان بريد إلكتروني صالحًا.',
     'ends_with' => 'يجب أن تنتهي :attribute بأحد القيم التالية: :values.',
     'exists' => ':attribute المحددة غير صالحة.',
     'file' => 'يجب أن تكون :attribute ملفًا.',
     'filled' => 'يجب أن يحتوي الحقل :attribute على قيمة.',
    'gt' => [
        'numeric' => 'يجب أن تكون :attribute أكبر من القيمة:.',
         'file' => 'يجب أن تكون :attribute أكبر من القيمة بالكيلوبايت.',
         'string' => 'يجب أن تكون :attribute أكبر من أحرف القيمة:.',
         'array' => 'يجب أن تحتوي :attribute على أكثر من :عناصر القيمة.',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون :attribute أكبر من أو تساوي :القيمة.',
         'file' => 'يجب أن تكون :attribute أكبر من أو تساوي: القيمة بالكيلوبايت.',
         'string' => 'يجب أن تكون :attribute أكبر من أو تساوي أحرف القيمة:.',
         'array' => 'يجب أن تحتوي :attribute على عناصر قيمة أو أكثر.',
    ],
    'image' => 'يجب أن تكون :attribute صورة.',
     'in' => ':attribute المحددة غير صالحة.',
     'in_array' => 'الحقل :attribute غير موجود في :other.',
     'integer' => 'يجب أن تكون :attribute عددًا صحيحًا.',
     'ip' => 'يجب أن تكون :attribute عنوان IP صالحًا.',
     'ipv4' => 'يجب أن تكون :attribute عنوان IPv4 صالحًا.',
     'ipv6' => 'يجب أن تكون :attribute عنوان IPv6 صالحًا.',
     'json' => 'يجب أن تكون :attribute سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'يجب أن تكون :attribute أقل من القيمة:.',
         'file' => 'يجب أن تكون :attribute أقل من القيمة بالكيلوبايت.',
         'string' => 'يجب أن تكون :attribute أقل من أحرف القيمة:.',
         'array' => 'يجب أن تحتوي :attribute على عناصر أقل من :value.',
    ],
    'lte' => [
        'numeric' => 'يجب أن تكون :attribute أقل من أو تساوي :value .',
         'file' => 'يجب أن تكون :attribute أقل من أو تساوي:value بالكيلوبايت.',
         'string' => 'يجب أن تكون :attribute أقل من أو تساوي أحرف :value.',
         'array' => 'يجب ألا تحتوي :attribute على أكثر من :value عناصر .',
    ],
    'max' => [
        'numeric' => 'لا يجوز أن تكون :attribute أكبر من :max.',
         'file' => 'لا يجوز أن تكون :attribute أكبر من :max .',
         'string' => 'لا يجوز أن تكون :attribute أكبر من :max لعدد الأحرف.',
         'array' => 'لا يجوز أن تحتوي :attribute على أكثر من :max من العناصر.',
    ],
    'mimes' => ' :attribute يجب أن يكون ملفًا من النوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'min' => [
        'numeric' => ' :attribute يجب أن يكون على الأقل :min.',
        'file' => ' :attribute يجب أن يكون على الأقل :min kilobytes.',
        'string' => ' :attribute يجب أن يكون على الأقل :min characters.',
        'array' => 'he :attribute يجب أن يكون على الأقل :min items.',
    ],
    'not_in' => ' :attribute المحدد غير صالح.',
    'not_regex' => ' :attribute التنسيق غير صالح.',
    'numeric' => ' :attribute يجب أن يكون رقما.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => ' :attribute يجب أن يكون الحقل موجودا.',
    'regex' => ' :attribute التنسيق غير صالح.',
    'required' => ' هذا الحقل مطلوب.',
    'phone' => 'يجب ان يكون رقم الهاتف المدخل صالح',
    'required_if' => ' :attribute الحقل مطلوب عندما :other is :value.',
    'required_unless' => ' :attribute الحقل مطلوب إلا إذا :other is in :values.',
    'required_with' => ' :attribute الحقل مطلوب عندما :values موجود.',
    'required_with_all' => ' :attribute الحقل مطلوب عندما :values موجود.',
    'required_without' => ' :attribute الحقل مطلوب عندما :values غير موجود.',
    'required_without_all' => ' :attribute الحقل مطلوب عندما لا شيء :values موجود.',
    'same' => ' :attribute و :other يجب أن تتطابق.',
    'size' => [
        'numeric' => ' :attribute لا بد وأن :size.',
        'file' => ' :attribute لا بد وأن :size kilobytes.',
        'string' => ' :attribute لا بد وأن :size احرف.',
        'array' => ' :attribute يجب أن تحتوي على :size عناصر.',
    ],
    'starts_with' => ' :attribute يجب أن يبدأ بأحد الأمور التالية: :values.',
    'string' => ' :attribute يجب أن تكون سلسلة.',
    'timezone' => ' :attributeيجب أن تكون منطقة صالحة.',
    'unique' => ' البريد الألكتروني هذا  تم اخذه بالفعل.',
    'uploaded' => ' :attribute فشل التحميل.',
    'url' => ' :attribute التنسيق غير صالح.',
    'uuid' => ' :attribute يجب أن يكون UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
