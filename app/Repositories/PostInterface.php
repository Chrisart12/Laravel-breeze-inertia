<?php

namespace App\Repositories;

use App\Models\Post;

interface PostInterface 
{
	public function getAll();
    public function getById($id);
    public function save(Post $customer, Array $inputs);
    public function store(Array $inputs);
    public function update($id, Array $inputs);

}
