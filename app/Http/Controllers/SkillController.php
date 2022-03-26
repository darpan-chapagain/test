<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = Skill::all()->toArray();
        return array_reverse($skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //add skill
        // $i = 0;
        // foreach($request as $req){
        //     $skill = new Skill([
        //         'skill' =>  $req[i],
        //     ]);
        //     $i+=1;
        //     $skill = new Skill([
        //         'skill' =>  $request->skill,
        //     ]);
        // }
        $skill = new Skill([
            'skill' =>  $request->skill,
        ]);

        $skill->save();

        $response = ['skill' => $skill];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill([
            'skill' =>  $request->skill,
        ]);

        $skill->save();

        $reponse = ['skill' => $skill];
        return response()->json($skill);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = Skill::all();

        $response = [
            'skill' => $skill
        ];
        return response()->json($skill);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        $response = [
            'skill' => $skill
        ];
        return response()->json($skill);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $skill = Skill::find($id)->update($request->all());
        // $job->update($request->all());

        return response()->json('The skill successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $skill = Skill::find($id);
        $skill->delete();

        return response()->json('The book successfully deleted');
    }
}
