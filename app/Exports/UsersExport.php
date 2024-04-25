<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $columns = ['firstname', 'lastname','address','country','phone_number','email'];
    public function collection()
    {
        return User::select($this->columns)->get();
    }
    public function headings():array 
    {
        return $this->columns;
    }
}