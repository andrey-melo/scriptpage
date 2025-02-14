<?php

namespace App\Repositories;

use App\Models\Client;
use App\Scriptpage\Repository\BaseRepository;

class ClientRepository extends BaseRepository
{
    protected string $modelClass = Client::class;

    function getData($take = null, $paginate = null) {
        $query = $this->newQuery();
        
        if( !empty($this->search) ) {
            $query->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        }

        return $this->doQuery($query, $take, $paginate);
    }
}
