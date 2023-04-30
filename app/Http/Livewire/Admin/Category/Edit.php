<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Astrotomic\Translatable\Locales;
use Livewire\Component;

class Edit extends Component
{
    public $category;

    public $category2;

    public $locales;

    public $locale;

    protected function rules(): array
    {
        $rules = [];

        foreach ($this->locales as $locale) {
            $rules['category.'.$locale.'.name'] = ['string', 'required'];
            $rules['category.'.$locale.'.slug'] = ['string', 'required'];
            $rules['category.'.$locale.'.description'] = 'string';
        }

        return $rules;
    }

    protected function messages(): array
    {
        $messages = [];

        foreach ($this->locales as $locale) {
            $messages['category.'.$locale.'.name.required'] = __('Name is required');
            $messages['category.'.$locale.'.slug.required'] = __('Slug is required');
            $messages['category.'.$locale.'.description'] = __('Description is required');
        }

        return $messages;
    }

    public function mount(Category $category)
    {
        $this->locales = app(Locales::class)->toArray();
        $this->locale = app(Locales::class)->current();

        $cat['id'] = $category->id;
        foreach ($this->locales as $locale) {
            $cat[$locale]['name'] = $category->translate("$locale")?->name;
            $cat[$locale]['slug'] = $category->translate("$locale")?->slug;
            $cat[$locale]['description'] = $category->translate("$locale")?->description;
        }

        $this->category = $cat;
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }

    public function store()
    {
        try {
            $this->validate();

            //        Place::updateOrCreate(['id' => $this->place['id'] ?? null], $this->place);

            $c = Category::firstOrNew(['id' => $this->category['id'] ?? null]);

            //        ray()->showQueries();

            $c->fill($this->category);
            $c->save();

            $this->dispatchBrowserEvent('toastr:success', [
                'message' => __('Category modified succesfully'),
            ]);

            return  redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('toastr:error', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function submit()
    {
        $this->validate();
        $this->category->save();

        return redirect()->route('admin.categories.index');
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}
