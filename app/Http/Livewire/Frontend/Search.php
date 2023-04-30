<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Report;
use Illuminate\Support\Collection;
//use Spatie\SiteSearch\Search as SiteSearch;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    public $results = null;

    public bool $open = false;

    public function updatedSearch()
    {
        $this->open = true;

        $this->results = new Collection();
        //$this->emit('search', $this->search);
        if (! empty($this->search)) {
            $this->results = Report::search($this->search)->get();
        }
        /*
                  $totalCount = SiteSearch::onIndex('inalto')->query($this->search)->get()->totalCount;
              $this->results=SiteSearch::onIndex('inalto')->query($this->search)->get()->hits->map(function ($hit) {
                      return [ 'title' => $hit->title(), 'url' => $hit->url,'extract' => $hit->highlightedSnippet()];
                  });

              if (count($this->results) && ($totalCount) > 0) {
                  $this->open = true;
              } else {
                  $this->open = false;
              }
*/
    }

    public function close()
    {
        $this->open = false;
    }

    public function rules()
    {
        return [
            'search' => 'string|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.frontend.search');
    }
}
