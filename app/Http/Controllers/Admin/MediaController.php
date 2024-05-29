<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Media\MediaCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Media\MediaUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Media\MediaCreateData;
use BalajiDharma\LaravelAdminCore\Data\Media\MediaUpdateData;
use Plank\Mediable\Media;

class MediaController extends Controller
{
    public function index()
    {
        $this->authorize('adminViewAny', Media::class);
        $mediaItems = (new Media)->newQuery();
        $mediaItems->whereIsOriginal();
        if (request()->has('search')) {
            $mediaItems->where('filename', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $mediaItems->orderBy($attribute, $sort_order);
        } else {
            $mediaItems->latest();
        }

        $mediaItems = $mediaItems->paginate(config('admin.paginate.per_page'))
            ->onEachSide(config('admin.paginate.each_side'));

        return view('admin.media.index', compact('mediaItems'));
    }

    public function create()
    {
        $this->authorize('adminCreate', Media::class);
        return view('admin.media.create');
    }

    public function store(MediaCreateData $data, MediaCreateAction $mediaCreateAction)
    {
        $this->authorize('adminCreate', Media::class);
        $mediaCreateAction->handle($data);

        return redirect()->route('admin.media.index')
            ->with('message', __('Media created successfully.'));
    }


    public function show($id)
    {
        $media = Media::findOrFail($id);
        $this->authorize('adminView', $media);

        return view('admin.media.show', compact('media'));
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);
        $this->authorize('adminUpdate', $media);

        return view('admin.media.edit', compact('media'));
    }

    public function update(MediaUpdateData $mediaUpdateData, $id, MediaUpdateAction $mediaUpdateAction)
    {
        $media = Media::findOrFail($id);
        $this->authorize('adminUpdate', $media);
        $mediaUpdateAction->handle($mediaUpdateData, $media);

        return redirect()->route('admin.media.index')
            ->with('message', __('Media updated successfully.'));
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $this->authorize('adminDelete', $media);
        $media->getAllVariantsAndSelf()->each(function (Media $variant) {
            $variant->delete();
        });

        return redirect()->route('admin.media.index')
            ->with('message', __('Media deleted successfully.'));
    }
}
