<?php

namespace App\Imports;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
       /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        
        
        return new User([
            
            'username' => $row['username'],
            'role' => $row['role'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),

        ]);

    }
}


