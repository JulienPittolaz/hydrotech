<?php

namespace App\Http\Controllers\Back_office;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class MediaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all()->where('actif', true);
        $media_columns = Media::all()->first()['fillable'];
        foreach ($medias as $media){
            $media->url = urldecode($media->url);
        }
        return view('media/index', ['medias' => $medias, 'columns' => $media_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->only(['url', 'titre', 'date', 'auteur', 'typeMedia']);
        if (!Media::isValid($para)) {
            return redirect()->back()->withInput()->with('error', 'Media invalide');
        }
        $media = new Media($para);
        $media->save();
        if($para['typeMedia'] == "Photo") {
            $para = $request->only(['titre', 'date', 'auteur', 'typeMedia']);
            $image = $request->file('url')->storeAs('public/medias', $media->id . '.jpg');
            $media->url = $image;
        }

        $media->save();
        return redirect('admin/media');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::find($id);
        if (!Media::isValid(['id' => $id]) || $media->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Media invalide');
        }
        if (Media::find($id) == null) {
            return redirect()->back()->withInput()->with('error', 'Media inexistant');
        }
        $media->url = urldecode($media->url);
        return $media;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::find($id);
        if(!$media) {
            return redirect('media');
        }
        $media->first();
        return view('media/edit', ['media' => $media]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = Media::find($id);
        $para = $request->intersect(['url', 'titre', 'date', 'auteur', 'typeMedia']);
        if($para['typeMedia'] == "Photo" || $para['typeMedia'] == "photo" ){
            if($request['url'] != null){
                $para = $request->only(['url', 'titre', 'date', 'auteur', 'typeMedia']);
                $image = $request->file('url')->storeAs('public/medias', $media->id . '.jpg');
                $media->url = $image;
            }
        }
        $request->replace(['id' => $id]);

        if (!Media::isValid($para)) {
            return redirect()->back()->withInput()->with('error', 'Media invalide');
        }
        if (!Media::isValid(['id' => $id]) || $media->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Media inexistant');
        }
        if($request->has('url')){
            $para['url'] = urlencode($para['url']);
        }
        $media->update($para);
        //$media->url = urldecode($media->url);
        return redirect('admin/media')->withInput()->with('message', 'Modification enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);

        if (!Media::isValid(['id' => $id])) {
            return redirect()->back()->withInput()->with('error', 'Media invalide');
        }
        if ($media == null) {
            return redirect()->back()->withInput()->with('error', 'Media inexistant');
        }
        if($media['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'Media déjà supprimé');
        }
        foreach ($media->editions as $ed){
            $media->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }
        $media->actif = false;
        $media->save();
        return redirect('admin/media')->withInput()->with('message', 'Media supprimé');
    }
}
