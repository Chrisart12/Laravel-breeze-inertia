<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index()
    {

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('firstname', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });

        $users = QueryBuilder::for(User::class)
                ->defaultSort('firstname')
                ->allowedSorts(['firstname', 'lastname', 'email', 'created_at'])
                ->allowedFilters(['firstname', 'lastname', 'email', 'created_at', $globalSearch])
                ->paginate(8)
                ->withQueryString();

        return Inertia::render('Users/Index', ['users' => $users])->table(function (InertiaTable $table) {
            // $table->column('id', 'ID', searchable: true, sortable: true);
            $table->column('firstname', 'Prénom', searchable: true, sortable: true);
            $table->column('lastname', 'Nom', searchable: true, sortable: true);
            $table->column('email', 'Email', searchable: true, sortable: true);
            $table->column('created_at', 'Date de création', searchable: true, sortable: true);
            $table->column(label: 'Actions');
            
        });
    }

    public function destroy(User $user)
    {
        // posts.destroy
        User::destroy($user->id);

        return redirect()->route('users.index');
    }
}