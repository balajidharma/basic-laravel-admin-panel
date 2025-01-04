<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Reaction\ReactionCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Reaction\ReactionUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Reaction\ReactionCreateData;
use BalajiDharma\LaravelAdminCore\Data\Reaction\ReactionUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\ReactionGrid;
use BalajiDharma\LaravelReaction\Models\Reaction;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Reaction::class);
        $reactions = (new Reaction)->newQuery();

        $crud = (new ReactionGrid)->list($reactions);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Reaction::class);
        $crud = (new ReactionGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReactionCreateData $data, ReactionCreateAction $reactionCreateAction)
    {
        $this->authorize('adminCreate', Reaction::class);
        $reactionCreateAction->handle($data);

        return crudRedirect('admin.reaction.index', 'Reaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Reaction $reaction)
    {
        $this->authorize('adminView', $reaction);
        $crud = (new ReactionGrid)->show($reaction);
        $relations = [];

        if ($reaction->reactor_type == 'App\Models\User') {
            $relations[] = [
                'crud' => (new \BalajiDharma\LaravelAdminCore\Grid\UserGrid)->setTitle('Reactor')->show($reaction->reactor()->first()),
                'view' => 'show',
            ];
        }

        return view('admin.crud.show', compact('crud', 'relations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Reaction $reaction)
    {
        $this->authorize('adminUpdate', $reaction);
        $crud = (new ReactionGrid)->form($reaction);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ReactionUpdateData $data, Reaction $reaction, ReactionUpdateAction $reactionUpdateAction)
    {
        $this->authorize('adminUpdate', $reaction);
        $reactionUpdateAction->handle($data, $reaction);

        return crudRedirect('admin.reaction.index', 'Reaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reaction $reaction)
    {
        $this->authorize('adminDelete', $reaction);
        $reaction->delete();

        return crudRedirect('admin.reaction.index', 'Reaction deleted successfully.');
    }
}
