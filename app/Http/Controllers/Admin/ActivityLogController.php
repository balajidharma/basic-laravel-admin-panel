<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Grid\ActivityLogGrid;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Activity::class);
        $activitylogs = (new Activity)->newQuery();

        $crud = (new ActivityLogGrid)->list($activitylogs);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Activity $activitylog)
    {
        $this->authorize('adminView', $activitylog);
        $crud = (new ActivityLogGrid)->show($activitylog);

        return view('admin.crud.show', compact('crud'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Activity $activitylog)
    {
        $this->authorize('adminDelete', $activitylog);
        $activitylog->delete();

        return redirect()->route('admin.activitylog.index')
            ->with('message', __('Activity deleted successfully'));
    }
}
