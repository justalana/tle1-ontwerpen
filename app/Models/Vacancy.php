<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Vacancy extends Model
{
    use HasFactory;
    use HasRichText;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'branch_id',
        'salary_min',
        'salary_max',
        'work_hours',
        'contract_duration',
        'description',
        'image_file_path',
        'image_alt_text',
        'active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'branch_id' => 'integer',
        'salary_min' => 'float',
        'salary_max' => 'float',
        'work_hours' => 'integer',
        'contract_duration' => 'integer',
        'active' => 'boolean'
    ];

    /**
     * The attributes that use rich text
     *
     */
    Protected $richTextAttributes = [
        'description'
    ];

    public static function find(mixed $id)
    {
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function requirements(): BelongsToMany
    {
        return $this->belongsToMany(Requirement::class);
    }

    public function timeSlots(): HasMany
    {
        return $this->hasMany(TimeSlot::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

}
