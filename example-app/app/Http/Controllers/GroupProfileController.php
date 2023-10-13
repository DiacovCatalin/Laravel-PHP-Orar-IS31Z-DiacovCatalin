<?php

namespace App\Http\Controllers;

use App\Models\GroupProfile;
use Illuminate\Http\Request;

class GroupProfileController extends Controller
{
    /**
     * @OA\Get(
     *     path="/groupprofile",
     *     tags={"GroupProfile"},
     *     summary="Get all groupprofile",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index()
    {
        $groupprofile = GroupProfile::all();
        return response()->json($groupprofile);
    }

    /**
     *
     *  * @OA\Schema(
     *    schema="GroupProfileRequest",
     *    @OA\Property(
     *        property="name",
     *        type="string",
     *        description="Name",
     *        nullable=false,
     *        example="Real"
     *    ),
     * )
     *
     * @OA\Post(
     *     path="/groupprofile",
     *     tags={"GroupProfile"},
     *     summary="Create new GroupProfile",
     *     @OA\RequestBody(
     *         required=true,
     *     @OA\JsonContent(ref="#/components/schemas/GroupProfileRequest")
     *     ),
     *     @OA\Response(response="201", description="Created"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function store(Request $request)
    {
        $groupprofile = new GroupProfile;
        $groupprofile -> name = $request -> name;
        $groupprofile -> save();
        return response()->json([
            "message" => "GroupProfile Added" ,$groupprofile
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $groupprofile = GroupProfile::find($id);
        if (!empty($groupprofile)){return response()->json($groupprofile);}
        else {return response()->json(["groupprofile" => "not found"],404);}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (GroupProfile::where('id',$id)->exist()){
            $groupprofile = GroupProfile::find($id);
            $groupprofile->name = is_null($request->name) ? $groupprofile->name : $request->name;
            $groupprofile->save();
            return response()->json(["message" => "groupprofile updated",$groupprofile],200);
        }
        else {return response()->json(["groupprofile" => "not found"],404);}

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (GroupProfile::where('id',$id)->exist()){
            $groupprofile = GroupProfile::find($id);
            $groupprofile -> delete();
            return response()->json(["message" => "groupprofile deleted",$groupprofile],200);}
        else {return response()->json(["groupprofile" => "not found"],404);}
    }
}
