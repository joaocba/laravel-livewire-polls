<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title; // public property for variable title
    public $options = ['']; // public property for variable options, must have at least one empty string

    protected $rules = [ // rules for validation
        'title' => 'required|min:6|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255' // * means all options
    ];

    protected $messages = [
        'options.*' => "This option can't be empty."
    ];

    public function render()
    {
        return view('livewire.create-poll'); // return the view for create-poll.blade.php
    }

    public function addOption() // method to add an option
    {
        $this->options[] = ''; // add an empty string to the options array
    }

    public function removeOption($index) // method to remove an option with an index required
    {
        unset($this->options[$index]); // unset the option at the index, this will remove the option
        $this->options = array_values($this->options); // reindex the options array, this will remove the empty string
    }

    public function updated($propertyName) // method to update the public properties
    {
        $this->validateOnly($propertyName); // validate each property name on real time
    }

    public function createPoll() // method to create a poll
    {
         $this->validate(); // validate the rules previously set above

        Poll::create([ // create a poll with the title without a variable
            'title' => $this->title // get the title from the public property above
        ])->options() // get the options from the poll we just created
            ->createMany( // allow us to create many options at once with an array
                collect($this->options) // collect the options, by calling a colection
                    ->map(fn ($option) => ['name' => $option]) // map the options to an array with the name key
                    ->all() // get all the options as an array
            );

        // Same as above but with a foreach loop
/*         $poll = Poll::create([ // create a poll with the title
            'title' => $this->title // get the title from the public property above
        ]);

        foreach($this->options as $optionName) { // loop through the options
            $poll->options()->create([ // create an option for the poll on the database
                'name' => $optionName
            ]);
        } */

        $this->reset(['title', 'options']); // reset the title and options public properties

        $this->emit('pollCreated'); // emit an event to the polls component
    }

/*     public function mount() // mount method allows us to run code when the component is first loaded
    {

    } */
}
