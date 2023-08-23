<?php

namespace App\Http\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [ // listeners for the events
        'pollCreated' => 'render' // when the pollCreated event is fired, call the render method below
    ];

    public function render()
    {
        // Get all polls with options and votes
        $polls = Poll::with('options.votes')
            ->latest()->get();

        return view('livewire.polls', [
            'polls' => $polls // pass the polls variable to the view
        ]);
    }

    public function vote(Option $option) // method to vote for an option
    {
        $option->votes()->create(); // create a vote for the option
    }

    public function removePoll(Poll $poll)
    {
        // Delete all votes associated with options of this poll
        $poll->options->each(function ($option) {
            $option->votes()->delete();
        });

        // Delete all options associated with this poll
        $poll->options()->delete();

        // Finally, delete the poll itself
        $poll->delete();

        $this->render(); // call the render method
    }

}
