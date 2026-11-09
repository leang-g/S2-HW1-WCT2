<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Sample Books
        $book1 = Book::create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'isbn' => '978-0132350884',
            'category' => 'Software Engineering',
            'published_year' => 2008,
            'total_copies' => 5,
            'available_copies' => 4,
        ]);

        $book2 = Book::create([
            'title' => 'Design Patterns: Elements of Reusable Object-Oriented Software',
            'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides',
            'isbn' => '978-0201633610',
            'category' => 'Computer Science',
            'published_year' => 1994,
            'total_copies' => 3,
            'available_copies' => 3,
        ]);

        $book3 = Book::create([
            'title' => 'Database System Concepts',
            'author' => 'Abraham Silberschatz, Henry F. Korth, S. Sudarshan',
            'isbn' => '978-0073523323',
            'category' => 'Database Systems',
            'published_year' => 2019,
            'total_copies' => 4,
            'available_copies' => 3,
        ]);

        // Sample Members
        $member1 = Member::create([
            'first_name' => 'Sokha',
            'last_name' => 'Chan',
            'email' => 'sokha.chan@example.com',
            'phone' => '+855 12 345 678',
            'address' => 'Phnom Penh, Cambodia',
            'membership_date' => now()->subMonths(6)->toDateString(),
            'status' => 'active',
        ]);

        $member2 = Member::create([
            'first_name' => 'Dara',
            'last_name' => 'Vann',
            'email' => 'dara.vann@example.com',
            'phone' => '+855 16 987 654',
            'address' => 'Siem Reap, Cambodia',
            'membership_date' => now()->subMonths(2)->toDateString(),
            'status' => 'active',
        ]);

        // Sample Borrowings
        Borrowing::create([
            'member_id' => $member1->member_id,
            'book_id' => $book1->book_id,
            'borrow_date' => now()->subDays(10),
            'due_date' => now()->addDays(4),
            'return_date' => null,
            'status' => 'borrowed',
            'fine_amount' => 0.00,
        ]);

        Borrowing::create([
            'member_id' => $member2->member_id,
            'book_id' => $book3->book_id,
            'borrow_date' => now()->subDays(5),
            'due_date' => now()->addDays(9),
            'return_date' => null,
            'status' => 'borrowed',
            'fine_amount' => 0.00,
        ]);
    }
}
