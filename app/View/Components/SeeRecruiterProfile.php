<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeeRecruiterProfile extends Component
{
    public ?User $recruiter;
    public ?Company $company;

    /**
     * Create a new component instance.
     *
     * @param User|null $recruiter
     * @param Company|null $company
     */
    public function __construct(User $recruiter = null, Company $company = null)
    {
        $this->recruiter = $recruiter;
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.see-recruiter-profile', [
            'recruiter' => $this->recruiter,
            'company' => $this->company
        ]);
    }
}
