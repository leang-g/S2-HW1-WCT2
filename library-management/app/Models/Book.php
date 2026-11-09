<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'category',
        'published_year',
        'total_copies',
        'available_copies',
    ];

    /**
     * Get the borrowing transactions for this book.
     */
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class, 'book_id', 'book_id');
    }

    /**
     * Members who have borrowed this book.
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'borrowings', 'book_id', 'member_id')
                    ->withPivot('borrow_date', 'due_date', 'return_date', 'status', 'fine_amount')
                    ->withTimestamps();
    }
}
