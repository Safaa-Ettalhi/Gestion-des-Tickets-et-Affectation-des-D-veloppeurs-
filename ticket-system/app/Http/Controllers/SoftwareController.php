<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use App\Models\User;
class SoftwareController extends Controller
{
    public function index()
    {
        
        $software = Software::withCount('tickets')
            ->paginate(10);
        return view('admin.software.index', compact('software'));
    }

    public function create()
    {
        return view('admin.software.create');
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
           
        ]);

        Software::create($validated);

        return redirect()->route('admin.software.index')
            ->with('success', 'Logiciel ajouté avec succès.');
    }

    public function edit(Software $software)
    {
        return view('admin.software.edit', compact('software'));
    }

    public function update(Request $request, Software $software)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            
        ]);

        $software->update($validated);

        return redirect()->route('admin.software.index')
            ->with('success', 'Logiciel mis à jour avec succès.');
    }
    public function destroy(Software $software)
    {
        $software->delete();
        return redirect()->route('admin.software.index')->with('success', 'Logiciel supprimé avec succès.');
    }
}