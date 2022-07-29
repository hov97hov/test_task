<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getMarks(Request $request)
    {
        if ($request->search) {
            $data = Mark::query()
                ->when($request->search, function ($query) use ($request) {
                    $query->whereHas('carModels', function ($query) use ($request) {
                        $query->where('title','LIKE', '%'.$request->search.'%')->with('attachments');
                    })
                        ->with('carModels', function ($query) use ($request) {
                            $query->where('title','LIKE', '%'.$request->search.'%')->with('attachments');
                        });
                })->get();
        } else {
            $data = Mark::query()->with('carModels', function ($query) {
                $query->with('attachments');
            })->get();
        }
        return $data;
    }
}
