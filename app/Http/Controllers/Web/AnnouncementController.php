<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Calendar;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'url' => 'nullable',
            'image' => 'nullable|image'
        ]);

        Announcement::create($data);
        return to_route('announcements.index');
    }

    public function edit(Announcement $announcement)
    {
        return view('announcements.create', compact('announcement'));
    }

    public function update(Announcement $announcement, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'url' => 'nullable',
            'image' => 'nullable|image'
        ]);

        $announcement->update($data);

        return to_route('announcements.index');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return to_route('announcements.index');
    }
}
