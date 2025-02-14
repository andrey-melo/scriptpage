<?php

namespace App\Repositories;

use App\Models\User;
use App\Scriptpage\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    protected string $modelClass = User::class;

    function getData($take = null, $paginate = null) {
        $query = $this->newQuery();
        
        if( !empty($this->search) ) {
            $query->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        }

        return $this->doQuery($query, $take, $paginate);
    }
}
