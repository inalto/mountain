<?php

namespace App\Http\Livewire\Inalto\Admin\Reports;

use App\Models\Report;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class EditForm extends Component
{
    public $model = Report::class;

    public $title;

    public $slug;

    public $difficulty;

    public $excerpt;

    public $content;

    public $access;

    public $bibliographies = [
        0 => ['title' => '', 'author' => '', 'url' => ''],
    ];

    protected $rules = [
        'title' => 'required|max:100',
        'slug' => 'required|max:100',
        'difficulty' => '',
        'excerpt' => 'required|max:250',
        'content' => '',
        'access' => '',
        'bibliographies' => [],
    ];

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Report::class, 'slug', $this->title);
    }

    public function mount($report)
    {
        ray($this);
        $this->title = $report->title;
        $this->slug = $report->slug;
        $this->difficulty = $report->difficulty;
        $this->excerpt = $report->excerpt;
        $this->content = $report->content;
        //  $this->bibliography=option(json_decode($report->bibliograpy));
    }

    public function render()
    {
        return view('livewire.inalto.admin.reports.edit');
    }

    public function addBibliography()
    {
        array_push($this->bibliographies, ['title' => '', 'author' => '', 'url' => '']);
        ray($this->bibliographies);
    }

    public function save()
    {
        $this->validate();

        Report::firstOrCreate(['id'], [
            'title' => $this->title,
            'slug' => $this->slug,
            'difficulty' => $this->diffiulty,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'access' => $this->access,
        ]);

//        $this->title = '';
//        $this->slug = '';
    }
}
