<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Award;
use App\Models\CompetencyDevelopment;
use App\Models\Formation;
use App\Models\PromotionTransfer;
use App\Models\Reception;
use App\Models\Refusal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $award = Award::count();
        $competencyDevelopment = CompetencyDevelopment::count();
        $promotionTransfer = PromotionTransfer::count();
        $appointment = Appointment::count();
        $formation = Formation::count();
        $reception = Reception::count();
        $refusal = Refusal::count();

        return view('admin.home', compact(
            'award',
            'competencyDevelopment',
            'promotionTransfer',
            'appointment',
            'formation',
            'reception',
            'refusal'
        ));
    }
}
