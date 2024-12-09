<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Comment\CommentCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Comment\CommentUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Comment\CommentCreateData;
use BalajiDharma\LaravelAdminCore\Data\Comment\CommentUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\ActivityLogGrid;
use BalajiDharma\LaravelAdminCore\Grid\CommentGrid;
use BalajiDharma\LaravelComment\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Comment::class);
        $comments = (new Comment)->newQuery();

        $crud = (new CommentGrid)->list($comments);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Comment::class);
        $crud = (new CommentGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentCreateData $data, CommentCreateAction $commentCreateAction)
    {
        $this->authorize('adminCreate', Comment::class);
        $commentCreateAction->handle($data);

        return crudRedirect('admin.comment.index', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Comment $comment)
    {
        $this->authorize('adminView', $comment);
        $crud = (new CommentGrid)->show($comment);
        $relations = [];

        if ($comment->commenter_type == 'App\Models\User') {
            $relations[] = [
                'crud' => (new \BalajiDharma\LaravelAdminCore\Grid\UserGrid)->setTitle('Commenter')->show($comment->commenter()->first()),
                'view' => 'show',
            ];
        }

        $relations[] = [
            'crud' => (new ActivityLogGrid)->setRedirectUrl()->list($comment->activities()->getQuery()),
            'view' => 'list',
        ];

        return view('admin.crud.show', compact('crud', 'relations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Comment $comment)
    {
        $this->authorize('adminUpdate', $comment);
        $crud = (new CommentGrid)->form($comment);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommentUpdateData $data, Comment $comment, CommentUpdateAction $commentUpdateAction)
    {
        $this->authorize('adminUpdate', $comment);
        $commentUpdateAction->handle($data, $comment);

        return crudRedirect('admin.comment.index', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('adminDelete', $comment);
        $comment->delete();

        return crudRedirect('admin.comment.index', 'Comment deleted successfully.');
    }
}
