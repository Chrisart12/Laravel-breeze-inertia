<?php

namespace App\Repositories;

use App\Models\Post;


class PostRepository implements PostInterface
{
	protected $post;

    /**
     * Undocumented function
     *
     * @param Post $post
     */
	public function __construct(Post $post)
	{
		$this->post = $post;
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function getAll()
    {
        return $this->post::all();
    }

    public function getById($id)
	{
		return $this->post->findOrFail($id);
	}


    public function save(Post $post, Array $inputs)
	{
		// first school_id by default if not set
		$post->user_id = auth()->id();
		$post->title = $inputs['title'];
		$post->description = $inputs['description'];
		
		$post->save();
	}

    public function store(Array $inputs)
	{
		$post = new $this->post;

		$this->save($post, $inputs);

		return $post;
	}

    public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}
}