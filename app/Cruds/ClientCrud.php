<?php

namespace App\Cruds;

use App\Models\Client;
use App\Scriptpage\Repository\BaseCrud;

class ClientCrud extends BaseCrud
{

    protected array $messages = [
        'same' => 'The :attribute and :other must match.',
        'size' => 'The :attribute must be exactly :size.',
        'between' => 'The :attribute value :input is not between :min - :max.',
        'in' => 'The :attribute must be one of the following types: :values',
    
        'email.required' => 'We need to know your email address!',
    ];

    protected string $modelClass = Client::class;

    function setDataValidation(): array
    {
        return [
            'name' => 'required|max:25',
            'cpf' => 'required|max:11',
            'email' => 'required|email',
            'birth' => 'required|date',
            'tel_num' => 'required|numeric',
            'cep' => 'required|max:11',
            'state' => 'required|max:35',
            'city' => 'required|max:35',
            'address' =>'required|max:100'
        ];
    }

    function setDataPayload(array $data): array
    {
        // $birthDate = DateTime::createFromFormat('d/m/Y', $data['birth']);
        // $formattedBirthDate = $birthDate->format('Y/m/d');
        // dd($formattedBirthDate);
        $birthDate = $data['birth'];
        $birthDate = explode('/', $birthDate);
        $invertedDateString = implode('-', array_reverse($birthDate));
      
        return [
            'name' => $data['name'],
            'cpf' => $data['cpf'],
            'email' => $data['email'],
            'birth' => $invertedDateString,
            'tel_num' => $data['tel_num'],
            'cep' => $data['cep'],
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ];
    }

}
