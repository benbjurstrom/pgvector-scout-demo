<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use BenBjurstrom\PgvectorScout\Models\Concerns\HasEmbeddings;

class Review extends Model
{
    use HasFactory, HasEmbeddings, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'profile_name',
        'helpfulness_numerator',
        'helpfulness_denominator',
        'score',
        'time',
        'summary',
        'text',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'helpfulness_numerator' => 'integer',
        'helpfulness_denominator' => 'integer',
        'score' => 'integer',
        'time' => 'datetime',
    ];


    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'Summary' => $this->summary,
            'Text' => $this->text,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    |
    */

    //

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    |
    */

    //

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    |
    */

    //

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    |
    |
    */

    //

    /*
    |--------------------------------------------------------------------------
    | Boot
    |--------------------------------------------------------------------------
    |
    |
    */

    //
}
