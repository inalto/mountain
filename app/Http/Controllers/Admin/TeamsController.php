<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Permission;
use App\Models\Team;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TeamsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.teams.create', compact('permissions'));
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->all());
        $team->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $team->load('permissions');

        return view('admin.teams.edit', compact('permissions', 'team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());
        $team->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('permissions');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
