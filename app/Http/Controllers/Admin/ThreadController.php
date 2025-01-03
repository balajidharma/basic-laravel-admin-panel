<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Forum\ThreadCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Forum\ThreadUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Forum\ThreadCreateData;
use BalajiDharma\LaravelAdminCore\Data\Forum\ThreadUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\ActivityLogGrid;
use BalajiDharma\LaravelAdminCore\Grid\AttributeGrid;
use BalajiDharma\LaravelAdminCore\Grid\CommentGrid;
use BalajiDharma\LaravelAdminCore\Grid\ReactionGrid;
use BalajiDharma\LaravelAdminCore\Grid\ThreadGrid;
use BalajiDharma\LaravelForum\Models\Thread;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Thread::class);
        $threads = (new Thread)->newQuery();

        $crud = (new ThreadGrid)->list($threads);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Thread::class);
        $crud = (new ThreadGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ThreadCreateData $data, ThreadCreateAction $threadCreateAction)
    {
        $this->authorize('adminCreate', Thread::class);
        $threadCreateAction->handle($data);

        return crudRedirect('admin.thread.index', 'Thread created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Thread $thread)
    {
        $relations = [];
        $this->authorize('adminView', $thread);
        $crud = (new ThreadGrid)->show($thread);

        $relations[] = [
            'crud' => (new CommentGrid)->setRedirectUrl()->list($thread->comments()->getQuery()),
            'view' => 'list',
        ];

        $relations[] = [
            'crud' => (new ActivityLogGrid)->setRedirectUrl()->list($thread->activities()->getQuery()),
            'view' => 'list',
        ];

        $relations[] = [
            'crud' => (new AttributeGrid)->setRedirectUrl()->list($thread->attributes()->getQuery()),
            'view' => 'list',
        ];

        $relations[] = [
            'crud' => (new ReactionGrid)->setRedirectUrl()->list($thread->reactions()->getQuery()),
            'view' => 'list',
        ];

        return view('admin.crud.show', compact('crud', 'relations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Thread $thread)
    {
        $this->authorize('adminUpdate', $thread);
        $crud = (new ThreadGrid)->form($thread);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ThreadUpdateData $data, Thread $thread, ThreadUpdateAction $threadUpdateAction)
    {
        $this->authorize('adminUpdate', $thread);
        $threadUpdateAction->handle($data, $thread);

        return crudRedirect('admin.thread.index', 'Thread updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Thread $thread)
    {
        $this->authorize('adminDelete', $thread);
        $thread->delete();

        return crudRedirect('admin.thread.index', 'Thread deleted successfully.');
    }
}
