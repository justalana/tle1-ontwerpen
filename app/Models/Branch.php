<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Branch extends Model
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
        'company_id',
        'description',
        'street_name',
        'street_number',
        'city',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
    ];

    /**
     * The attributes that use rich text
     *
     */
    Protected $richTextAttributes = [
        'description'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
