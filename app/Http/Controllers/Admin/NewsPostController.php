<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNewsPostRequest;
use App\Http\Requests\StoreNewsPostRequest;
use App\Http\Requests\UpdateNewsPostRequest;
use App\NewsCategory;
use App\NewsPost;
use App\NewsTag;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NewsPostController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('news_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NewsPost::with(['tags', 'categories'])->select(sprintf('%s.*', (new NewsPost)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'news_post_show';
                $editGate      = 'news_post_edit';
                $deleteGate    = 'news_post_delete';
                $crudRoutePart = 'news-posts';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('photos', function ($row) {
                if (!$row->photos) {
                    return '';
                }

                $links = [];

                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('tags', function ($row) {
                $labels = [];

                foreach ($row->tags as $tag) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $tag->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('categories', function ($row) {
                $labels = [];

                foreach ($row->categories as $category) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $category->title);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'photos', 'tags', 'categories']);

            return $table->make(true);
        }

        return view('admin.newsPosts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('news_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = NewsTag::all()->pluck('name', 'id');

        $categories = NewsCategory::all()->pluck('title', 'id');

        return view('admin.newsPosts.create', compact('tags', 'categories'));
    }

    public function store(StoreNewsPostRequest $request)
    {
        $newsPost = NewsPost::create($request->all());
        $newsPost->tags()->sync($request->input('tags', []));
        $newsPost->categories()->sync($request->input('categories', []));

        foreach ($request->input('photos', []) as $file) {
            $newsPost->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $newsPost->id]);
        }

        return redirect()->route('admin.news-posts.index');
    }

    public function edit(NewsPost $newsPost)
    {
        abort_if(Gate::denies('news_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = NewsTag::all()->pluck('name', 'id');

        $categories = NewsCategory::all()->pluck('title', 'id');

        $newsPost->load('tags', 'categories');

        return view('admin.newsPosts.edit', compact('tags', 'categories', 'newsPost'));
    }

    public function update(UpdateNewsPostRequest $request, NewsPost $newsPost)
    {
        $newsPost->update($request->all());
        $newsPost->tags()->sync($request->input('tags', []));
        $newsPost->categories()->sync($request->input('categories', []));

        if (count($newsPost->photos) > 0) {
            foreach ($newsPost->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $newsPost->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $newsPost->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.news-posts.index');
    }

    public function show(NewsPost $newsPost)
    {
        abort_if(Gate::denies('news_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsPost->load('tags', 'categories');

        return view('admin.newsPosts.show', compact('newsPost'));
    }

    public function destroy(NewsPost $newsPost)
    {
        abort_if(Gate::denies('news_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsPostRequest $request)
    {
        NewsPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('news_post_create') && Gate::denies('news_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new NewsPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
