<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'end_of_internship_certificate',
        'company_id',
        'rapport',
        'etudiant_id',
        'journal',
        'affected',
        'letter',
        'dateD_stage',
        'dateF_stage',
        'dateS',
    ];
    protected $attributes = [
        'end_of_internship_certificate' => '',
        'rapport' => '',
        'journal' => '',
        'letter' => '',
        'encadrant_id' => '6',
        'affected' => false,
        'dateD_stage' => '2023-02-02',
        'dateF_stage' => '2023-02-02',
        'dateS' => '2023-02-02',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function etudiants()
    {
        return $this->belongsToMany(User::class, 'etudiant_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'encadrant_id');
    }
    public function jury()
    {
        return $this->belongsToMany(Jury::class, 'stage_id');
    }
}
